
<div class="container">
    <form action="" method="get">

        <?php

for ($i=1; $i<=50; $i++){
    echo "<input type='checkbox' value = ".$i." name = 'numeros[]'";

    if ($numeros!=null){
        if (in_array($i,$numeros)){
            echo "checked";
        }
    }
    
    echo">".$i."</input>";
    if ($i%7==0){
        echo "<br>";
    }
}

?>
<br>
<input type="submit" name="guardar"></input>
<input type="submit" name="Modificar" value="Modificar"></input>
<br>
<?php
if (isset($errores)) errores ($errores,'numeros');
echo "<br>";
echo "Aciertos: ".$aciertos."<br>";
?>

</form>
</div>