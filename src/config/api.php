<?php

return [
    'rapid' => [
        'api-key' => env('RAPIDAPI_KEY'),
        'api-host' => env('RAPIDAPI_HOST'),
        'api-url' => 'https://' . env('RAPIDAPI_HOST'),
    ],

    'pkg' => [
        'url' => 'https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json'
    ]
];
