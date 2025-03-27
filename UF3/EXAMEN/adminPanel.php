<?php
session_start();
require_once('config.php');

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
$resultUsuaris = $mysqli->query("SELECT * FROM Usuaris");
$usuaris = ($resultUsuaris) ? $resultUsuaris->fetch_all(MYSQLI_ASSOC) : [];

// Extracción de noticias
$resultVehicles = $mysqli->query("SELECT * FROM Vehicles");
$vehicles = ($resultVehicles) ? $resultVehicles->fetch_all(MYSQLI_ASSOC) : [];

// Extracción de proyectos
$resultReserves = $mysqli->query("SELECT * FROM Reserves");
$reserves = ($resultReserves) ? $resultReserves->fetch_all(MYSQLI_ASSOC) : [];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
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
        .mts{
            margin-top: 100px;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<form action="logout.php" method="post">
    <button type="submit" class="btn btn-danger mts">Cerrar Sesión</button>
</form>


    <div class="container">
        <h1>Panel de Usuarios</h1>

        <h2>Usuarios</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Gmail</th>
                    <th>Rol</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuaris as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nom']); ?></td>
                        <td><img src="<?= htmlspecialchars($item['imatge_perfil']); ?>" alt="Imagen"></td>
                        <td><?= htmlspecialchars($item['email']); ?></td>
                        <td><?= htmlspecialchars($item['rol']); ?></td>
                        <td>
                            <a href="?id=<?= $item['id'] ?>" class="btn btn-info">PROXIMAMENTE</a>
                            <a href="?id=<?= $item['id'] ?>" class="btn btn-warning">PROXIMAMENTE</a>
                            <a href="?id=<?= $item['id'] ?>" class="btn btn-danger">PROXIMAMENTE</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <h1>Panel de Vehiculos</h1>

        <h2>Vehiculos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Disponibilidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['model']); ?></td>
                        <td><?= htmlspecialchars($item['categoria']); ?></td>
                        <td><?= htmlspecialchars($item['preu_dia']); ?></td>
                        <td><img src="<?= htmlspecialchars($item['imatge']); ?>" alt="Imagen"></td>
                        <td><?= htmlspecialchars($item['disponible']); ?></td>
                        <td>
                            <a href="añadirVehiculos.php?id=<?= $item['id'] ?>" class="btn btn-info">Añadir</a>
                            <a href="editarVehiculos.php?id=<?= $item['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="borrarVehiculos.php?id=<?= $item['id'] ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



        <h1>Panel de Reservas</h1>

        <h2>Reservas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserves as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['data_inici']); ?></td>
                        <td><?= htmlspecialchars($item['data_fi']); ?></td>
                        <td><?= htmlspecialchars($item['estat']); ?></td>
                        <td><?= htmlspecialchars($item['preu_total']); ?></td>
                        <td>
                            <a href="añadirReserva.php?id=<?= $item['id'] ?>" class="btn btn-info">Añadir</a>
                            <a href="?id=<?= $item['id'] ?>" class="btn btn-warning">PROXIMAMENTE</a>
                            <a href="borrarReserva.php?id=<?= $item['id'] ?>" class="btn btn-danger">Borrar</a>
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
