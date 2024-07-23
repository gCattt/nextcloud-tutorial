<?php

namespace OCA\CatGifsDashboard\Dashboard;

use OCA\CatGifsDashboard\Service\GifService;
use OCP\AppFramework\Services\IInitialState;
use OCP\Dashboard\IAPIWidget;
use OCP\IL10N;

use OCA\CatGifsDashboard\AppInfo\Application;
use OCP\Util;

// IAPIWidget is a Php interface from the Nextcloud core. 
// You only have to register and define the widget and you are done for the server part.
class SimpleWidget implements IAPIWidget {

	
	private $l10n;
	private $gifService;
	private $initialStateService;
	private $userId;

	public function __construct(IL10N $l10n,
								GifService $gifService,
								IInitialState $initialStateService,
								?string $userId) {
		$this->l10n = $l10n;
		$this->gifService = $gifService;
		$this->initialStateService = $initialStateService;
		$this->userId = $userId;
	}

	// define mandatory methods providing information about the widget
	public function getId(): string {
		return 'catgifsdashboard-simple-widget';
	}

	public function getTitle(): string {
		return $this->l10n->t('Simple widget');
	}

	public function getOrder(): int {
		return 10; // numbers 0-9 are reserved for shipped apps
	}

	public function getIconClass(): string {
		return 'icon-catgifsdashboard'; // defined in the css file
	}

	public function getUrl(): ?string {
		return null;
	}

	// load Javascript and style (css) files
	public function load(): void {
		if ($this->userId !== null) {
			$items = $this->getItems($this->userId);
			$this->initialStateService->provideInitialState('dashboard-widget-items', $items);
		}

		Util::addScript(Application::APP_ID, Application::APP_ID . '-dashboardSimple');
		Util::addStyle(Application::APP_ID, 'dashboard');
	}

	public function getItems(string $userId, ?string $since = null, int $limit = 7): array {
		return $this->gifService->getWidgetItems($userId);
	}
} 