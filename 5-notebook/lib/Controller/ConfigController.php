<?php

namespace OCA\NoteBook\Controller;

use OCP\IConfig;
use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

use OCA\NoteBook\AppInfo\Application;
use OCP\PreConditionNotMetException;

class ConfigController extends Controller {

	public function __construct(
		string   $appName,
		IRequest $request,
		private IConfig  $config,
		private ?string  $userId
	) {
		parent::__construct($appName, $request);
	}

	// This configuration stores the current selected note ID so the selection can be kept after a page reload.
	/**
	 * @NoAdminRequired
	 *
	 * @param array $values
	 * @return DataResponse
	 * @throws PreConditionNotMetException
	 */
	public function setConfig(array $values): DataResponse {
		foreach ($values as $key => $value) {
			$this->config->setUserValue($this->userId, Application::APP_ID, $key, $value);
		}
		return new DataResponse([]);
	}
}
