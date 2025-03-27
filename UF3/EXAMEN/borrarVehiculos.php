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

// COMPROBAR SI SE HA RECIBIDO UN ID PARA ELIMINAR
if (!isset($_GET['id'])) {
    echo "ID de proyecto no proporcionado.";
    exit();
}

$id = $_GET['id'];

// PREPARAR LA CONSULTA PARA ELIMINAR EL PROYECTO
$stmt = $mysqli->prepare("DELETE FROM Vehicles WHERE id = ?");

if (!$stmt) {
    $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
    $claseMensaje = "alert-danger";
} else {
    // BINDEAR EL PARAMETRO
    $stmt->bind_param("i", $id);

    // EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        // Redirigir al panel de administración con un mensaje de éxito
        $mensaje = 'Proyecto eliminado con éxito.';
        $claseMensaje = "alert-success";
        header("Location: adminPanel.php?mensaje=" . urlencode($mensaje) . "&clase=" . urlencode($claseMensaje));
        exit();
    } else {
        $mensaje = 'Error al eliminar el proyecto.';
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
    <title>Eliminar Vehiculos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
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
        <h1 class="text-center">Eliminar Vehiculos</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <p>¿Estás seguro de que quieres eliminar este Vehiculo?</p>
        <form action="" method="POST">
            <div class="d-flex justify-content-between mt-4">
                <a href="adminPanel.php" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-danger">Eliminar Vehiculo</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>  
