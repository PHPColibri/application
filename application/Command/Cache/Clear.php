<?php
namespace Application\Command\Cache;

use Colibri\Cache\Cache;
use Colibri\Console\Command;

class Clear extends Command
{
    /**
     * @return \Colibri\Console\Command
     */
    protected function definition(): Command
    {
        return $this
            ->setDescription('Clears all cache');
    }

    /**
     * @return int
     */
    protected function go(): int
    {
        Cache::flush();

        return 0;
    }
}
