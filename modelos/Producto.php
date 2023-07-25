<?php
require_once "./core/Modelo.php";
class Producto extends Modelo
{
    private $_id;
    private $_nombre;
    private $_descripcion;
    private $_pu;
    private $_stock;
    private $_imagen;
    private $_marca;

    private $_tabla = 'productos';
    private $_vista = 'v_productos';

    public function __construct($id=null, $nombre=null, 
                        $descripcion=null, $pu=0, $stock=0, $imagen=null,$marca=null){
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_descripcion = $descripcion;
        $this->_pu = $pu;
        $this->_stock = $stock;
        $this->_imagen = $imagen;
        $this->_marca = $marca;

        parent::__construct($this->_tabla);

    }
    public function getAll(){
        parent::setTabla($this->_vista);
        return parent::getAll();
    }
    public function getBy($columna,$valor){
        parent::setTabla($this->_vista);
        return parent::getBy($columna,$valor);
    }
    public function eliminar(){
        
        return $this->deleteBy('idproductos',$this->_id);
    }
    public function guardar(){
        $datos = array(
            'idproductos'=>$this->_id,
            'nombre'=>"'$this->_nombre'",
            'descripcion'=>"'$this->_descripcion'",
            'precio_unitario'=>"$this->_pu",
            'stock'=>"'$this->_stock'",
            'imagen'=>"'$this->_imagen'",
            'idmarcas'=>"'$this->_marca'",
             //'idmarcas'=>$this->_marca->getId()
        );
        
        return $this->insert($datos);
    }

    public function actualizar(){
        $datos = array(
            'nombre'=>"'$this->_nombre'",
            'descripcion'=>"'$this->_descripcion'",
            'precio_unitario'=>"$this->_pu",
            'stock'=>"'$this->_stock'",
            'imagen'=>"'$this->_imagen'",
            'idmarcas'=>"'$this->_marca'",
            //'idmarcas'=>$this->_marca->getId()
        );
        $wh="idproductos=$this->_id";
        
        return $this->update($wh, $datos);
    }
    public function getId(){
        return $this->_id;
    }
    
}