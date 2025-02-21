<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="agen" />
    
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
    <title>Document</title>

    <style>
        /* Estilo básico de la barra de navegación */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between; /* Esto separa los elementos: el título a la izquierda y el menú a la derecha */
            padding: 10px 40px; /* Aumenté el espacio lateral en la barra de navegación */
            align-items: center; /* Alinea verticalmente los elementos */
        }

        /* Estilo del título "UNIVERSITY" */
        .navbar .navbar-brand {
            color: white;
            font-size: 24px; /* Aumenté el tamaño del texto para que sea más prominente */
            margin-right: 100px; /* Aumento el margen derecho para más espacio */
        }

        /* Estilo de los enlaces del menú */
        .navbar a {
            color: white;
            padding: 14px 25px; /* Aumenté el espacio alrededor de los enlaces */
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Estilo del contenedor del dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
            margin: 0 15px; /* Aumento el margen entre el dropdown y los demás enlaces */
        }

        /* El contenido del dropdown */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #343a40;
            min-width: 180px;
            z-index: 1;
            border-radius: 5px; /* Bordes redondeados */
        }

        /* Estilo de los elementos dentro del dropdown */
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
        }

        /* Cambiar el color cuando el mouse está sobre un ítem */
        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Mostrar el dropdown cuando se pasa el mouse */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Asegura que los items del menú estén en una línea */
        .navbar nav {
            display: flex;
        }
    </style>

</head>
<body>
    
<header class="navigation fixed-top navbar">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <p class="navbar-brand mt-3" href="index.php">UNIVERSITY</p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="historia.php">Mi Historia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Asesorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mentorias.php">Mentorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="resultados.php">Resultados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="noticias.php">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portfolio.php">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contactame</a>
        </li>
        <div class="dropdown">
            <a href="#" class="dropbtn">Cursos</a>
            <div class="dropdown-content">
                <a href="planes.php">Escoje tu Plan</a>
                <a href="#">Tu1Centimo</a>
                <a href="#">Tu1Euro</a>
                <a href="#">Tu1Billete</a>
                <a href="#">Tu1Millon</a>
                <a href="#">Tu1Billon</a>
                <a href="#">Tu1S</a>
            </div>
        </div>
        
      </ul>
    </div>
  </nav>
</header>

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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- Popper.js (necesario para los tooltips y dropdowns) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>
