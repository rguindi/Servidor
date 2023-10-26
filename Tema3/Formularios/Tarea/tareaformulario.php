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
        ?>
    </header>

<?php

$errores = array ();
include ("./tareaprocesa.php");
if (enviado()){
if (textoVacio ('alfabetico')) $errores ['alfabetico'] = 'El Alfabetico no puede estar vacío.';
if (textoVacio ('alfanumerico')) $errores ['alfanumerico'] = 'El Alfanumerico no puede estar vacío.';
if (textoVacio ('numerico')) $errores ['numerico'] = 'El Numérico no puede estar vacío.';
if (numeroValido ($_REQUEST ['numerico'])) $errores ['valornumero'] = "El número debe estar comprendido entre 0 y 100.";
if (textoVacio ('fecha')) $errores ['fecha'] = 'Debe de seleccionar una fecha.';
if (!mayorEdad()) $errores ['mayor'] = 'Debe ser mayor a 18 años.';
if (textoVacio ('opcion')) $errores ['opcion'] = 'Escoja una de las opciones.';
if (textoVacio ('select')) $errores ['select'] = 'Seleccione un Campo.';
if (textoVacio ('check')) $errores ['check'] = 'Marque las opciones deseadas';
if (isset($_REQUEST['check']) && !checksCorrectos($_REQUEST['check'])) $errores ['checks'] = 'Debe elegir un mínimo de 1 y un máximo de 3.';

if (textoVacio ('telefono')) $errores ['telefono'] = 'Indique su número de teléfono.';
if (textoVacio ('email')) $errores ['email'] = 'Indique su email.';
if (textoVacio ('pass')) $errores ['pass'] = 'Contraseña requerida.';
if (textoVacio ('archivo')) $errores ['archivo'] = 'Seleccione una imagen.';
}
?>


<main>
    <!-- FORMULARIO -->
<form action="" method="get" enctype="multipart/form-data">
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
        for ($i=1; $i < 6; $i++) { 
            echo '<label for="ch'.$i.'"><input type="checkbox" name="check[]" id="ch'.$i.'" value="check'.$i.'" >Check'.$i.'</label> <br>';  
            // '.recuerdaCheck("check", "check'.$i.'").'
     

        }
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
   <label for="archivo">Subir Documento<input type="file" name="archivo" id="archivo"></label> <br>
   <?php  printerror($errores, 'archivo');  ?>


    <input type="submit" value="Enviar" name="Enviar">

</form>


</main>

<footer>
    <?php
    include("../../../html/footer.html");
    ?>



</footer>

</body>

</html>