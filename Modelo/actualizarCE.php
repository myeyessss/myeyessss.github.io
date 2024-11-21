<?php
include("conexion.php");
$con = conectar();

// Obtener datos del formulario
$idcliente = $_POST['idcliente'];
$numdoccliente = $_POST['numdoccliente'];
$tipodoccliente = $_POST['tipodoccliente'];
$nombrecliente = $_POST['nombrecliente'];
$apellidocliente = $_POST['apellidocliente'];
$direccioncliente = $_POST['direccioncliente'];
$telefonocliente = $_POST['telefonocliente'];
$estadocliente = $_POST['estadocliente'];

// Escapar variables para evitar SQL Injection
$idcliente = mysqli_real_escape_string($con, $idcliente);
$numdoccliente = mysqli_real_escape_string($con, $numdoccliente);
$tipodoccliente = mysqli_real_escape_string($con, $tipodoccliente);
$nombrecliente = mysqli_real_escape_string($con, $nombrecliente);
$apellidocliente = mysqli_real_escape_string($con, $apellidocliente);
$direccioncliente = mysqli_real_escape_string($con, $direccioncliente);
$telefonocliente = mysqli_real_escape_string($con, $telefonocliente);
$estadocliente = mysqli_real_escape_string($con, $estadocliente);

// Consulta de actualización
$sql = "UPDATE cliente SET 
        numdoccliente='$numdoccliente', 
        tipodoccliente='$tipodoccliente', 
        nombrecliente='$nombrecliente', 
        apellidocliente='$apellidocliente', 
        direccioncliente='$direccioncliente', 
        telefonocliente='$telefonocliente', 
        estadocliente='$estadocliente' 
        WHERE idcliente='$idcliente'";

// Ejecutar la consulta
$query = mysqli_query($con, $sql);

if ($query) {
    echo "Cliente actualizado correctamente";
    header("Location: Aviso.html"); // Redirigir a una página de éxito
} else {
    echo "Error al actualizar el cliente: " . mysqli_error($con);
}
?>
