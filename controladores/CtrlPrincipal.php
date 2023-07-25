<?php
session_start();

require_once "./core/Controlador.php";
class CtrlPrincipal extends Controlador{
    public function index(){
        $data = $this->mostrar('home.php','',true);

        $datos = array(
            'contenido'=>$data
        );

        $this->mostrar('principal.php',$datos);
    }
}