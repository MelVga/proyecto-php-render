<?php
$host = $_ENV["DB_HOST"];
$db   = $_ENV["DB_NAME"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASS"];
$port = $_ENV["DB_PORT"];

try {
    $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conexion->query("SELECT * FROM tareas");
    $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tareas);

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
