<?php

namespace LasePeCo\UnitConverter;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

/**
 * @method float mass(string $from, string $to, float $weight, int $decimals = 2)
 * @method float volume(string $from, string $to, float $volume, int $decimals = 2)
 * @method float speed(string $from, string $to, float $speed, int $decimals = 2)
 */
class Converter
{
    public function convert(string $type, string $from, string $to, float $value, int $decimals = 2): float
    {
        $from_rate = Config::get("conversions.{$type}.{$from}");
        $to_rate = Config::get("conversions.{$type}.{$to}");

        if (is_null($from_rate)) {
            throw new Exception("From unit:{$type}/{$from} not known");
        }

        if (is_null($to_rate)) {
            throw new Exception("To unit:{$type}/{$to} not known");
        }

        return round(($value / $from_rate) * $to_rate, $decimals);
    }

    public function __call($name, $arguments)
    {
        return call_user_func([$this, 'convert'], ... Arr::prepend($arguments, $name));
    }
}
