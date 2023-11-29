<?php
require_once './apps/models/inscripcion.model.php';
require_once './apps/views/api.view.php';
require_once './apps/helpers/auth-api.helper.php';

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}


class AuthApiController {
    private $model;
    private $view;
    private $authHelper;

    private $data;

    public function __construct() {
      
        $this->view = new APIView();
        $this->authHelper = new AuthApiHelper();
        
      
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getToken($params = null) {
       
        $basic = $this->authHelper->getAuthHeader(); //Debe darnos el header "Authorization"
                                                     //'Basic: base64(usuario y contraseña)'
        
        if(empty($basic)){
            $this->view->response('No autorizado', 401);
            return;
        }
        $basic = explode(" ",$basic);  //["Basic", "base64(usuario y contraseña)"]
        if($basic[0]!="Basic"){
            $this->view->response('La autenticación debe ser Basic', 401);
            return;
        }

        
        $userpass = base64_decode($basic[1]); //usuario y contraseña
        $userpass = explode(":", $userpass); //["usuario", "contraseña"]
        $user = $userpass[0];
        $pass = $userpass[1];
        if($user == "Claudia" && $pass == "1234"){
            
            $header = array(
                'alg' => 'HS256',
                'typ' => 'JWT'
            );
            $payload = array(
                'id' => 1,
                'name' => "Claudia",
                'exp' => time()+3600
            );
            $header = base64url_encode(json_encode($header));
            $payload = base64url_encode(json_encode($payload));
            $signature = hash_hmac('SHA256', "$header.$payload", "Clave1234", true); //firma
            $signature = base64url_encode($signature);
            $token = "$header.$payload.$signature";

            $this->view->response($token, 400);
        }else{
            $this->view->response('No autorizado', 401);
        }
    }


}