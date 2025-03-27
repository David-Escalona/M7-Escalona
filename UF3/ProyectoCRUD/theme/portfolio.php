<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Portfolio</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

  <style>

  body{
    font-family: comfortaa;
  }

  </style>

</head>

<body>

<?php include 'header.php'; ?>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Portfolio</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto ">
        <h2 class="section-title text-center">Mis Servicios</h2>
        <p class="lead text-start">Ofrecemos servicios personalizados de Mentorias y Asesorias, adaptados a las necesidades de cada cliente. Nos especializamos en asesoramiento con un enfoque en calidad, compromiso y resultados. Nuestro objetivo es proporcionar soluciones eficaces y mejorar la experiencia de nuestros clientes de forma profesional y confiable."</p>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body">
            <div class="position-relative text-center">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-palette mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-palette"></i>
            </div>
            <h4 class="mb-4 text-center">Asesorias</h4>
            <p class="text-start">Aqui ecibirás orientación especializada para tomar decisiones estratégicas y resolver desafíos, enfocándonos en soluciones prácticas para tu éxito.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body">
            <div class="position-relative text-center">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-dashboard mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-dashboard"></i>
            </div>
            <h4 class="mb-4 text-center">Mentorias</h4>
            <p class="text-start">Te ofrezco una mentoría personalizada para alcanzar tus metas más rápido, superando obstáculos y desarrollando estrategias clave para tu éxito.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body">
            <div class="position-relative text-center">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-announcement mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-announcement"></i>
            </div>
            <h4 class="mb-4 text-center">Cursos</h4>
            <p class="text-start">Ofrezco cursos prácticos enfocados para que adquieras habilidades y conocimientos, impulsando tu crecimiento personal y profesional.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once 'config.php';

$sql = "SELECT id, name, sourname, description, image, data, rating 
        FROM TESTIMONIS 
        ORDER BY rating DESC 
        LIMIT 3";

$result = $mysqli->query($sql);

if (!$result) {
    die("Error en la consulta SQL: " . $mysqli->error);
}

$testimonios = [];
while ($row = $result->fetch_assoc()) {
    $testimonios[] = $row;
}
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h2 class="text-center mb-5">Casos de Éxito</h2>

        <div class="row">
          <?php foreach ($testimonios as $item): ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="<?php echo $item['image']; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $item['name'] . ' ' . $item['sourname']; ?></h5>
                  <span class="text-muted"><?php echo date("F j, Y", strtotime($item['data'])); ?></span>
                  <p class="card-text mt-3"><?php echo $item['description']; ?></p>
                  <span class="badge badge-success">Rating: <?php echo $item['rating']; ?></span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- /service -->

<!-- feature -->
<?php include 'feature.php'?>
<!-- /feature -->

<!-- call to action -->
<section class="section">
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="images/backgrounds/cta-bg.jpg">
  <div class="row">
    <div class="col-lg-8 offset-lg-1">
      <h2 class="text-gradient-primary">Contacta conmigo!</h2>
      <p class="h4 font-weight-bold text-white mb-4">Atenderemos cualquier consulta solicitada.</p>
      <a href="contacto.php" class="btn btn-lg btn-primary">Hablemos</a>
    </div>
  </div>
</div>
</section>
<!-- /call to action -->

<?php include 'footer.php'; ?>

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

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>