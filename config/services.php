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
        'client_id' => '696057486193-ec1pbn69m8rdkrm6jbvg4nbjdd3dbu6r.apps.googleusercontent.com',
        'client_secret' => 'AP91vOGNSIaGH9T5kSQIuOZp',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback/'
    ],
    'sms' => [
        'apikey' => '1MBWwEqHPAHXbO_3P0AGfnhsWRLOuJslxiCq8K32lN0=',
        'url' => 'http://ippanel.com:8080/'
    ]
];
