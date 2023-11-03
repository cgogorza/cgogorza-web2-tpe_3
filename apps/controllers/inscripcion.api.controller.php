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
                if (isset ($params[':subrecurso'])){
                    if($params[':subrecurso']){
                        switch ($params[':subrecurso']){
                            case 'nombre':
                                $this->view->response ($inscripcion->nombre, 200);
                                break;
                            case 'objetivo':
                                $this->view->response ($inscripcion->objetivo, 200);
                                break;
                            default:
                            $this->view->response(
                                'La inscripción  no contiene ' .$params[':subrecurso']. '.'
                                , 404);
                            break;
                    }
                }
                } else
                    $this->view->response($inscripcion,200);
            } else {
                return $this->view->response(
                    'La inscripción con el id= '.$params[':ID']. ' no existe.',404);
            }
        }
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
                
                $this->model->insertInscripcion($nombre, $email, $objetivo, $materia_id);
                $this->view->response('La inscripción con id= ' .$inscripcion_id.' ha sido modificada con éxito', 200);
            } else
                $this->view->response('La inscripción con id= ' .$inscripcion_id. ' no fue encontrada', 404);
    }   
}
