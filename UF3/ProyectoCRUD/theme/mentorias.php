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

<style>
  .grid-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 20px;
    margin-top: 50px;
  }

  .grid-item {
    width: 100%;
  }

  .full-width {
    grid-column: span 2; /* Hace que la última imagen ocupe toda la fila */
  }

  .image-container {
    width: 100%;
    height: 550px; /* Más grande */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  .image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Mantiene la proporción sin deformación */
  }

  .project-hover {
    text-align: center;
  }

  .project-hover a {
    font-size: 2rem; /* Títulos más grandes */
  }

  .icon-lg {
    font-size: 2rem; /* Íconos más visibles */
  }

  /* Responsivo */
  @media (max-width: 768px) {
    .grid-container {
      grid-template-columns: 1fr;
    }
    
    .full-width {
      grid-column: span 1;
    }
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
        <h1 class="display-1 text-white font-weight-bold font-primary">Mentorias</h1>
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
        <img src="https://s1.abcstatics.com/abc/www/multimedia/sociedad/2024/06/28/llados-princ-U25102587720TsY-1024x512@diario_abc.JPG" alt="about" class="img-fluid">
      </div>
      <div class="col-md-6 col-lg-5">
        <div class="progress-block">
          <h6 class="text-uppercase">Dinero</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="100">
              <span class="skill-number text-dark font-weight-bold"><span class="count">100</span>%</span>
            </div>
          </div>
        </div>
        <div class="progress-block">
          <h6 class="text-uppercase">Estabilidad</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="100">
              <span class="skill-number text-dark font-weight-bold"><span class="count">100</span>%</span>
            </div>
          </div>
        </div>
        <div class="progress-block">
          <h6 class="text-uppercase">Mileuristas</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="0">
              <span class="skill-number text-dark font-weight-bold"><span class="count">0</span>%</span>
            </div>
          </div>
        </div>
        <div class="progress-block">
          <h6 class="text-uppercase">Vicios</h6>
          <div class="progress">
            <div class="progress-bar" data-percent="0">
              <span class="skill-number text-dark font-weight-bold"><span class="count">0</span>%</span>
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
        <div class="overlay-secondary video-player" style="position: relative;">
          <!-- Imagen de miniatura -->
          <img src="https://s1.eestatic.com/2023/07/14/actualidad/778932810_234717758_1706x960.jpg" alt="video-thumb" class="img-fluid w-100">
          
          <!-- Botón de reproducción centrado -->
          <div class="text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/blyUqDOCI8U?si=0-Tj_CRr3bx800Vx">
              <i class="text-center icon-sm icon-box rounded-circle text-white bg-gradient-primary d-block ti-control-play"></i>
            </a>
          </div>
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