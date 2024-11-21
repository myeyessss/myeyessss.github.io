<?php
include("conexion.php");
$con = conectar(); // Asegúrate de que esta función devuelve la conexión correcta

// Obtener datos del formulario
$descripcionservicio = $_POST['descripcionservicio'];
$estadoservicio = $_POST['estadoservicio'];

// Preparar la consulta
$sql = "INSERT INTO servicio (descripcionservicio, estadoservicio) VALUES (?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $descripcionservicio, $estadoservicio);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Servicio agregado correctamente.";
} else {
    echo "Error al agregar el servicio: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$con->close();
?>
