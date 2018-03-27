<?php

use Colibri\Database\Type as DbType;

return [
    'connection' => [
        'default'     => 'local-mysql',
        'local-mysql' => [
            'type'       => DbType::MYSQL,
            'host'       => 'localhost',
            'database'   => '<db-name>',
            'user'       => '<set user here or in local config>',
            //'password' => '<set password in local config>',
            'persistent' => false,
        ],
    ],
];
