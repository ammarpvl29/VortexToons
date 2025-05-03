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

    'marvelapi' => [
        'public_key' => env('MARVEL_PUBLIC_KEY'),
        'private_key' => env('MARVEL_PRIVATE_KEY'),
    ],

	'marvel' => [
		'base_uri' => 'https://gateway.marvel.com/v1/public/',
		'verify' => storage_path('certs/cacert.pem'), // Path to certificate
		'timeout' => 30, // Optional: Set request timeout
	],

];
