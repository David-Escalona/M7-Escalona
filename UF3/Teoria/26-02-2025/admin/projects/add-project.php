<?php

session_start();
require_once('../../config.php');

//VERIFICAR QUE EL ROL SEA ADMIN
if($_SESSION['user_rol'] !== 'admin'){
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

//COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if(isset($_POST['title'])){
    //RECOGER LOS DATOS DEL FORMULARIO
    $title = $_POST['title'];
    $url = $_POST['url'];
    $descripcio = $_POST['descripcio'];
    $thumbnail = $_POST['thumbnail'];

    //PREPARAR LA CONSULTA ANTES DE INSERTAR PARA EVITAR EL SQL INJECTION
    $stmt = $mysqli->prepare(
        "INSERT INTO PROJECTS (title, url, descripcio, thumbnail) VALUES (?, ?, ?, ?)"
    );

    //COMPROBAR QUE LA PREPARACION TUVO EXITO
    if (!$stmt){
        echo 'Error en la preparación: ' . $mysqli->error;
        exit();
    }

    //BINDEAR LOS PARAMETROS
    $stmt->bind_param('ssss', $title, $url, $descripcio, $thumbnail);

    //EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        echo 'Proyecto añadido correctamente';
    } else {
        echo 'Error al añadir el proyecto';
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    
    <h1>Formulario add project</h1>
    <form action="" method="POST">

    <label for="title">Titulo:</label>
    <input for="text" id="title" name="title" require></input>

    <label for="url">URL:</label>
    <input for="text" id="url" name="url" require></input>

    <label for="description">Descripción:</label>
    <textarea id="descripcio" name="descripcio" require></textarea>

    <label for="image">Imagen:</label>
    <input for="text" id="thumbnail" name="thumbnail" require></input>

    <input type="submit" value="Enviar">

    </form>

</body>
</html>