<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Available hotels providers.
     |--------------------------------------------------------------------------
     |
     | This option controls the available hotels providers used in the search functionality.
     | If you willing to create new provider, you can add it to array below.
     |
     */
    "providers" => [
        \App\Services\TopHotelsProviderService::class,
        \App\Services\BestHotelsProviderService::class,
    ],
];
