<?php
include("conexion.php");
$con = conectar(); // Conectar a la base de datos

// Recibir datos del formulario
$idcita = $_POST['idcita'];
$fechacita = $_POST['fechacita'];
$horacita = $_POST['horacita'];
$estadocita = $_POST['estadocita'];
$idempleado = $_POST['idempleado'];
$idcliente = $_POST['idcliente'];
$idservicio = $_POST['idservicio'];

// Actualizar la cita en la base de datos
$sql = "UPDATE cita SET 
            fechacita = ?, 
            horacita = ?, 
            estadocita = ?, 
            idempleado = ?, 
            idcliente = ?, 
            idservicio = ? 
        WHERE idcita = ?";

$stmt = $con->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("sssiiii", $fechacita, $horacita, $estadocita, $idempleado, $idcliente, $idservicio, $idcita);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: Aviso.html");
        exit();
    } else {
        echo "Error al actualizar la cita: " . $stmt->error;
    }
} else {
    echo "Error al preparar la consulta: " . $con->error;
}

// Cerrar la conexión
$stmt->close();
$con->close();
?>
