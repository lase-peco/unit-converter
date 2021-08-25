<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facade as Converter;
use LasePeCo\UnitConverter\Units\Speed;

class SpeedTest extends TestCase
{
    /** @test */
    public function it_can_convert_mms_to_fts()
    {
        $this->assertEquals(3.28, Converter::speed(Speed::MillimeterPerSecond, Speed::FootPerSecond, 1000));
    }
}
