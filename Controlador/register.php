<?php
session_start();

// Verificar si los datos están presentes
if (!isset($_POST['numdoccliente']) || !isset($_POST['tipodoccliente']) || !isset($_POST['nombrecliente']) || 
    !isset($_POST['apellidocliente']) || !isset($_POST['direccioncliente']) || !isset($_POST['telefonocliente'])) {
    die("Datos faltantes");
}

// Obtener datos del formulario
$numdoccliente = $_POST['numdoccliente'];
$tipodoccliente = $_POST['tipodoccliente'];
$nombrecliente = $_POST['nombrecliente'];
$apellidocliente = $_POST['apellidocliente'];
$direccioncliente = $_POST['direccioncliente'];
$telefonocliente = $_POST['telefonocliente'];
$estadocliente = "activo"; // o el estado que desees
$idusuario = 2; // Cambiar según la lógica de tu aplicación

// Conectar a la base de datos usando mysqli
require_once '../Modelo/pdoconfig.php';
$db = new Database();

try {
    // Preparar la consulta
    $sql = "INSERT INTO cliente (numdoccliente, tipodoccliente, nombrecliente, apellidocliente, direccioncliente, telefonocliente, estadocliente, idusuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar la sentencia
    $stmt = $db->conexion->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bind_param("sssssisi", $numdoccliente, $tipodoccliente, $nombrecliente, $apellidocliente, $direccioncliente, $telefonocliente, $estadocliente, $idusuario);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    echo "Te registraste correctamente";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$stmt->close();
$db->cerrarConexion();
?>
