<?php
header('Content-Type: application/json');
include("conexion.php");

// Verificar conexión
if (!$conn) {
    echo json_encode(["success" => false, "message" => "Error en la conexión a la base de datos"]);
    exit;
}

// Leer los datos JSON enviados desde el cliente
$data = json_decode(file_get_contents('php://input'), true);

// Validar que se envió la descripción
if (!isset($data['descripcion']) || trim($data['descripcion']) === '') {
    echo json_encode(["success" => false, "message" => "Descripción vacía"]);
    exit;
}

// Escapar y limpiar el texto
$descripcion = pg_escape_string($conn, trim($data['descripcion']));

// Insertar en la base de datos
$query = "INSERT INTO tareas (descripcion) VALUES ('$descripcion')";
$result = pg_query($conn, $query);

if ($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error al agregar tarea"]);
}
?>

