<?php 

require_once "DBconfig.php";

class librosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . NAME . ';charset=' . CHARSET . '', '' . USER . '', '' . PASS . '');
    }

    public function getLibros() {
        $query = $this->db->prepare("SELECT * FROM libros ORDER BY ISBN");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLibrosId($Autor) {
        $query = $this->db->prepare("SELECT * FROM libros WHERE ID_Autor = ?");
        $query->execute([$Autor]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
}