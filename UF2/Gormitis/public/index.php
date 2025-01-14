<?php

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
    <title>Crear Gormitis</title>
    <style>
        body{
            background-color: black;
        }

        .letratitulo{
            font-family: Bungee Spice;
        }
    </style>
</head>
<body>
    
<h1 class="text-center m-5 letratitulo">Crear un nou</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <div class="container card border p-5">
        <form action="index.php" method="post">
            <label for="nom" class="letratitulo">Nom:</label><br>
            <input type="text" name="nom" id="nom" required><br><br>

            <label for="salut" class="letratitulo">Salut:</label><br>
            <input type="number" name="salut" id="salut" required><br><br>

            <label for="dany" class="letratitulo">Dany:</label><br>
            <input type="number" name="dany" id="dany" required><br><br>

            <label for="imatge" class="letratitulo">URL de la imatge:</label><br>
            <input type="text" name="imatge" id="imatge" required><br><br>

            <label for="habilitats" class="letratitulo">Habilitats (separades per comes):</label><br>
            <input type="text" name="habilitats" id="habilitats" required><br><br>

            <button type="submit" class="letratitulo">Crear Gormiti</button>
        </form>
    </div>
    
    <div class="card container mt-5 d-flex flex-row justify-content-center mb-5">
        <p class="m-5 letratitulo shadow p-3 border"><a href="characters.php" class="text-decoration-none">Veure Gormitis</a></p>
        <p class="m-5 letratitulo shadow p-3 border"><a href="reset.php" class="text-decoration-none">Reiniciar la sessió</a></p>
    </div>
    
</body>
</html>

