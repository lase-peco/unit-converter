<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facades\Converter;
use LasePeCo\UnitConverter\Units\VolumetricFlowRate;

class VolumetricFlowRateTest extends TestCase
{
    /** @test */
    public function it_can_convert_cubic_meter_per_hour_to_cubic_decimeter_per_hour()
    {
        $this->assertEquals(1000, Converter::volumetric_flow_rate(VolumetricFlowRate::CubicMeterPerHour, VolumetricFlowRate::CubicDecimeterPerHour, 1));
    }

    /** @test */
    public function it_can_convert_cubic_meter_per_hour_to_cubic_foot_per_hour()
    {
        $this->assertEquals(35.31, Converter::volumetric_flow_rate(VolumetricFlowRate::CubicMeterPerHour, VolumetricFlowRate::CubicFootPerHour, 1));
    }

    /** @test */
    public function it_can_convert_cubic_meter_per_hour_to_cubic_yard_per_hour()
    {
        $this->assertEquals(1.3, Converter::volumetric_flow_rate(VolumetricFlowRate::CubicMeterPerHour, VolumetricFlowRate::CubicYardPerHour, 1));
    }

    /** @test */
    public function it_can_convert_cubic_decimeter_per_hour_to_cubic_meter_per_hour()
    {
        $this->assertEquals(1, Converter::volumetric_flow_rate(VolumetricFlowRate::CubicDecimeterPerHour, VolumetricFlowRate::CubicMeterPerHour, 1000));
    }

    /** @test */
    public function it_can_convert_cubic_decimeter_per_hour_to_cubic_yard_per_hour()
    {
        $this->assertEquals(1.3, Converter::volumetric_flow_rate(VolumetricFlowRate::CubicDecimeterPerHour, VolumetricFlowRate::CubicYardPerHour, 1000));
    }

}
