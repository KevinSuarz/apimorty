<?php
$conexion = mysqli_connect('localhost', 'root', '', 'axios_php');

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$query = "SELECT nombre FROM usuarios";
$resultado = mysqli_query($conexion, $query);
$nombres = array();

while ($row = mysqli_fetch_assoc($resultado)) {
    $nombres[] = $row['nombre'];
}

echo json_encode($nombres);

mysqli_close($conexion);
?>
