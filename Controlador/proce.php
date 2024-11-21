<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener datos del formulario con sanitización básica
$idservicio = isset($_POST['idservicio']) ? intval($_POST['idservicio']) : 0;
$descripcionservicio = isset($_POST['descripcionservicio']) ? trim($_POST['descripcionservicio']) : '';
$estadoservicio = isset($_POST['estadoservicio']) ? trim($_POST['estadoservicio']) : '';

// Preparar la llamada al procedimiento almacenado
$sql = "CALL actualizarServicio(?, ?, ?)";

// Preparar y verificar la consulta
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación del statement: " . $conn->error);
}

// Asignar los parámetros
$stmt->bind_param('iss', $idservicio, $descripcionservicio, $estadoservicio);

// Ejecutar la consulta y verificar
if ($stmt->execute()) {
    echo "Servicio actualizado con éxito.";
} else {
    echo "Error actualizando el servicio: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
