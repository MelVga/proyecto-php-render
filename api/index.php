<?php
header('Content-Type: application/json');
include("conexion.php");

$result = pg_query($conn, "SELECT id, descripcion FROM tareas ORDER BY id DESC");

$tareas = [];

while ($row = pg_fetch_assoc($result)) {
    $tareas[] = $row;
}

echo json_encode($tareas);
?>
