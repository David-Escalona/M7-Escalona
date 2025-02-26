<?php

    session_start();
    require_once('config.php');

    //COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    //GUARDAMOS DATOS DEL FORMULARIO
    $email = $_POST['email'];
    $password = $_POST['password'];

    //EJECUTAR LA CONSULTA
    $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email' LIMIT 1");
    
    //COMPROBAR SI HAY RESULTADOS
    if($result && $result->num_rows > 0){
        $user = $result->fetch_assoc();

    //COMPROBAR SI LA CONTRASEÑA ES CORRECTA
    if(password_verify($paswword, $user['password'])){
        $_SESSION['user'] = $user;
        header('Location: index.php');
        }
    }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>inicio de sesion</h1>
    <form action="" method="POST">
    
    <label for="name">Email:</label><br>
    <input type="email" id="email" name="email" require><br>

    <label for="name">Contraseña:</label><br>
    <input type="password" id="password" name="password" require><br>

    <input type="submit" value="Registrate">

    </form>

</body>
</html>