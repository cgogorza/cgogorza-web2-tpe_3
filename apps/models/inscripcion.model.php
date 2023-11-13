<?php
require_once './config.php';

class InscripcionModel {
    private $db;
        function __construct() {
        
        $this->db = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", 'root', '');
    }
    

    function getInscripciones($orderBy, $sort, $page = 1, $limit = 9999999) {
        $start = ($page - 1) * $limit; //Calculo el inicio de la página
        if ($orderBy && $sort){
            $query = $this->db->prepare("SELECT * FROM inscripciones ORDER BY $sort $orderBy LIMIT $start, $limit");
        }
        else {
            $query = $this->db->prepare("SELECT * FROM inscripciones ");
            
        }
        $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);          
        }


    function getInscripcionbyId($id) {

        $query = $this->db->prepare('SELECT * FROM inscripciones WHERE inscripcion_id = ?');
        $query->execute([$id]);
        
        return  $query->fetch(PDO::FETCH_OBJ);
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


    function updateInscripcion($nombre, $email, $objetivo, $materia_id, $id) {
        $query = $this->db->prepare('UPDATE inscripciones SET nombre = ?, email = ?, objetivo = ?,  materia_id = ? WHERE inscripcion_id = ?');
        $query->execute([$nombre, $email, $objetivo, $materia_id, $id]);
        return $query;
    }
}

