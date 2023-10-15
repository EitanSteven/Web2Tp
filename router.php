<?php   


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'home';   //Definimos el action default.

// Tomamos el action dado en la URL.
if (!empty( $_GET["action"])) {
    $action = $_GET['action'];
}

// Parseas la accion
$params = explode('/', $action);

switch ($parms[0]) {
    case 'home':
        # code...
        break;

    default:
        # code...
    break;
}


?>