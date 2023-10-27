<?php

require_once "app/view/loginView.php";
require_once "app/model/usuarioModel.php";

class loginController {
    private $view, $model;

    public function __construct() {
        $this->view = new loginView;
        $this->model = new usuarioModel;
    }
    public function loginView() {
        $this->view->renderLogin();
    }
    function verificarUsuario() {
        $Username = $_POST["Username"];
        $Userpass = $_POST["Userpass"];
        $dbUser = $this->model->getUsuario($Username);
        
        if (isset($dbUser)) {
            if (password_verify($Userpass, $dbUser[0]["Pass_Usuario"])) {

                session_start();
                $_SESSION['user'] = $Username;

                header("Location:" . BASE_URL . 'admin');
            } else {
                header("Location:" . BASE_URL . 'ingresar');
            }
        } else {
            echo "Error, ingrese datos de usuario...";
        }
    }
    function logout() {
        session_start();
        session_destroy();
        header("Location:" . BASE_URL . 'ingresar');
    }
}