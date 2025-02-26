<?php

    require_once 'config.php';
    session_start();

    //COMPROBAR SI EL FORMULARIO HA SIDO ENVIADO
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //RECOGEMOS LOS DATOS DEL FORMULARIO
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $avatar = $_POST['avatar'];

        //CIFRAR LA CONTRASEÑA CON PASSWORD_HASH
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        //PREPARAR LA CONSULTA ANTES DE INSERTAR PARA EVITAR EL SQL INJECTION
        $stml = $mysqli->prepare(
            "INSERT INTO USERS (name, surname, email ,avatar, password, rol, age, job, date_register) VALUES (?, ?, ?, ?, ?, 'user', ?, ?, NOW())"
        );

        //COMPROBAR QUE LA PREPARACION TUVO EXITO
        if (!$stmt){
            //die('Error en la preparación: ' . $mysqli->error)
            echo 'Error en la preparación: ' . $mysqli->error;
        }

        //BINDEAR LOS PARAMETROS
        $stmt->bind_param('sssssis', $name, $surname, $email, $avatar, $passwordHashed, $age, $job);

        //EJECUTAR LA CONSULTA
        if ($stmt->execute()) {
            echo 'Usuario registrado correctamente';
        }else{
            echo'Erro al registrar el usuario';
            
            //CERRAR LA CONEXION
            $stmt->close();
            $mysqli->close();
        }
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
    <form action="" method="POST">

    <label for="name">Hombre:</label><br>
    <input type="text" id="name" name="name" require><br>
    
    <label for="name">Apellidos:</label><br>
    <input type="text" id="surname" name="surname" require><br>
    
    <label for="name">Email:</label><br>
    <input type="email" id="email" name="email" require><br>

    <label for="name">Contraseña:</label><br>
    <input type="password" id="password" name="password" require><br>

    <label for="name">Avatar:</label><br>
    <input type="text" id="avatar" name="avatar" require><br>

    <input type="submit" value="Registrate">

    </form>

</body>
</html>