<?php
session_start();
ob_start(); // Inicia el buffer de salida para evitar errores de encabezado

require_once('config.php');

$loginMessage = '';

// COMPROBAR QUE EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email' LIMIT 1");

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
}
ob_end_flush(); // Envía la salida almacenada en el buffer
?>

<!DOCTYPE html>
<html lang="es">
<head>
<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="plugins/venobox/venobox.css">
    <!-- card slider -->
    <link rel="stylesheet" href="plugins/card-slider/css/style.css">
    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body{
            font-family: Comfortaa;
        }

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
    <!-- slick slider -->
    <script src="plugins/slick/slick.min.js"></script>
    <!-- venobox -->
    <script src="plugins/venobox/venobox.min.js"></script>
    <!-- shuffle -->
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <!-- apear js -->
    <script src="plugins/counto/apear.js"></script>
    <!-- counter -->
    <script src="plugins/counto/counTo.js"></script>
    <!-- card slider -->
    <script src="plugins/card-slider/js/card-slider-min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="plugins/google-map/gmap.js"></script>
    <!-- Main Script -->
    <script src="js/script.js"></script>
</body>
</html>
