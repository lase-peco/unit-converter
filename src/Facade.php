<?php

namespace LasePeCo\UnitConverter;

use Illuminate\Support\Facades\Facade as BaseFacade;

/**
 * @method static float mass(string $from, string $to, float $weight, int $decimals = 2)
 * @method static float volume(string $from, string $to, float $volume, int $decimals = 2)
 * @method static float speed(string $from, string $to, float $speed, int $decimals = 2)
 */
class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'converter';
    }
}
