<?php
$host = "dpg-d0jp2ll6ubrc73amgba0-a.oregon-postgres.render.com";
$dbname = "bd_tareas";
$user = "bd_tareas_user";
$password = "UQiXp3T5SUPWPUeI25Vc5JVIJDIDZ7bt";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
