<?php

return [
    'systems' => [
        'metrics' => [
            'name' => 'Metrics',
            'volume' => 'm^3',
            'speed' => 'm/s',
            'mass' => 't',
            'density' => 't/m^3',
            'length' => 'm',
            'area' => 'm^2',
            'volumetric_flow_rate' => 'm^3/h',
        ],
        'uk' => [
            'name' => 'UK',
            'volume' => 'ft^3',
            'speed' => 'ft/s',
            'mass' => 'tn.l',
            'density' => 'lb/ft^3',
            'length' => 'in',
            'area' => 'ft^2',
            'volumetric_flow_rate' => 'ft^3/h',
        ],
        'us_feet' => [
            'name' => 'US feet',
            'volume' => 'ft^3',
            'speed' => 'ft/s',
            'mass' => 'tn.sh.',
            'density' => 'lb/ft^3',
            'length' => 'in',
            'area' => 'ft^2',
            'volumetric_flow_rate' => 'ft^3/h',
        ],
        'us_yards' => [
            'name' => 'US yards',
            'volume' => 'yd^3',
            'speed' => 'yd/s',
            'mass' => 'tn.sh.',
            'density' => 'lb/ft^3',
            'length' => 'in',
            'area' => 'yd^2',
            'volumetric_flow_rate' => 'yd^3/h',
        ],
    ],

    'units' => [
        'mass' => [
            'kg' => 1, //base unit
            't' => 0.001,
            'tn.l' => 0.000984207,
            'tn.sh.' => 0.00110231,
            'g' => 1000,
            'lb' => 2.2046,
            'oz' => 35.274,
        ],

        'volume' => [
            'dm^3' => 1000,
            'm^3' => 1, //base unit
            'ft^3' => 35.3147,
            'yd^3' => 1.30795,
        ],

        'speed' => [
            'mm/s' => 1000,
            'm/s' => 1, //base unit
            'ft/s' => 3.28084,
            'yd/s' => 1.09361,
        ],

        'length' => [
            'mm' => 1000,
            'm' => 1, //base unit
            'in' => 39.3701
        ],

        'area' => [
            'mm^2' => 1000000,
            'm^2' => 1, //base unit
            'ft^2' => 10.7639,
            'yd^2' => 1.19598888894151,
        ],

        'density' => [
            'kg/m^3' => 1, //base unit
            't/m^3' => 0.001,
            'lb/ft^3' => 0.062428,
        ],

        'volumetric_flow_rate' => [
            'dm^3/h' => 1000,
            'm^3/h' => 1, //base unit
            'ft^3/h' => 35.3147,
            'yd^3/h' => 1.307950619,
        ],
    ]
];
