<?php

namespace LasePeCo\UnitConverter\Tests;

class TranslationTest extends TestCase
{
    /** @test */
    public function it_works()
    {
        $this->assertEquals('Kilogram', trans('conversions::mass.kg'));
    }
}
