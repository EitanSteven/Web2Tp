<?php

class adminView {
    public function renderTables($autores, $libros) {
        require_once "templates/head.phtml";
        require_once "templates/tablasAdmin.phtml";
        require_once "templates/footer.phtml";
    }
    public function renderCargarAutor() {
        require_once "templates/head.phtml";
        require_once "templates/cargaAutor.phtml";
        require_once "templates/footer.phtml";
    }
    public function renderCargarLibro($id) {
        require_once "templates/head.phtml";
        require_once "templates/cargaLibro.phtml";
        require_once "templates/footer.phtml";
    }
}