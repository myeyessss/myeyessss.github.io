<?php
include("conexion.php");
$con = conectar(); // Asegúrate de que esta función devuelve la conexión correcta

// Obtener el ID del servicio a eliminar
$idservicio = $_POST['idservicio'];

// Preparar la consulta
$sql = "DELETE FROM servicio WHERE idservicio=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $idservicio);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Servicio eliminado correctamente.";
} else {
    echo "Error al eliminar el servicio: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$con->close();
?>
