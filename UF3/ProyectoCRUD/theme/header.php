<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Eliminar las líneas duplicadas de meta viewport -->
    <meta name="theme-name" content="agen" />
    
    <!-- ** Plugins Needed for the Project ** -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="plugins/venobox/venobox.css">
    <link rel="stylesheet" href="plugins/card-slider/css/style.css">

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px 40px;
            align-items: center;
        }

        .navbar .navbar-brand {
            color: white;
            font-size: 24px;
            margin-right: 100px;
        }

        .navbar a {
            color: white;
            padding: 14px 25px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin: 0 15px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #343a40;
            min-width: 180px;
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar nav {
            display: flex;
        }
    </style>
</head>
<body>
    
<header class="navigation fixed-top navbar">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <p class="navbar-brand mt-3" href="indexx.php">UNIVERSITY</p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="/historia.php">Mi Historia</a></li>
        <li class="nav-item"><a class="nav-link" href="/indexx.php">Asesorías</a></li>
        <li class="nav-item"><a class="nav-link" href="/mentorias.php">Mentorías</a></li>
        <li class="nav-item"><a class="nav-link" href="/resultados.php">Proyectos</a></li>
        <li class="nav-item"><a class="nav-link" href="/noticias.php">Noticias</a></li>
        <li class="nav-item"><a class="nav-link" href="/portfolio.php">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="/contacto.php">Contáctame</a></li>
        
        <div class="dropdown">
          <a href="#" class="dropbtn">Cursos</a>
          <div class="dropdown-content">
            <a href="planes.php">Escoge tu Plan</a>
            <a href="#">Tu1Centimo</a>
            <a href="#">Tu1Euro</a>
            <a href="#">Tu1Billete</a>
            <a href="#">Tu1Millón</a>
            <a href="#">Tu1Billón</a>
            <a href="#">Tu1S</a>
          </div>
        </div>
        
        <?php if (isset($_SESSION['user_id'])): ?>
          <div class="dropdown">
            <a href="#" class="dropbtn">
              <img src="<?= $_SESSION['user_avatar'] ?>" alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%;">
              <?= $_SESSION['user_name'] ?>
            </a>
            <div class="dropdown-content">
              <a href="perfil.php">Perfil</a>
              <?php if ($_SESSION['user_rol'] === 'admin'): ?>
                <a href="configuracion.php">Configuración</a>
                <!-- Ajustamos la ruta para el admin panel -->
                <a href="/admin/users/adminPanel.php">Panel Admin</a>
              <?php endif; ?>
              <!-- Ruta corregida para cerrar sesión -->
              <a href="logout.php" class="text-danger">Cerrar Sesión</a>
            </div>
          </div>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="inicio.php">Iniciar Sesión</a></li>
          <li class="nav-item"><a class="nav-link" href="registro.php">Registrarse</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>

<!-- Scripts -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/venobox/venobox.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="plugins/counto/apear.js"></script>
<script src="plugins/counto/counTo.js"></script>
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
