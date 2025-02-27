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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    
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
</body>
</html>