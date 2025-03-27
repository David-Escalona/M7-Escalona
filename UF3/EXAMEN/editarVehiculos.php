<?php

session_start();
require_once('config.php');

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
$stmt = $mysqli->prepare("SELECT model, categoria, preu_dia, imatge, disponible FROM Vehicles WHERE id = ?");
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
    $model = $_POST['model'];
    $categoria = $_POST['categoria'];
    $preu_dia = $_POST['preu_dia'];
    $imatge = $_POST['imatge'];
    $disponible = $_POST['disponible'];

    // PREPARAR LA CONSULTA PARA ACTUALIZAR
    $stmt = $mysqli->prepare(
        "UPDATE Vehicles SET model = ?, categoria = ?, preu_dia = ?, imatge = ?, disponible = ?  WHERE id = ?"
    );

    if (!$stmt) {
        $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
        $claseMensaje = "alert-danger";
    } else {
        // BINDEAR LOS PARAMETROS
        $stmt->bind_param('sssssi', $model, $categoria, $preu_dia, $imatge, $disponible, $id);

        // EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            // Redirigir a adminPanel.php después de actualizar el proyecto
            header("Location: adminPanel.php");
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
    <title>Editar Vehiculo</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <h1 class="text-center">Editar Vehiculo</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="model">Modelo:</label>
                <input type="text" class="form-control" id="model" name="model" value="<?= htmlspecialchars($project['model']) ?>" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?= htmlspecialchars($project['categoria']) ?>" required>
            </div>
            <div class="form-group">
                <label for="preu_dia">Precio:</label>
                <textarea class="form-control" id="preu_dia" name="preu_dia" required><?= htmlspecialchars($project['preu_dia']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="imatge">Imagen</label>
                <input type="text" class="form-control" id="imatge" name="imatge" value="<?= htmlspecialchars($project['imatge']) ?>" required>
            </div>
            <div class="form-group">
                <label for="disponible">Disponibilidad</label>
                <input type="text" class="form-control" id="disponible" name="disponible" value="<?= htmlspecialchars($project['disponible']) ?>" required>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="adminPanel.php" class="btn btn-secondary">Volver Atrás</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>  
