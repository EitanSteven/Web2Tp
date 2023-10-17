<?php 

require_once "DBconfig.php";

class librosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . NAME . ';charset=' . CHARSET . '', '' . USER . '', '' . PASS . '');
    }

    public function getLibrosId($Autor) {
        $query = $this->db->prepare("SELECT * FROM libros WHERE ID_Autor = :autor");
        $query->bindParam(':autor', $Autor, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
}