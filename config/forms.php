<?php

return [
    'aliases' => [
        'auth' => [
            'login'    => 'App\Forms\Login',
            'register' => 'App\Forms\Register',

            'password' => [
                'forgot' => 'App\Forms\Password\Forgot',
                'reset'  => 'App\Forms\Password\Reset',
            ],
        ],
    ],
];
