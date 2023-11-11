<?php
require_once './config.php';

class InscripcionModel {
    private $db;
        function __construct() {
        
        $this->db = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", 'root', '');
    }
    
    function getInscripciones($orderBy, $sort) {
        if ($orderBy && $sort){
            $query = $this->db->prepare("SELECT inscripcion_id, nombre, email, objetivo, materia_id 
                        FROM inscripciones ORDER BY $sort $orderBy ");
        }
        else {
            $query = $this->db->prepare("SELECT inscripcion_id, nombre, email, objetivo, materia_id 
            FROM inscripciones ");
            
        }
        $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        
           
        }


    function getInscripcionbyId($id) {

        $query = $this->db->prepare('SELECT * FROM inscripciones WHERE inscripcion_id = ?');
        $query->execute([$id]);
        
        return  $query->fetch(PDO::FETCH_OBJ);
    }

    function getMaterias() {
        $query = $this->db->prepare('SELECT * FROM materias');
        $query->execute();

        $materias = $query->fetchAll(PDO::FETCH_OBJ);

        return $materias;
    }

    function getMateriabyId($id) {

        $query = $this->db->prepare('SELECT * FROM materias WHERE materia_id = ?');
        $query->execute([$id]);
        
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertInscripcion($nombre, $email, $objetivo, $materia_id) {
        $query = $this->db->prepare('INSERT INTO inscripciones (nombre, email, objetivo, materia_id) VALUES(?,?,?,?)');
        $query->execute([$nombre, $email, $objetivo, $materia_id]);

        return $this->db->lastInsertId();
    }

    function deleteInscripcion($id) {
        $query = $this->db->prepare('DELETE FROM inscripciones WHERE inscripcion_id = ?');
        $query->execute([$id]);
    }

    function deleteMateria($id) {
        $query = $this->db->prepare('DELETE FROM materias WHERE materia_id = ?');
        $query->execute([$id]);
    }

    function updateInscripcion($nombre, $email, $objetivo, $materia_id, $id) {
        $query = $this->db->prepare('UPDATE inscripciones SET nombre = ?, email = ?, objetivo = ?,  materia_id = ? WHERE inscripcion_id = ?');
        $query->execute([$nombre, $email, $objetivo, $materia_id, $id]);
        return $query;
    }
}

