<?php
$appId = OCA\Pexels\AppInfo\Application::APP_ID;
\OCP\Util::addScript($appId, $appId . '-adminSettings');
?>

<!-- Empty <div> which will be used by our scripts to inject (mount) a Vue.js component -->
<div id="pexels_prefs"></div>