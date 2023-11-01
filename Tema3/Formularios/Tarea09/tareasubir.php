<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilosformulario.css">
    <title>Resultado Formulario</title>
</head>
<body>
    <div class="resultadoform">
    <h1>Resultado del Formulario</h1>

    <h3>Nombre;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['nombre'];
    ?>
    </p>

    

<h3>Apellidos;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['apellidos'];
    ?>
    </p>


    <h3>Contraseña;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['pass'];
    ?>
    </p>

    <h3>Repite contraseña;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['repitepass'];
    ?>
    </p>

    <h3>Fecha;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['fecha'];
    ?>
    </p>


<h3>DNI;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['DNI'];
    ?>
    </p>



<h3>Email;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['email'];
    ?>
    </p>


 <!-- IMAGEN -->

<h3>Foto;</h3> 
<?php
$cruta = './';

$ruta = $cruta . basename($_FILES['archivo']['name']);

// if (
    move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)
//     ) {
// //     echo "Archivo subido con éxito";
// // } else {
// //     echo "Error subiendo archivo";
// // }
?>

<img class="imagensubida" src= "<?php echo "./".basename($_FILES['archivo']['name'])?>" alt="No se encuentra la imagen">



<?php 
 echo "<pre>";
 print_r ($_REQUEST);

?>
</div>
    
</body>
</html>

