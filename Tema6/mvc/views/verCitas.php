<p class="text-bg-danger text-center ">

    Bienvenidos a la pagina Ver Citas
</p>

<?php
$citas = array();
 $citas = CitaDAO::FindByPaciente($_SESSION['usuario']);
?>
<table>
    <tr>
        <th>Id</th>
        <th>Especialista</th>
        <th>Motivo</th>
        <th>Fecha</th>
        <th>Paciente</th>
    </tr>
<?php
foreach ($citas as $cita) {
    echo "<tr>";
    echo '<form action="" method="post">';
    echo '<input type="hidden" name="id" value="'.$cita->id.'">';
    echo "<td>".$cita->id."</td>";
    echo "<td>".$cita->especialista."</td>";
    echo "<td>".$cita->motivo."</td>";
    echo "<td>".$cita->fecha."</td>";
    echo "<td>".$cita->paciente."</td>";
    echo "<td><input type='submit' name='borrar' value='Borrar'></td>";
    echo "<td><input type='submit' name='modificar' value='Modificar'></td>";
    echo "</form>";
    echo "</tr>";
}
?>
</table>


