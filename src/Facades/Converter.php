<?php

namespace LasePeCo\UnitConverter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static float mass(string $from, string $to, float $weight, int $decimals = 2)
 * @method static float volume(string $from, string $to, float $volume, int $decimals = 2)
 * @method static float speed(string $from, string $to, float $speed, int $decimals = 2)
 * @method static float area(string $from, string $to, int $area, int $decimals = 2)
 * @method static float length(string $from, string $to, int $length, int $decimals = 2)
 * @method static float density(string $from, string $to, int $density, int $decimals = 2)
 */
class Converter extends Facade
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
