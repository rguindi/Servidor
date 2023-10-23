<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulario en Casa</title>
</head>
<body>


    <main>
       
    <?php
 include ("./funcionesformulario.php");
 
  $fallos = array();

if (vacio('nombre') && enviado()) {
    
    $fallos ['nombre'] = "Falta el nombre";
}
if (vacio('apellidos') && enviado()) {
    
    $fallos ['apellidos'] = "Falta el Apellido";
}


?>
    <form method="get">
        <label for="nombre">Nombre: <input type="text" name= "nombre" value=
        <?php
        recordar ("nombre");
        ?>
        
        > </label>      
        <label for="apellidos">Apellidos: <input type="text" name= "apellidos" value=
        <?php
        recordar ("apellidos");
        ?>> </label><br>
        <?php
        echoerror ($fallos, "nombre"); echoerror ($fallos, "apellidos");
        echo "<br>";
        ?>
       <label for="nacimiento">Fecha de nacimiento <input type="date" id="nacimiento" > </label> </br>
       <label for="hombre">Hombre <input type="radio" name="genero" id="hombre"> </label>
       <label for="mujer">Mujer <input type="radio" name="genero" id="mujer"> </label>
       <br>
    <h3>Aficciones</h3>
       <label for="">Futbol<input type="checkbox" id="futbol"></label>
       <label for="">Pesca<input type="checkbox" id="pesca"></label>
       <label for="">Musica<input type="checkbox" id="musica"></label>
       <label for="">Tenis<input type="checkbox" id="tenis"></label>
       <br>
       <br>

       <label for="">Ciudad de nacimiento <select id="ciudad">
        <option value="ninguna">Seleccione una ciudad</option>
        <option value="Zamora">Zamora</option>
        <option value="Valladolid">Valladolid</option>
        <option value="Salamanca">Salamanca</option>
        </select>
        <br>     
        <label for="file">Seleccione un archivo <input type="file"></label>
        
       </select>  </label>
<br>

<button type="submit" value="enviar" name="en" >Enviar</button>
<button type="reset" value="reset" name = "res">Reset</button>




    </form>


    </main>


</body>
</html>