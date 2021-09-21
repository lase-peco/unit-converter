<?php

namespace LasePeCo\UnitConverter;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

/**
 * @method float mass(string $from, string $to, float $weight, int $decimals = 2)
 * @method float volume(string $from, string $to, float $volume, int $decimals = 2)
 * @method float speed(string $from, string $to, float $speed, int $decimals = 2)
 * @method float area(string $from, string $to, int $area, int $decimals = 2)
 * @method float length(string $from, string $to, int $length, int $decimals = 2)
 * @method float density(string $from, string $to, int $density, int $decimals = 2)
 */
class Converter
{
    public function convert(string $type, string $from, string $to, float $value, int $decimals = 2): float
    {
        if (!$from_rate = Config::get("conversions.units.{$type}.{$from}")) {
            throw new Exception("From unit:{$type}/{$from} not known");
        }

        if (!$to_rate = Config::get("conversions.units.{$type}.{$to}")) {
            throw new Exception("To unit:{$type}/{$to} not known");
        }

        return round(($value / $from_rate) * $to_rate, $decimals);
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func([$this, 'convert'], ... Arr::prepend($arguments, $name));
    }

    public function getSupportedSystems()
    {
        return array_map(function ($system) {
            return $system['name'];
        }, app('config')->get('conversions.systems'));
    }
}
