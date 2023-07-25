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
    $tituloToast = ($msg['titulo']=='')?"Correcto":$msg['titulo'];
    $mensajeToast = ($msg['cuerpo']=='')?"":$msg['cuerpo'];
    ?>
    <div class="position-fixed top-0 end-0 p-3" >
    <div class="toast fade" role="alert" aria-live="polite" aria-atomic="true" data-bs-delay="1000" data-bs-autohide="false">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
            <strong class="me-auto"><?=$tituloToast?></strong>
            <small class="text-body-secondary">justo ahora</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?=$mensajeToast?>
        </div>
    </div>
    </div>

    
<a href="?ctrl=CtrlProducto&accion=nuevo" class="btn btn-primary"> Nuevo Producto</a>
 <!-- <a href="#" id="imprimirproductos" class="btn btn-success">Imprimir</a> -->

<a href="#" id="imprimirproductos1" class="btn btn-success">Imprimir AutoTabla</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>P.U.</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Marca</th>
            <th colspan="2">Operaciones</th>
        </tr>
    <?php  
        # var_dump($datos);exit;
        if (is_array($datos))
        foreach ($datos as $d) { ?>
        
        <tr>
            <td><?=$d['idproductos']?></td>
            <td><?=$d['nombre']?></td>
            <td><?=$d['descripcion']?></td>
            <td><?=$d['precio_unitario']?></td>
            <td><?=$d['stock']?></td>
            <td><?=$d['imagen']?></td>
            <td><?=$d['marca']?></td>
            <td><a href="?ctrl=CtrlProducto&accion=editar&id=<?=$d['idproductos']?>"> Editar</a></td>
            <td><a href="?ctrl=CtrlProducto&accion=eliminar&id=<?=$d['idproductos']?>"> Eliminar</a></td>
        </tr>
        <?php } ?>
    </table>
<p></p>

<p></p>
<a href="?" class="btn btn-primary">Retornar</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    // Mostrar el toast
    $('.toast').toast('show');
    // Iniciar la cuenta regresiva de 2 segundos
    var countdown = 5000;
    var interval = 10; // Intervalo de tiempo para actualizar el efecto de desvanecimiento (en milisegundos)

    var fadeOut = setInterval(function() {
      // Calcular la opacidad del toast en función del tiempo restante
      var opacity = (countdown / 5000).toFixed(2);
      $('.toast').css('opacity', opacity);

      // Actualizar la cuenta regresiva
      countdown -= interval;

      // Verificar si el tiempo ha terminado
      if (countdown < 0) {
        clearInterval(fadeOut);

        // Ocultar y eliminar el toast del DOM
        toast.hide();
        setTimeout(function() {
          $('.toast').remove();
        }, 500); // Esperar 500ms para permitir que se complete la animación de desvanecimiento
      }
    }, interval);
  });
</script>

<script type="text/javascript">
  $(function () {
    $('#imprimirproductos').click( function(){
        // alert ("Imprimiendo");
        var datos= <?=json_encode(isset($datos)?$datos:'');?>;
      
      console.log(datos)

      const doc = new jsPDF();

      doc.text("REPORTE", 50, 30);

      for (i=0; i<datos.length;i++){
        doc.text(datos[i]['idproductos'],30,50+i*10)
        doc.text(datos[i]['nombre'],50,50+i*10)
        doc.text(datos[i]['descripcion'],50,50+i*10)
        doc.text(datos[i]['precio_unitario'],50,50+i*10)
        doc.text(datos[i]['stock'],50,50+i*10)
        //doc.text(datos[i]['imagen'],50,50+i*10)
        //doc.text(datos[i]['marca'],50,50+i*10)
      } 
      doc.save("prueba.pdf");

    });

    $('#imprimirproductos1').click( function(){
        var datos= <?=json_encode(isset($datos)?$datos:'');?>;
      
      console.log(datos)

      const doc = new jsPDF();
        doc.setFontSize(20)
        doc.setTextColor(255, 0, 0) // Rojo
      doc.text("REPORTE", 50, 30);

      doc.setFontSize(10)
      doc.setTextColor(0, 0, 0) // Negro

      let columnas =[]
    columnas.push( Object.keys(datos[0]) )

    let data = [] 

    for (let i in datos) {
        data.push( Object.values(datos[i]));
    }
    doc.autoTable({ 
        head: columnas,
        body: data,
            margin:{top:35}
        })


      doc.save("prueba.pdf");
    });
});
</script>

</body>
</html>