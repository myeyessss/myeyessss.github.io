<?php
include("conexion.php");
$con = conectar(); // Llama a la función conectar()

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del empleado
    $idempleado = $_POST['idempleado'];

    // Preparar la consulta SQL para eliminar
    $sql = "DELETE FROM empleado WHERE idempleado = ?";

    // Usar una declaración preparada
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $idempleado); // "i" indica que es un entero

    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Empleado eliminado exitosamente.";
        } else {
            echo "No se encontró un empleado con ese ID.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $con->close();
} else {
    echo "No se ha enviado el formulario.";
}
?>
