# A simple unite converter library
<!---
 [![Latest Version on Packagist](https://img.shields.io/packagist/v/lase-peco/localization.svg?style=flat-square)](https://packagist.org/packages/lase-peco/localization)
 [![Total Downloads](https://img.shields.io/packagist/dt/lase-peco/localization.svg?style=flat-square)](https://packagist.org/packages/lase-peco/localization)
-->
[comment]: <> ([![Build Status]&#40;https://img.shields.io/travis/lase-peco/localization/master.svg?style=flat-square&#41;]&#40;https://travis-ci.org/lase-peco/localization&#41;)
[comment]: <> ([![Quality Score]&#40;https://img.shields.io/scrutinizer/g/lase-peco/localization.svg?style=flat-square&#41;]&#40;https://scrutinizer-ci.com/g/lase-peco/localization&#41;)

A simple unite converter library

## Notes

This document is a work in progress!


## Installation

You can install the package via composer:

```bash
composer require lase-peco/unit-converter
```

Then publish the config file `conversions.php` with the following command

``` php 
php artisan vendor:publish --provider="LasePeCo\UnitConverter\ServiceProvider"
```
The config file `conversions.php` contains all units of measurement and its values, that are implemented in this package.
You can add your own units of measurement there.

##Converting and measuring units
This package is able to convert area, density, length, mass, volume and speed. 

The package provide you with 6 Classes in Which are constants defined, which you can use by converting. 

It is recommended to create your own classes and extend these classes as a base class to be used during conversion

Example:

Create a unites folder in your application and in it create an Area class which extends the Area class of this package.

``` php
<?php

namespace App\Units;

use LasePeCo\UnitConverter\Units\Area as BaseArea;

class Area extends BaseArea
{
    public const MySquareKiloMeter = 'km^2';
}
```
The benefit of using these classes or extending it in your oun class are that you avoid typos during conversion.

Of course don't forget to define it as well in the config file ander area:
``` php 
'area' => [
        'mm^2' => 1000000,
        'm^2' => 1, // base unit.
        'ft^2' => 10.7639,
        'yd^2' => 1.19598888894151,
        'km^2' => 0.00000001, // your new unit and its value compared to the base unit.
    ],
```
## Usage

### Area 

The implemented measuring units for an area or a surface are: `SquareMillimeter, SquareMeter, SquareFoot, SquareYard`.

To convert an area or a surface from one measuring unit to another call the `area( $from_unit, $to_unit, $measurement, $decimals)` on the `Converter` facade with the following parameters:

`string $from_unit` the unit, from which you are converting.

`string $to_unit` the unit, to which you are converting.

`float $measurement` the value.

`int $decimals` (optional) the decimal accuracy. default is 2.

Example 1

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Area;

Converter::area(Area::MySquareKiloMeter, Area::SquareMeter, 1); // return 100000000.0
```
Example 2

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Area;

Converter::area(Area::SquareMeter, Area::SquareYard, 10, 4); // return 11.9599
``` 

### Density

The implemented measuring units for density are: `KilogramPerCubicMeter, TonPerCubicMeter, PoundPerCubicFoot`.

To convert density from one measuring unit to another call the `density($from_unit, $to_unit, $measurement, $decimals)` on the `Converter` facade with the following parameters:

`string $from_unit` the unit, from which you are converting.

`string $to_unit` the unit, to which you are converting.

`float $measurement` the value.

`int $decimals` (optional) the decimal accuracy. default is 2.

Example 
``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Density;

Converter::density(Density::KilogramPerCubicMeter, Density::PoundPerCubicFoot, 1, 6); // return 0.062428
```

### Length

The implemented measuring units for length are: `Millimeter, Meter, Inch`.

To convert length from one measuring unit to another call the `length($from_unit, $to_unit, $measurement, $decimals)` on the `Converter` facade with the following parameters:

`string $from_unit` the unit, from which you are converting.

`string $to_unit` the unit, to which you are converting.

`float $measurement` the value.

`int $decimals` (optional) the decimal accuracy. default is 2.

Example 
``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Length;

Converter::length(Length::Meter, Length::Inch, 1, 4); // return 39.3701
```

### Mass

The implemented measuring units for mass are: `Kilogram, Ton, ImperialTon, USTon, Pound, Gram, Ounce`.

To convert length from one measuring unit to another call the `mass($from_unit, $to_unit, $measurement, $decimals)` on the `Converter` facade with the following parameters:

`string $from_unit` the unit, from which you are converting.

`string $to_unit` the unit, to which you are converting.

`float $measurement` the value.

`int $decimals` (optional) the decimal accuracy. default is 2.

Example 
``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Mass;

Converter::mass(Mass::Kilogram, Mass::Pound, 1); // return 2.2
```

### Volume

The implemented measuring units for volume are: `CubicDecimeter, CubicMeter, CubicFoot, CubicYard`.

To convert volume from one measuring unit to another call the `volume($from_unit, $to_unit, $measurement, $decimals)` on the `Converter` facade with the following parameters:

`string $from_unit` the unit, from which you are converting.

`string $to_unit` the unit, to which you are converting.

`float $measurement` the value.

`int $decimals` (optional) the decimal accuracy. default is 2.


Example 
``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Volume;

Converter::volume(Volume::CubicMeter, Volume::CubicFoot, 1); // return 35.31
```

### Speed

The implemented measuring units for speed are: `MillimeterPerSecond, MeterPerSecond, FootPerSecond, YardPerSecond`.

To convert speed from one measuring unit to another call the `speed($from_unit, $to_unit, $measurement, $decimals)` on the `Converter` facade with the following parameters:

`string $from_unit` the unit, from which you are converting.

`string $to_unit` the unit, to which you are converting.

`float $measurement` the value.

`int $decimals` (optional) the decimal accuracy. default is 2.


Example 
``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Speed;

Converter::speed(Speed::MeterPerSecond, Speed::FootPerSecond, 1); // return 3.28
```

### Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email a.dabak@lase-peco.com instead of using the issue tracker.

## Credits

- [Ahmed Dabak](https://github.com/lase-peco)
- [All Contributors](CONTRIBUTING.md)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
