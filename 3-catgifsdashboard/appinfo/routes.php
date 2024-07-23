<?php

// This route means that when receiving a GET request to /apps/catgifsdashboard/gif/FILE_ID,
// the getGifFile method of the GifController class will be called.
return [
	'routes' => [
		['name' => 'gif#getGifFile', 'url' => '/gif/{fileId}', 'verb' => 'GET'],
	],
];