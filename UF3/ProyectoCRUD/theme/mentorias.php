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
  <title>Agen | Bootstrap Agency Template</title>

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
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  
<?php include 'header.php'; ?>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">About Agen</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- progressbar -->
<section class="section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-4 mb-lg-0">
        <img src="images/about/about-us.png" alt="about" class="img-fluid">
      </div>
      <div class="col-md-6 col-lg-5">
        <div class="progress-block">
          <h6 class="text-uppercase">HTML5 Expertise</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="30">
              <span class="skill-number text-dark font-weight-bold"><span class="count">85</span>%</span>
            </div>
          </div>
        </div>
        <div class="progress-block">
          <h6 class="text-uppercase">jQuery Expertise</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="95">
              <span class="skill-number text-dark font-weight-bold"><span class="count">95</span>%</span>
            </div>
          </div>
        </div>
        <div class="progress-block">
          <h6 class="text-uppercase">PHP Expertise</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="79">
              <span class="skill-number text-dark font-weight-bold"><span class="count">79</span>%</span>
            </div>
          </div>
        </div>
        <div class="progress-block">
          <h6 class="text-uppercase">User Interface Expertise</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="90">
              <span class="skill-number text-dark font-weight-bold"><span class="count">90</span>%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /progressbar -->

<!-- video -->
<section class="section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="overlay-secondary video-player">
          <img src="images/about/video-thumb.jpg" alt="video-thumb" class="img-fluid w-100">
          <a class="play-icon">
            <i class="text-center icon-sm icon-box-sm rounded-circle text-white bg-gradient-primary d-block ti-control-play content-center"
              data-video="https://www.youtube.com/embed/jrkvirglgaQ?autoplay=1">
              <div class="ripple"></div>
            </i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /video -->

<?php
// Conexión a la base de datos
$host = 'mysql-davidescalonagarcia.alwaysdata.net';
$dname = 'davidescalonagarcia_base';
$username = '393689';
$password = 'Alumno_1516';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurar PDO para que muestre errores
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}

// Consulta para obtener todos los usuarios
$sql = "SELECT id, name, avatar FROM USERS"; // Eliminamos el LIMIT 4 para obtener todos los usuarios
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Obtener los resultados
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Mostrar los usuarios -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Lista de Clientes Satisfechos</h2>
        <p>Esta gente decidio hacer un cambio en su vida apostando por nuestros metodos.</p>
        <div class="section-border"></div>
      </div>
    </div>

    <!-- Contenedor para los usuarios -->
    <div class="row no-gutters" id="user-container">
      <?php if ($users): ?>
          <?php foreach ($users as $user): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card hover-shadow border-0">
                      <img src="<?= htmlspecialchars($user['avatar']); ?>" alt="team-member" class="card-img-top uniform-image">
                      <div class="card-body text-center">
                          <h4><a class="text-dark" href="team-single.php?id=<?= $user['id']; ?>"><?= htmlspecialchars($user['name']); ?></a></h4>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      <?php else: ?>
          <p class="text-center col-12">No hay usuarios disponibles.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Estilos CSS para hacer que las imágenes sean del mismo tamaño -->
<style>
  .uniform-image {
    width: 100%; /* Establecer el ancho de las imágenes a 100% */
    height: 250px; /* Establecer la altura de las imágenes */
    object-fit: cover; /* Hace que las imágenes se ajusten a estas dimensiones sin distorsionarse */
    border-radius: 10px; /* Establece bordes redondeados */
  }

  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
  }

  .section {
    padding: 80px 0;
  }

  .section-border {
    width: 60px;
    height: 3px;
    background-color: #000;
    margin: 30px auto;
  }
</style>


<!-- Estilos CSS para hacer que las imágenes sean del mismo tamaño -->
<style>
  .uniform-image {
    width: 200px; /* Establecer el ancho de las imágenes */
    height: 200px; /* Establecer la altura de las imágenes */
    object-fit: cover; /* Hace que las imágenes se ajusten a estas dimensiones sin distorsionarse */
    border-radius: 50%; /* Si quieres que las imágenes sean circulares */
  }

  /* Flecha para el botón de "Load More" */
  #load-more {
    margin-top: 20px;
  }
</style>


<?php
// Conexión a la base de datos
$host = 'mysql-davidescalonagarcia.alwaysdata.net';
$dname = 'davidescalonagarcia_base';
$username = '393689';
$password = 'Alumno_1516';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurar PDO para que muestre errores
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}

// Consulta para obtener todos los testimonios
$sql = "SELECT id, name, description, image FROM TESTIMONIS"; // Asegúrate de que la tabla 'TESTIMONIALS' tenga estos campos
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Obtener los resultados
$testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Testimonial Slider -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="text-white mb-5">Testimonis de mis Clientes</h2>
      </div>
    </div>
    <div class="row bg-contain" data-background="images/banner/brush.png">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div id="slider" class="ui-card-slider bg-contain">
          <?php foreach ($testimonials as $testimonial): ?>
            <div class="slide">
              <div class="card text-center">
                <div class="card-body px-5 py-4">
                  <!-- Imagen más pequeña -->
                  <img src="<?= htmlspecialchars($testimonial['image']); ?>" alt="<?= htmlspecialchars($testimonial['name']); ?>" class="img-fluid rounded-circle mb-4" style="max-width: 80px; height: auto;">
                  <h4 class="text-secondary"><?= htmlspecialchars($testimonial['name']); ?></h4>
                  <p><?= htmlspecialchars($testimonial['description']); ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Estilos CSS adicionales si es necesario -->
<style>
  .ui-card-slider .slide {
    transition: all 0.3s ease-in-out;
  }

  .ui-card-slider .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
  }

  .ui-card-slider .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
  }
</style>


<!-- /testimonial-slider -->

<!-- call to action -->
<section class="section">
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="images/backgrounds/cta-bg.jpg">
  <div class="row">
    <div class="col-lg-8 offset-lg-1">
      <h2 class="text-gradient-primary">Let's Start With Us!</h2>
      <p class="h4 font-weight-bold text-white mb-4">Lorem ipsum dolor sit amet, magna habemus ius ad</p>
      <a href="contact.html" class="btn btn-lg btn-primary">Let’s talk</a>
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