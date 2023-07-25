<?php
require_once "./core/Controlador.php";
class CtrlPrueba extends Controlador
{
    public function index(){

        #echo "hola mundo";
        $datos = array(
            'nombre'=>"Walter"
        );

        $this->mostrar("prueba.php",$datos);
    }
}