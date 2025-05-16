<?php
include 'conexion.php';

$sql = "SELECT id, descripcion FROM tareas";
$result = pg_query($conn, $sql);

if (!$result) {
  echo "<p>Error al consultar las tareas.</p>";
  exit;
}

echo "<table>";
echo "<thead><tr><th>ID</th><th>Descripción</th></tr></thead><tbody>";
while ($row = pg_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td data-label='ID'>" . htmlspecialchars($row['id']) . "</td>";
  echo "<td data-label='Descripción'>" . htmlspecialchars($row['descripcion']) . "</td>";
  echo "</tr>";
}
echo "</tbody></table>";

pg_close($conn);
?>
