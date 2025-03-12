<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
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
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  
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

    exit();
}
?>

<style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">Registro</h2>
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