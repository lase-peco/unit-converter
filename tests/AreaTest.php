<?php

namespace LasePeCo\UnitConverter\Tests;

use LasePeCo\UnitConverter\Facades\Converter;
use LasePeCo\UnitConverter\Units\Area;

class AreaTest extends TestCase
{
    /** @test */
    public function it_converts_ft_square_to_m_square()
    {
        $this->assertEquals(9.29, Converter::area(Area::SquareFoot, Area::SquareMeter, 100));
    }
}
