<?php
return [
    // Default service provider
    'provider' => env('EMAIL_SERVICE_PROVIDER', 'default_provider'),

    // API key for email service
    'api_key' => env('EMAIL_SERVICE_API_KEY', 'your_default_api_key'),

    // Endpoint for email service
    'endpoint' => env('EMAIL_SERVICE_ENDPOINT', 'https://api.myitedu.us'),

    // Other configurable options
    'options' => [
        'timeout' => 30,
        'connect_timeout' => 5
    ]
];
