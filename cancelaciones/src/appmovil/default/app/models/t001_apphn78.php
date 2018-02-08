<?php

/**
 * Description of t001_apphn78
 *
 * @author GM
 */
class T001Apphn78 extends ActiveRecord {
    
//***
    public function guardar($param,$usuario,$uid) {
        try {
            $this->fh_informacion = date('d-m-Y');
            $this->nb_usuario = $usuario;
            $this->nb_nomcom = $uid;
            $this->cd_entidad = $param['hientidad'];
            $this->nb_entidad = $param['hientidadcompleto'];
            $this->nb_promotor = $param['hipromotor'];
            $this->nb_proyecto = $param['hiproyecto'];
            $this->nb_cve1 = $param['hivalor1'];
            $this->nb_cve2 = $param['hivalor2'];
            $this->nb_cve3 = $param['hivalor3'];
            $this->nb_cve4 = $param['hivalor4'];
            $this->nb_cve5 = $param['hivalor5'];
            $this->nb_inst_finan1 = $param['hiinstitucion1'];
            $this->nb_inst_finan2 = $param['hiinstitucion2'];
            $this->st_estatus_ind = $param['hiinstitucion3'];
            $this->fh_carga = date('Y-m-d H:m:s');
            return $this->save();
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

}
 