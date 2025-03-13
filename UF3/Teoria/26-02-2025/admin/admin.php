<?php

session_start();
require_once('../config.php');

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


//EXTRACCION DE USUARIOS
$resultUsers = $mysqli->query("SELECT * FROM USERS");
$users = $resultUsers->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="d-flex justify-content-center my-4">
            <h1>Panel de Administrador</h1>
        </div>

        <h2>Testimonios</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                            <a href="users/edit-user.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="../testimonials/delete-testimonials.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Usuarios</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Rol</th>
                    <th>Edad</th>
                    <th>Trabajo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $item): ?>
                    <tr>
                        <td><?= $item['NAME']; ?></td>
                        <td><?= $item['sourname']; ?></td>
                        <td><?= $item['email']; ?></td>
                        <td><img src="<?= $item['avatar']; ?>" alt="Imagen" style="width: 50px; height: 50px;"></td>
                        <td><?= $item['rol']; ?></td>
                        <td><?= $item['age']; ?></td>
                        <td><?= $item['job']; ?></td>
                        <td>
                            <a href="users/edit-user.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="../testimonials/delete-testimonials.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>