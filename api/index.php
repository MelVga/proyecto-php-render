<?php
header('Content-Type: application/json');
include("conexion.php");

if (!$conn) {
    echo json_encode(["error" => "Error en la conexión a la base de datos"]);
    exit;
}

$result = pg_query($conn, "SELECT id, descripcion FROM tareas ORDER BY id DESC");

$tareas = [];

if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $tareas[] = $row;
    }
    echo json_encode($tareas);
} else {
    echo json_encode(["error" => "Error al obtener tareas"]);
}
