<?php

class adminView {
    public function renderTables($autores, $libros) {
        require_once "templates/head.phtml";
        require_once "templates/tablasAdmin.phtml";
        require_once "templates/footer.phtml";
    }
}