<?php
session_start();
require_once('../../config.php');

// Depuración: Verifica el contenido de la sesión
// Esto solo debería estar presente durante la depuración para ver qué datos tiene la sesión
// Puedes comentar o eliminar esta línea después de verificar.
// var_dump($_SESSION);

if (!isset($_SESSION['user_id'])) {
    echo 'Debes iniciar sesión para agregar una noticia.';
    exit();
}

$mensaje = "";
$claseMensaje = "";

// COMPROBAR SI SE HA RECIBIDO UN ID DE NOTICIA PARA EDITAR
if (!isset($_GET['id'])) {
    echo "ID de noticia no proporcionado.";
    exit();
}

$news_id = $_GET['id'];

// OBTENER LOS DATOS DE LA NOTICIA
$stmt = $mysqli->prepare("SELECT * FROM NEWS WHERE id = ?");
$stmt->bind_param("i", $news_id);
$stmt->execute();
$result = $stmt->get_result();
$news = $result->fetch_assoc();

if (!$news) {
    echo "Noticia no encontrada.";
    exit();
}

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // RECOGER LOS DATOS DEL FORMULARIO
    $newdate = $_POST['newdate'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];

    // PREPARAR LA CONSULTA PARA ACTUALIZAR LA NOTICIA
    $stmt = $mysqli->prepare("UPDATE NEWS SET newdate = ?, title = ?, subtitle = ?, thumbnail = ?, description = ? WHERE id = ?");

    if (!$stmt) {
        $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
        $claseMensaje = "alert-danger";
    } else {
        // BINDEAR LOS PARAMETROS
        $stmt->bind_param("sssssi", $newdate, $title, $subtitle, $thumbnail, $description, $news_id);

        // EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            $mensaje = 'Noticia actualizada correctamente.';
            $claseMensaje = "alert-success";
            // Redirigir después de la actualización (asegurándote de que no haya salida antes)
            header("Location: ../users/adminPanel.php");
            exit();
        } else {
            $mensaje = 'Error al actualizar la noticia.';
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
    <title>Editar Noticia</title>
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
        <h1 class="text-center">Editar Noticia</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="newdate">Fecha:</label>
                <input type="date" class="form-control" id="newdate" name="newdate" value="<?= htmlspecialchars($news['newdate']) ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($news['title']) ?>" required>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtítulo:</label>
                <textarea class="form-control" id="subtitle" name="subtitle" required><?= htmlspecialchars($news['subtitle']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="thumbnail">Imagen Miniatura (URL):</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?= htmlspecialchars($news['thumbnail']) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($news['description']) ?></textarea>
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
