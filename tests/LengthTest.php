<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facade as Converter;
use LasePeCo\UnitConverter\Units\Length;
use LasePeCo\UnitConverter\Units\Volume;

class LengthTest extends TestCase
{
    /** @test */
    public function it_can_convert_mm_to_in()
    {
        $this->assertEquals(0.04, Converter::length(Length::Millimeter, Length::Inch, 1));
    }
}
