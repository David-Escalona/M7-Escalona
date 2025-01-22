<?php
// Obtener datos enviados desde el formulario de index.php
$jugadores = isset($_POST['jugadores']) ? (int)$_POST['jugadores'] : 1;
$cartas = isset($_POST['cartas']) ? (int)$_POST['cartas'] : 1;

// Verificación de la existencia de los datos
if ($jugadores < 1 || $jugadores > 5 || $cartas < 1 || $cartas > 7) {
    echo "Los valores enviados no son válidos. Por favor, vuelve a intentarlo.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <title>Confirmación - UNO</title>

    <style>
        h1, h5 {
            font-family: Bungee Spice;
        }

        .container {
            margin-top: 50px;
        }

        .btn-group {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    
    <header>
        <h1 class="d-flex justify-content-center mt-5">Confirmación - UNO</h1>
    </header>

    <main class="container card p-4">
        <h5 class="text-center">¿Estás seguro de que deseas comenzar la partida con <?php echo $jugadores; ?> jugadores y <?php echo $cartas; ?> cartas por jugador?</h5>
        
        <div class="d-flex justify-content-center mt-4 btn-group">
            <!-- Formulario para confirmar que sí quiere comenzar -->
            <form method="POST" action="partida.class.php">
                <input type="hidden" name="jugadores" value="<?php echo $jugadores; ?>">
                <input type="hidden" name="cartas" value="<?php echo $cartas; ?>">
                <button type="submit" class="btn btn-success">Sí, Comenzar partida</button>
            </form>

            <!-- Volver al inicio -->
            <form method="GET" action="index.php" class="ms-3">
                <button type="submit" class="btn btn-danger">No, Volver al inicio</button>
            </form>
        </div>
    </main>

</body>
</html>
