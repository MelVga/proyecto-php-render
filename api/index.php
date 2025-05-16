<?php
header('Content-Type: application/json');
include("conexion.php");

// Verifica que la conexión está lista
if (!$conn) {
    echo json_encode(["error" => "Error en la conexión a la base de datos"]);
    exit;
}

$result = pg_query($conn, "SELECT id, descripcion FROM tareas ORDER BY id DESC");

if (!$result) {
    echo json_encode(["error" => "Error al consultar tareas"]);
    exit;
}

$tareas = [];

while ($row = pg_fetch_assoc($result)) {
    $tareas[] = $row;
}

echo json_encode($tareas);
?>
