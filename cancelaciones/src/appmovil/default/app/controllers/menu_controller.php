<?php

/**
 * Description of menu_controller
 *
 * @author GM
 */
class MenuController extends AppController {

    public function index() {
        if (Session::get('sesion') === 0) {
            return Redirect::to('index');
        }
    }

    public function proyecto() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $sqlQuery = "SELECT (SELECT nb_entcom FROM tado010_entidades WHERE nb_entcort = '') AS entidad,nb_nompromotor AS promotor,nb_nombreproyecto AS proyecto,nb_ubicacioncve1 AS cve1,nb_ubicacioncve2 AS cve2,nb_ubicacioncve3 AS cve3 FROM tado005_hn78detalleproyecto FROM";
        $arrayProyecto = $proyecto->find_all_by_sql($sqlQuery);
    }

    public function entidades() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado010_entidades');
        $entidad = new Tado010Entidades();
        $arrayEntidades = $entidad->find_all_by_sql("select nb_entcom as nombre,nb_entcort as value from tado010_entidades where nb_entcom LIKE '{$_GET["term"]}%'");
        $entidades = $_GET['callback'] . '([';
        $cont = 0;
        $totalentidades = count($arrayEntidades);
        $coma = ',';
        foreach ($arrayEntidades as $key => $value) {
            $cont++;
            if ($cont < $totalentidades) {
                $coma = ',';
            } else if ($cont >= $totalentidades) {
                $coma = '';
            }
            $entidades .= '{"id":"' . $value->value . '","label":"' . $value->nombre . '","value":"' . $value->nombre . '"}' . $coma;
        }
        $entidades .='])';
        echo $entidades;
    }

    public function cliente() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $limit = "";
        if ($_GET["term"] == "") {
            $limit = " LIMIT 5";
        }
        $sqlQuery = "SELECT distinct nb_nompromotor AS promotor "
                . "FROM tado005_hn78detalleproyecto "
                . "WHERE TRIM(nb_nompromotor) LIKE '{$_GET["term"]}%' "
                . "AND TRIM(cd_entidad) = '{$_GET['entidad']}' "
                . "{$limit}";
        $arrayCliente = $proyecto->find_all_by_sql($sqlQuery);
        $clientes = $_GET['callback'] . '([';
        $cont = 0;
        $totalclientes = count($arrayCliente);
        $coma = ',';
        foreach ($arrayCliente as $key => $value) {
            $cont++;
            if ($cont < $totalclientes) {
                $coma = ',';
            } else if ($cont >= $totalclientes) {
                $coma = '';
            }
            $clientes .= '{"label":"' . trim($value->promotor) . '"}' . $coma;
        }
        $clientes .='])';
        echo $clientes;
    }

    public function proyectocon() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $limit = "";
        if ($_GET["term"] == "") {
            $limit = " LIMIT 5";
        }
        $sqlQuery = "SELECT distinct nb_nombreproyecto AS proyecto "
                . "FROM tado005_hn78detalleproyecto "
                . "WHERE TRIM(nb_nombreproyecto) LIKE '{$_GET["term"]}%' "
                . "AND TRIM(cd_entidad) = '{$_GET['entidad']}' "
                . "AND TRIM(nb_nompromotor) LIKE '{$_GET['promotor']}%' "
                . "{$limit}";
                
        $arrayCliente = $proyecto->find_all_by_sql($sqlQuery);
        $clientes = $_GET['callback'] . '([';
        $cont = 0;
        $totalclientes = count($arrayCliente);
        $coma = ',';
        foreach ($arrayCliente as $key => $value) {
            $cont++;
            if ($cont < $totalclientes) {
                $coma = ',';
            } else if ($cont >= $totalclientes) {
                $coma = '';
            }
            $clientes .= '{"label":"' . trim($value->proyecto) . '"}' . $coma;
        }
        $clientes .='])';
        echo $clientes;
    }

    public function claveuno() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $sqlQuery = "SELECT TRIM(nb_ubicacioncve1) AS cve1 "
                . "FROM tado005_hn78detalleproyecto "
                . "WHERE TRIM(cd_entidad) = '{$_GET['entidad']}' "
                . "AND TRIM(nb_nompromotor) = '{$_GET['promotor']}' "
                . "AND TRIM(nb_nombreproyecto) = '{$_GET['proyecto']}' "
                . "AND TRIM(nb_ubicacioncve1) LIKE '{$_GET['term']}%' "
                . "GROUP BY nb_ubicacioncve1";
        $arrayCliente = $proyecto->find_all_by_sql($sqlQuery);
        $clientes = $_GET['callback'] . '([';
        $cont = 0;
        $totalclientes = count($arrayCliente);
        $coma = ',';
        foreach ($arrayCliente as $key => $value) {
            $cont++;
            if ($cont < $totalclientes) {
                $coma = ',';
            } else if ($cont >= $totalclientes) {
                $coma = '';
            }
            $clientes .= '{"label":"' . trim($value->cve1) . '"}' . $coma;
        }
        $clientes .='])';
        echo $clientes;
    }

    public function clavedos() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $sqlQuery = "SELECT TRIM(nb_ubicacioncve2) AS cve2 "
                . "FROM tado005_hn78detalleproyecto "
                . "WHERE TRIM(cd_entidad) = '{$_GET['entidad']}' "
                . "AND TRIM(nb_nompromotor) = '{$_GET['promotor']}' "
                . "AND TRIM(nb_nombreproyecto) = '{$_GET['proyecto']}' "
                . "AND TRIM(nb_ubicacioncve1) = '{$_GET['valoruno']}' "
                . "AND TRIM(nb_ubicacioncve2) LIKE '{$_GET['term']}%' "
				. "GROUP BY nb_ubicacioncve2";

        $arrayCliente = $proyecto->find_all_by_sql($sqlQuery);
        $clientes = $_GET['callback'] . '([';
        $cont = 0;
        $totalclientes = count($arrayCliente);
        $coma = ',';
        foreach ($arrayCliente as $key => $value) {
            $cont++;
            if ($cont < $totalclientes) {
                $coma = ',';
            } else if ($cont >= $totalclientes) {
                $coma = '';
            }
            $clientes .= '{"label":"' . trim($value->cve2) . '"}' . $coma;
        }
        $clientes .='])';
        echo $clientes;
    }

    public function clavetres() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $sqlQuery = "SELECT TRIM(nb_ubicacioncve3) AS cve3 "
                . "FROM tado005_hn78detalleproyecto "
                . "WHERE TRIM(cd_entidad) = '{$_GET['entidad']}' "
                . "AND TRIM(nb_nompromotor) = '{$_GET['promotor']}' "
                . "AND TRIM(nb_nombreproyecto) = '{$_GET['proyecto']}' "
                . "AND TRIM(nb_ubicacioncve1) = '{$_GET['valoruno']}' "
                . "AND TRIM(nb_ubicacioncve2) = '{$_GET['valordos']}' "
                . "AND TRIM(nb_ubicacioncve3) LIKE '{$_GET['term']}%' "
				. "GROUP BY nb_ubicacioncve3";

        $arrayCliente = $proyecto->find_all_by_sql($sqlQuery);
        $clientes = $_GET['callback'] . '([';
        $cont = 0;
        $totalclientes = count($arrayCliente);
        $coma = ',';
        foreach ($arrayCliente as $key => $value) {
            $cont++;
            if ($cont < $totalclientes) {
                $coma = ',';
            } elseif ($cont >= $totalclientes) {
                $coma = '';
            }
            $clientes .= '{"label":"' . trim($value->cve3) . '"}' . $coma;
        }
        $clientes .='])';
        echo $clientes;
    }
    
    public function clavecuatro() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $sqlQuery = "SELECT TRIM(nb_ubicacioncve4) AS cve4 "
                . "FROM tado005_hn78detalleproyecto "
                . "WHERE TRIM(cd_entidad) = '{$_GET['entidad']}' "
                . "AND TRIM(nb_nompromotor) = '{$_GET['promotor']}' "
                . "AND TRIM(nb_nombreproyecto) = '{$_GET['proyecto']}' "
                . "AND TRIM(nb_ubicacioncve1) = '{$_GET['valoruno']}' "
                . "AND TRIM(nb_ubicacioncve2) = '{$_GET['valordos']}' "
                . "AND TRIM(nb_ubicacioncve3) = '{$_GET['valortres']}' "
                . "AND TRIM(nb_ubicacioncve4) LIKE '{$_GET['term']}%' "
				. "GROUP BY nb_ubicacioncve4";

        $arrayCliente = $proyecto->find_all_by_sql($sqlQuery);
        $clientes = $_GET['callback'] . '([';
        $cont = 0;
        $totalclientes = count($arrayCliente);
        $coma = ',';
        foreach ($arrayCliente as $key => $value) {
            $cont++;
            if ($cont < $totalclientes) {
                $coma = ',';
            } elseif ($cont >= $totalclientes) {
                $coma = '';
            }
            $clientes .= '{"label":"' . trim($value->cve4) . '"}' . $coma;
        }
        $clientes .='])';
        echo $clientes;
    }
    
    public function clavecinco() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado005_hn78detalleproyecto');
        $proyecto = new Tado005Hn78detalleproyecto();
        $sqlQuery = "SELECT TRIM(nb_ubicacioncve5) AS cve5 "
                . "FROM tado005_hn78detalleproyecto "
                . "WHERE TRIM(cd_entidad) = '{$_GET['entidad']}' "
                . "AND TRIM(nb_nompromotor) = '{$_GET['promotor']}' "
                . "AND TRIM(nb_nombreproyecto) = '{$_GET['proyecto']}' "
                . "AND TRIM(nb_ubicacioncve1) = '{$_GET['valoruno']}' "
                . "AND TRIM(nb_ubicacioncve2) = '{$_GET['valordos']}' "
                . "AND TRIM(nb_ubicacioncve3) = '{$_GET['valortres']}' "
                . "AND TRIM(nb_ubicacioncve4) = '{$_GET['valorcuatro']}' "
                . "AND TRIM(nb_ubicacioncve5) LIKE '{$_GET['term']}%' "
				. "GROUP BY nb_ubicacioncve5";

        $arrayCliente = $proyecto->find_all_by_sql($sqlQuery);
        $clientes = $_GET['callback'] . '([';
        $cont = 0;
        $totalclientes = count($arrayCliente);
        $coma = ',';
        foreach ($arrayCliente as $key => $value) {
            $cont++;
            if ($cont < $totalclientes) {
                $coma = ',';
            } elseif ($cont >= $totalclientes) {
                $coma = '';
            }
            $clientes .= '{"label":"' . trim($value->cve5) . '"}' . $coma;
        }
        $clientes .='])';
        echo $clientes;
    }

    public function financieras() {
        View::select(NULL);
        View::template(NULL);
        Load::model('tado011_entfinan');
        $finaciera = new Tado011Entfinan();
        $where = "";
        if(isset($_GET['financiera']) && $_GET['financiera'] != ''){
            $where = " AND TRIM(nb_entfindat) NOT LIKE '{$_GET['financiera']}%' ";
        }
        $sqlQuery = "SELECT TRIM(nb_entfindat) AS financiera FROM tado011_entfinan WHERE TRIM(nb_entfindat) LIKE '{$_GET['term']}%' {$where}";
        $arrayFinanciera = $finaciera->find_all_by_sql($sqlQuery);
        $financieras = $_GET['callback'] . '([';
        $cont = 0;
        $totalfinancieras = count($arrayFinanciera);
        $coma = ',';
        foreach ($arrayFinanciera as $key => $value) {
            $cont++;
            if ($cont < $totalfinancieras) {
                $coma = ',';
            } elseif ($cont >= $totalfinancieras) {
                $coma = '';
            }
            $financieras .= '{"label":"' . trim($value->financiera) . '"}' . $coma;
        }
        $financieras.='])';
        echo $financieras;
    }
    
    public function confirma() {
        View::select(NULL);
        View::template(NULL);
        Load::model('t001_apphn78');
        $confirma = new T001Apphn78();
        $datos = $_REQUEST;
        //***
        $guardo = $confirma->guardar($datos,  Session::get('nb_usuario'), Session::get('cd_uid'));
        //***
        if($guardo == TRUE){
            echo json_encode('ok');
        }else{
            echo json_encode('fail');
        }
    }

    protected function after_filter() {
        if (Input::isAjax()) {
            View::template(null); 
        }
    }

}
