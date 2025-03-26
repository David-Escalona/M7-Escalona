<?php

session_start();
require_once('../../config.php');

// VERIFICAR QUE EL USUARIO ESTÉ LOGUEADO
if (!isset($_SESSION['user_id'])) {
    echo 'Debes iniciar sesión para agregar una noticia.';
    exit();
}

$mensaje = "";
$claseMensaje = "";

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // RECOGER LOS DATOS DEL FORMULARIO
    $newdate = $_POST['newdate'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];

    // PREPARAR LA CONSULTA PARA INSERTAR UNA NOTICIA
    $stmt = $mysqli->prepare("INSERT INTO NEWS (newdate, title, subtitle, thumbnail, description) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
        $claseMensaje = "alert-danger";
    } else {
        // BINDEAR LOS PARAMETROS
        $stmt->bind_param("sssss", $newdate, $title, $subtitle, $thumbnail, $description);

        // EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            $mensaje = 'Noticia añadida con éxito.';
            $claseMensaje = "alert-success";
        } else {
            $mensaje = 'Error al añadir la noticia.';
            $claseMensaje = "alert-danger";
        }
        $stmt->close();
    }

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
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1 class="text-center">Agregar Noticia</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="newdate">Fecha de la noticia:</label>
                <input type="date" class="form-control" id="newdate" name="newdate" required>
            </div>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtítulo:</label>
                <textarea class="form-control" id="subtitle" name="subtitle"></textarea>
            </div>
            <div class="form-group">
                <label for="thumbnail">Miniatura (URL):</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Agregar Noticia</button>
                <a href="../users/adminPanel.php" class="btn btn-secondary">Volver Atrás</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
