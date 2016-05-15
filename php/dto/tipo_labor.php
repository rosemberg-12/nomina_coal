<?php 
class tipo_labor{

	private $id;
	private $tipo_labor;
	private $subtipo_labor;
	private $concepto_labor;
	private $precio_unidad;
    private $manto;
    private $mina;


	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}