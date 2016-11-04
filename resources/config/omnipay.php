<?php

return [

    /* The default gateway name */
    'gateway' => 'PayPal_Express',

    /* The default settings, applied to all gateways */
    'defaults' => [
        'testMode' => false,
    ],

    /* Gateway specific parameters */
    'gateways' => [
        'PayPal_Express' => [
            'username' => '',
            'landingPage' => ['billing', 'login'],
        ],
    ],

];
