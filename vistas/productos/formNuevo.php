<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <?php 
    # var_dump($datos);
    $id = isset($datos['idproductos'])?$datos['idproductos']:'';
    $nombre= isset($datos['nombre'])?$datos['nombre']:'';
    $descripcion= isset($datos['descripcion'])?$datos['descripcion']:'';
    $precio_unitario= isset($datos['precio_unitario'])?$datos['precio_unitario']:'';
    $stock= isset($datos['stock'])?$datos['stock']:'';
    $imagen= isset($datos['imagen'])?$datos['imagen']:'';
    $idmarcas= isset($datos['idmarcas'])?$datos['idmarcas']:'';

    $editar = ($id!='')?1:0;
    $titulo= ($editar==1)?'Editar Producto':'Nuevo Producto';
    ?>
    <h1><?=$titulo?></h1>
    <form action="?ctrl=CtrlProducto&accion=guardar" method="post">
    
<div class="container">

  <div class="row">
    <div class="col-sm">
      Id: <input class="form-control" 
        type="text" name="id" value="<?=$id?>">
        <br>
        Nombre: <input class="form-control" 
        type="text" name="nombre" value="<?=$nombre?>">
        <br>
        Descripcion: <input class="form-control" 
        type="text" name="descripcion" value="<?=$descripcion?>">
        <br>

    </div>
    <div class="col-sm">
    <div class="row">
        <div class="col-sm">
            P.U.: <input class="form-control" 
            type="text" name="pu" value="<?=$precio_unitario?>">
            <br>
        </div>
        <div class="col-sm">
            Stock: <input class="form-control" 
        type="text" name="stock" value="<?=$stock?>">
        <br>
        </div>
    </div>

      Imagen: <input class="form-control" 
        type="text" name="imagen" value="<?=$imagen?>">
        <br>
        Marca:
         
         <input class="form-control" 
        type="text" name="idmarcas" value="<?=$idmarcas?>"> 
        <br>
            
            
        
    </div>

  </div>
</div>

<div class="row">
    <div class="col">
    </div>
    <div class="col">
    </div>
    <div class="col text-center" >
        <input type="hidden" name="op" value="<?=$editar?>">

            <input class="form-control btn btn-success" type="submit" value="Guardar">
    </div>
    <div class="col"></div>

    <div class="col"></div>
</div>


        

    </form>

    <a href="?ctrl=CtrlProducto">Retornar</a>
    
</body>
</html>