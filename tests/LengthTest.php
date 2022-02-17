<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facades\Converter;
use LasePeCo\UnitConverter\Units\Length;

class LengthTest extends TestCase
{
    /** @test */
    public function it_can_convert_mm_to_in()
    {
        $this->assertEquals(3.93, Converter::length(Length::Millimeter, Length::Inch, 100));
    }

    /** @test */
    public function it_can_convert_mm_to_m()
    {
        $this->assertEquals(0.5, Converter::length(Length::Millimeter, Length::Meter, 500));
    }

    /** @test */
    public function it_can_convert_m_to_mm()
    {
        $this->assertEquals(2000, Converter::length(Length::Meter, Length::Millimeter, 2));
    }
}
