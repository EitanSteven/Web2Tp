<?php

class apiAutorController {
    private $model;

    function __construct() {
     //   $this->model = new autoresModel();
    }

    public function getAll() {
        echo "Hola, desde el Api Controller";
    }
}