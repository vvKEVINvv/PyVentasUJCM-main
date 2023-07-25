    <?php 
    # var_dump($datos);
    $id = isset($datos['idempresas'])?$datos['idempresas']:'';
    $nombre= isset($datos['nombre'])?$datos['nombre']:'';
    $ruc= isset($datos['ruc'])?$datos['ruc']:'';
    $direccion= isset($datos['direccion'])?$datos['direccion']:'';

    $editar = ($id!='')?1:0;
    $titulo= ($editar==1)?'Editar las Empresa':'Nueva Empresa';
    ?>
    <h1><?=$titulo?></h1>
    <form action="?ctrl=CtrlEmpresa&accion=guardar" method="post">
    
        Id: <input class="form-control" 
        type="text" name="id" value="<?=$id?>">
        <br>
        Nombre: <input class="form-control" 
        type="text" name="nombre" value="<?=$nombre?>">
        <br>

        Ruc: <input class="form-control" 
        type="text" name="ruc" value="<?=$ruc?>">
        <br>
        
        Dirección: <input class="form-control" 
        type="text" name="direccion" value="<?=$direccion?>">
        <br>

        <input type="hidden" name="op" value="<?=$editar?>">
  
        <input type="submit" value="Guardar">
    </form>
    <a href="?ctrl=CtrlEmpresa">Retornar</a>
</body>
</html>