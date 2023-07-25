<?php
require_once "./Persistencia/EntidadBase.php";
class Modelo extends EntidadBase{
    # Codigo Base de Modelo
    # private $_tabla;
    public function __construct($tabla=null){
        if ($tabla != null){
            # $this->_tabla=(string) $tabla;
            parent::__construct($tabla);
        }
    }

}