<?php

return [
//  'debung' => ['file' => dirname(__FILE__) . '/CcMvcLog.txt'],
    // 'debung' => false, // indica si se encuentra en modo depuracion o produccion 
    'App' =>
    [
        'app' => realpath(dirname(__FILE__)) . '/', // directorio de protected 
    ],
    //'DB' => include ('sqlite.php'), // configuracion de base de datos 
    'DB' => include ('Sqlite.php'),
    'TemplateLoaders' => [
        'Default' =>
        [
            'ext' => 'tpl'
        ],
    ],
    'Router' =>
    [
        'protocol' => 'https',
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


