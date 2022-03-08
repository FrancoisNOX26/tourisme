<?php

return [

    'avatar' => [
        'public' => '/files/avatar/',
        'folder' => public_path() . '/files/avatar/',

        'image' => [
            'width'  => 160,
            'height' => 160,
        ]
    ],

    /*
    |------------------------------------------------------------------------------------
    | ENV of APP
    |------------------------------------------------------------------------------------
    */
    'APP_ADMIN' => env('APP_ADMIN', 'admin'),
    'APP_TOKEN' => env('APP_TOKEN', 'admin123456'),
];
