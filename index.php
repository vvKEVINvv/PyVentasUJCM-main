
<?php

abstract class Index
{
    public static function ejecutar(){
        $controlador= isset($_GET["ctrl"])?$_GET["ctrl"]:"CtrlPrincipal";

        switch ($controlador) {
            case 'CtrlEmpleado':
                require_once "./controladores/CtrlEmpleado.php";
                $c = new CtrlEmpleado();
                break;
            case 'CtrlMarca':
                require_once "./controladores/CtrlMarca.php";
                $c = new CtrlMarca();
                break;
                
            case 'CtrlProducto':
                require_once "./controladores/CtrlProducto.php";
                $c = new CtrlProducto();
                break;

            case 'CtrlEmpresa':
                require_once "./controladores/CtrlEmpresa.php";
                $c = new CtrlEmpresa();
                break;
            
            default:
                require_once "./controladores/CtrlPrincipal.php";
                $c = new CtrlPrincipal();
                break;
        }
        
        $c->index();

    }
}

Index::ejecutar();