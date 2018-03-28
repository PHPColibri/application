<?php

return [

    'debug' => true,

    'domain' => 'colibri.dev',

    'encoding' => 'utf-8',
    'timezone' => 'Europe/Moscow',
    'locale'   => 'ru_RU.utf8',
    'umask'    => 0002,

    // @todo: refactoring this option & it`s use
    'useCache' => true,

    // Module
    'module'   => [

        // Default module to call.
        //   if in requested url there is no module name,
        //   this module will be loaded.
        'default'                        => 'home',

        // Default action to call (for Views controller).
        //   if in requested url there is no action name,
        //   then for Views controller this action will be called
        'defaultViewsControllerAction'   => 'index',
    ],

    'response' => [
        'defaultHeaders' => [
            'Content-type: text/html; charset=utf-8',
            'Cache-Control: no-cache, must-revalidate',
            'Expires: Mon, 26 Jul 1997 05:00:00 GMT',
        ],
    ],

    'view' => [
        'title' => 'Colibri :: ',
    ],
];
