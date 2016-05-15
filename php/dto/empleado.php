<?php 
class empleado{

	private $id;
	private $nombre;
    private $codigo;
	private $contrasena;
    private $sueldo;
	private $cedula;
	private $dir;
    private $tel;

    private $mina;
	

	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}