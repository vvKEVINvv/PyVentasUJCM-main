<?php
require_once "./core/Modelo.php";
class Empresa extends Modelo
{
    private $_id;
    private $_nombre;
    private $_ruc;
    private $_direccion;

    private $_tabla = 'empresas';

    public function __construct($id=null, $nombre=null, 
                        $ruc=null, $direccion=null){
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_ruc = $ruc;
        $this->_direccion = $direccion;

        parent::__construct($this->_tabla);
    }
    public function eliminar(){
        
        return $this->deleteBy('idempresas',$this->_id);
    }
    public function guardar(){
        $datos = array(
            'idempresas'=>$this->_id,
            'nombre'=>"'$this->_nombre'",
            'ruc'=>"'$this->_ruc'",
            'direccion'=>"'$this->_direccion'"
        );

        return $this->insert($datos);
    }

    public function actualizar(){
        $datos = array(
            'nombre'=>"'$this->_nombre'",
            'ruc'=>"'$this->_ruc'",
            'direccion'=>"'$this->_direccion'"
        );
        
        $wh="idempresas='$this->_id'";
        
        return $this->update($wh, $datos);
    }
    public function getId(){
        return $this->_id;
    }
}