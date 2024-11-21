<?php
include("conexion.php");
$con = conectar(); // Asegúrate de que esta función devuelve la conexión correcta

// Obtener datos del formulario
$idservicio = $_POST['idservicio'];
$descripcionservicio = $_POST['descripcionservicio'];
$estadoservicio = $_POST['estadoservicio'];

// Preparar la consulta
$sql = "UPDATE servicio SET descripcionservicio=?, estadoservicio=? WHERE idservicio=?";
$stmt = $con->prepare($sql); // Usa $con en lugar de $conn
$stmt->bind_param("ssi", $descripcionservicio, $estadoservicio, $idservicio);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Servicio actualizado correctamente.";
} else {
    echo "Error al actualizar el servicio: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$con->close(); // Asegúrate de cerrar la conexión correcta
?>
