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
    public function getStock($id) {
        // Obtén el estado actual del autor
        $query = $this->db->prepare("SELECT Stock FROM libros WHERE ISBN = ?");
        $query->execute([$id]);
        return $query->fetchColumn();
    }
    public function updateStock($originSstock, $id) {
        $newStock = !$originSstock;

        $query = $this->db->prepare("UPDATE libros SET Stock = ? WHERE ISBN = ?");
        $query->execute([$newStock, $id]);
    }
    public function deleteLibro($id) {
        $query = $this->db->prepare('DELETE FROM libros WHERE ISBN = ?');
        $query->execute([$id]);
    }
    public function deleteLibroByAutor($autor) {
        $query = $this->db->prepare('DELETE FROM libros WHERE ID_Autor = ?');
        $query->execute([$autor]);
    }
    
}