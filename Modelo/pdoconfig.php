<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $nombreBD = "barbieboutique";
    public $conexion;

    public function __construct() {
        // Intentar conectar a la base de datos
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->nombreBD);

        // Verificar si hubo un error en la conexión
        if ($this->conexion->connect_error) {
            // Mostrar el error y detener el script si la conexión falla
            echo "Error de conexión: " . $this->conexion->connect_error;
            exit(); // Terminar el script
        }
    }

    public function ejecutarConsulta($consulta) {
        // Ejecutar la consulta
        $resultado = $this->conexion->query($consulta);

        // Verificar si hubo un error en la ejecución de la consulta
        if (!$resultado) {
            // Mostrar el error y detener el script si la consulta falla
            echo "Error en la consulta: " . $this->conexion->error;
            exit(); // Terminar el script
        }

        // Retornar el resultado de la consulta
        return $resultado;
    }

    public function cerrarConexion() {
        // Cerrar la conexión a la base de datos
        $this->conexion->close();
    }
}
?>