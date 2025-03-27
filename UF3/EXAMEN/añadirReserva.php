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
    $data_inici = $_POST['data_inici'];
    $data_fi = $_POST['data_fi'];
    $estat = $_POST['estat'];
    $preu_total = $_POST['preu_total'];
    

    // PREPARAR LA CONSULTA PARA INSERTAR EL NUEVO PROYECTO
    $stmt = $mysqli->prepare(
        "INSERT INTO Reserves (data_inici, data_fi, estat, preu_total) VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        $mensaje = 'Error en la preparación de la consulta: ' . $mysqli->error;
        $claseMensaje = "alert-danger";
    } else {
        // BINDEAR LOS PARAMETROS
        $stmt->bind_param('ssss', $data_inici, $data_fi, $estat, $preu_total);

        // EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            // Redirigir a adminPanel.php después de agregar el proyecto
            $mensaje = 'Reserva agregado con éxito.';
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
    <title>Agregar Reserva</title>
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
        <h1 class="text-center">Agregar Reserva</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= $claseMensaje; ?>"><?= $mensaje; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="data_inici">Fecha Inicio:</label>
                <input type="date" class="form-control" id="data_inici" name="data_inici" required>
            </div>
            <div class="form-group">
                <label for="data_fi">Fecha Final:</label>
                <input type="date" class="form-control" id="data_fi" name="data_fi" required>
            </div>
            <div class="form-group">
                <label for="estat">Estado:</label>
                <textarea class="form-control" id="estat" name="estat" required></textarea>
            </div>
            <div class="form-group">
                <label for="preu_total">Precio Total:</label>
                <input type="text" class="form-control" id="preu_total" name="preu_total" required>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Agregar Reserva</button>
                <a href="adminPanel.php" class="btn btn-secondary">Volver Atrás</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>  
