<?php 
class puesto_trabajo{
	
	private $id;
    private $manto;
	private $nombre1;
	private $tipo_puesto_trabajo1;
    private $nombre2;
    private $tipo_puesto_trabajo2;
    private $nombre3;
    private $tipo_puesto_trabajo3;




    public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }
}