<?php
include("conexion.php");
$con = conectar();

$fechacita = $_POST['fechacita'];
$horacita = $_POST['horacita'];
$estadocita = $_POST['estadocita'];
$idempleado = $_POST['idempleado'];
$idcliente = $_POST['idcliente'];
$idservicio = $_POST['idservicio'];

// Asegúrate de hacer una validación y sanitización de datos aquí

$sql = "INSERT INTO cita (fechacita, horacita, estadocita, idempleado, idcliente, idservicio)
        VALUES ('$fechacita', '$horacita', '$estadocita', $idempleado, $idcliente, $idservicio)";

$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: Aviso.html"); // Redirige a una página de confirmación
} else {
    echo "Error al insertar la cita: " . mysqli_error($con);
}
?>
