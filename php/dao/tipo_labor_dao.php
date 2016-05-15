<?php 
class tipo_labor_dao{

    public function registrarTipoLabor($tipoLabor){
        include('bases.php');

        $consulta="INSERT INTO tipo_labor (tipo_labor, subtipo_labor ,concepto_labor, precio_unidad, id_mina, estado) values(?,?,?,?,?, 1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array( $tipoLabor->_GET("tipo_labor"),$tipoLabor->_GET("subtipo_labor"),$tipoLabor->_GET("concepto_labor"),$tipoLabor->_GET("precio_unidad"), $tipoLabor->_GET("mina")->_GET("id_mina") ));

        return "Registro de la mina exitoso";
    }


    public function registrarTipoLabor2($tipoLabor){
        include('bases.php');

        $consulta="INSERT INTO tipo_labor (tipo_labor, subtipo_labor ,concepto_labor, precio_unidad, id_mina, id_manto, tiene_manto, estado) values(?,?,?,?,?,?,?, 1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array( $tipoLabor->_GET("tipo_labor"),$tipoLabor->_GET("subtipo_labor"),$tipoLabor->_GET("concepto_labor"),$tipoLabor->_GET("precio_unidad"), $tipoLabor->_GET("mina")->_GET("id_mina"),$tipoLabor->_GET("manto")->_GET("id"), 1 ));

        return "Registro de la mina exitoso";
    }

    public function getTiposLaboresMina($id_mina){
        include('bases.php');

        $consulta="SELECT tipo_labor.id, tipo_labor.tipo_labor, tipo_labor.subtipo_labor, tipo_labor.concepto_labor,
         tipo_labor.precio_unidad, manto.Nombre FROM tipo_labor, manto WHERE manto.id=tipo_labor.id_manto and tipo_labor.id_mina=? and tipo_labor.estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_mina));

        $tipos_labores=array();

        foreach ($resul as $row) {

            $tipo=new tipo_labor();

            $tipo->_SET("id",$row["id"]);
            $tipo->_SET("tipo_labor",$row["tipo_labor"]);
            $tipo->_SET("subtipo_labor",$row["subtipo_labor"]);
            $tipo->_SET("concepto_labor",$row["concepto_labor"]);
            $tipo->_SET("precio_unidad",$row["precio_unidad"]);
            $tipo->_SET("manto",$row["Nombre"]);


            $tipos_labores[]=$tipo;

        }

        return  $tipos_labores;
    }

    public function eliminarTipoLabor($id){
        include('bases.php');

        $consulta="UPDATE tipo_labor set estado=0 WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id));

    }

    public function cambiarCosto($id, $precioU){
        include('bases.php');

        $consulta="UPDATE tipo_labor set precio_unidad=? WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($precioU, $id));
    }

    public function getConceptosLabores($l1, $l2, $m){
        include('bases.php');

        $consulta="SELECT tipo_labor.id, tipo_labor.concepto_labor FROM tipo_labor
    	WHERE tipo_labor.tipo_labor=? and tipo_labor.subtipo_labor=? and tipo_labor.estado=1 and tipo_labor.id_mina=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($l1,$l2,$m));

        $tipos=array();

        foreach ($resul as $row) {

            $tipo=new tipo_labor();

            $tipo->_SET('id',$row['id']);
            $tipo->_SET('concepto_labor',$row['concepto_labor']);

            $tipos[]=$tipo;

        }
        return $tipos;
    }

    public function cargarMantoLabor($labor){

        include('bases.php');

        $consulta="SELECT tipo_labor.tiene_manto, manto.id, manto.nombre FROM tipo_labor, manto
    	WHERE tipo_labor.id=? and tipo_labor.estado=1 and manto.id=tipo_labor.id_manto" ;

        $resul = $base->prepare($consulta);

        $resul->execute(array($labor));

        foreach ($resul as $row) {

            if($row['tiene_manto']==1){
                $manto=new manto();

                $manto->_SET('id',$row['id']);

                $manto->_SET('nombre',$row['nombre']);

                return $manto;
            }

            return null;

        }

        return null;


    }

}