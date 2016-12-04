<?php

include ("../CcMvc/CcMvc.php"); // CcMvc Framework
//include("vendor/autoload.php");
$config = dirname(__FILE__) . "/protected/configuracion.php"; // configuracion
$app = CcMvc::Start($config, "Carnetizacion Safe Off");
$app->Router->Route('/fotos/carnet/{id_estu}', 'fotos/carnet');
$app->Run(); // inica el funcionamiento del framework

