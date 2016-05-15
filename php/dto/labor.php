<?php 
class labor{

	private $id;
	private $fecha;
	private $costo;
	private $cantidad;
	private $puesto_trabajo;
	private $empleado;
	private $tipo_labor;
    private $comentario;


	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}	