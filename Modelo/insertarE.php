<?php
include("conexion.php");
$con = conectar(); // Llama a la función conectar()

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $numdocempleado = $_POST['numdocempleado'];
    $tipodocempleado = $_POST['tipodocempleado'];
    $nombreempleado = $_POST['nombreempleado'];
    $apellidoempleado = $_POST['apellidoempleado'];
    $direccionempleado = $_POST['direccionempleado'];
    $telefonoempleado = $_POST['telefonoempleado'];
    $estadoempleado = $_POST['estadoempleado'];
    $idusuario = $_POST['idusuario'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO empleado (numdocempleado, tipodocempleado, nombreempleado, apellidoempleado, direccionempleado, telefonoempleado, estadoempleado, idusuario) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Usar una declaración preparada
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssi", $numdocempleado, $tipodocempleado, $nombreempleado, $apellidoempleado, $direccionempleado, $telefonoempleado, $estadoempleado, $idusuario);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Empleado agregado exitosamente.";
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
