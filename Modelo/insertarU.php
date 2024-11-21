<?php
include("conexion.php");
$con = conectar(); // Asegúrate de que esta función devuelve la conexión correcta

// Obtener datos del formulario
$numdoc = $_POST['numdoc'];
$tipodoc = $_POST['tipodoc'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$estado = $_POST['estado'];
$idrol = $_POST['idrol'];

// 1. Insertar en la tabla usuario
$sqlUsuario = "INSERT INTO usuario (correousuario, passwordusuario, estadousuario, idrol) VALUES (?, ?, ?, ?)";
$stmtUsuario = $con->prepare($sqlUsuario);
$correousuario = ""; // Define un valor válido para el correo
$passwordusuario = ""; // Define un valor válido para la contraseña
$estadousuario = "activo"; // O el estado que quieras asignar

$stmtUsuario->bind_param("sssi", $correousuario, $passwordusuario, $estadousuario, $idrol);
$stmtUsuario->execute();
$idusuario = $stmtUsuario->insert_id; // Obtiene el ID del nuevo usuario

// 2. Verificar el rol y preparar la consulta adecuada
if ($idrol == 1) { // ID del rol para clientes
    // Preparar la consulta para insertar cliente
    $sqlCliente = "INSERT INTO cliente (numdoccliente, tipodoccliente, nombrecliente, apellidocliente, direccioncliente, telefonocliente, estadocliente, idusuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtCliente = $con->prepare($sqlCliente);
    $stmtCliente->bind_param("sssssisi", $numdoc, $tipodoc, $nombre, $apellido, $direccion, $telefono, $estado, $idusuario);
    
} elseif ($idrol == 2) { // ID del rol para empleados
    // Preparar la consulta para insertar empleado
    $sqlEmpleado = "INSERT INTO empleado (numdocempleado, tipodocempleado, nombreempleado, apellidoempleado, direccionempleado, telefonoempleado, estadoempleado, idusuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtEmpleado = $con->prepare($sqlEmpleado);
    $stmtEmpleado->bind_param("sssssisi", $numdoc, $tipodoc, $nombre, $apellido, $direccion, $telefono, $estado, $idusuario);
} else {
    die("Rol no válido.");
}

// Ejecutar la consulta correspondiente
if (isset($stmtCliente) && $stmtCliente) {
    if ($stmtCliente->execute()) {
        echo "Cliente agregado correctamente.";
    } else {
        echo "Error al agregar el cliente: " . $stmtCliente->error;
    }
} elseif (isset($stmtEmpleado) && $stmtEmpleado) {
    if ($stmtEmpleado->execute()) {
        echo "Empleado agregado correctamente.";
    } else {
        echo "Error al agregar el empleado: " . $stmtEmpleado->error;
    }
}

// Cerrar conexiones
if (isset($stmtUsuario)) $stmtUsuario->close();
if (isset($stmtCliente)) $stmtCliente->close();
if (isset($stmtEmpleado)) $stmtEmpleado->close();
$con->close();
?>
