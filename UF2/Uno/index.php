<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <title>David Escalona García - UNO</title>

    <style>
        h1, h5, label, button{
            font-family: Bungee Spice;
        }
    </style>

</head>
<body>
    
    <header>

    <h1 class="d-flex justify-content-center mt-5">Proyecto 2 - UNO</h1>

    </header>

    <main>

    <div class="container card mt-5">
            <h5 class="card-title text-center mt-3">Juega al UNO</h5>
            <form method="POST">
                <div class="mb-3">
                    <label for="publicacion" class="form-label">Numero de Jugadores:</label>
                    <input type="number" class="form-control" id="Jugadores" name="publicacion" required>
                </div>
                <div class="mb-3">
                    <label for="publicacion" class="form-label">Numero de Cartas:</label>
                    <input type="number" class="form-control" id="Cartas" name="publicacion" required>
                </div>
                <button type="submit" name="añadir" class="btn btn-primary border border-dark mb-5 w-100 shadow fs-5">Comenzar Juego</button>
            </form>
            </div>

    </main>
    
    <footer></footer>

</body>
</html>