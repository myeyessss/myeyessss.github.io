<?php
// Incluye la conexión a la base de datos
include("conexion.php");
$con = conectar(); // Llama a la función conectar()

// Obtiene el ID de la cita desde el formulario
$idcita = $_POST['idcita'];

// Sanitización y validación para evitar inyecciones SQL
$idcita = mysqli_real_escape_string($con, $idcita);

// Prepara la consulta para eliminar la cita
$sql = "DELETE FROM cita WHERE idcita = $idcita";

// Ejecuta la consulta
$query = mysqli_query($con, $sql);

// Verifica si la eliminación fue exitosa
if ($query) {
    // Redirige a la página de confirmación si la cita fue eliminada
    header("Location: Aviso.html");
    exit(); // Siempre es bueno usar exit después de redirigir
} else {
    // Muestra un mensaje de error si hubo un problema
    echo "Error al eliminar la cita: " . mysqli_error($con);
}

// Cierra la conexión a la base de datos
mysqli_close($con);
?>
