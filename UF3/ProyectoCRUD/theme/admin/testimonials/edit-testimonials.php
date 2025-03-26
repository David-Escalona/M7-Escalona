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
    echo "ID de testimonio no proporcionado.";
    exit();
}

$id = $_GET['id'];

// OBTENER DATOS DEL TESTIMONIO
$stmt = $mysqli->prepare("SELECT name, sourname, description, image, rating FROM TESTIMONIS WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$testimonio = $result->fetch_assoc();

if (!$testimonio) {
    echo "Testimonio no encontrado.";
    exit();
}

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // RECOGER LOS DATOS DEL FORMULARIO
    $name = $_POST['name'];
    $sourname = $_POST['sourname'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $rating = $_POST['rating'];

    // PREPARAR LA CONSULTA PARA ACTUALIZAR
    $stmt = $mysqli->prepare(
        "UPDATE TESTIMONIS SET name = ?, sourname = ?, description = ?, image = ?, rating = ? WHERE id = ?"
    );

    if (!$stmt) {
        $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
        $claseMensaje = "alert-danger";
    } else {
        // BINDEAR LOS PARAMETROS
        $stmt->bind_param('ssssii', $name, $sourname, $description, $image, $rating, $id);

        // EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            // Redirigir a adminPanel.php después de actualizar el testimonio
            header("Location: ../users/adminPanel.php");
            exit();
        } else {
            $mensaje = 'Error al actualizar el testimonio.';
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
    <title>Editar Testimonio</title>
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
        <h1 class="text-center">Editar Testimonio</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($testimonio['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="sourname">Apellidos:</label>
                <input type="text" class="form-control" id="sourname" name="sourname" value="<?= htmlspecialchars($testimonio['sourname']) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($testimonio['description']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen (URL):</label>
                <input type="text" class="form-control" id="image" name="image" value="<?= htmlspecialchars($testimonio['image']) ?>" required>
            </div>
            <div class="form-group">
                <label for="rating">Calificación (1-5):</label>
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="<?= htmlspecialchars($testimonio['rating']) ?>" required>
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
