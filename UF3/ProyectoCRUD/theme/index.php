<!-- Abrir archivo con php -S 0.0.0.0:8000 -t theme -->

<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>

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
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>
<body>
  
<?php include 'header.php'; ?>

<!-- banner -->
<section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
  data-background="images/banner/banner2.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Asesiorias TU1CENTIMO</h1>
      </div>
    </div>
  </div>
</section>
<!-- /banner -->

<!-- service -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2 class="section-title">Mis Servicios</h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat.</p>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4 active">
          <div class="card-body text-center">
            <div class="position-relative">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-palette mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-palette"></i>
            </div>
            <h4 class="mb-4">Asesorias</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-center">
            <div class="position-relative">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-dashboard mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-dashboard"></i>
            </div>
            <h4 class="mb-4">Mentorias</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-center">
            <div class="position-relative">
              <i
                class="icon-lg icon-box bg-gradient-primary rounded-circle ti-announcement mb-5 d-inline-block text-white"></i>
              <i class="icon-lg icon-watermark text-white ti-announcement"></i>
            </div>
            <h4 class="mb-4">Cursos</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /service -->

<!-- feature -->
<?php include 'feature.php'; ?>
<!-- /feature -->

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




<!-- /team -->

<!-- about -->
<section class="section-lg position-relative bg-cover" data-background="images/backgrounds/about-bg.jpg">
  <img src="images/backgrounds/about-bg-overlay.png" alt="overlay" class="overlay-image img-fluid">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6 col-md-8 col-sm-7 col-8">
        <h2 class="text-white mb-4">Nuevo Video!!</h2>
        <p class="text-light mb-4">📢 ¡Nuevo video en nuestro canal de YouTube! 🎥✨</p>
      </div>
      <div class="col-md-2 col-sm-4 col-4 text-right align-self-end">
        <a class="venobox" data-autoplay="true" data-vbtype="video"
          href="https://youtu.be/DoN6ozQh3Ls?si=HHuq0WcUMFketoxh"><i
            class="text-center icon-sm icon-box rounded-circle text-white bg-gradient-primary d-block ti-control-play"></i></a>
      </div>
    </div>
  </div>
</section>
<!-- /about -->

<section>
  <div class="container-fluid px-0">
    <div class="grid-container">
      <!-- Primera imagen -->
      <div class="grid-item">
        <div class="project-item">
          <div class="image-container">
            <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2160105627/settings_images/a4ed3d8-c127-2802-6b1b-6b2cb10fc3_image.png" alt="project-image">
          </div>
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h2">2016</a>
            <a href="#"><i class="ti-link icon-lg text-white"></i></a>
          </div>
        </div>
      </div>
      <!-- Segunda imagen -->
      <div class="grid-item">
        <div class="project-item">
          <div class="image-container">
            <img src="https://estaticosgn-cdn.deia.eus/clip/76ae49e2-af7f-4679-b383-ad7282afa017_16-9-aspect-ratio_default_0.jpg" alt="project-image">
          </div>
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h2">2020</a>
            <a href="#"><i class="ti-link icon-lg text-white"></i></a>
          </div>
        </div>
      </div>
      <!-- Tercera imagen (abajo, centrada) -->
      <div class="grid-item full-width">
        <div class="project-item">
          <div class="image-container">
            <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2160105627/settings_images/7c271a-d25b-516e-6c4f-3d27bd4c8e_image.png" alt="project-image">
          </div>
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h2">2025</a>
            <a href="#"><i class="ti-link icon-lg text-white"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Estilos para imágenes grandes y distribución en 2 arriba y 1 abajo -->
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

<section class="section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Cursos a escoger</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Tu1Centimo</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">50</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Escogelo ahora</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Tu1Euro</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">100</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Tu1Billete</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">500</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0 mt-4">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Tu1Millon</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">1.000</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0 mt-4">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Tu1Billon</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">2.000</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0 mt-4">
        <div class="card bottom-shape bg-secondary pt-4 pb-5">
          <div class="card-body text-center">
            <h4 class="text-white">Tu1S</h4>
            <p class="text-light mb-4">Besic and simple website</p>
            <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">5.000</span></p>
            <ul class="list-unstyled mb-5">
              <li class="text-white mb-3">Mobile-Optimized Website</li>
              <li class="text-white mb-3">Powerful Website Metrics</li>
              <li class="text-white mb-3">Free Custom Domain</li>
              <li class="text-white mb-3">24/7 Customer Support</li>
              <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
              <li class="text-white mb-3">Sell unlimited Product</li>
            </ul>
            <a href="#" class="btn btn-outline-light">Try it now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
    <?php
    // Conectar a la base de datos
    require_once 'config.php';

    // Consulta para obtener las 3 últimas noticias ordenadas por fecha (newdate)
    $sql = "SELECT id, newdate, title, subtitle, thumbnail, description FROM NEWS ORDER BY newdate DESC LIMIT 3";
    $result = $mysqli->query($sql);

    if (!$result) {
        die("Error en la consulta SQL: " . $mysqli->error);
    }

    $news = [];
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
    ?>

    <div class="col-lg-10 mx-auto text-center">
        <h2>Últimas Noticias</h2>
        <div class="section-border"></div>
    </div>

    <div class="row">
        <?php foreach ($news as $item): ?>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <article class="card">
                <img src="<?php echo $item['thumbnail']; ?>" alt="post-thumb" class="card-img-top mb-2" style="width: 100%; height: 250px; object-fit: cover;">
                <div class="card-body p-0">
                    <time><?php echo date("F j, Y", strtotime($item['newdate'])); ?></time>
                    <a href="blog-single.php?id=<?php echo $item['id']; ?>" class="h4 card-title d-block my-3 text-dark hover-text-underline">
                        <?php echo $item['title']; ?>
                    </a>
                    <a href="blog-single.php?id=<?php echo $item['id']; ?>" class="btn btn-transparent">Read more</a>
                </div>
            </article>
        </div>
        <?php endforeach; ?>
    </div>

    </div>
  </div>
</section>

<!-- /blog -->

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