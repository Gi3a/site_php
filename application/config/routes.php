<?php

return [
/* ------------------------------------ */
	/* =================== Main Controller =================== */
	// Main page
	'' => [
		'controller' => 'main',
		'action' => 'main',
	],
	'main' => [
		'controller' => 'main',
		'action' => 'main',
	],

	'report' => [
		'controller' => 'main',
		'action' => 'report',
	],


	/* =================== User Controller =================== */
	// User page
	'{login:@[a-zA-Z0-9._]+$}' => [
		'controller' => 'user',
		'action' => 'user',
	],
	'id/{id:\d+}' => [
		'controller' => 'user',
		'action' => 'user',
	],

	/* =================== User Controller AUTH =================== */
	// Login page
	'login' => [
		'controller' => 'user',
		'action' => 'login',
	],
	// Join page
	'join/{role:\w+}' => [
		'controller' => 'user',
		'action' => 'join',
	],
	// Options
	'join/confirm/{code:\w+}' => [
		'controller' => 'user',
		'action' => 'confirm',
	],
	'join/reset/{code:\w+}' => [
		'controller' => 'user',
		'action' => 'reset',
	],
	// Recovery account page
	'recovery' => [
		'controller' => 'user',
		'action' => 'recovery',
	],


	/* =================== Offer Controller =================== */
	'add/{type:\w+}' => [
		'controller' => 'offer',
		'action' => 'add',
	],
	'change/{type:\w+}/{id:\d+}' => [
		'controller' => 'offer',
		'action' => 'change',
	],
	'remove/{id:\d+}' => [
		'controller' => 'offer',
		'action' => 'remove',
	],


	/* =================== Trip Controller =================== */
	'create' => [
		'controller' => 'trip',
		'action' => 'create',
	],
	'edit/{id:\d+}' => [
		'controller' => 'trip',
		'action' => 'edit',
	],
	'delete/{id:\d+}' => [
		'controller' => 'trip',
		'action' => 'delete',
	],
	'trips/list' => [
		'controller' => 'trip',
		'action' => 'listTrips',
	],
	'trips/my' => [
		'controller' => 'trip',
		'action' => 'myTrips',
	],
	'trips/history' => [
		'controller' => 'trip',
		'action' => 'historyTrips',
	],



	/* =================== Admin Controller =================== */


	/* =================== Legal Controller =================== */
	'legal' => [
		'controller' => 'legal',
		'action' => 'legal',
	],

	// Exit session
	'exit' => [
		'controller' => 'user',
		'action' => 'exit',
	],
];