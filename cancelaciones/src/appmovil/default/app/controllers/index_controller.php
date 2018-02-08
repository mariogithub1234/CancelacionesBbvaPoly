<?php

class IndexController extends AppController {

    public function index() {
        if (Session::get('sesion') === 1) {
            return Redirect::to('menu');
        }
    }
//***
    public function login() {
        View::select(null);
        View::template(null);


        Load::model('tado009_usuarios');
        $user = new Tado009Usuarios();
        $email = $_POST['usuario'];
        $password = md5($_POST['password']);

        if ($user->exists("nb_usuario = '{$email}' AND cd_clave = '{$password}'")) {
            $idUser = $user->find_first("conditions: nb_usuario = '{$email}'")->cd_idusuario;
            $nbUser = $user->find_first("conditions: nb_usuario = '{$email}'")->nb_usuario;
            $cduid = $user->find_first("conditions: nb_usuario = '{$email}'")->cd_uid;
            Session::set('usuario', $idUser);
            Session::set('nb_usuario', $nbUser);
            Session::set('cd_uid', $cduid);
            Session::set("sesion", 1);
            echo json_encode('OK');
        } else {
            Session::delete('usuario');
            Session::delete('nb_usuario');
            Session::delete('cd_uid');
            Session::set("sesion", 0);
            echo json_encode('fail');
        }
    }

    public function logout() {
        View::select(null);
        View::template(null);
        Session::set("sesion", 0);
        Session::delete('usuario');
        Session::delete('nb_usuario');
        Session::delete('cd_uid');
        Session::set("sesion", 0);
        echo json_encode(TRUE);
    }
    
    public function configdb() 
    {
    
    }

    protected function after_filter() {
        if (Input::isAjax()) {
            View::template(null); 
        }
    }

}
