<?php
session_start();
require_once('../../config.php');

// VERIFICAR QUE EL ROL SEA ADMIN
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if (isset($_POST['title'])) {
    // RECOGER LOS DATOS DEL FORMULARIO
    $newdate = date('Y-m-d'); // Fecha actual
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];

    // PREPARAR LA CONSULTA PARA EVITAR SQL INJECTION
    $stmt = $mysqli->prepare(
        "INSERT INTO NEWS (newdate, title, subtitle, thumbnail, description) VALUES (?, ?, ?, ?, ?)"
    );

    // COMPROBAR QUE LA PREPARACIÓN TUVO ÉXITO
    if (!$stmt) {
        echo 'Error en la preparación: ' . $mysqli->error;
        exit();
    }

    // BINDEAR LOS PARÁMETROS
    $stmt->bind_param('sssss', $newdate, $title, $subtitle, $thumbnail, $description);

    // EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        echo '<script>
                alert("Noticia añadida correctamente.");
                window.location.href = "../users/adminPanel.php";
              </script>';
    } else {
        echo '<script>alert("Error al añadir la noticia.");</script>';
    }

    // CERRAR LA CONEXIÓN
    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Noticia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            background-image: url('https://images.unsplash.com/photo-1663970206579-c157cba7edda?fm=jpg&q=60&w=3000');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Centrado vertical */
        }

        .container {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Agregar Noticia</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtítulo:</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" required>
            </div>
            <div class="form-group">
                <label for="thumbnail">Imagen (URL):</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="button-container">
                <a href="../users/adminPanel.php" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-primary">Publicar Noticia</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
