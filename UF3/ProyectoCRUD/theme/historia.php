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
  <title>Mi Historia</title>

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
        <h1 class="display-1 text-white font-weight-bold font-primary">Mi Historia</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- Project Section -->
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

<!-- clients -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="client-logo-slider d-flex align-items-center">
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-1.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-2.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-3.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-4.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-5.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-1.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-2.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-3.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-4.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-5.png" alt="client-logo"></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /clients -->

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