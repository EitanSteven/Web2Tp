<?php

require_once "app/view/librosView.php";
require_once "app/model/librosModel.php";

class librosController {
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        $this->view = new librosView;
        $this->modelLibros = new librosModel;
    }
    
    public function printHomeTable($id) {
        $libros = $this->modelLibros->getLibrosId($id);
        $this->view->printLibros($libros);
    }
}