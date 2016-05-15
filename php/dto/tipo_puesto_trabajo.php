<?php 
class tipo_puesto_trabajo{

	private $nombre;
	private $id;
	
	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}