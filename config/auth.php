<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'sanctum',
            'provider' => 'users',
            'hash' => false,
        ],

        'pemilik' => [
            'driver' => 'session',
            'provider' => 'pemilik',
        ],

        'pemilik-api' => [
            'driver' => 'sanctum',
            'provider' => 'pemilik',
            'hash' => false,
        ],
        // Tambahkan guard pelanggan
        'pelanggan' => [
            'driver' => 'session',
            'provider' => 'pelanggan',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'pemilik' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pemilik::class,
        ],

        'pelanggans' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Tambahkan provider pelanggan
        'pelanggan' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pelanggan::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'pemilik' => [
            'provider' => 'pemilik',
            'table' => 'pemilik_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
