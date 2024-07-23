<?php

namespace OCA\NoteBook\Tests;

use OCA\NoteBook\AppInfo\Application;

// A test file is a class that extends \Test\TestCase and that contains test methods (that start with test).
class NoteServiceTest extends \Test\TestCase {
	// Dummy test that chechs if the app ID is correct
	public function testDummy() {
		$app = new Application();
		$this->assertEquals('notebook', $app::APP_ID);
	}
}