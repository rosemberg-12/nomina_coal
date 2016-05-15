<?php

require_once 'php/controllers/control_mina.php';



class control_cvs{


    public function importarMina($archivo){
    $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {



            $fp = fopen($archivo['tmp_name'], "r");
                while (!feof($fp)){

                    $data  = explode(",", fgets($fp));

                    if( (!isset($data[0]) || !isset($data[1]) || !isset($data[2]) || !isset($data[3])  || count($data)>4 ) ){
                        return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                    }

                    $control_m=new control_mina();
                    try{
                   $control_m->registrarMina($data[0],$data[1],$data[2], $data[3]);

                    $contador+=1;
                    }catch (Exception $e){
                        return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                        }
                }
                return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }

    public function importarEmpleados($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {


            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){
                echo "entra";
                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1]) || !isset($data[2]) ||!isset($data[3]) || !isset($data[4]) ||  count($data)<5 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $control_m=new control_empleados();

                    $min=array();

                    $cont=5;

                    while($cont < count($data)){

                        if( !strcmp( $data[$cont], (chr(13).chr(10))) == 0 ){
                            $min[]=$data[$cont];
                        }
                        $cont++;
                    }

                     $control_m->registrarEmpleadoImportar($data[0],$data[1], $data[3],$data[4], $min, $data[2]);

                    $contador+=1;

            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }

    public function importarTDescuento($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {


            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1])  || count($data)>2 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $control_d=new control_descuentos();
                try{
                    $control_d->registrarTipoDescuentos($data[1],$data[0]);

                    $contador+=1;
                }catch (Exception $e){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }
            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }

    public function importarTBonos($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {



            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1])  || count($data)>2 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $control_d=new control_bonos();
                try{
                    $control_d->registrarTipoBonos($data[1],$data[0]);

                    $contador+=1;
                }catch (Exception $e){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }
            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }

    public function importarMantos($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {



            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1])  || count($data)>2 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $control_d=new control_mina();
                try{

                    $minaDao=new mina_dao();
                    $id=$minaDao->getIDMinaByCodigo($data[1]);

                    $control_d->registrarManto($data[0],$id);

                    $contador+=1;
                }catch (Exception $e){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }
            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }

    public function importarTiposPTrabajo($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {



            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1])  || count($data)>2 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $control_d=new control_mina();
                try{
                    $control_d->registrarTPT($data[0],$data[1]);

                    $contador+=1;
                }catch (Exception $e){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }
            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }


    public function importarPTrabajo($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {

            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1])  || !isset($data[2])  || !isset($data[3])  || count($data)<4 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $n1=$data[2];
                $id1=$data[3];

                $n2="";
                $n3="";

                $id2="";
                $id3="";

                if ( isset($data[4]) && isset($data[5]) ){
                    $n2=$data[4];
                    $id2=$data[5];
                }

                if ( isset($data[6]) && isset($data[7]) ){
                    $n3=$data[6];
                    $id3=$data[7];
                }



                $control_d=new control_mina();

                $minaDao=new mina_dao();
                $id=$minaDao->getIDMinaByCodigo($data[0]);

                $id_m=$control_d->getIdManto($id, $data[1]);



                try{
                    $control_d->registrarPuestoTrabajo($n1, $id1, $n2, $id2,$n3, $id3, $id_m);

                    $contador+=1;
                }catch (Exception $e){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }
            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }



    public function exportarTLaboresMina($mina, $periodo){

        $concat="";
        $mina_dao=new mina_dao();
        session_start();
        $_SESSION["id_mina"]=$mina;
        $empleados=$mina_dao->cargarEmpleadosMina();
        unset($_SESSION["id_mina"]);

        foreach ($empleados as $row)
        {
            $labor_dao=new labor_dao();
            $labores_empleado=$labor_dao->getLaboresEmpleadoByPeriodoMina($row,$mina, $periodo);
            $valor=$this->calcularMontoLabores($labores_empleado);

            if($valor!=0)
            $concat.=$row->_GET('codigo').','.$valor.chr(13).chr(10);

        }

        return $concat;

    }


    public function calcularMontoLabores($vector_labores){

        $monto=0;

        foreach($vector_labores as $labor){

            $monto+=$labor->_GET('costo');

        }

        return $monto;

    }

    public function exportarTDescuentosMina($mina, $periodo){

        $concat="";
        $mina_dao=new mina_dao();
        session_start();
        $_SESSION["id_mina"]=$mina;
        $empleados=$mina_dao->cargarEmpleadosMina();
        unset($_SESSION["id_mina"]);

        foreach ($empleados as $row)
        {


            $descuento_dao=new descuento_dao();
            $descuentos_empleado=$descuento_dao->getDescuentosEmpleadoByPeriodoMina($row, $mina, $periodo);

            $valor=$this->calcularMontoDescuentos($descuentos_empleado);

            if($valor!=0)
                $concat.=$row->_GET('codigo').','.$valor.chr(13).chr(10);

        }

        return $concat;

    }

    public function exportarTBonosMina($mina, $periodo){

        $concat="";
        $mina_dao=new mina_dao();
        session_start();
        $_SESSION["id_mina"]=$mina;
        $empleados=$mina_dao->cargarEmpleadosMina();
        unset($_SESSION["id_mina"]);

        foreach ($empleados as $row)
        {


            $bono_dao=new bono_dao();
            $bonos_empleado=$bono_dao->getBonosEmpleadoByPeriodoMina($row,$mina, $periodo);

            $valor=$this->calcularMontoDescuentos(  $bonos_empleado);

            if($valor!=0)
                $concat.=$row->_GET('codigo').','.$valor.chr(13).chr(10);

        }

        return $concat;

    }

    public function calcularMontoDescuentos($vector_d){

        $monto=0;

        foreach($vector_d as $d){

            $monto+=$d->_GET('cantidad');

        }

        return $monto;

    }

    public function importarTlabores1($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {


            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1])  || !isset($data[2])  || !isset($data[3])  || !isset($data[4])  || count($data)>5 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $control_d=new control_labores();
                try{

                    $minaDao=new mina_dao();
                    $id=$minaDao->getIDMinaByCodigo($data[4]);

                    $control_d->registrarTipoLabor($data[0],$data[1],$data[2],$data[3],$id);

                    $contador+=1;
                }catch (Exception $e){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }
            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }

    public function importarTlabores2($archivo){
        $contador=0;
        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {


            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(",", fgets($fp));

                if( (!isset($data[0]) || !isset($data[1])  || !isset($data[2])  || !isset($data[3])
                    || !isset($data[4])  || !isset($data[4])  || count($data)>6 ) ){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }

                $control_d=new control_labores();
                try{

                    $minaDao=new mina_dao();
                    $id=$minaDao->getIDMinaByCodigo($data[4]);
                    $control_g=new control_mina();
                    $id_m=$control_g->getIdManto($id, $data[5]);

                    $control_d->registrarTipoLabor2($data[0],$data[1],$data[2],$data[3],$data[4],$id_m );

                    $contador+=1;
                }catch (Exception $e){
                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";
                }
            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";
    }
}