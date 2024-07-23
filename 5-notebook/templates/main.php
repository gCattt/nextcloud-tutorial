<?php
// Remember that the template loads the Javascript files.
$appId = OCA\NoteBook\AppInfo\Application::APP_ID;
\OCP\Util::addScript($appId, $appId . '-main');
?>