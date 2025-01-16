<?php

    include 'baraja.class.php';

    $baraja = new Baraja();
    $carta = $baraja->obtenerCartaAleatoria();  
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
    <title>Partidas</title>

    <style>
        h1, h5, label {
            font-family: Bungee Spice;
        }

        .carta {
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
            background-size: cover;

        }
        
    </style>

</head>
<body>
    
    <header>
        <h1 class="d-flex justify-content-center mt-5">Partida</h1>
    </header>

    <main class="d-flex justify-content-center container card mb-4 flex-row">

        <div class="carta shadow">
            <img src="img/<?php echo $carta; ?>" alt="Carta">
        </div>

    </main>

    <footer>
        <div class="container card color p-2">
            <a href="index.php" class="d-flex justify-content-center text-decoration-none fs-5 w-100 ">Volver al inicio</a>   
        </div>
    </footer>

</body>
</html>
