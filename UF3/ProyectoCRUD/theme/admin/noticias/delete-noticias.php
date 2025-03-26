<?php

session_start();
require_once('../../config.php');

// VERIFICAR QUE EL USUARIO ESTÉ LOGUEADO Y QUE SEA ADMIN
if (!isset($_SESSION['user_id'])) {
    echo 'Debes iniciar sesión para agregar una noticia.';
    exit();
}

$mensaje = "";
$claseMensaje = "";

// COMPROBAR SI SE HA RECIBIDO UN ID DE NOTICIA PARA ELIMINAR
if (!isset($_GET['id'])) {
    echo "ID de noticia no proporcionado.";
    exit();
}

$news_id = $_GET['id'];

// PREPARAR Y EJECUTAR LA CONSULTA PARA ELIMINAR LA NOTICIA
$stmt = $mysqli->prepare("DELETE FROM NEWS WHERE id = ?");
$stmt->bind_param("i", $news_id);

if (!$stmt) {
    $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
    $claseMensaje = "alert-danger";
} else {
    // EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        $mensaje = 'Noticia eliminada correctamente.';
        $claseMensaje = "alert-success";
        header("Location: ../users/adminPanel.php"); // Redirigir después de eliminar
        exit();
    } else {
        $mensaje = 'Error al eliminar la noticia.';
        $claseMensaje = "alert-danger";
    }
    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Noticia</title>
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
        <h1 class="text-center">Eliminar Noticia</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <p>¿Estás seguro de que quieres eliminar esta noticia?</p>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="../users/adminPanel.php" class="btn btn-secondary">Cancelar</a>
                <a href="delete-news.php?id=<?= $news_id ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
