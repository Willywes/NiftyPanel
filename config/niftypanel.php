<?php

return [
    'timezone' => 'UTC',
    'locale' => 'es',

    'guards' => [
        'intranet' => [
            'driver' => 'session',
            'provider' => 'intranet',
        ],
        'customer' => [
            'driver' => 'session',
            'provider' => 'customer',
        ],
    ],

    'providers' => [
        'intranet' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'customer' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],
    ],

];
