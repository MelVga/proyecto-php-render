<?php
header('Content-Type: application/json');
include("conexion.php");

$input = json_decode(file_get_contents("php://input"), true);
$descripcion = $input["descripcion"] ?? "";

if ($descripcion !== "") {
    $result = pg_query_params($conn, "INSERT INTO tareas (descripcion) VALUES ($1)", [$descripcion]);
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "Descripción vacía"]);
}
?>
