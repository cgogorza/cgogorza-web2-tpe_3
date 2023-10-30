<?php

require_once 'libs/router.php';

$router = new Router();

// Se define la tabla de ruteo
//                  endpoint       verbo     controller                 método
$router->addRoute('inscripciones', 'GET', 'InscripcionApiController', 'obtenerInscripciones');
$router->addRoute('inscripciones', 'POST', 'InscripcionApiController', 'crearInscripcion');
$router->addRoute('inscripciones/:ID', 'GET', 'InscripcionApiController', 'obtenerInscripcion');

// Se rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
