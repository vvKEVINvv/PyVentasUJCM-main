<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
</head>
<body>
<?php 
    $usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
?>
    <h1>Opciones del sistema </h1>
    <h2><?=$usuario?></h2>
    <ul>
        <li>
            <a href="?ctrl=CtrlProducto">Productos</a>
        </li>
        <li>
            <a href="?ctrl=CtrlMarca">Marcas</a>
        </li>
        <li>
            <a href="?ctrl=CtrlEmpresa">Empresas</a>
        </li>
    </ul>
</body>
</html>