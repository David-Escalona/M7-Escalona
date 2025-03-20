<?php
session_start();
ob_start(); // Inicia el buffer de salida para evitar errores de encabezado

require_once('config.php');

$loginMessage = '';

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Usamos consulta preparada para evitar SQL Injection
    $stmt = $mysqli->prepare("SELECT * FROM USERS WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['PASSWORD'])) { 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['NAME'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_avatar'] = $user['avatar'];
            $_SESSION['user_rol'] = $user['rol'];

            header('Location: indiceIniciado.php');
            exit();
        } else {
            $loginMessage = 'Contraseña incorrecta';
        }
    } else {
        $loginMessage = 'Usuario no encontrado';
    }

    $stmt->close(); // Cerramos la consulta preparada
}

ob_end_flush(); // Envía la salida almacenada en el buffer
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Inicio de Sesión</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body { font-family: Comfortaa; }

        .roundeds {
            border-radius: 30px;
            padding: 10px;
            border: none;
        }

        .header {
            width: 100%;
            padding: 40px;
            background-color: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 100px;
            font-size: 40px;
        }

        .header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .card {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .mensaje {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    
    <div class="header">
        <a href="registro.php">REGISTRARSE</a>
    </div>

    <div class="container">
        <?php if ($loginMessage): ?>
            <div class="alert alert-danger text-center"><?php echo $loginMessage; ?></div>
        <?php endif; ?>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">Inicio de Sesión</h2>
                    <form id="loginForm" action="inicio.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 roundeds">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <!-- Main Script -->
    <script src="js/script.js"></script>
</body>
</html>
