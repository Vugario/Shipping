<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'seoshop' => [
        'env'    => env('SEOSHOP_ENV', 'live'),
        'key'    => env('SEOSHOP_KEY', false),
        'secret' => env('SEOSHOP_SECRET', false),

        'shipping' => [
            'name'           => 'My Awesome Shipping Service',
            'rateEstimation' => true
        ]
    ],

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

];
