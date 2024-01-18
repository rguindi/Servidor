<p class="text-bg-warning    text-center ">

    Bienvenidos a la pagina Cambiar Pass
</p>
<form action="" method="post">
    <label for="pass"> Contraseña nueva
        <input type="password"  name="pass" id="pass">

    </label>
    <br>
    <label for="pass2"> Repita contraseña nueva
        <input type="password"  name="pass2" id="pass2" >

    </label>
    <br>
    <?php if(isset($errores)) errores ($errores,'passigual');?>
    
    <br>
   
   
    <input type="submit" name="guardarPass"  value="Guardar Cambios">
</form>