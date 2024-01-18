<p class="text-bg-success   text-center ">

    Bienvenidos a la pagina Editar User
</p>
<form action="" method="post">
    <label for="cod"> codUsuario
        <input type="text" readonly name="cod" id="cod" value="<?php echo $_SESSION['usuario']->codUsuario?> ">

    </label>
    <br>
    <label for="des"> desUsuario
        <input type="text"  name="des" id="des" value="<?php echo $_SESSION['usuario']->descUsuario?>">

    </label>
    <br>
    <label for="fecha"> Fecha
        <input type="text" readonly name="fecha" id="fecha" value="<?php echo $_SESSION['usuario']->fechaUltimaConexion?>">

    </label>
    <br>
    <label for="perfil"> Perfil
        <input type="text" readonly name="perfil" id="perfil" value="<?php echo $_SESSION['usuario']->perfil?>">
    </label>
    <br>
   
   
    <input type="submit" name="guardar"  value="Guardar Cambios">
</form>