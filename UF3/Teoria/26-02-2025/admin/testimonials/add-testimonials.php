<?php

session_start();
require_once('../../config.php');

//VERIFICAR QUE EL ROL SEA ADMIN
if($_SESSION['user_rol'] !== 'admin'){
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

//COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if(isset($_POST['name'])){
    //RECOGER LOS DATOS DEL FORMULARIO
    $name = $_POST['name'];
    $sourname = $_POST['sourname'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $rating = $_POST['rating'];

    //PREPARAR LA CONSULTA ANTES DE INSERTAR PARA EVITAR EL SQL INJECTION
    $stmt = $mysqli->prepare(
        "INSERT INTO TESTIMONIS (name, sourname, description, image, data, rating) VALUES (?, ?, ?, ?, NOW(), ?)"
    );

    //COMPROBAR QUE LA PREPARACION TUVO EXITO
    if (!$stmt){
        echo 'Error en la preparación: ' . $mysqli->error;
        exit();
    }

    //BINDEAR LOS PARAMETROS
    $stmt->bind_param('ssssi', $name, $sourname, $description, $image, $rating);

    //EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        echo 'Testimonio añadido correctamente';
    } else {
        echo 'Error al añadir el testimonio';
    }

    //CERRAR LA CONEXION
    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Testimonios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    
    <div class="container mt-4">
        <h1>Agregar Testimonio</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="sourname">Apellidos:</label>
                <input type="text" class="form-control" id="sourname" name="sourname" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="rating">Calificación:</label>
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>