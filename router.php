<?php

require_once 'libs/router.php';

$router = new Router();

// Se define la tabla de ruteo
//                  endpoint       verbo     controller                 método
$router->addRoute('inscripciones', 'GET', 'InscripcionApiController', 'getAll');
$router->addRoute('inscripciones', 'POST', 'InscripcionApiController', 'create');
$router->addRoute('inscripciones/:ID', 'GET', 'InscripcionApiController', 'get');
$router->addRoute('inscripciones/:ID', 'PUT', 'InscripcionApiController', 'update');
$router->addRoute('inscripciones/:ID', 'DELETE', 'InscripcionApiController', 'delete');
$router->addRoute('inscripciones/:ID/:subrecurso', 'GET', 'InscripcionApiController', 'get');

// Se rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
