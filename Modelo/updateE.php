<?php
include("conexion.php");
$con = conectar(); // Llama a la función conectar()

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $idempleado = $_POST['idempleado'];
    $numdocempleado = $_POST['numdocempleado'];
    $tipodocempleado = $_POST['tipodocempleado'];
    $nombreempleado = $_POST['nombreempleado'];
    $apellidoempleado = $_POST['apellidoempleado'];
    $direccionempleado = $_POST['direccionempleado'];
    $telefonoempleado = $_POST['telefonoempleado'];
    $estadoempleado = $_POST['estadoempleado'];
    $idusuario = $_POST['idusuario'];

    // Preparar la consulta SQL para actualizar
    $sql = "UPDATE empleado SET 
                numdocempleado = ?, 
                tipodocempleado = ?, 
                nombreempleado = ?, 
                apellidoempleado = ?, 
                direccionempleado = ?, 
                telefonoempleado = ?, 
                estadoempleado = ?, 
                idusuario = ? 
            WHERE idempleado = ?";

    // Usar una declaración preparada
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssssi", $numdocempleado, $tipodocempleado, $nombreempleado, $apellidoempleado, $direccionempleado, $telefonoempleado, $estadoempleado, $idusuario, $idempleado);

    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        echo "Empleado actualizado exitosamente.";
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
