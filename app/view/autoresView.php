<?php

class autoresView {
    public function renderHome($autores) {
        require_once "templates/head.phtml";
        require_once "templates/selectAutor.phtml";
        require_once "templates/footer.phtml";
    }
    public function renderAutoresSelect($autores) {
        require_once "templates/head.phtml";
        require_once "templates/selectAutor.phtml";
    }
}


