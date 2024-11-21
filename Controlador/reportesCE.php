<?php
    // Incluir el archivo de configuración de la base de datos
    include("../Modelo/pdoconfig.php");

    // Instanciar la clase Database
    $db = new Database();

    // Establecer los encabezados para exportar a Excel
    header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=clientes.xls");

    // Consulta a la base de datos
    $consulta = "SELECT idcliente, numdoccliente, tipodoccliente, nombrecliente, apellidocliente, direccioncliente, telefonocliente, estadocliente, idusuario FROM cliente";

    // Ejecutar la consulta utilizando el método de la clase Database
    $resultado = $db->ejecutarConsulta($consulta);
?>

<meta charset="UTF-8">
<table>
    <caption>Datos Clientes</caption>
    <tr>
        <th>IdCliente</th>
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
                <td><?php echo $row["idcliente"];?></td>
                <td><?php echo $row["numdoccliente"];?></td>
                <td><?php echo $row["tipodoccliente"];?></td>
                <td><?php echo $row["nombrecliente"];?></td>
                <td><?php echo $row["apellidocliente"];?></td>
                <td><?php echo $row["direccioncliente"];?></td>
                <td><?php echo $row["telefonocliente"];?></td>
                <td><?php echo $row["estadocliente"];?></td>
                <td><?php echo $row["idusuario"];?></td>
            </tr>
    <?php } ?>
</table>

<?php
    // Cerrar la conexión a la base de datos
    $db->cerrarConexion();
?>