<?php
namespace OCA\Pexels\Controller;

use OCA\Pexels\AppInfo\Application;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IConfig;
use OCP\IRequest;

// Here we use Nextcloud's config service to store the settings that are global in our app.
class ConfigController extends Controller {
	private ?string $userId;
	private IConfig $config;

	public function __construct(string        $appName,
								IRequest      $request,
								IConfig $config,
								?string       $userId)
	{
		parent::__construct($appName, $request);
		$this->userId = $userId;
		$this->config = $config;
	}

	/**
	 * Set admin config values
	 *
	 * @param array $values key/value pairs to store in app config
	 * @return DataResponse
	 */
	public function setAdminConfig(array $values): DataResponse {
		foreach ($values as $key => $value) {
			$this->config->setAppValue(Application::APP_ID, $key, $value);
		}
		return new DataResponse(1);
	}
}
