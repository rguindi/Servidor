

<?php




        //IMPRIMIR EN   TABLA

        $tabla = array ();

        for ($i=1; $i<=10; $i++) { 
            $tabla [$i] = array();

            for ($j=1; $j <=10 ; $j++) { 
                $tabla [$i][$j] = $i*$j;

            }
        }

        


?>

<table border = "1">
    <thead>
        <?php
        echo "<th> Tabla</th>";
        foreach ($tabla as $key => $value) {
            echo "<th> $key</th>";
        }
        ?>
    </thead>
    <tbody>
        <tr>
        <?php
       
        foreach ($tabla as $key => $value) {
            echo "<tr>";
                echo "<td>$key</td>";
                foreach ($value as $resultado) {
                    echo "<td>$resultado</td>";
                }

            echo "</tr>";
        }
        ?>
        </tr>
    </tbody>
</table>
    
</body>
</html>