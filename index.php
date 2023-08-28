<?php
require_once('db_connection.php');

// Consulta para obter os dados mais recentes do Arduino
$query = "SELECT luz_estado, temperatura FROM arduino_data ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);

$luz_estado = "Desligada";
$temperatura = "N/A";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $luz_estado = ($row['luz_estado'] == 1) ? "Ligada" : "Desligada";
    $temperatura = $row['temperatura'];
}
?>

<!DOCTYPE html>
<html lang="pt-be">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORMAÇÕES DA CASA</title>
</head>
<body>
    <h1>Monitoramento da Casa</h1>
    <p>Luz: <?php echo $luz_estado; ?></p>
    <p>Temperatura: <?php echo $temperatura; ?>°C</p>
</body>
</html>