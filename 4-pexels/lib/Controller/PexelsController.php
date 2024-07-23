<?php

namespace OCA\Pexels\Controller;

use OCA\Pexels\Service\PexelsService;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataDisplayResponse;
use OCP\AppFramework\Controller;
use OCP\IRequest;

class PexelsController extends Controller {
	// Download the photo content through a service to keep the controller simple and focused on the request handling.
	private PexelsService $pexelsService;
	private ?string $userId;

	public function __construct(string        $appName,
								IRequest      $request,
								PexelsService $pexelsService,
								?string       $userId)
	{
		parent::__construct($appName, $request);
		$this->pexelsService = $pexelsService;
		$this->userId = $userId;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 */
	public function getPhotoContent(int $photoId, string $size = 'original'): DataDisplayResponse {
		$photoResponse = $this->pexelsService->getPhotoContent($photoId, $size);
		if ($photoResponse !== null && isset($photoResponse['body'], $photoResponse['headers'])) {
			// Data response
			$response = new DataDisplayResponse(
				$photoResponse['body'],
				Http::STATUS_OK,
				['Content-Type' => $photoResponse['headers']['Content-Type'][0] ?? 'image/jpeg']
			);
			$response->cacheFor(60 * 60 * 24, false, true);
			return $response;
		}
		return new DataDisplayResponse('', Http::STATUS_BAD_REQUEST);
	}
}
