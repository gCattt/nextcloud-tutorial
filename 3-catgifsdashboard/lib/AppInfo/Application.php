<?php

namespace OCA\CatGifsDashboard\AppInfo;

use OCA\CatGifsDashboard\Dashboard\SimpleWidget;
use OCA\CatGifsDashboard\Dashboard\VueWidget;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;

// The Application.php files of all enabled apps are loaded every time a Nextcloud page is loaded.
class Application extends App implements IBootstrap {
	public const APP_ID = 'catgifsdashboard';

	public function __construct(array $urlParams = []) {
		parent::__construct(self::APP_ID, $urlParams);
	}

	public function register(IRegistrationContext $context): void {
		$context->registerDashboardWidget(SimpleWidget::class);
		$context->registerDashboardWidget(VueWidget::class);
	}

	public function boot(IBootContext $context): void {
	}
}