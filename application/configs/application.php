<?php

return [

	'debug' => true,

	'domain' => 'colibri.dev',

	'encoding'	 => 'utf-8',
	'timezone'	 => 'Europe/Moscow',
	'umask'      => 0002,

	// @todo: refactoring this option & it`s use
	'useCache' => true,

	// Module
	'module' => array(
		'default'						 => 'main',
		'defaultViewsControllerAction'	 => 'defaultView',
		'defaultMethodsControllerAction' => 'defaultResponse',
	),

	'response' => array(
		'defaultHeaders' => array(
			'Content-type: text/html; charset=utf-8',
			'Cache-Control: no-cache, must-revalidate',
			'Expires: Mon, 26 Jul 1997 05:00:00 GMT',
		),
	),

	'view' => array(
		'title'        => 'Colibri :: ',
	),
];
