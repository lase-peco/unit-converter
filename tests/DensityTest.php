<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facades\Converter;
use LasePeCo\UnitConverter\Units\Density;

class DensityTest extends TestCase
{
    /** @test */
    public function it_can_convert_yd_to_m()
    {
        $this->assertEquals(10, Converter::density(Density::KilogramPerCubicMeter, Density::TonPerCubicMeter, 10000));
    }
}
