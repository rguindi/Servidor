<p class="text-bg-secondary  text-center ">

    Bienvenidos a la pagina Login
</p>

<form action="" method="post" class="text-center mt-5">
    <label for="nombre"> Nombre
        <input type="text" name="nombre" id="nombre" value=<?php if(isset($_COOKIE['nombre'])) echo $_COOKIE['nombre'];  ?> >
      <p class="error">  <?php  if(isset($errores)) errores ($errores,'nombre');?></p>
    </label>
    <br>
    <label for="pass">Contraseña
        <input type="password" name="pass" id="pass">
        <p class="error">   <?php if(isset($errores)) errores ($errores,'pass');?> </p>
    </label>
    <br>
    <label for="recuerda">Recuerdame
        <input type="checkbox" name="recuerda" id="recuerda">
    </label>
    <br>


    <p class="error">   <?php if(isset($errores)) errores ($errores,'validado');?> </p>
    <br>
    <input type="submit" name="Login_iniciarSesion"  value="Iniciar">
</form>