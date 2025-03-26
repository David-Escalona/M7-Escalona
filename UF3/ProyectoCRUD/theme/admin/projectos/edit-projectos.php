<?php

session_start();
require_once('../../config.php');

// VERIFICAR QUE EL ROL SEA ADMIN
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

$mensaje = "";
$claseMensaje = "";

// COMPROBAR SI SE HA RECIBIDO UN ID PARA EDITAR
if (!isset($_GET['id'])) {
    echo "ID de proyecto no proporcionado.";
    exit();
}

$id = $_GET['id'];

// OBTENER DATOS DEL PROYECTO
$stmt = $mysqli->prepare("SELECT title, url, descripcio, thumbnail FROM PROJECTS WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();

if (!$project) {
    echo "Proyecto no encontrado.";
    exit();
}

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // RECOGER LOS DATOS DEL FORMULARIO
    $title = $_POST['title'];
    $url = $_POST['url'];
    $descripcio = $_POST['descripcio'];
    $thumbnail = $_POST['thumbnail'];

    // PREPARAR LA CONSULTA PARA ACTUALIZAR
    $stmt = $mysqli->prepare(
        "UPDATE PROJECTS SET title = ?, url = ?, descripcio = ?, thumbnail = ? WHERE id = ?"
    );

    if (!$stmt) {
        $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
        $claseMensaje = "alert-danger";
    } else {
        // BINDEAR LOS PARAMETROS
        $stmt->bind_param('ssssi', $title, $url, $descripcio, $thumbnail, $id);

        // EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            // Redirigir a adminPanel.php después de actualizar el proyecto
            header("Location: ../users/adminPanel.php");
            exit();
        } else {
            $mensaje = 'Error al actualizar el proyecto.';
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
    <title>Editar Proyecto</title>
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
        <h1 class="text-center">Editar Proyecto</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($project['title']) ?>" required>
            </div>
            <div class="form-group">
                <label for="url">URL:</label>
                <input type="text" class="form-control" id="url" name="url" value="<?= htmlspecialchars($project['url']) ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcio">Descripción:</label>
                <textarea class="form-control" id="descripcio" name="descripcio" required><?= htmlspecialchars($project['descripcio']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="thumbnail">Imagen (URL):</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?= htmlspecialchars($project['thumbnail']) ?>" required>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="../users/adminPanel.php" class="btn btn-secondary">Volver Atrás</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>  
