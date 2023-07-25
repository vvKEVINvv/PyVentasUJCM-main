    <?php 
    # var_dump($datos);
    $id = isset($datos['idmarcas'])?$datos['idmarcas']:'';
    $nombre= isset($datos['nombre'])?$datos['nombre']:'';
    
    $editar = ($id!='')?1:0;
    $titulo= ($editar==1)?'Editar las Marca':'Nueva Marca';
    ?>
    <h1><?=$titulo?></h1>

    <form action="?ctrl=CtrlMarca&accion=guardar" method="post">
        Id: <input class="form-control" 
        type="text" name="id" value="<?=$id?>">
        <br>
        Marca: <input class="form-control" 
        type="text" name="marca" value="<?=$nombre?>">
        <br>

        <input type="hidden" name="op" value="<?=$editar?>">

        <input type="submit" value="Guardar">
    </form>

    <a href="?ctrl=CtrlMarca">Retornar</a>
