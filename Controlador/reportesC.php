<?php
    // Incluir el archivo de configuración de la base de datos
    include("../Modelo/pdoconfig.php");

    // Instanciar la clase Database
    $db = new Database();

    // Establecer los encabezados para exportar a Excel
    header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=citas.xls");

    // Consulta a la base de datos
    $consulta = "SELECT idcita, fechacita, horacita, estadocita, idempleado, idcliente, idservicio FROM cita";

    // Ejecutar la consulta utilizando el método de la clase Database
    $resultado = $db->ejecutarConsulta($consulta);
?>

<meta charset="UTF-8">
<table>
    <caption>Datos Citas</caption>
    <tr>
        <th>IdCita</th>
        <th>Fecha Cita</th>
        <th>Hora Cita</th>
        <th>Estado Cita</th>
        <th>Id Empleado</th>
        <th>Id Cliente</th>
        <th>Id Servicio</th>
    </tr>
    <?php 
        // Recorrer los resultados y mostrarlos en la tabla
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row["idcita"];?></td>
                <td><?php echo $row["fechacita"];?></td>
                <td><?php echo $row["horacita"];?></td>
                <td><?php echo $row["estadocita"];?></td>
                <td><?php echo $row["idempleado"];?></td>
                <td><?php echo $row["idcliente"];?></td>
                <td><?php echo $row["idservicio"];?></td>
            </tr>
    <?php } ?>
</table>

<?php
    // Cerrar la conexión a la base de datos
    $db->cerrarConexion();
?>
