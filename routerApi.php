<?php
require_once "libs/Router.php";
require_once "api/apiControllers/apiAutorController.php";

$router = new Router();

// Tablas de ruteo

$router->addRoute("autores", "GET", "apiAutorController", "getAll");

// ruteo

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);