<?php
    // Incluir el archivo de configuración de la base de datos
    include("../Modelo/pdoconfig.php");

    // Instanciar la clase Database
    $db = new Database();

    // Establecer los encabezados para exportar a Excel
    header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=usuarios.xls");

    // Consulta a la base de datos
    $consulta = "SELECT idusuario, correousuario, estadousuario, idrol FROM usuario";

    // Ejecutar la consulta utilizando el método de la clase Database
    $resultado = $db->ejecutarConsulta($consulta);
?>

<meta charset="UTF-8">
<table>
    <caption>Datos Usuarios</caption>
    <tr>
        <th>IdUsuario</th>
        <th>Correo Usuario</th>
        <th>Estado Usuario</th>
        <th>Id Rol</th>
    </tr>
    <?php 
        // Recorrer los resultados y mostrarlos en la tabla
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $row["idusuario"];?></td>
                <td><?php echo $row["correousuario"];?></td>
                <td><?php echo $row["estadousuario"];?></td>
                <td><?php echo $row["idrol"];?></td>
            </tr>
    <?php } ?>
</table>

<?php
    // Cerrar la conexión a la base de datos
    $db->cerrarConexion();
?>
