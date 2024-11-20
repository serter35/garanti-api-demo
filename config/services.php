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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'payment-providers' => [
        'garanti' => [
            'mode' => env('PAYMENT_GARANTI_MODE', 'TEST'),
            'version' => env('PAYMENT_GARANTI_VERSION', 512),
            'env' => [
                'test' => [
                    'url' => env('PAYMENT_GARANTI_ENV_TEST_URL', 'https://sanalposprovtest.garantibbva.com.tr/VPServlet'),
                    'password' => env('PAYMENT_GARANTI_ENV_TEST_PASSWORD', ''),
                ],
                'live' => [
                    'url' => env('PAYMENT_GARANTI_ENV_LIVE_URL', ''),
                    'password' => env('PAYMENT_GARANTI_ENV_LIVE_PASSWORD', ''),
                ],
            ]
        ]
    ]

];
