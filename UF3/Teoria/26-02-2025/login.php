<?php

    require_once('config.php');

    $loginMessage = '';

    //COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    //GUARDAMOS DATOS DEL FORMULARIO
    $email = $_POST['email'];
    $PASSWORD = $_POST['PASSWORD'];

    //EJECUTAR LA CONSULTA
    $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email' LIMIT 1");
    
    //COMPROBAR SI HAY RESULTADOS
    if($result && $result->num_rows > 0){
        $user = $result->fetch_assoc();

    //COMPROBAR SI LA CONTRASEÑA ES CORRECTA
    if(password_verify($password, $user['PASSWORD'])){
        $_SESSION['user'] = $user;
        $loginMessage = 'Inicio de sesión correcto';
        } else {
            $loginMessage = 'Contraseña incorrecta';
        }
    } else {
        $loginMessage = 'Usuario no encontrado';
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
    <h1>Inicio de sesión</h1>
    <?php if ($loginMessage): ?>
        <p><?php echo $loginMessage; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>