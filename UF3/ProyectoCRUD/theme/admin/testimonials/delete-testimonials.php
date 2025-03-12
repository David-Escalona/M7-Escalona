<?php

session_start();
require_once('../../config.php');

//VERIFICAR QUE EL ROL SEA ADMIN
if($_SESSION['user_rol'] !== 'admin'){
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

//COMPROBAR QUE SE HA RECIBIDO EL ID DEL TESTIMONIO PARA BORRAR
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //PREPARAR LA CONSULTA PARA BORRAR EL TESTIMONIO
    $stmt = $mysqli->prepare("DELETE FROM TESTIMONIS WHERE id = ?");
    
    //COMPROBAR QUE LA PREPARACION TUVO EXITO
    if (!$stmt){
        echo 'Error en la preparación: ' . $mysqli->error;
        exit();
    }

    //BINDEAR EL PARAMETRO
    $stmt->bind_param('i', $id);

    //EJECUTAR LA CONSULTA
    if ($stmt->execute()) {
        echo 'Testimonio borrado correctamente';
    } else {
        echo 'Error al borrar el testimonio';
    }

    //CERRAR LA CONEXION
    $stmt->close();
    $mysqli->close();

    // REDIRIGIR DE VUELTA A LA LISTA DE TESTIMONIOS
    header('Location: delete-testimonials.php');
    exit();
}

//OBTENER LOS TESTIMONIOS DE LA BASE DE DATOS
$result = $mysqli->query("SELECT * FROM TESTIMONIS");

if (!$result) {
    echo 'Error al obtener los testimonios: ' . $mysqli->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Testimonios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Testimonios</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Calificación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['sourname'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><img src="<?= $row['image'] ?>" alt="Imagen" style="width: 50px; height: 50px;"></td>
                        <td><?= $row['data'] ?></td>
                        <td><?= $row['rating'] ?></td>
                        <td>
                            <a href="delete-testimonials.php?id=<?= $row['id'] ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>