<?php

	// Будет пересмотрено, не юзать по возможности

	// =========  Server side  =========
	// as folders structure:
	define('ROOT', dirname(dirname(dirname(__FILE__))).'/');

	// ---------  APP  consts  ---------
	define('APPLICATION'	,ROOT.'application/');
	define('MODULES'    	,      APPLICATION.'modules/');
	define('VIEWS'	    	,      APPLICATION.'views/');


	define('MODULE_VIEWS'	,     MODULES.'%s/views/');



	// =========  Client side  =========
	define('VND'            ,'/vnd/');
	define('RES'			,'/resources/');
	define('RES_JS'			,  RES      .'js/');
	define('RES_CSS'		,  RES      .'css/');
	define('RES_IMG'		,  RES      .'images/');

	define('MOD'			,'/modules/');

