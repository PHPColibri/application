<?php

require '../../vendor/autoload.php';

use Colibri\Config\Config;

$appCfg = Config::get('app');

var_dump($appCfg);
