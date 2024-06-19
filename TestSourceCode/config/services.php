<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'google' => [
        'client_id' => '596825688161-fmgiutj6hkhlo1vu694caj31dre4rjnr.apps.googleusercontent.com', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => 'https://pos.phanmemtrangsuc.com/TestSourceCode/public/google/callback'
    ],
    'facebook' => [
        'client_id' => '604848633923706', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '81297ab5d92cb547a6660435d405ee4e', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://pos.phanmemtrangsuc.com/TestSourceCode/public/facebook/callback'
    ],

];
