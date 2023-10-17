<?php

class librosView {

    public function printLibros($libros) {
        require_once "templates/head.phtml";
        require_once "templates/selectAutor.phtml";
        require_once "templates/libroTable.phtml";
        require_once "templates/footer.phtml";
    }
}