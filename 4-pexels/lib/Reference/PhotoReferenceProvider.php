<?php
namespace OCA\Pexels\Reference;

// By extending ADiscoverableReferenceProvider our Reference provider will be listed by the Smart Picker.
use OCP\Collaboration\Reference\ADiscoverableReferenceProvider;
// Our picker provider uses a unified search provider.
use OCP\Collaboration\Reference\ISearchableReferenceProvider;
use OCP\Collaboration\Reference\Reference;
use OC\Collaboration\Reference\ReferenceManager;
use OCA\Pexels\AppInfo\Application;
use OCA\Pexels\Service\PexelsService;
use OCP\Collaboration\Reference\IReference;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IURLGenerator;


class PhotoReferenceProvider extends ADiscoverableReferenceProvider implements ISearchableReferenceProvider {

	private const RICH_OBJECT_TYPE = Application::APP_ID . '_photo';

	private ?string $userId;
	private IConfig $config;
	private ReferenceManager $referenceManager;
	private IL10N $l10n;
	private IURLGenerator $urlGenerator;
	private PexelsService $pexelsService;

	public function __construct(IConfig $config,
								IL10N $l10n,
								IURLGenerator $urlGenerator,
								PexelsService $pexelsService,
								ReferenceManager $referenceManager,
								?string $userId) {
		$this->userId = $userId;
		$this->config = $config;
		$this->referenceManager = $referenceManager;
		$this->l10n = $l10n;
		$this->urlGenerator = $urlGenerator;
		$this->pexelsService = $pexelsService;
	}

	// Methods providing information about the provider
	public function getId(): string	{
		return 'pexels-photo';
	}

	public function getTitle(): string {
		return $this->l10n->t('Pexels photos');
	}

	public function getOrder(): int	{
		return 10;
	}

	public function getIconUrl(): string {
		return $this->urlGenerator->getAbsoluteURL(
			$this->urlGenerator->imagePath(Application::APP_ID, 'app.svg')
		);
	}

	public function getSupportedSearchProviderIds(): array {
		return ['pexels-search-photos'];

	}

	// When trying to resolve a link, Nextcloud asks every reference provider if it can handle this link by calling this method for all registered providers.
	// The first provider returning true will be the chosen one to resolve the link.
	public function matchReference(string $referenceText): bool {
		$adminLinkPreviewEnabled = $this->config->getAppValue(Application::APP_ID, 'link_preview_enabled', '1') === '1';
		if (!$adminLinkPreviewEnabled) {
			return false;
		}
		// This method should return true if the link passed as parameter is pointing to a Pexels image page
		return preg_match('/^(?:https?:\/\/)?(?:www\.)?pexels\.com\/photo\/[^\/\?]+-\d+\/?$/i', $referenceText) === 1
			|| preg_match('/^(?:https?:\/\/)?(?:www\.)?pexels\.com\/photo\/\d+\/?$/i', $referenceText) === 1;
	}

	// This method gets in action when matchReference concludes the URL matches, and it gathers the relevant data to be displayed in the reference widget in the frontend
	public function resolveReference(string $referenceText): ?IReference {
		if ($this->matchReference($referenceText)) {
			$photoId = $this->getPhotoId($referenceText);
			if ($photoId !== null) {
				$photoInfo = $this->pexelsService->getPhotoInfo($photoId);
				$reference = new Reference($referenceText);
				$reference->setTitle($photoInfo['alt'] ?? $this->l10n->t('Pexels photo'));
				$reference->setDescription($photoInfo['photographer'] ?? $this->l10n->t('Unknown photographer'));
				$imageUrl = $this->urlGenerator->linkToRouteAbsolute(Application::APP_ID . '.pexels.getPhotoContent', ['photoId' => $photoId, 'size' => 'large']);
				$reference->setImageUrl($imageUrl);
				$photoInfo['proxied_url'] = $imageUrl;
				$reference->setRichObject(
					self::RICH_OBJECT_TYPE,
					$photoInfo
				);
				return $reference;
			}
		}

		return null;
	}

	private function getPhotoId(string $url): ?int {
		preg_match('/^(?:https?:\/\/)?(?:www\.)?pexels\.com\/photo\/[^\/\?]+-(\d+)\/?$/i', $url, $matches);
		if (count($matches) > 1) {
			return (int)$matches[1];
		}

		preg_match('/^(?:https?:\/\/)?(?:www\.)?pexels\.com\/photo\/(\d+)\/?$/i', $url, $matches);
		if (count($matches) > 1) {
			return (int)$matches[1];
		}
		return null;
	}

	public function getCachePrefix(string $referenceId): string {
		return $this->userId ?? '';
	}

	public function getCacheKey(string $referenceId): ?string {
		return $referenceId;
	}

	public function invalidateUserCache(string $userId): void {
		$this->referenceManager->invalidateCache($userId);
	}
}