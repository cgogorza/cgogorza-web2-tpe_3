<?php

require_once './apps/models/inscripcion.model.php';
require_once './apps/controllers/api.controller.php';


class InscripcionApiController extends APIController{

    private $model;
   
    function __construct(){
        parent::__construct();
        $this->model = new InscripcionModel();
    }

        public function getAll(){
        if (isset($_GET['orderBy']) && isset($_GET['sort'])){ 
            $orderBy = $_GET['orderBy'];
            $sort= $_GET['sort'];

            $page = isset($_GET['_page']) ? (int)$_GET['_page'] : 1; // Página predeterminada: 1
            $limit = isset($_GET['_limit']) ? (int)$_GET['_limit'] : 10; // Límite predeterminado: 10
    
            $inscripciones = $this->model->getInscripciones($orderBy, $sort, $page, $limit);
            $this->view->response($inscripciones, 200);  
        }
        else {  
            $inscripciones = $this->model->getInscripciones(null, null);
            $this->view->response($inscripciones, 200); 

        }
                 
    }

    public function getById($params = []) {
        $inscripcion_id = $params[':ID'];
        $inscripcion = $this->model->getInscripcionbyId($inscripcion_id);
        if ($inscripcion) {
           $this->view->response($inscripcion,200);
       }
           else
           $this->view->response('Inscripcion_id= ' .$inscripcion_id. ' no fue encontrada', 404);
       }

    
    public function delete($params = []) {
         $inscripcion_id = $params[':ID'];
         $inscripcion = $this->model->getInscripcionbyId($inscripcion_id);
         if ($inscripcion) {
            $this->model->deleteInscripcion($inscripcion_id);
            $this->view->response('Inscripción_id= ' .$inscripcion_id. ' fue eliminada con éxito', 200);
        }
            else
            $this->view->response('Inscripcion_id= ' .$inscripcion_id. ' no fue encontrada', 404);
        }

    public function create($params = []){
        $body = $this->getData();

        $nombre = $body->nombre;
        $email= $body->email;
        $objetivo= $body->objetivo;
        $materia_id= $body->materia_id;

        $id = $this->model->insertInscripcion($nombre, $email, $objetivo, $materia_id);
        
        $this->view->response('La tarea fue insertada con el id = '.$id, 201);
    }

    public function update($params = []) {
        $inscripcion_id = $params[':ID'];
        $inscripcion = $this->model->getInscripcionbyId($inscripcion_id);
            if ($inscripcion) {
                $body = $this->getData();

                $nombre = $body->nombre;
                $email = $body->email;
                $objetivo = $body->objetivo;
                $materia_id= $body->materia_id;
                
                $this->model->updateInscripcion($nombre, $email, $objetivo, $materia_id, $inscripcion_id);
                $this->view->response('La inscripción con id= ' .$inscripcion_id.' ha sido modificada con éxito', 200);
            } else
                $this->view->response('La inscripción con id= ' .$inscripcion_id. ' no fue encontrada', 404);
    }   

}
