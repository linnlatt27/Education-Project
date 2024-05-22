<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => 'http://127.0.0.1:8000/auth/google/call-back',
    ],
    'facebook' => [
        'client_id' => '1514598282604874',
        'client_secret' =>'70e39e95ed07fa8a6fa744a28128133a',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'github' => [
        'client_id' => 'Ov23lihmALOzkwYuH7WX',
        'client_secret' => '3b1e54c1b4c1c04ceee7c222ae636b665cb7a8d8',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

];
