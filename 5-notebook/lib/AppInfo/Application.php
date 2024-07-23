<?php
namespace OCA\NoteBook\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;

// This file is loaded every time you load any page in Nextcloud.
// It defines what the app does in Nextcloud in general, on the server side.
class Application extends App implements IBootstrap {

	public const APP_ID = 'notebook';
	public const NOTE_FOLDER_NAME = 'TutorialNotes';

	public function __construct(array $urlParams = []) {
		parent::__construct(self::APP_ID, $urlParams);
	}

	public function register(IRegistrationContext $context): void {
	}

	public function boot(IBootContext $context): void {
	}
}