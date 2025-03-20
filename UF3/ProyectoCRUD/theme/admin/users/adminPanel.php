<?php
session_start();
require_once('../../config.php');

// Verificar que el usuario sea administrador
if (!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

// Verificar conexión a la base de datos
if (!$mysqli) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Extracción de testimonios
$resultTestimonios = $mysqli->query("SELECT * FROM TESTIMONIS");
$testimonis = ($resultTestimonios) ? $resultTestimonios->fetch_all(MYSQLI_ASSOC) : [];

// Extracción de noticias
$resultNoticias = $mysqli->query("SELECT * FROM NEWS");
$noticias = ($resultNoticias) ? $resultNoticias->fetch_all(MYSQLI_ASSOC) : [];

// Extracción de proyectos
$resultProyectos = $mysqli->query("SELECT * FROM PROJECTS");
$proyectos = ($resultProyectos) ? $resultProyectos->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/slick/slick.css">
    <link rel="stylesheet" href="../../plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../plugins/venobox/venobox.css">
    <link rel="stylesheet" href="../../plugins/card-slider/css/style.css">
    <link href="../../css/style.css" rel="stylesheet">
    
    <!-- Personalizado -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            background-image: url(https://images.unsplash.com/photo-1663970206579-c157cba7edda?fm=jpg&q=60&w=3000);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1, h2 {
            color: #fff;
            text-align: center;
            padding-top: 30px;
            font-size: 36px;
        }

        h2 {
            font-size: 28px;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            margin: 100px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 12px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>


    <div class="container">
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
                <?php foreach ($testimonis as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td><?= htmlspecialchars($item['sourname']); ?></td>
                        <td><?= htmlspecialchars($item['description']); ?></td>
                        <td><img src="<?= htmlspecialchars($item['image']); ?>" alt="Imagen"></td>
                        <td><?= htmlspecialchars($item['data']); ?></td>
                        <td><?= htmlspecialchars($item['rating']); ?></td>
                        <td>
                            <a href="../testimonials/add-testimonials.php?id=<?= $item['id'] ?>" class="btn btn-info">Añadir</a>
                            <a href="../testimonials/edit-testimonials.php?id=<?= $item['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="../testimonials/delete-testimonials.php?id=<?= $item['id'] ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Noticias</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($noticias as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['newdate']); ?></td>
                        <td><?= htmlspecialchars($item['title']); ?></td>
                        <td><?= htmlspecialchars($item['subtitle']); ?></td>
                        <td><img src="<?= htmlspecialchars($item['thumbnail']); ?>" alt="Imagen"></td>
                        <td><?= htmlspecialchars($item['description']); ?></td>
                        <td>
                            <a href="../noticias/add-noticias.php?id=<?= $item['id'] ?>" class="btn btn-info">Añadir</a>
                            <a href="../noticias/edit-noticias.php?id=<?= $item['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="../noticias/delete-noticias.php?id=<?= $item['id'] ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Projectos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>URL</th>
                    <th>Descripción</th>
                    <th>Thumbnail</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyectos  as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['title']); ?></td>
                        <td><?= htmlspecialchars($item['url']); ?></td>
                        <td><?= htmlspecialchars($item['descripcio']); ?></td>
                        <td><img src="<?= htmlspecialchars($item['thumbnail']); ?>" alt="Imagen"></td>
                        <td>
                            <a href="../noticias/add-noticias.php?id=<?= $item['id'] ?>" class="btn btn-info">Añadir</a>
                            <a href="../noticias/edit-noticias.php?id=<?= $item['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="../noticias/delete-noticias.php?id=<?= $item['id'] ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/bootstrap.min.js"></script>
</body>
</html>
