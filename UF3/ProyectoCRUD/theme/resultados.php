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
        <h1 class="display-1 text-white font-weight-bold font-primary">Resultados</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- service -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-start">
            <div class="position-relative">
              
            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT IMAGE FROM PROJECTS WHERE id = 1");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["IMAGE"] . "<br>";
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </div>
            <h4 class="mb-4">
              
            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT NAME, SOURNAME FROM USERS WHERE id = 1");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["NAME"] . "<br>";
                echo "" . $row["SOURNAME"];
            } else {
                echo "No se encontró un usuario con id 1.";
            }

            ?>

            </h4>
            <p class="d-flex justify-content-start">

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT SUBTITLE, DESCRIPCIO FROM PROJECTS WHERE id = 1");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["SUBTITLE"] . "<br><br>";
                echo "" . $row["DESCRIPCIO"];
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-start">
            <div class="position-relative">
            
            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT IMAGE FROM PROJECTS WHERE id = 2");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["IMAGE"] . "<br>";
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </div>
            <h4 class="mb-4">

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT NAME, SOURNAME FROM USERS WHERE id = 2");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["NAME"] . "<br>";
                echo "" . $row["SOURNAME"];
            } else {
                echo "No se encontró un usuario con id 1.";
            }

            ?>

            </h4>
            <p>

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT SUBTITLE, DESCRIPCIO FROM PROJECTS WHERE id = 2");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["SUBTITLE"] . "<br><br>";
                echo "" . $row["DESCRIPCIO"];
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-start">
            <div class="position-relative">
            
            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT IMAGE FROM PROJECTS WHERE id = 3");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["IMAGE"] . "<br>";
            } else {
                echo "No se encontró un usuario";
            }

            ?>
          
            </div>
            <h4 class="mb-4">

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT NAME, SOURNAME FROM USERS WHERE id = 3");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["NAME"] . "<br>";
                echo "" . $row["SOURNAME"];
            } else {
                echo "No se encontró un usuario con id 1.";
            }

            ?>

            </h4>
            <p>

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT SUBTITLE, DESCRIPCIO FROM PROJECTS WHERE id = 3");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["SUBTITLE"] . "<br><br>";
                echo "" . $row["DESCRIPCIO"];
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-start">
            <div class="position-relative">
            
            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT IMAGE FROM PROJECTS WHERE id = 4");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["IMAGE"] . "<br>";
            } else {
                echo "No se encontró un usuario";
            }

            ?>
          
            </div>
            <h4 class="mb-4">

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT NAME, SOURNAME FROM USERS WHERE id = 4");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["NAME"] . "<br>";
                echo "" . $row["SOURNAME"];
            } else {
                echo "No se encontró un usuario con id 1.";
            }

            ?>

            </h4>
            <p>

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT SUBTITLE, DESCRIPCIO FROM PROJECTS WHERE id = 4");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["SUBTITLE"] . "<br><br>";
                echo "" . $row["DESCRIPCIO"];
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-start">
            <div class="position-relative">
            
            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT IMAGE FROM PROJECTS WHERE id = 5");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["IMAGE"] . "<br>";
            } else {
                echo "No se encontró un usuario";
            }

            ?>
          
            </div>
            <h4 class="mb-4">

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT NAME, SOURNAME FROM USERS WHERE id = 5");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["NAME"] . "<br>";
                echo "" . $row["SOURNAME"];
            } else {
                echo "No se encontró un usuario con id 1.";
            }

            ?>

            </h4>
            <p>

            <?php

            require_once 'config.php';

            
            $result = $mysqli->query("SELECT SUBTITLE, DESCRIPCIO FROM PROJECTS WHERE id = 5");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["SUBTITLE"] . "<br><br>";
                echo "" . $row["DESCRIPCIO"];
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card hover-bg-secondary shadow py-4">
          <div class="card-body text-start">
            <div class="position-relative">
            
            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT IMAGE FROM PROJECTS WHERE id = 6");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["IMAGE"] . "<br>";
            } else {
                echo "No se encontró un usuario";
            }

            ?>
          
            </div>
            <h4 class="mb-4">

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT NAME, SOURNAME FROM USERS WHERE id = 6");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["NAME"] . "<br>";
                echo "" . $row["SOURNAME"];
            } else {
                echo "No se encontró un usuario con id 1.";
            }

            ?>

            </h4>
            <p>

            <?php

            require_once 'config.php';

            $result = $mysqli->query("SELECT SUBTITLE, DESCRIPCIO FROM PROJECTS WHERE id = 6");

            if (!$result) {
                die("Error en la consulta SQL: " . $mysqli->error);
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "" . $row["SUBTITLE"] . "<br><br>";
                echo "" . $row["DESCRIPCIO"];
            } else {
                echo "No se encontró un usuario";
            }

            ?>

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /service -->

<!-- feature -->
<section class="section bg-secondary position-relative">
  <div class="bg-image overlay-secondary">
    <img src="images/feature.jpg" alt="bg-image">
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="row align-items-center">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <img src="images/feature.jpg" alt="feature-image" class="img-fluid">
          </div>
          <div class="col-lg-7 offset-lg-1">
            <div class="row">
              <div class="col-12">
                <h2 class="text-white">We know What Bait to Use</h2>
                <div class="section-border ml-0"></div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-vector mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">User Experience</h4>
                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-layout mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">Responsive Layout</h4>
                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-headphone-alt mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">Digital Solutions</h4>
                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="media">
                  <i class="icon text-gradient-primary ti-ruler-pencil mr-3"></i>
                  <div class="media-body">
                    <h4 class="text-white">Bootstrap 4x</h4>
                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /feature -->

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