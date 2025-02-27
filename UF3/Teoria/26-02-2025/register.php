<?php

require_once 'config.php';

//COMPROBAR SI EL FORMULARIO HA SIDO ENVIADO
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //RECOGEMOS LOS DATOS DEL FORMULARIO
    $NAME = $_POST['NAME'];
    $sourname = $_POST['sourname'];
    $email = $_POST['email'];
    $PASSWORD = $_POST['PASSWORD'];
    $avatar = $_POST['avatar'];
    $rol = $_POST['rol'];

    //CIFRAR LA CONTRASEÑA CON PASSWORD_HASH
    $passwordHashed = password_hash($PASSWORD, PASSWORD_DEFAULT);

    //PREPARAR LA CONSULTA ANTES DE INSERTAR PARA EVITAR EL SQL INJECTION
    $stmt = $mysqli->prepare(
        "INSERT INTO USERS (NAME, sourname, email ,avatar, PASSWORD, rol, age, job, data_registre) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())"
    );

    //COMPROBAR QUE LA PREPARACION TUVO EXITO
    if (!$stmt){
        echo 'Error en la preparación: ' . $mysqli->error;
        exit();
    }

    //BINDEAR LOS PARAMETROS
    $stmt->bind_param('ssssssis', $NAME, $sourname, $email, $avatar, $passwordHashed, $rol, $age, $job);

    //EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        echo 'Usuario registrado correctamente';
    } else {
        echo 'Error al registrar el usuario';
    }

    //CERRAR LA CONEXION
    $stmt->close();
    $mysqli->close();

    header('Location: register.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="register.php" method="POST">
        <label for="name">Nombre:</label><br>
        <input type="text" id="NAME" name="NAME" required><br>
        
        <label for="sourname">Apellidos:</label><br>
        <input type="text" id="sourname" name="sourname" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="PASSWORD">Contraseña:</label><br>
        <input type="password" id="PASSWORD" name="PASSWORD" required><br>

        <label for="avatar">Avatar:</label><br>
        <input type="text" id="avatar" name="avatar" required><br>

        <label for="rol">Rol:</label><br>
        <select id="rol" name="rol" required>
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select><br>

        <input type="submit" value="Registrate">
    </form>
</body>
</html>