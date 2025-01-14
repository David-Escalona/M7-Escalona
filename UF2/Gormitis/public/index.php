<?php

session_start(); // Iniciar la sesión para almacenar los datos

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
    <title>Crear Personatge</title>
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

<h1 class="text-center m-5 letratitulo">Crear un nou Personatge</h1>

<div class="container card border p-5">
    <form action="index.php" method="post">
        <label for="nom" class="letratitulo ">Nom:</label><br>
        <input type="text" class="shadow border" name="nom" id="nom" required><br><br>

        <label for="salut" class="letratitulo">Salut:</label><br>
        <input type="number" class="shadow border" name="salut" id="salut" required><br><br>

        <label for="dany" class="letratitulo">Dany:</label><br>
        <input type="number" class="shadow border" name="dany" id="dany" required><br><br>

        <label for="imatge" class="letratitulo">URL de la imatge:</label><br>
        <input type="text" class="shadow border" name="imatge" id="imatge" required><br><br>

        <label for="habilitats" class="letratitulo">Habilitats (separades per comes):</label><br>
        <input type="text" class="shadow border" name="habilitats" id="habilitats" required><br><br>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="letratitulo shadow border p-3 color w-100 d-flex justify-content-center fs-4">Crear Personatge</button>
        </div>
        
    </form>
</div>

<div class="card container mt-5 d-flex flex-row justify-content-center mb-5">
    <p class="m-5 letratitulo shadow p-3 border color w-100 d-flex justify-content-center fs-4"><a href="characters.php" class="text-decoration-none">Veure els Personatges</a></p>
    <p class="m-5 letratitulo shadow p-3 border color w-100 d-flex justify-content-center fs-4"><a href="reset.php" class="text-decoration-none">Reiniciar la sessió</a></p>
</div>

</body>
</html>
