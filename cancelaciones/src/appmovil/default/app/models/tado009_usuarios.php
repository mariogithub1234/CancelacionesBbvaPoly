<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author GM
 */
class Tado009Usuarios extends ActiveRecord {

    /*public function save_user($dato,$tipo_user = 2) {
        try {
            $this->correo = $dato['email'];
            $this->password = md5($dato['password']);
            $this->tipo_usuario = $tipo_user;
            if($this->save()){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }*/

}
