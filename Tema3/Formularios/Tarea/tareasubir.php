<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilosformulario.css">
    <title>Resultado Formulario</title>
</head>
<body>
    <h1>Resultado del Formulario</h1>

    <h3>Alfabético;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['alfabetico'];
    ?>
    </p>

    <?php
    if (!empty($_REQUEST['alfabeticoopcional'])) {
 echo '<h3>Alfabético Opcional;</h3>' ;
 echo '  <p class="resultados">'.$_REQUEST['alfabetico'].'</p>';

    }   
    ?>

<h3>Alfanumerico;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['alfanumerico'];
    ?>
    </p>

<?php
    if (!empty($_REQUEST['alfanumericoopcional'])) {
 echo '<h3>Alfanumerico Opcional;</h3>' ;
 echo '  <p class="resultados">'.$_REQUEST['alfanumerico'].'</p>';

    }   
    ?>

<h3>Numerico;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['numerico'];
    ?>
    </p>
<?php
    if (!empty($_REQUEST['numericoopcional'])) {
 echo '<h3>Numerico Opcional;</h3>' ;
 echo '  <p class="resultados">'.$_REQUEST['numericoopcional'].'</p>';

    }   
    ?>

<h3>Fecha;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['fecha'];
    ?>
    </p>

<?php
    if (!empty($_REQUEST['fechaopcional'])) {
 echo '<h3>Fecha Opcional;</h3>' ;
 echo '  <p class="resultados">'.$_REQUEST['fechaopcional'].'</p>';

    }   
    ?>

<h3>Opcion Radio elegida;</h3> 
    <p class="resultados">
    <?php
    if (isset ($_REQUEST['opcion']))
   echo $_REQUEST['opcion'];
    ?>
    </p>

<h3>Opcion Select elegida;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['select'];
    ?>
    </p>

<h3>Checks Seleccionados</h3>

<?php
    foreach ($_REQUEST['checks'] as $key => $value) {
        echo $value.'<br>';
    }
?>

<h3>Telefono;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['telefono'];
    ?>
    </p>

<h3>Email;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['email'];
    ?>
    </p>

<h3>Contraseña;</h3> 
    <p class="resultados">
    <?php
   echo $_REQUEST['pass'];
    ?>
    </p>
 <!-- IMAGEN -->

<h3>Foto;</h3> 
<?php
$cruta = '/Applications/XAMPP/xamppfiles/htdocs/servidor/Tema3/Formularios/Tarea/';

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
    
</body>
</html>

