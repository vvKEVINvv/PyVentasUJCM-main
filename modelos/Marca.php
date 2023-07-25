<?php
require_once "./core/Modelo.php";
class Marca extends Modelo
{
    private $_id;
    private $_nombre;

    private $_tabla = 'marcas';

    public function __construct($id=null, $nombre=null){
        $this->_id = $id;
        $this->_nombre = $nombre;
        parent::__construct($this->_tabla);
    }
    public function eliminar(){
        
        return $this->deleteBy('idmarcas',$this->_id);
    }
    public function guardar(){
        $datos = array(
            'idmarcas'=>$this->_id,
            'nombre'=>"'$this->_nombre'"
        );

        return $this->insert($datos);
    }

    public function actualizar(){
        $datos = array(
            'nombre'=>"'$this->_nombre'"
        );
        $wh="idmarcas='$this->_id'";
        
        return $this->update($wh, $datos);
    }
    public function getId(){
        return $this->_id;
    }
}