<?php
/// PHP no entiende json, por ello, hay que "traducirle" json a un array asociativo
$_POST = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {
    $nombre = $_POST["nombre"];
    // Conectar a la base de datos MySQLxº
    $conexion = mysqli_connect('localhost', 'root', '', 'axios_php');
    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }
    // Insertar el nombre en la tabla
    $sql = "INSERT INTO usuarios (nombre) VALUES ('$nombre')";

    if (mysqli_query($conexion, $sql)) {
        $query = "SELECT nombre from usuarios";
        $resultado = mysqli_query($conexion, $query);
        $nombres = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $nombres[] = $row['nombre'];
        };

        echo json_encode($nombres);

    } else {
        echo "Error al guardar el nombre: " . mysqli_error($conexion);
    }
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Fallo";
}
?>