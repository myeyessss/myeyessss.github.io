<?php
    // Incluir el archivo de configuración de la base de datos
    include("../Modelo/pdoconfig.php");

    // Instanciar la clase Database
    $db = new Database();

    // Establecer los encabezados para exportar a Excel
    header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=empleados.xls");

    // Consulta a la base de datos
    $consulta = "SELECT idempleado, numdocempleado, tipodocempleado, nombreempleado, apellidoempleado, direccionempleado, telefonoempleado, estadoempleado, idusuario FROM empleado";

    // Ejecutar la consulta utilizando el método de la clase Database
    $resultado = $db->ejecutarConsulta($consulta);
?>

<meta charset="UTF-8">
<table>
    <caption>Datos Empleados</caption>
    <tr>
        <th>IdEmpleado</th>
        <th>Número de Documento</th>
        <th>Tipo de Documento</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Estado</th>
        <th>IdUsuario</th>
    </tr>
    <?php 
        // Recorrer los resultados y mostrarlos en la tabla
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row["idempleado"];?></td>
                <td><?php echo $row["numdocempleado"];?></td>
                <td><?php echo $row["tipodocempleado"];?></td>
                <td><?php echo $row["nombreempleado"];?></td>
                <td><?php echo $row["apellidoempleado"];?></td>
                <td><?php echo $row["direccionempleado"];?></td>
                <td><?php echo $row["telefonoempleado"];?></td>
                <td><?php echo $row["estadoempleado"];?></td>
                <td><?php echo $row["idusuario"];?></td>
            </tr>
    <?php } ?>
</table>

<?php
    // Cerrar la conexión a la base de datos
    $db->cerrarConexion();
?>
