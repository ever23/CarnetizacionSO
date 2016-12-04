<?php

return [
    //'debung' => ['file' => dirname(__FILE__) . '/CcMvcLog.txt'],
    // 'debung' => false, // indica si se encuentra en modo depuracion o produccion 
    'App' =>
    [
        'app' => realpath(dirname(__FILE__)) . '/', // directorio de protected 
    ],
    //'DB' => include ('sqlite.php'), // configuracion de base de datos 
    'DB' => include ('Mysqli.php'),
    'Response' => [
        'Accept' => [
            'text/html, application/xhtml+xml,  application/xaml+xml, application/pdf' =>
            [
                'layaut' => 'main.tpl', // por defecto el layaut es main.php en este proyecto se usara smarty por lo que se indica que se usa main.tpl
            ],
        ]
    ],
    'Autenticate' =>
    [
        'class' => '\\Cc\\Mvc\\Autenticacion',
        'SessionName' => 'CarnetizacionSO',
        /**
         * PARAMETRO DE LAS COOKIES DE SESSION
         */
        'SessionCookie' =>
        [

            'cahe' => 'nocache,private',
            'time' => '+6 hour',
            'httponly' => true,
        ],
    ]
];


