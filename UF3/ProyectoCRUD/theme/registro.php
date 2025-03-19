<?php
ob_start(); // Inicia el buffer de salida
require_once 'config.php';

$mensaje = ""; // Variable para mostrar el mensaje después del registro

// COMPROBAR SI EL FORMULARIO HA SIDO ENVIADO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NAME = $_POST['NAME'];
    $sourname = $_POST['sourname'];
    $email = $_POST['email'];
    $PASSWORD = $_POST['PASSWORD'];
    $avatar = $_POST['avatar'];
    $rol = $_POST['rol'];
    $age = $_POST['age'] ?? null;
    $job = $_POST['job'] ?? null;

    // CIFRAR LA CONTRASEÑA
    $passwordHashed = password_hash($PASSWORD, PASSWORD_DEFAULT);

    // PREPARAR LA CONSULTA
    $stmt = $mysqli->prepare(
        "INSERT INTO USERS (NAME, sourname, email, avatar, PASSWORD, rol, age, job, data_registre) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())"
    );

    if (!$stmt) {
        $mensaje = '❌ Error en la preparación: ' . $mysqli->error;
    } else {
        $stmt->bind_param('ssssssis', $NAME, $sourname, $email, $avatar, $passwordHashed, $rol, $age, $job);

        if ($stmt->execute()) {
            $mensaje = '✅ Usuario registrado correctamente.';
        } else {
            $mensaje = '❌ Error al registrar el usuario.';
        }
        $stmt->close();
    }

    $mysqli->close();
}

ob_end_flush(); // Finaliza el buffer de salida
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <style>
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

    <!-- Header con opción para iniciar sesión -->
    <div class="header">
        <a href="inicio.php">INICIAR SESIÓN</a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">Registro</h2>

                    <?php if (!empty($mensaje)) : ?>
                        <p class="mensaje"><?= $mensaje; ?></p>
                    <?php endif; ?>

                    <form action="registro.php" method="POST">
                        <div class="mb-3">
                            <label for="NAME" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="NAME" name="NAME" required>
                        </div>
                        <div class="mb-3">
                            <label for="sourname" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="sourname" name="sourname" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="PASSWORD" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="PASSWORD" name="PASSWORD" required>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="text" class="form-control" id="avatar" name="avatar" required>
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <select class="form-select" id="rol" name="rol" required>
                                <option value="user">Usuario</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
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
