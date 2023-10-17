<?php 

require_once "app/view/adminView.php";
require_once "app/model/librosModel.php";
require_once "app/model/autoresModel.php";

class adminController {
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        $this->view = new adminView;
        $this->modelLibros = new librosModel;
        $this->modelAutores = new autoresModel;
    }
    
    public function printAdminTables() {
        $autores = $this->modelAutores->getAutores();
        $libros = $this->modelLibros->getLibros();
        $this->view->renderTables($autores, $libros);
    }
}