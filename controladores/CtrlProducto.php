<?php

require_once "./core/Controlador.php";
require_once "./modelos/Producto.php";
require_once "./modelos/Marca.php";

class CtrlProducto extends Controlador
{
    public function index(){
        $accion = isset ($_GET['accion'])?$_GET['accion']:'mostrar';

        switch ($accion) {
            case 'nuevo':
                $this->nuevo();
                break;
            case 'editar':
                $this->editar();
                break;
            case 'eliminar':
                $this->eliminar();
                break;
            case 'guardar':
                $this->guardar();
                break;
            
            default:
                $this->select();
                break;
        }
        
    }
    public function editar(){
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
      
        //$Marcas = $_GET['marcas'];

        $obj = new Producto($id, $nombre);
        $producto = $obj->getBy('idproductos',$id);

        //$producto = $this->getMarcas();

        $data = array(
            'datos'=>$producto['data'][0]
             
        );
        $datos = array(
            'contenido'=>$this->mostrar('productos/formNuevo.php',$data,true)
        );
        $this->mostrar('principal.php',$datos);
    }

    public function guardar(){
        $id = $_POST['id'];
        $nombre= $_POST['nombre'];
        $descripcion= $_POST['descripcion'];
        $pu= $_POST['pu'];
        $stock= $_POST['stock'];
        $imagen= $_POST['imagen'];
        $idMarca= $_POST['idmarcas'];

        $op = $_POST['op'];
        $obj = new Producto($id, $nombre, $descripcion, $pu, $stock, $imagen, $idMarca);
        if ($op ==0){
            $obj->guardar();  //Guardar Nuevo
        } else {
            $obj->actualizar();// Editar (UPDATE)
        }
        
        $this->select();
    }

    private function getMarcas(){
        $m = new Marca();
        return $m->getAll();
    }
    public function nuevo(){
        
        $marcas = $this->getMarcas();
        $datos = array(
            'marcas'=>$marcas['data']
        );
          $datos = array(  
            'contenido'=>$this->mostrar('productos/formNuevo.php','',true)
        );
        $this->mostrar('principal.php',$datos);
    }

    public function eliminar(){
        $id = $_GET['id'];
        $obj = new Producto($id);
        $obj->eliminar();
        # var_dump($obj->eliminar()); exit;
        $this->select();
    }

    public function select(){
        $obj = new Producto('productos');
        $objs= $obj->getAll();
        // var_dump($objs);exit;
        $data = array(
            'datos'=>$objs['data'],
            'msg'=>$objs['msg']
        );
        $datos = array(
            'contenido'=>$this->mostrar('productos/mostrar.php',$data,true),
            'migas'=>array('productos','Home')
        );
        $this->mostrar('principal.php',$datos);

    }
}