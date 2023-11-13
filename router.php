<?php

require_once 'libs/router.php';
require_once 'apps/controllers/inscripcion.api.controller.php';
require_once './apps/models/inscripcion.model.php';
require_once 'apps/controllers/auth-api.controller.php';

$router = new Router();

// Se define la tabla de ruteo
//                  endpoint       verbo     controller                 método
$router->addRoute('inscripciones', 'GET', 'InscripcionApiController', 'getAll');
$router->addRoute('inscripciones', 'POST', 'InscripcionApiController', 'create');
$router->addRoute('inscripciones/:ID', 'GET', 'InscripcionApiController', 'getById');
$router->addRoute('inscripciones/:ID', 'PUT', 'InscripcionApiController', 'update');
$router->addRoute('inscripciones/:ID', 'DELETE', 'InscripcionApiController', 'delete');
/*Obtener token*/
$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');
// Se rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

