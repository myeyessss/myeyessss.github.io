<?php
    // Incluir el archivo de configuración de la base de datos
    include("../Modelo/pdoconfig.php");

    // Instanciar la clase Database
    $db = new Database();

    // Establecer los encabezados para exportar a Excel
    header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=servicios.xls");

    // Consulta a la base de datos
    $consulta = "SELECT idservicio, descripcionservicio, estadoservicio FROM servicio";

    // Ejecutar la consulta utilizando el método de la clase Database
    $resultado = $db->ejecutarConsulta($consulta);
?>

<meta charset="UTF-8">
<table>
    <caption>Datos Servicios</caption>
    <tr>
        <th>IdServicio</th>
        <th>Descripción Servicio</th>
        <th>Estado Servicio</th>
    </tr>
    <?php 
        // Recorrer los resultados y mostrarlos en la tabla
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row["idservicio"];?></td>
                <td><?php echo $row["descripcionservicio"];?></td>
                <td><?php echo $row["estadoservicio"];?></td>
            </tr>
    <?php } ?>
</table>

<?php
    // Cerrar la conexión a la base de datos
    $db->cerrarConexion();
?>
