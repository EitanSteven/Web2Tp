<?php
require_once "libs/Router.php";
require_once "api/apiControllers/apiAutorController.php";

# http://localhost/web2/Clase2/Web2Tp/api/autores

$router = new Router();

// Tablas de ruteo

$router->addRoute("autores", "GET", "apiAutorController", "getAll");
$router->addRoute("autor/:ID", "GET", "apiAutorController", "get");
$router->addRoute("autor/:ID", "DELETE", "apiAutorController", "delete");
$router->addRoute("autores", "POST", "apiAutorController", "add");
$router->addRoute("autores/:ID", "PUT", "apiAutorController", "update");

// ruteo

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);