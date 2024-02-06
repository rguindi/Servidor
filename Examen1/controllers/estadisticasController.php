<?php
$estadisticas = getApi('estadisticas/'.$_SESSION['usuario']->id_usuario);
$estadisticas = json_decode($estadisticas, true);

?>