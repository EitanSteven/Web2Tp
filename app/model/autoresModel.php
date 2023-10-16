<?php

require_once "DBconfig.php";

class autoresModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . NAME . ';charset=' . CHARSET . '', '' . USER . '', '' . PASS . '');
    }

    public function getAutores() {
        $query = $this->db->prepare("SELECT * FROM autores ORDER BY id");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}