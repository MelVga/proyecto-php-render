<?php
$host = 'dpg-d0jp2ll6ubrc73amgba0-a.oregon-postgres.render.com';
$db   = 'bd_tareas';
$user = 'bd_tareas_user';
$pass = 'UQiXp3T5SUPWPUeI25Vc5JVIJDIDZ7bt';
$port = '5432';

$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

