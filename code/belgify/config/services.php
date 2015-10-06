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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'fb' => [
//        'client_id' => 'your-fb-app-id',
//        'client_secret' => 'your-fb-app-secret',
//        'redirect' => 'http://your-callback-url',
    ],
    'twitter' => [
//        'client_id' => 'your-twitter-app-id',
//        'client_secret' => 'your-twitter-app-secret',
//        'redirect' => 'http://your-callback-url',
    ],
    'gplus' => [
//        'client_id' => 'your-gplus-app-id',
//        'client_secret' => 'your-gplus-app-secret',
//        'redirect' => 'http://your-callback-url',
    ],

];
