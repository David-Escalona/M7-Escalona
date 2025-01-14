<?php

include '../src/config/config.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <title>Selecció de Personatges</title>
    <style>
        body{
            background-color: black;
        }

        .letratitulo{
            font-family: Bungee Spice;
        }
        .color{
            background-color:rgb(213, 213, 213);
        }

    </style>
</head>
<body>
    <h1 class="text-center m-5 letratitulo">Personatges Creats</h1>

    <div class="d-flex d-row">
        <div class="card container">

        <?php
        
        ?>

        </div>
    </div>
    
    <div class="card container mt-5 d-flex flex-row justify-content-center mb-5">
        <p class="m-5 letratitulo shadow p-3 border color w-100 d-flex justify-content-center fs-4"><a href="index.php" class="text-decoration-none">Torna a crear més Personatges</a></p>
        <p class="m-5 letratitulo shadow p-3 border color w-100 d-flex justify-content-center fs-4"><a href="reset.php" class="text-decoration-none">Reiniciar la sessió</a></p>
    </div>
</body>
</html>
