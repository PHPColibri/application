<?php

	// Будет пересмотрено, не юзать по возможности

	// as the best practice: use the aliases if possible

	// =========  Server side  =========
	// as folders structure:
	define('ROOT', dirname(dirname(dirname(__FILE__))).'/');

	define('VENDOR'         ,ROOT.'vendor/');
	// ---------  LIB  consts  ---------
	define('LIB_PHPCAPTCHA' ,      VENDOR.'phpcaptcha/');
	define('LIB_PHPMAILER'  ,      VENDOR.'PHPMailer/');
	define('COLIBRI'        ,      VENDOR.'colibri/framework/');
	define('COLIBRI_TEMPLATES',            COLIBRI.'templates/');

	// ---------  APP  consts  ---------
	define('APPLICATION'	,ROOT.'application/');
	define('APP_CLASSES'	,      APPLICATION.'classes/');
	define('APP_INTERFACES'	,               APP_CLASSES.'interfaces/');
	define('APP_TYPES'		,               APP_CLASSES.'types/');
	define('APP_OBJECTS'	,               APP_CLASSES.'dbObjects/');
	define('APP_HELPERS'	,				APP_CLASSES.'helpers/');
	define('APP_EXCEPTIONS' ,               APP_CLASSES.'exceptions/');
	define('APP_CONFIGS'	,      APPLICATION.'configs/');
	define('APP_LOGS'		,      APPLICATION.'logs/');
	define('APP_MODULES'	,      APPLICATION.'modules/');
	define('APP_VIEWS'		,      APPLICATION.'views/');
	define('APP_WWW'		,      APPLICATION.'public/');
	define('APP_RESOURCES'	,                   APP_WWW.'resources/');
	define('APP_HTTPERRORS'	,               COLIBRI_TEMPLATES.'errors/');

	// aliases
	define('CLASSES'		,APP_CLASSES);
	define('INTERFACES'		,APP_INTERFACES);
	define('TYPES'			,APP_TYPES);
	define('CONFIGS'		,APP_CONFIGS);
	define('LOGS'			,APP_LOGS);
	define('MODULES'		,APP_MODULES);
	define('RESOURCES'		,APP_RESOURCES);
	define('VIEWS'			,APP_VIEWS);
	define('OBJECTS'		,APP_OBJECTS);
	define('HELPERS'		,APP_HELPERS);
	define('EXCEPTIONS'     ,APP_EXCEPTIONS);
	define('HTTPERRORS'		,APP_HTTPERRORS);

	// TODO: bring out into application

	define('MODULE_VIEWS'	,     MODULES.'%s/views/');



	// =========  Client side  =========
	define('VND'            ,'/vnd/');
	define('RES'			,'/resources/');
	define('RES_JS'			,  RES      .'js/');
	define('RES_CSS'		,  RES      .'css/');
	define('RES_SWF'		,  RES      .'swf/');
	define('RES_IMG'		,  RES      .'images/');

	define('MOD'			,'/modules/');

