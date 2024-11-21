<?php
// Configuración de la conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbieboutique";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL actualizada
$sql = "SELECT 
            c.nombrecliente AS nombre_cliente,
            c.apellidocliente AS apellido_cliente,
            ci.fechacita AS fecha_cita,
            ci.horacita AS hora_cita,
            e.nombreempleado AS nombre_empleado,
            e.apellidoempleado AS apellido_empleado
        FROM 
            cita ci
        JOIN 
            cliente c ON ci.idcliente = c.idcliente
        JOIN 
            empleado e ON ci.idempleado = e.idempleado;";

// Ejecutar consulta
$result = $conn->query($sql);

// Verificar si hay errores en la consulta
if ($result === FALSE) {
    die("Error en la consulta: " . $conn->error);
}

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Imprimir los resultados en una tabla HTML
    echo "<table border='1'>
            <tr>
                <th>Nombre Cliente</th>
                <th>Apellido Cliente</th>
                <th>Fecha de Cita</th>
                <th>Hora de Cita</th>
                <th>Nombre Empleado</th>
                <th>Apellido Empleado</th>
            </tr>";

    // Mostrar cada fila de resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["nombre_cliente"]) . "</td>
                <td>" . htmlspecialchars($row["apellido_cliente"]) . "</td>
                <td>" . htmlspecialchars($row["fecha_cita"]) . "</td>
                <td>" . htmlspecialchars($row["hora_cita"]) . "</td>
                <td>" . htmlspecialchars($row["nombre_empleado"]) . "</td>
                <td>" . htmlspecialchars($row["apellido_empleado"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>