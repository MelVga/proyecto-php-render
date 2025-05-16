<?php
$host = getenv("dpg-d0jp2ll6ubrc73amgba0-a.oregon-postgres.render.com");
$dbname = getenv("bd_tareas");
$user = getenv("bd_tareas_user");
$password = getenv("UQiXp3T5SUPWPUeI25Vc5JVIJDIDZ7bt");

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
