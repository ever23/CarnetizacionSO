<?php

/**
 * si tiene dudas sobre el codigo  contacte con <enyerverfranco@gmail.com>
 * el sitio del framework CcMvc Aun se encuentra en construccion
 * 
 */
include ( dirname(__FILE__) . "/../vendor/autoload.php");

//include("vendor/autoload.php");
$config = dirname(__FILE__) . "/configuracion.php"; // configuracion
$app = CcMvc::Start($config, "Proyecto Base");
/**
 * inicio la consola 
 */
$app->Console($argv); // inica el funcionamiento del framework

