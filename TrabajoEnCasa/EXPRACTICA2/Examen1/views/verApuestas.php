
<div class="container">


<h4>Apuestas</h4>
        <?php

foreach ($apuestas as $apuesta) {
    echo "ID: " . $apuesta->id . "<br>USUARIO: " . $apuesta->id_usuario . "<br>NUMERO: " . $apuesta->numero . "<br>FECHA: " . $apuesta->fecha . "<br><br>";
}
?>
<form action="" method="post">

    <input type="submit" name="Generar" value="Generar Sorteo">
</form>

</div>

<div class="container">


<h4>Ultimo Sorteo</h4>
        <?php

echo "ID: " . $sorteo->id . "<br>NUMEROS GANADORES: " . $sorteo->numero_sorteo . "<br>FECHA: " . $sorteo->fecha . "<br><br>";
?>



</div>

