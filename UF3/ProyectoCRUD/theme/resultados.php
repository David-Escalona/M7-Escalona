<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">
  <link href="css/style.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

  <style>
    body {
      font-family: 'Comfortaa', sans-serif;
    }
    .card img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }
  </style>
</head>

<body>

<?php include 'header.php'; ?>
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Resultados</h1>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row">
      
      <?php
      require_once 'config.php';

      // Obtener los proyectos
      $query = "SELECT id, title, descripcio, thumbnail FROM PROJECTS";
      $result = $mysqli->query($query);

      if (!$result) {
          die("Error en la consulta SQL: " . $mysqli->error);
      }

      // Iterar sobre los proyectos y mostrarlos en la página
      while ($row = $result->fetch_assoc()) {
      ?>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card hover-bg-secondary shadow py-4">
            <div class="card-body text-start">
              <div class="position-relative">
                <img src="<?= $row['thumbnail'] ?>" alt="Imagen del proyecto">
              </div>
              <h4 class="mb-4"><?= $row['title'] ?></h4>
              <p><?= $row['descripcio'] ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    
    </div>
  </div>
</section>

<?php include 'feature.php'?>

<section class="section">
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="images/backgrounds/cta-bg.jpg">
    <div class="row">
      <div class="col-lg-8 offset-lg-1">
        <h2 class="text-gradient-primary">¡Comienza con nosotros!</h2>
        <p class="h4 font-weight-bold text-white mb-4">Lorem ipsum dolor sit amet, magna habemus ius ad</p>
        <a href="contact.html" class="btn btn-lg btn-primary">Hablemos</a>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<!-- Scripts -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/venobox/venobox.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="plugins/counto/apear.js"></script>
<script src="plugins/counto/counTo.js"></script>
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>
</html>
