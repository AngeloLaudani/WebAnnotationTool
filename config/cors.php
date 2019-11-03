<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['Origin, Content-Type, X-Auth-Token'],
    'allowedMethods' => ['HEAD, GET, POST'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
