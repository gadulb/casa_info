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
    <link rel=stylesheet type="text/css" href="style.css">
    <title>INFORMAÇÕES DA CASA</title>
</head>
<body>
    <div>
        <img src="logo.png" width="200" alt="Casa das Luzes"/>
    </div>
    <div class="container col-2">
        <div class="column">
            <h1>Casa 1</h1>
            <p>Temperatura: <?php echo $temperatura; ?></p>
            <?php if ($luz_estado == "Ligada") { ?>
                <a href="luz.php?estado=0">Desligar Luz</a>
            <?php } else { ?>
                <a href="luz.php?estado=1">Ligar Luz</a>
            <?php } ?>
            <p>Luz: <?php echo $luz_estado; ?></p>
        <div>
        </div class="column">
            <h1>Casa 2</h1>
        <div>
        <div class="column">
            <h1>Casa 3</h1>
        <div>
        </div class="column">
            <h1>Casa 4</h1>
        <div>
    </div>
    <h1>Monitoramento da Casa</h1>
    <p>Luz: <?php echo $luz_estado; ?></p>
    <p>Temperatura: <?php echo $temperatura; ?>°C</p>
</body>
</html>