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
    public function switchState($id) {
        $originState = $this->modelAutores->getEstado($id);
        $this->modelAutores->updateState($originState ,$id);
        header("Location:" . BASE_URL . 'admin');
    }
    public function switchStock($id) {
        $originState = $this->modelLibros->getStock($id);
        $this->modelLibros->updateStock($originState ,$id);
        header("Location:" . BASE_URL . 'admin');
    }
    public function deleteLibro($id) {
        $this->modelLibros->deleteLibro($id);
        header("Location:" . BASE_URL . 'admin');
    }
    public function eliminarAutor($id) {
        $this->modelLibros->deleteLibroByAutor($id);
        $this->modelAutores->deleteAutor($id);
        header("Location:" . BASE_URL . 'admin');
    }

}