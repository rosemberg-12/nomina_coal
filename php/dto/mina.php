<?php 
class mina{

	private $nombre_mina;
	private $id_mina;
	private $descripcion;
    private $sueldo;
	private $direccion;
	private $departamento;
	private $ciudad;
    private $codigo;


	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}