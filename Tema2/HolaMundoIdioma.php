<?php
  
$mensaje_es = "Bienvenidos a mi pagina web.";
$mensaje_en = "Welcome to my website.";
$mensaje_de = "Willkommen auf meiner Website.";
$mensaje_pt = "Bem-vindo ao meu site.";
$mensaje_fr = "Bienvenue sur mon site web.";

$lg = "mensaje_" .  $_GET['idioma'];

print $$lg;

?>