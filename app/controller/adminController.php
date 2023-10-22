<?php 

require_once "app/view/adminView.php";
require_once "app/model/librosModel.php";
require_once "app/model/autoresModel.php";
require_once "secureController.php";

class adminController extends secureController{
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        parent::__construct();

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
    public function addAutorForm() {
        $this->view->renderCargarAutor();
    }
    public function addAutor() {
        $autorName = $_POST['autorName'];
        $autorNacionalidad = $_POST['autorNacionalidad'];
        $autorBio = $_POST['autorBiografia'];

       if (isset($_POST['estado'])) {
        $estado = true;
       } else {
        $estado = false;
       }

        $this->modelAutores->addAutor($autorName, $autorNacionalidad, $estado, $autorBio);
        header("Location:" . BASE_URL . 'admin');
    }
    public function addLibroForm($id){
        $this->view->renderCargarLibro($id);
    }
    public function addLibro($ID_Autor) {
        $tituloLibro = $_POST['tituloLibro'];
        $generoLibro = $_POST['generoLibro'];

        if (isset($_POST['stock'])) {
            $stock = true;
           } else {
            $stock = false;
           }

        $this->modelLibros->addLibro($ID_Autor, $tituloLibro, $generoLibro, $stock);
        header("Location:" . BASE_URL . 'admin');
    }

}