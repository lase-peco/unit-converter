<?php

namespace LasePeCo\UnitConverter\Tests;

use Illuminate\Support\Str;
use LasePeCo\UnitConverter\Facade as Converter;
use LasePeCo\UnitConverter\Units\Volume;

class ConverterTest extends TestCase
{
    /** @test */
    public function it_translated_units()
    {
        $this->assertEquals('Kilogram', trans('conversions::mass.kg'));
    }

    /** @test */
    public function every_unit_has_a_translation()
    {
        foreach (config('conversions') as $category => $units) {
            foreach ($units as $unit => $value) {
                $key = "conversions::{$category}.{$unit}";
                $translation = trans($key);
                $this->assertNotEquals($key, $translation);
                $this->assertNotEmpty($translation);
            }
        }
    }

    /** @test */
    public function every_unit_has_a_constant()
    {
        foreach (config('conversions') as $category => $units) {
            $reflection_class = new \ReflectionClass('\LasePeCo\UnitConverter\Units\\' . Str::studly($category));

            foreach ($units as $unit => $value) {
                $this->assertTrue(in_array($unit, $reflection_class->getConstants()));
            }
        }
    }

    /** @test */
    public function it_throws_an_exception_if_unit_not_found()
    {
        try {
            Converter::volume(Volume::CubicMeter, 'x', 10);
        } catch (\Exception $exception) {
            $this->assertEquals('To unit:volume/x not known', $exception->getMessage());
        }

        try {
            Converter::volume('y', Volume::CubicMeter, 10);
        } catch (\Exception $exception) {
            $this->assertEquals('From unit:volume/y not known', $exception->getMessage());
        }
    }
}
