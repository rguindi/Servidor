<p class="text-bg-secondary  text-center ">

    Bienvenidos a la pagina Login
</p>

<form action="" method="post" class="text-center mt-5">
    <label for="nombre"> Nombre
        <input type="text" name="nombre" id="nombre">
      <p class="error">  <?php  if(isset($errores)) errores ($errores,'nombre');?></p>
    </label>
    <br>
    <label for="pass">Contraseña
        <input type="password" name="pass" id="pass">
        <p class="error">   <?php if(isset($errores)) errores ($errores,'pass');?> </p>
    </label>
    <p class="error">   <?php if(isset($errores)) errores ($errores,'validado');?> </p>
    <br>
    <input type="submit" name="Login_iniciarSesion"  value="Iniciar">
    <input type="submit" name="registrar"  value="registro">
</form>