<?php

class loginView {
    public function renderLogin($error = ''){
        if ($error != '') {
            require_once "templates/head.phtml";
            require_once "templates/login.phtml";
            require_once "templates/footer.phtml";
        } else {
            require_once "templates/head.phtml";
            require_once "templates/login.phtml";
            require_once "templates/loginError.phtml";
            require_once "templates/footer.phtml";
        }

    }
} 