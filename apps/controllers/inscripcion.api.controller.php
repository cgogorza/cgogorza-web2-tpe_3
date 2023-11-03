<?php

require_once './apps/models/inscripcion.model.php';
require_once './apps/controllers/api.controller.php';


class InscripcionApiController extends APIController{

    private $model;
   
    function __contruct(){
        parent::__construct();
        $this->model = new InscripcionModel();
    }

    public function getAll(){
        $inscripciones = $this->model->getInscripciones();
        $this->view->response($inscripciones, 200);
    }

    public function get($params = []){
        if (empty ($params)){
            $inscripciones = $this->model->getInscripciones();
            $this->view->response($inscripciones, 200);
        }
        else{
            $inscripcion = $this->model->getInscripcionbyId($params[":ID"]);
            if(!empty($inscripcion)) {
              return $this->view->response($inscripcion,200);
            }
        else{
            return $this->view->response([],404);
            }
        }
    }

    public function delete($params = []) {
         $inscripcion_id = $params[':ID'];
         $inscripcion = $this->model->getTask($inscripcion_id);
         if ($inscripcion) {
            $this->model->deleteTask($inscripcion_id);
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
        $inscripcion = $this->model->getInscripcion($inscripcion_id);
            if ($inscripcion) {
                $body = $this->getData();

                $nombre = $body->nombre;
                $email = $body->email;
                $objetivo = $body->objetivo;
                $materia_id= $body->materia_id;
                
                $this->model->insertInscripcion($nombre, $email, $objetivo, $materia_id);
                $this->view->response('La inscripción con id= ' .$inscripcion_id.' ha sido modificada con éxito', 200);
            } else
                $this->view->response('La inscripción con id= ' .$inscripcion_id. ' no fue encontrada', 404);
    }   
}