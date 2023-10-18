<?php

require_once "DBconfig.php";

class autoresModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . NAME . ';charset=' . CHARSET . '', '' . USER . '', '' . PASS . '');
    }

    public function getAutores() {
        $query = $this->db->prepare("SELECT * FROM autores ORDER BY ID_Autor");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getNombre($id) {
        $query = $this->db->prepare("SELECT Nombre_Autor from autores WHERE ID_Autor = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getEstado($id) {
        // Obtén el estado actual del autor
        $query = $this->db->prepare("SELECT Estado FROM autores WHERE ID_Autor = ?");
        $query->execute([$id]);
        return $query->fetchColumn();
    }
    public function updateState($originState, $id) {
        $newState = !$originState;

        $query = $this->db->prepare("UPDATE autores SET Estado = ? WHERE ID_Autor = ?");
        $query->execute([$newState, $id]);
    }
    public function deleteAutor($id) {
        $query = $this->db->prepare('DELETE FROM autores WHERE ID_Autor = ?');
        $query->execute([$id]);
    }
    
}