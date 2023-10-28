<?php
require_once "app/model/autoresModel.php";
require_once "api/apiView.php";

class apiAutorController {
    private $model, $view, $data;

    function __construct() {
        $this->model = new autoresModel();
        $this->view = new apiView();
        $this->data = file_get_contents("php://input");
    }

    function getData() {
        return json_decode($this->data);
    }

    public function getAll($params = null) {
        $autores = $this->model->getAutores();
        $this->view->response($autores, 200);
    }
    public function get($params = null) {
        // $params es un array asociativo con todos los parametros de la ruta
        $idAutor = $params[":ID"];
        $autor = $this->model->getAutor($idAutor);
        if ($autor) {
            $this->view->response($autor, 200);
        } else {
            $this->view->response("El Autor con el ID:$idAutor no existe", 404);
        }
    }
    public function delete($params = null) {
        $idAutor = $params[":ID"];
        $success = $this->model->deleteAutor($idAutor);
        if ($success) {
        $this->view->response("El Autor con el ID:$idAutor se borro exitosamente", 200);
        } else {
            $this->view->response("El Autor con el ID:$idAutor no existe, no se puede eliminar.", 404);
        }
    }
    public function update($params = null) {
        $idAutor = $params[":ID"];
        $originState = $this->model->getEstado($idAutor);
        
        $success = $this->model->updateState($originState, $idAutor);

        if ($success) {
            $this->view->response("Se cambio el estado del Autor:$idAutor", 200);
        } else {
            $this->view->response("No se pudo cambiar el estado", 500);
        }

    }
}