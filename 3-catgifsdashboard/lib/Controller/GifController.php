<?php

namespace OCA\CatGifsDashboard\Controller;

use OC\User\NoUserException;
use OCA\CatGifsDashboard\Service\GifService;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataDownloadResponse;
use OCP\AppFramework\Services\IInitialState;
use OCP\Files\InvalidPathException;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\Lock\LockedException;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

// Controllers can handle network requests and they can respond with data or a template.
class GifController extends Controller {
	/**
	 * @var string|null
	 */
	private $userId;

	/**
	 * @var GifService
	 */
	private $gifService;

	public function __construct(string        $appName,
								IRequest      $request,
								IInitialState $initialStateService,
								GifService    $gifService,
								?string       $userId)
	{
		parent::__construct($appName, $request);
		$this->initialStateService = $initialStateService;
		$this->userId = $userId;
		$this->gifService = $gifService;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @param int $fileId
	 * @return DataDownloadResponse|DataResponse
	 * @throws InvalidPathException
	 * @throws NoUserException
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 * @throws LockedException
	 */
	public function getGifFile(int $fileId) {
		// To make the file more readable split the implementation of retrieving those GIF files into a separate class: GifService
		// So the service does the action and the controller is only receiving the request and building the response.
		$file = $this->gifService->getGifFile($this->userId, $fileId);
		if ($file !== null) {
			// This controller will respond with a data response (a GIF file content)
			$response = new DataDownloadResponse(
				$file->getContent(),
				'',
				$file->getMimeType()
			);
			$response->cacheFor(60 * 60);
			return $response;
		}

		return new DataResponse('', Http::STATUS_NOT_FOUND);
	}
}