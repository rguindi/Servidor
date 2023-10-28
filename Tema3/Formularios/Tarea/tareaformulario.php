<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="./estilosformulario.css">
    <title>Formulario</title>
</head>

<body>
    <header>
        <?php
        include("../../../html/header.html");
        include ("./tareaprocesa.php");
        ?>
    </header>

<?php
 
    $errores = array ();
if (enviado()){
    validaFormulario($errores);
}
?>



<main>
    <!-- FORMULARIO -->

<form action="./tareasubir.php" method="post" enctype="multipart/form-data">

   <label for="alfabetico">Alfabético <input type="text" name="alfabetico" id="alfabetico" value = <?php recuerda ('alfabetico') ?>></label> <br>
  <?php  printerror($errores, 'alfabetico');  ?>
   <label for="alfabeticoopcional">Alfabético Opcional <input type="text" name="alfabeticoopcional" id="alfabeticoopcional"></label> <br>
   <label for="alfanumerico">Alfanumérico <input type="text" name="alfanumerico" id="alfanumerico" value = <?php recuerda ('alfanumerico') ?>></label> <br>
   <?php  printerror($errores, 'alfanumerico');  ?>
   <label for="alfanumericoopcional">Alfanumérico Opcional <input type="text" name="alfanumericoopcional" id="alfanumericoopcional" ></label> <br>
   <label for="numerico">Numérico <input type="number" name="numerico" id="numerico" value = <?php recuerda ('numerico') ?>></label> <br>
   <?php  printerror($errores, 'numerico');
          printerror($errores, 'valornumero');
   ?>
   <label for="numericoopcional">Numérico Opcional <input type="number" name="numericoopcional" id="numericoopcional" ></label> <br>

    <!-- FECHAS -->
   <label for="fecha">Fecha <input type="date" name="fecha" id="fecha" value = <?php recuerda ('fecha') ?>></label> <br>
   <?php  printerror($errores, 'fecha');?>
   <?php  printerror($errores, 'mayor');?>
    

   <label for="fechaopcional">Fecha Opcional <input type="date" name="fechaopcional" id="fechaopcional" ></label> <br>
   
   <!-- RADIOS -->
   <p>Radio Obligatorio</p>
   <label for="opcion1">Opcion 1 <input type="radio" name="opcion" id="opcion1" value="opcion1" <?php recuerdaRadio('opcion', 'opcion1'); ?> ></label> 
   <label for="opcion2">Opcion 2 <input type="radio" name="opcion" id="opcion2" value="opcion2" <?php recuerdaRadio('opcion', 'opcion2'); ?> ></label>
   <label for="opcion3">Opcion 3 <input type="radio" name="opcion" id="opcion3" value="opcion3" <?php recuerdaRadio('opcion', 'opcion3'); ?> ></label> <br>
   <?php  printerror($errores, 'opcion');  ?>
   <label for="select"> Select
   
   <!-- SELECT -->
   <select name="select" id="select">
    <option value="">Selecciona una opcion</option>
    <option value="Opcion 1" <?php recuerdaSelect('select', 'Opcion 1'); ?>>Opcion 1</option>
    <option value="Opcion 2" <?php recuerdaSelect('select', 'Opcion 2'); ?>>Opcion 2</option>
    <option value="Opcion 3" <?php recuerdaSelect('select', 'Opcion 3'); ?>>Opcion 3</option>
   </select></label> <br>
   <?php  printerror($errores, 'select');  ?>
  
   <!-- CHECK -->
  <p>Check</p>
    <?php   
       
        generarChecks (5);
        printerror($errores, 'check'); 
        printerror($errores, 'checks'); 
    ?>
   <label for="telefono">Numero de Telefono <input type="number" name="telefono" id="telefono" value = <?php recuerda ('telefono') ?>></label> <br>
   <?php  printerror($errores, 'telefono');  ?>
   <label for="email">Email<input type="email" name="email" id="email" value = <?php recuerda ('email') ?>></label> <br>
   <?php  printerror($errores, 'email');  ?>
   <label for="pass">Contraseña<input type="password" name="pass" id="pass" value = <?php recuerda ('pass') ?>></label> <br>
   <?php  printerror($errores, 'pass');  ?>
   
   <!-- ARCHIVO -->
   <label for="archivo">Subir Documento<input type="file" name="archivo"></label> <br>
   <?php  printerror($errores, 'archivo');  ?>


    <input type="submit" value="Enviar" name="Enviar">
    <input type="submit" value="Borrar" name="Borrar">
    

</form>
</main>

<footer>
    <?php
    include("../../../html/footer.html");
    ?>



</footer>

</body>

</html>

