<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 25/01/16
 * Time: 04:19 PM
 */

class descuento {

    private $id;
    private $mina;
    private $empleado;
    private $tdescuento;
    private $periodo;
    private $fecha;
    private $cantidad;
    private $comentario;

    public function _GET($k){ return $this->$k; }
    public function _SET($k, $v){ return $this->$k = $v; }

} 