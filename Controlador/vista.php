<?php
include 'conexion.php';

// Consulta a la vista
$sql = "SELECT * FROM VistaEmpleadosYServicios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar datos en una tabla HTML
    echo "<table border='1'>";
    echo "<tr><th>ID Empleado</th><th>Nombre Empleado</th><th>Apellido Empleado</th><th>Descripción Servicio</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idempleado"] . "</td>";
        echo "<td>" . $row["nombreempleado"] . "</td>";
        echo "<td>" . $row["apellidoempleado"] . "</td>";
        echo "<td>" . $row["descripcionservicio"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados";
}

// Cerrar conexión
$conn->close();
?>