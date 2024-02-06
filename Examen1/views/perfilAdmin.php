<table>
    
        <tr>
        <td>Id</td>
        <td>Id Usuario</td>
        <td>Palabra</td>
        <td>Resultado</td>
        <td>Intentos</td>
        <td>Fecha</td>
        </tr>
    

    <?php
    foreach ($estadisticas as $key => $value) {
        echo "<tr>";
        foreach ($value as $key => $value) {
            
            echo "<td>".$value."</td>";
        }

        echo "</tr>";
    }
    ?>
</table>