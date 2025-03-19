<?php

session_start();
require_once('../../config.php');

//VERIFICAR QUE EL ROL SEA ADMIN
if($_SESSION['user_rol'] !== 'admin'){
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

//AQUI IRAN TODAS LAS TABLAS DE LA BASE DE DATOS

//MOSTRAMOS DE MOMENTO SOLO LOS TESTMONIOS

//EXTRACCION DE TESTIMONIOS
$resultTestimonios = $mysqli->query("SELECT * FROM TESTIMONIS");
$testimonis = $resultTestimonios->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="../../plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="../../plugins/themify-icons/themify-icons.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="../../plugins/venobox/venobox.css">
    <!-- card slider -->
    <link rel="stylesheet" href="../../plugins/card-slider/css/style.css">
    <!-- Main Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>
    <style>
        body{
                font-family: Comfortaa;
                background-image: url(https://images.unsplash.com/photo-1663970206579-c157cba7edda?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
    </style>
<body>
    
    <?php include '../../header.php'; ?>

    <h1>Panel de Administrador</h1>
    <h2>Testimonios</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Fecha</th>
                <th>Rating</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($testimonis as $item): ?>
                <tr>
                    <td><?= $item['name']; ?></td>
                    <td><?= $item['sourname']; ?></td>
                    <td><?= $item['description']; ?></td>
                    <td><img src="<?= $item['image']; ?>" alt="Imagen" style="width: 50px; height: 50px;"></td>
                    <td><?= $item['data']; ?></td>
                    <td><?= $item['rating']; ?></td>
                    <td>
                        <a href="../testimonials/add-testimonials.php?id=<?= $item['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="../testimonials/delete-testimonials.php?id=<?= $item['id'] ?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Noticias</h2>
    <h2>Proyectos</h2>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="../../plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="../../plugins/slick/slick.min.js"></script>
    <!-- venobox -->
    <script src="../../plugins/venobox/venobox.min.js"></script>
    <!-- shuffle -->
    <script src="../../plugins/shuffle/shuffle.min.js"></script>
    <!-- apear js -->
    <script src="../../plugins/counto/apear.js"></script>
    <!-- counter -->
    <script src="../../plugins/counto/counTo.js"></script>
    <!-- card slider -->
    <script src="../../plugins/card-slider/js/card-slider-min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="../../plugins/google-map/gmap.js"></script>
    <!-- Main Script -->
    <script src="../../js/script.js"></script>
</body>
</html>