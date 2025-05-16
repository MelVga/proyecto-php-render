<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require 'conexion.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT * FROM tareas");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} elseif ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $desc = $data['descripcion'] ?? '';
    $stmt = $pdo->prepare("INSERT INTO tareas (descripcion) VALUES (?)");
    $stmt->execute([$desc]);
    echo json_encode(['mensaje' => 'Tarea agregada']);
}
