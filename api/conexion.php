<?php
$host = "dpg-d0jp2ll6ubrc73amgba0-a.oregon-postgres.render.com";
$port = "5432";
$dbname = "bd_tareas";
$user = "bd_tareas_user";
$password = "UQiXp3T5SUPWPUeI25Vc5JVIJDIDZ7bt";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require");

if (!$conn) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión: " . pg_last_error()]);
    exit();
}
?>
