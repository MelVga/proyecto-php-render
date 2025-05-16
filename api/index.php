<?php
require_once 'conexion.php';

$query = "SELECT id, descripcion FROM tareas";
$result = pg_query($conn, $query);

$tareas = [];

while ($fila = pg_fetch_assoc($result)) {
    $tareas[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($tareas);
?>
