<?php

return [
    'class' => '\\Cc\\Mvc\\PDO',
    'param' => ['sqlite:' . dirname(__FILE__) . '/DataBase.sqlite']
];

/**
 * return [
 *  'class' => '\\Cc\\Mvc\\MySQLi',
 *  'param' => ['localhost', 'tu Usuario', 'Tu contraseña', 'CarnetizacionSO']
 * ];
 *
 */