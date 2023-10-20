<?php   
require_once "app/controller/autoresController.php";
require_once "app/controller/librosController.php";
require_once "app/controller/adminController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';   //Definimos el action default.

// Tomamos el action dado en la URL.
if (!empty( $_GET["action"])) {
    $action = $_GET['action'];
}

// Parseas la accion
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new autoresController();
        $controller->printHome();
        break;
    case 'showHomeTable':
        $controllerLibro = new librosController();
        $controllerLibro->printHomeTable();
        break;
    case 'admin':
        $controller = new adminController();
        $controller->printAdminTables();
        break;
    case 'estado':
        $controller = new adminController();
        $controller->switchState($params[1]);
        break;
    case 'eliminarLibro':
        $controller = new adminController();
        $controller->deleteLibro($params[1]);
        break;
    case 'eliminarAutor':
        $controller = new adminController();
        $controller->eliminarAutor($params[1]);
        break;
    case 'stock':
        $controller = new adminController();
        $controller->switchStock($params[1]);
        break;
    case 'cargar_autor':
        $controller = new adminController();
        $controller->addAutorForm();
        break;
    case 'insertar_autor':
        $controller = new adminController();
        $controller->addAutor();
        break;
    case 'nuevoLibro':
        $controller = new adminController();
        $controller->addLibroForm($params[1]);
        break;
    case 'insert_libro':
        $controller = new adminController();
        $controller->addLibro($params[1]);
        break;
    default:
        echo "error";
    break;
}
?>