<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facades\Converter;
use LasePeCo\UnitConverter\Units\Volume;

class VolumeTest extends TestCase
{
    /** @test */
    public function it_can_convert_yd_to_m()
    {
        $this->assertEquals(7.65, Converter::volume(Volume::CubicYard, Volume::CubicMeter, 10));
    }
}
