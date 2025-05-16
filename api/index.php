<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $descripcion = $input['descripcion'] ?? '';
    if ($descripcion !== '') {
        $stmt = $pdo->prepare("INSERT INTO tareas (descripcion) VALUES (:descripcion)");
        $stmt->execute(['descripcion' => $descripcion]);
    }
    echo json_encode(['status' => 'ok']);
    exit;
}

$stmt = $pdo->query("SELECT * FROM tareas ORDER BY id DESC");
$tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($tareas);
