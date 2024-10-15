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
        // 'redirect' => env('GOOGLE_REDIRECT_URL'),
        'redirect' => env('APP_URL') . '/auth/google/callback',
        
    // 'redirect' => env('http://localhost/laravel-socialite/public/login/google/callback'),
],
'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('APP_URL') . '/auth/facebook/callback',
],

// 'facebook' => [
//     'client_id' => env('437243962624272'),
//     'client_secret' => env('6e98d64118337e94e7612f914e7124dc'),
//     'redirect' => env('http://127.0.0.1:8000/login/facebook/callback'),
// ],

'apple' => [
    'client_id' => env('APPLE_CLIENT_ID'),
    'client_secret' => env('APPLE_CLIENT_SECRET'),
    'redirect' => env('APP_URL') . '/auth/apple/callback',
],
'vite' => [
    'app_name' => env('APP_NAME'), 
    'pusher_app_key' => env('PUSHER_APP_KEY'),
    'pusher_host' => env('PUSHER_HOST'),
    'pusher_port' => env('PUSHER_PORT'),
    'pusher_scheme' => env('PUSHER_SCHEME'),
    'pusher_app_cluster' => env('PUSHER_APP_CLUSTER'),
],
];
