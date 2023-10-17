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
    public function cambiaEstado($id) {
        // Obtén el estado actual del autor
        $originStateQuery = $this->db->prepare("SELECT Estado FROM autores WHERE ID_Autor = ?");
        $originStateQuery->execute([$id]);
    
        if ($originStateQuery) {
            $originState = $originStateQuery->fetchColumn(); // Obtiene el valor del estado
        }

        $newState = !$originState;

        $updateQuery = $this->db->prepare("UPDATE autores SET Estado = ? WHERE ID_Autor = ?");
        $updateQuery->execute([$newState, $id]);
    }
    
}