<?php

session_start();
require_once('../../config.php');

// VERIFICAR QUE EL ROL SEA ADMIN
if($_SESSION['user_rol'] !== 'admin'){
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if(isset($_POST['title'])){
    // RECOGER LOS DATOS DEL FORMULARIO
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $thumbnail = $_POST['thumbnail'];

    // PREPARAR LA CONSULTA ANTES DE INSERTAR PARA EVITAR EL SQL INJECTION
    $stmt = $mysqli->prepare(
        "INSERT INTO PROYECTOS (title, url, description, thumbnail, fecha) VALUES (?, ?, ?, ?, NOW())"
    );

    // COMPROBAR QUE LA PREPARACION TUVO EXITO
    if (!$stmt){
        echo 'Error en la preparación: ' . $mysqli->error;
        exit();
    }

    // BINDEAR LOS PARAMETROS
    $stmt->bind_param('ssss', $title, $url, $description, $thumbnail);

    // EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        // Redirigir a adminPanel.php después de agregar el proyecto
        header("Location: adminPanel.php");
        exit();
    } else {
        echo 'Error al añadir el proyecto';
    }

    // CERRAR LA CONEXION
    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Proyectos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    
    <div class="container mt-4">
        <h1>Agregar Proyecto</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Título del Proyecto:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="url">URL del Proyecto:</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="thumbnail">Imagen (URL del thumbnail):</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
