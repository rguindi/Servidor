<?php
header('Content-Type: text/xml');
header("Content-Disposition: attachment; filename=contactos.xml");
readfile ('./contactos.xml');
exit;
?>