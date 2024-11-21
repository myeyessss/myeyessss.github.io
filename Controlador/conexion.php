<?php
$servername = "localhost";  // Cambia por el nombre del servidor si es necesario
$username = "root";         // Cambia por tu nombre de usuario
$password = "";             // Cambia por tu contraseña
$database = "barbieboutique"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
