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
        'default'                        => 'main',
        'defaultViewsControllerAction'   => 'index',
        'defaultMethodsControllerAction' => 'defaultResponse',
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
