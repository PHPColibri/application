<?php

use Application\Service\Mail;

return [
    'transport' => [
        'driver'   => Swift_SmtpTransport::class,
        'params'   => [
            'host' => 'smtp.colibri-app.com',
        ],
        'username' => 'web-app@colibri-app.com',
        'password' => '********',
    ],

    'from' => [
        'default' => Mail\Sender::ROBOT,

        Mail\Sender::ROBOT => [
            'address' => 'robot@colibri-app.com',
            'name'    => 'Colibri App Robot',
        ],
    ],

    'to' => [
        'support' => 'support@colibri-app.com',
    ],

    'views' => dirname(__DIR__) . '/views/mail',
];
