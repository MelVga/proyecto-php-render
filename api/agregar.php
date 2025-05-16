<?php
header('Content-Type: application/json');
include("conexion.php");

// Leer JSON enviado
$data = json_decode(file_get_contents('php://input'), true);

if (!$conn) {
    echo json_encode(["success" => false, "message" => "Error en la conexión a la base de datos"]);
    exit;
}

if (!isset($data['descripcion']) || trim($data['descripcion']) === '') {
    echo json_encode(["success" => false, "message" => "Descripción vacía"]);
    exit;
}

$descripcion = pg_escape_string(trim($data['descripcion']));

// Inserta tarea
$result = pg_query($conn, "INSERT INTO tareas (descripcion) VALUES ('$descripcion')");

if ($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error al agregar tarea"]);
}
?>
