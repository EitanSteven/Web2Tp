<?php

require_once "app/view/librosView.php";
require_once "app/view/autoresView.php";
require_once "app/model/librosModel.php";
require_once "app/model/autoresModel.php";

class librosController {
    private $view, $modelLibros, $modelAutores, $viewAutores;

    public function __construct() {
        $this->view = new librosView;
        $this->viewAutores = new autoresView;
        $this->modelLibros = new librosModel;
        $this->modelAutores = new autoresModel;
    }
    
    public function printHomeTable() {
        $autor = $_POST['autor'];
        $autores = $this->modelAutores->getAutores();
        $libros = $this->modelLibros->getLibrosId($autor);
        $autorNombre = $this->modelAutores->getNombre($autor);
        $this->viewAutores->renderAutoresSelect($autores);
        $this->view->printLibros($libros, $autorNombre);
    }
}

