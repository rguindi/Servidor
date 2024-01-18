<p class="text-bg-danger  text-center ">

    Bienvenidos a la pagina Login
</p>


<form action="" method="post">
    <label for="nombre"> Codigo o nombre
        <input type="text" name="nombre" id="nombre">
        <p class="error">  <?php if (isset($errores)) errores($errores, 'nombre'); ?></p>
    </label>
    <br>
    <label for="pass">Contraseña
        <input type="password" name="pass" id="pass">
        <p class="error">   <?php if (isset($errores)) errores($errores, 'pass'); ?> </p>
    </label>
    <label for="desc">Descripcion
        <input type="text" name="desc" id="desc">
       
    </label>
    <label for="desc">Perfil
        <input type="text" name="perfil" id="perfil">
     
    </label>

    <p class="error">   <?php if (isset($errores)) errores($errores, 'validado'); ?> </p>
    <br>
    <input type="submit" name="registro" value="registro">
</form>

