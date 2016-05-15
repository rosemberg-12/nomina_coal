<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 25/01/16
 * Time: 04:19 PM
 */

class tipo_bono {

    private $id;
    private $codigo;
    private $nombre;


    public function _GET($k){ return $this->$k; }
    public function _SET($k, $v){ return $this->$k = $v; }

} 