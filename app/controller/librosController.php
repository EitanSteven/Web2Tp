<?php

require_once "app/view/librosView.php";
require_once "app/model/librosModel.php";
require_once "app/model/autoresModel.php";

class librosController {
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        $this->view = new librosView;
        $this->modelLibros = new librosModel;
        $this->modelAutores = new autoresModel;
    }
    
    public function printHomeTable($id) {
        $libros = $this->modelLibros->getLibrosId($id);
        $autorNombre = $this->modelAutores->getNombre($id);
        $this->view->printLibros($libros, $autorNombre);
    }
}

