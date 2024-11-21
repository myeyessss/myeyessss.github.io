<?php
include("conexion.php");
$con = conectar(); // Llama a la función conectar()

// Verifica si se ha enviado el ID del cliente
if (isset($_POST['idcliente'])) {
    $idcliente = $_POST['idcliente'];

    // Prepara la consulta para eliminar el cliente
    $query = "DELETE FROM cliente WHERE idcliente = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $idcliente);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        echo "Cliente eliminado con éxito.";
    } else {
        echo "Error al eliminar el cliente: " . $stmt->error;
    }

    // Cierra la declaración y la conexión
    $stmt->close();
} else {
    echo "No se recibió el ID del cliente.";
}

$con->close();
?>
