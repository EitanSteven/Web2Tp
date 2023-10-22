<?php

class secureController {
    
    function __construct() {
        session_start();
        //Si la ultima actividad fue hace mas de 30min:

        if (isset($_SESSION['user'])) {
            #Corre el codigo
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
                $this->logout();
            }
            $SESION['LAST_ACTIVITY'] = time();
        } else {
            header("Location:" . BASE_URL . 'ingresar');
        }
    } 
    function logout() {
        session_start();
        session_destroy();
        header("Location:" . BASE_URL . 'ingresar');
    }
}

?>