<!-- Abrir archivo con php -S 0.0.0.0:8000 -t theme -->

<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
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
  
<?php
// Conexión a la base de datos
$host = 'mysql-davidescalonagarcia.alwaysdata.net';
$dname = 'davidescalonagarcia_examen';
$username = '393689_examen';
$password = 'Alumno_1516';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurar PDO para que muestre errores
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}

// Consulta para obtener todos los usuarios
$sql = "SELECT id, data_inici, data_fi, estat, preu_total, id_usuari, id_vehicle FROM Reserves"; // Eliminamos el LIMIT 4 para obtener todos los usuarios
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Obtener los resultados
$reserves = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<!-- Mostrar los usuarios -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Reserves</h2>
        <div class="section-border"></div>
      </div>
    </div>

    <!-- Contenedor para los usuarios -->
    <div class="row no-gutters" id="user-container">
      <?php if ($reserves): ?>
          <?php foreach ($reserves as $reserve): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card hover-shadow border-0">
                  <h4>Inicio del tramite: <a class="text-dark"<?= $reserve['id']; ?>"><?= htmlspecialchars($reserve['data_inici']); ?></a></h4>
                  <h4>Final del tramite: <a class="text-dark"<?= $reserve['id']; ?>"><?= htmlspecialchars($reserve['data_fi']); ?></a></h4>
                  <h4>Precio del vehiculo: <a class="text-dark"<?= $reserve['id']; ?>"><?= htmlspecialchars($reserve['preu_total']); ?></a></h4>
                  <h4>Identificado del vehiculo: <a class="text-dark"<?= $reserve['id']; ?>"><?= htmlspecialchars($reserve['id_vehicle']); ?></a></h4>
                      <div class="card-body text-center">
                          <h4><a class="text-dark"<?= $reserve['id']; ?>"><?= htmlspecialchars($reserve['estat']); ?></a></h4>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      <?php else: ?>
          <p class="text-center col-12">No hay reservas disponibles.</p>
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