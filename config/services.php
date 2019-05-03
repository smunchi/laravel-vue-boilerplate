<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => \App\Models\Users\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'call_credit' => [
        'company' => env('CALL_CREDIT_COMPANY', 'Fincap AR CTEST'),
        'username' => env('CALL_CREDIT_USERNAME', "Fincap AR API CTEST"),
        'password' => env('CALL_CREDIT_PASSWORD', '3HKXSD2M'),
        'url' => env('CALL_CREDIT_URL', "https://ct.callcreditsecure.co.uk/Services/BSB/CRBSB7.asmx"),
        'service_descriptor' => storage_path('app/services/callCredit/schemas/BsbAndCreditReport7.wsdl'),
    ],
];
