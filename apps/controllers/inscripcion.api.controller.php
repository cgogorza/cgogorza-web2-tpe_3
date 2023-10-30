<?php

require_once 'apps/models/inscripcion.model.php';
require_once 'apps/views/api.view.php';


class InscripcionApiController{

    private $model;
    private $view;

    function __contruct(){
        $this->model = new InscripcionModel();
        $this->view = new APIView();
    }

    public function getAll(){
        $inscripciones = $this->model->getInscripciones();
        $this->view->reponse($inscripciones, 200);
    }

    
  }
  




