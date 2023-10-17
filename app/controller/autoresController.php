<?php 

require_once "app/view/autoresView.php";
require_once "app/model/autoresModel.php";

class autoresController {
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        $this->view = new autoresView();
        $this->modelAutores = new autoresModel();
    }

    public function printHome() {
        $autores = $this->modelAutores->getAutores();
        $this->view->renderHome($autores);
    }

}
