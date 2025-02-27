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
    <title>Document</title>
</head>
<body>
    
    <H1>Panel de Administrador</H1>
    <h2>Testimonios</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Fecha</th>
            <th>Rating</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($testimonis as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td><?= $item['sourname']; ?></td>
                <td><?= $item['description']; ?></td>
                <td><?= $item['image']; ?></td>
                <td><?= $item['data']; ?></td>
                <td><?= $item['rating']; ?></td>
                <td>
                    <a href="add-testimonials.php?id=<?php echo $testimonis['id']; ?>">Editar</a>
                    <a href="delete-testimonials.php?id=<?php echo $testimonis['id']; ?>">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Noticias</h2>
    <h2>Projectos</h2>

</body>
</html>