<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
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
    
<a href="?ctrl=CtrlEmpresa&accion=nuevo" class="btn btn-primary"> Nueva Empresa</a>
<!-- <a href="#" id="imprimirempresa" class="btn btn-success">Imprimir</a> -->

<a href="#" id="imprimirempresa1" class="btn btn-success">Imprimir AutoTabla</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Ruc</th>
            <th>Dirección</th>
            <th colspan="2">Operaciones</th>
        </tr>
    <?php  
        # var_dump($datos);exit;
        if (is_array($datos))
        foreach ($datos as $d) { ?>
        
        <tr>
            <td><?=$d['idempresas']?></td>
            <td><?=$d['nombre']?></td>
            <td><?=$d['ruc']?></td>
            <td><?=$d['direccion']?></td>
            <td><a href="?ctrl=CtrlEmpresa&accion=editar&id=<?=$d['idempresas']?>"> Editar</a></td>
            <td><a href="?ctrl=CtrlEmpresa&accion=eliminar&id=<?=$d['idempresas']?>"> Eliminar</a></td>
        </tr>
        <?php } ?>
    </table>
<p></p>
<a href="?" class="btn btn-primary">Retornar</a>

<script type="text/javascript">
  $(function () {
    $('#imprimirempresa').click( function(){
        // alert ("Imprimiendo");
        var datos= <?=json_encode(isset($datos)?$datos:'');?>;
      
      console.log(datos)

      const doc = new jsPDF();

      doc.text("REPORTE", 50, 30);

      for (i=0; i<datos.length;i++){
        doc.text(datos[i]['idempresas'],30,50+i*10)
        doc.text(datos[i]['nombre'],50,50+i*10)
        doc.text(datos[i]['ruc'],50,50+i*10)
        doc.text(datos[i]['direccion'],50,50+i*10)
      } 
      doc.save("prueba.pdf");

    });

    $('#imprimirempresa1').click( function(){
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
            margin:{top:40}
        })


      doc.save("prueba.pdf");
    });
});

</script>
</body>
</html>