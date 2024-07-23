<?php

// Restrict the API version when the endpoints are requested
// "the variable 'apiVersion' must always be equal to 'v1' when clients make requests to our app"
$requirements = [
	'apiVersion' => 'v1',
];

// Each endpoint has a route and a controller method to handle the network requests
return [
	'routes' => [
		// This route points GET requests to the "index" method of the PageController class. 
		['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
		// This route points PUT requests to the "setConfig" method of the ConfigController class. 
		['name' => 'config#setConfig', 'url' => '/config', 'verb' => 'PUT'],
	],
	'ocs' => [
		// This route points GET requests to the getUserNotes method of the NotesController class 
		['name' => 'notes#getUserNotes', 'url' => '/api/{apiVersion}/notes', 'verb' => 'GET', 'requirements' => $requirements],
		// This route points GET requests to the exportUserNote method of the NotesController class 
		['name' => 'notes#exportUserNote', 'url' => '/api/{apiVersion}/notes/{id}/export', 'verb' => 'GET', 'requirements' => $requirements],
		// This route points POST requests to the addUserNote method of the NotesController class
		['name' => 'notes#addUserNote', 'url' => '/api/{apiVersion}/notes', 'verb' => 'POST', 'requirements' => $requirements],
		// This route points PUT requests to the editUserNote method of the NotesController class
		['name' => 'notes#editUserNote', 'url' => '/api/{apiVersion}/notes/{id}', 'verb' => 'PUT', 'requirements' => $requirements],
		// This route points DELETE requests to the deleteUserNote of the NotesController class
		['name' => 'notes#deleteUserNote', 'url' => '/api/{apiVersion}/notes/{id}', 'verb' => 'DELETE', 'requirements' => $requirements],
	],
];