<?php
namespace Application\Foundation;

use Colibri\Config\Config as ColibriConfig;

/**
 * Class Config
 *
 * @method static mixed database(string $key = null, mixed $default = null) gets config value by keys, separated with dot
 * @method static mixed mail(string $key = null, mixed $default = null) gets config value by keys, separated with dot
 * @see ColibriConfig::__callStatic
 */
class Config extends ColibriConfig
{

}
