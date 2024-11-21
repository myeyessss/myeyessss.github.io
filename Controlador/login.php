<?php
session_start();

// Verificar si los datos están presentes
if (!isset($_POST['correousuario']) || !isset($_POST['passwordusuario'])) {
    die("Datos faltantes");
}

$usuario = $_POST['correousuario'];
$contrasena = $_POST['passwordusuario'];

// Conectar a la base de datos usando PDO
require_once '../Modelo/pdoconfig.php';
$db = new Database();
$conexion = $db->conexion;

// Preparar la consulta
$stmt = $conexion->prepare("SELECT * FROM usuario WHERE correousuario = ? AND passwordusuario = ?");
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar el resultado
if ($filas = $resultado->fetch_assoc()) {
    $_SESSION['correousuario'] = $usuario;

    if ($filas['idrol'] == 1) {
        // Redirigir a un archivo local cuando el rol sea 1
        header("Location: ../Vista/home/admin.html"); 
    } elseif ($filas['idrol'] == 2) {
        echo "<script>
            window.location.href='../Vista/home/cliente.html';
        </script>";
    }
} else {
    echo "Usuario o contraseña incorrectos.";
}

$stmt->close();
$db->cerrarConexion();
?>
