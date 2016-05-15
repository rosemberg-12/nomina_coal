<?php 
class manto{

	private $id;
	private $id_mina;
	private $nombre;
	private $cant_empleados;


	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}