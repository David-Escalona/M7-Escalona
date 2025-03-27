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

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // RECOGER LOS DATOS DEL FORMULARIO
    $model = $_POST['model'];
    $categoria = $_POST['categoria'];
    $preu_dia = $_POST['preu_dia'];
    $imatge = $_POST['imatge'];
    $disponible = $_POST['disponible'];
    

    // PREPARAR LA CONSULTA PARA INSERTAR EL NUEVO PROYECTO
    $stmt = $mysqli->prepare(
        "INSERT INTO Vehicles (model, categoria, preu_dia, imatge, disponible) VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
        $claseMensaje = "alert-danger";
    } else {
        // BINDEAR LOS PARAMETROS
        $stmt->bind_param('sssss', $model, $categoria, $preu_dia, $imatge, $disponible);

        // EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            // Redirigir a adminPanel.php después de agregar el proyecto
            $mensaje = 'Proyecto agregado con éxito.';
            $claseMensaje = "alert-success";
        } else {
            $mensaje = 'Error al agregar el proyecto.';
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
    <title>Agregar Vehiculo</title>
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
        <h1 class="text-center">Agregar Vehiculo</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="model">Modelo:</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" required>
            </div>
            <div class="form-group">
                <label for="descripcio">Descripción:</label>
                <textarea class="form-control" id="descripcio" name="descripcio" required></textarea>
            </div>
            <div class="form-group">
                <label for="thumbnail">Imagen (URL):</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Agregar Proyecto</button>
                <a href="../users/adminPanel.php" class="btn btn-secondary">Volver Atrás</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>  
