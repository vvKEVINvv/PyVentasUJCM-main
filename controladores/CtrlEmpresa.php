<?php
session_start();
require_once "./core/Controlador.php";
require_once "./modelos/Empresa.php";
class CtrlEmpresa extends Controlador
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
        $nombre = $_POST['nombre'];
        
        $emp = new Empresa($id,$nombre);
        $empresa = $emp->getBy('idempresas',$id);

        $data = array(
            'datos'=>$empresa['data'][0]
        );
        $datos = array(
            'contenido'=>$this->mostrar('empresas/formNuevo.php',$data,true)
        );
        $this->mostrar('principal.php',$datos);

    }

    public function guardar(){
        $id = $_POST['id'];
        $nombre= $_POST['nombre'];
        $ruc= $_POST['ruc'];
        $direccion= $_POST['direccion'];

        $op = $_POST['op'];
        $emp = new Empresa($id, $nombre, $ruc, $direccion);
        if ($op ==0){
            $emp->guardar();  //Guardar Nuevo
        } else {
            $emp->actualizar();// Editar (UPDATE)
        }
        
        $this->select();
    }

    public function nuevo(){
        $datos = array(
            'contenido'=>$this->mostrar('empresas/formNuevo.php','',true)
        );
        $this->mostrar('principal.php',$datos);
    }
    public function eliminar(){
        $id = $_GET['id'];
        $emp = new Empresa($id);
        $emp->eliminar();
        # var_dump($obj->eliminar()); exit;
        $this->select();
    }

    public function select(){
        $emp = new Empresa('empresas');
        $empresas= $emp->getAll();
        $data = array(
            'datos'=>$empresas['data']
        );

        $datos = array(
            'contenido'=>$this->mostrar('empresas/mostrar.php',$data,true),
            'migas'=>array('empresas','Home')
        );   

        $this->mostrar('principal.php',$datos);
    }
}