<?php

session_start(); // Iniciar la sesión para acceder a los datos

include '../src/config/config.php';
include '../src/classes/Gormiti.php';
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
        body {
            background-color: black;
        }

        .letratitulo {
            font-family: Bungee Spice;
        }

        .color {
            background-color: rgb(213, 213, 213);
        }
    </style>
</head>
<body>

<h1 class="text-center m-5 letratitulo">Personatges Creats</h1>

<div class="container card">
    <div class="row m-5">
        <?php
        // Verificar si existen personajes en la sesión
        if (isset($_SESSION['personatges']) && count($_SESSION['personatges']) > 0) {
            foreach ($_SESSION['personatges'] as $gormiti) {
                // Cada tarjeta ocupará 4 columnas en una fila de 12 columnas, lo que da 3 elementos por fila.
                echo "<div class='col-md-4 mb-24'>
                        <div class='card' style='width: 100%;'>
                            <img src='" . $gormiti->imatge . "' class='card-img-top' alt='Imatge del personatge'>
                            <div class='card-body'>
                                <h5 class='card-title letratitulo'>" . htmlspecialchars($gormiti->nom) . "</h5>
                                <p class='card-text letratitulo'>Salut: " . htmlspecialchars($gormiti->salut) . "</p>
                                <p class='card-text letratitulo'>Dany: " . htmlspecialchars($gormiti->dany) . "</p>
                                <p class='card-text letratitulo'>Habilitats: " . htmlspecialchars($gormiti->habilitats) . "</p>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<p class='letratitulo fs-3'>No hi ha personatges creats.</p>";
        }
        ?>
    </div>
</div>

<div class="card container mt-5 d-flex flex-row justify-content-center mb-5">
    <p class="m-5 letratitulo shadow p-3 border color w-100 d-flex justify-content-center fs-4"><a href="index.php" class="text-decoration-none">Torna a crear més Personatges</a></p>
    <p class="m-5 letratitulo shadow p-3 border color w-100 d-flex justify-content-center fs-4"><a href="reset.php" class="text-decoration-none">Reiniciar la sessió</a></p>
</div>

</body>
</html>
