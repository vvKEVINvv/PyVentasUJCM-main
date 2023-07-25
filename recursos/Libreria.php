<?php
session_start();

abstract class Libreria {
    public static function getMenu($perfil=0){
        
        switch ($perfil) {
            case '0':   # Admin
                $menu = self::getMenuAdmin();
                break;
            case '1':   # empleado
                $menu = $menuEmpleado;
                break;
            case '2':   # cliente
                $menu = $menuCliente;
                break;
            default:
                $menu = self::getMenuGral();
                break;
        }
        return $menu;
           
    }
    private static function getMenuGral(){
        return array(
                    array(
                        'icono'=>'city',
                        'enlace'=>'CtrlPrincipal',
                        'texto'=>'Home'
                    )
                );
    }

    private static function getMenuAdmin(){
        return array(
                    array(
                        'icono'=>'city',
                        'enlace'=>'CtrlPrincipal',
                        'texto'=>'Home'
                    ),
                    array(
                        'icono'=>'city',
                        'enlace'=>'CtrlProductos',
                        'texto'=>'Productos'
                    ),
                    array(
                        'icono'=>'city',
                        'enlace'=>'CtrlUsuario',
                        'texto'=>'Perfil'
                    ),
                );
    }
    
}