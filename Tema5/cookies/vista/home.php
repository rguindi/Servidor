<?php
require_once '../funciones/funcionesBD.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panaderia</title>
</head>
<body>
    <table>
        <th>
            <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Ver</th>
            </thead>
            <tbody>
               <?php $arrayProductos = findAll();   
               foreach ($arrayProductos as $producto) {
                   echo "<tr>";
                   echo "<td>".$producto['nombre']."</td>";
                   echo "<td>".substr($producto['descripcion'], 0, 20)."</td>";
                   echo "<td><img src='../".$producto['baja']."'></td>";
                   echo "<td><a href='verproducto.php?id=".$producto['codigo']."' >Ver</td>";
                   echo "</tr>";
               }
               ?>
            </tbody>
        </th>
    </table>

    <div>
        <h1>Ultimos Visitados</h1>

        <?php
        if (!empty($_COOKIE)){
            $count = 1;

            $invertido = array_reverse($_COOKIE);
          foreach ($invertido as $id) {
              $producto = findById($id);
              echo "<h2>".$producto['nombre']."</h2>";
              echo "<p>".$producto['descripcion']."</p>";
              echo "<td><a href='verproducto.php?id=".$producto['codigo']."' ><img src='../".$producto['alta']."'></td>";
          $count++;
          if ($count == 4){
              break;
            }
            }
        }else{
        echo "No hay productos visitados";
        }
        ?>
    </div>
    
</body>
</html>