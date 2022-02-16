# Unit converter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lase-peco/unit-converter.svg?style=flat-square)](https://packagist.org/packages/lase-peco/unit-converter)
[![Total Downloads](https://img.shields.io/packagist/dt/lase-peco/unit-converter.svg?style=flat-square)](https://packagist.org/packages/lase-peco/unit-converter)

A simple unite converter library

## Installation
Install the package via composer:
```bash
composer require lase-peco/unit-converter
```
Then publish the config file `conversions.php` with the following command
``` php 
php artisan vendor:publish --provider="LasePeCo\UnitConverter\ServiceProvider"
```
The config file `conversions.php` contains all units of measurement and its values.

## Define your own units

First add your unit in the config file und the matching section, then it is recommended to create a class That extends the base package class.

Example:
Say you want to add `KM^2` as an `Area` unit, first add the unit in the config file:
``` php 
'area' => [
        'mm^2' => 1000000,
        'm^2' => 1, // base unit.
        'ft^2' => 10.7639,
        'yd^2' => 1.19598888894151,
        'km^2' => 0.000001, // your new unit and its value compared to the base unit.
    ],
```

Then create `Area` class in `App\Units\` which should extends the base `Area` class of this package:
``` php
<?php
namespace App\Units;
use LasePeCo\UnitConverter\Units\Area as BaseArea;

class Area extends BaseArea
{
    public const SquareKiloMeter = 'km^2';
}
```
We recommend using these classes to avoid typos in your code.

## Usage

This package supports 4 measuring systems `Metrics`, `UK`, `US feet` and `US yards`.

To get all supported measuring systems you can call the function `getSupportedSystems()` on the `Converter` facade.

``` php
use LasePeCo\UnitConverter\Facades\Converter;

Converter::getSupportedSystems(); 

// return

 [
  'metrics'  => 'Metrics',
  'uk'       => 'UK',
  'us_feet'  => 'US feet',
  'us_yards' => 'US yards'
 ]
```

This package is also able to convert `area`, `density`, `length`, `mass`, `volume`, `volumetric flow rate` and `speed`, these are functions you can call on the `Converter` facade. Each of them have its own class where the units are defined as constants, to provide some strong typing.

All of these functions accept the same parameters:

`string $from_unit` the unit, from which you are converting.
`string $to_unit` the unit, to which you are converting.
`float $measurement` the value.
`int $decimals` (optional) the decimal accuracy. default is 2.

### Area 
The implemented area units are: `SquareMillimeter, SquareMeter, SquareFoot, SquareYard`.

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Area;

Converter::area(Area::SquareKiloMeter, Area::SquareMeter, 1); // return 1000000
Converter::area(Area::SquareMeter, Area::SquareYard, 10, 4); // return 11.9599
```


### Density
The implemented density units are: `KilogramPerCubicMeter, TonPerCubicMeter, PoundPerCubicFoot`.

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Density;

Converter::density(Density::KilogramPerCubicMeter, Density::PoundPerCubicFoot, 1, 6); // return 0.062428
```

### Length
The implemented length units are: `Millimeter, Meter, Inch`.

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Length;

Converter::length(Length::Meter, Length::Inch, 1, 4); // return 39.3701
```

### Mass
The implemented mass units are: `Kilogram, Ton, ImperialTon, USTon, Pound, Gram, Ounce`.

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Mass;

Converter::mass(Mass::Kilogram, Mass::Pound, 1); // return 2.2
```

### Volume
The implemented volume units are: `CubicDecimeter, CubicMeter, CubicFoot, CubicYard`.

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Volume;

Converter::volume(Volume::CubicMeter, Volume::CubicFoot, 1); // return 35.31
```

### Speed

The implemented speed units are: `MillimeterPerSecond, MeterPerSecond, FootPerSecond, YardPerSecond`.

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\Speed;

Converter::speed(Speed::MeterPerSecond, Speed::FootPerSecond, 1); // return 3.28
```

### Volumetric flow rate

The implemented volumetric flow rate units are: `CubicDecimeterPerHour, CubicMeterPerHour, CubicFootPerHour, CubicYardPerHour`.

``` php
use LasePeCo\UnitConverter\Facades\Converter;
use App\Units\VolumetricFlowRate;

Converter::volumetric_flow_rate(VolumetricFlowRate::CubicMeterPerHour, VolumetricFlowRate::CubicDecimeterPerHour, 1)); // return 1000
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
- [Abdulsalam Emesh](https://github.com/lase-peco)
- [All Contributors](CONTRIBUTING.md)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
