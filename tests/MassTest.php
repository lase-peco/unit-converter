<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facade as Converter;
use LasePeCo\UnitConverter\Units\Mass;

class MassTest extends TestCase
{
    /** @test */
    public function it_can_convert_kg_to_t()
    {
        $this->assertEquals(2.5, Converter::mass(Mass::Kilogram, Mass::Ton, 2500));
    }

    /** @test */
    public function it_can_convert_kg_to_lb()
    {
        $this->assertEquals(88.18, Converter::mass(Mass::Kilogram, Mass::Pound, 40));
    }

    /** @test */
    public function it_can_convert_lb_to_kg()
    {
        $this->assertEquals(40, Converter::mass(Mass::Pound, Mass::Kilogram, 88.184));
    }

    /** @test */
    public function it_can_convert_lb_to_oz()
    {
        $this->assertEquals(16, Converter::mass(Mass::Pound, Mass::Ounce, 1));
    }
}
