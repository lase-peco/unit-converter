<?php

namespace LasePeCo\UnitConverter\Tests;

use Illuminate\Support\Str;

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
}
