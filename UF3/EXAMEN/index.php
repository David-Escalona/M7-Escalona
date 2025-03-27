<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Examen</title>

    <style>

    body {
      background-image: url(https://img.freepik.com/fotos-premium/fondo-borroso-negro-gris-oscuro-tiene-poco-fondo-suave-claro-abstracto-diseno-grafico-presentacion-papel-tapiz_532332-545.jpg);
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }

  .uniform-image {
    width: 100%; /* Establecer el ancho de las imágenes a 100% */
    height: 300px; /* Establecer la altura de las imágenes */
    object-fit: cover; /* Hace que las imágenes se ajusten a estas dimensiones sin distorsionarse */
    border-radius: 10px; /* Establece bordes redondeados */
    margin-top: 0px;
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

  .margen {
    margin-top: 150px;
    display: flex;
    justify-content: center;
  }

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
    width: 100%;
    height: 3px;
    background-color: #000;
    margin: 30px auto;
  }

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
  .df{
    display: flex;
    justify-content: center;
    width: 1000px;
  }

  </style>
</head>
<body>
      
    <?php include 'header.php'; ?>

    <h1 class="margen mb-4 text-white">Usuarios Registrados</h1>

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
$sql = "SELECT id, nom, imatge_perfil FROM Usuaris"; // Eliminamos el LIMIT 4 para obtener todos los usuarios
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Obtener los resultados
$usuaris = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- Contenedor para los usuarios -->
    <div class="row no-gutters" id="user-container">
      <?php if ($usuaris): ?>
          <?php foreach ($usuaris as $usuari): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card hover-shadow border-0">
                      <img src="<?= htmlspecialchars($usuari['imatge_perfil']); ?>" alt="team-member" class="card-img-top uniform-image">
                      <div class="card-body text-center">
                          <h4><a class="text-dark"<?= $usuari['id']; ?>"><?= htmlspecialchars($usuari['nom']); ?></a></h4>
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

        <h1 class="margen text-white">Vehiculos Disponibles</h1>

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
$sql = "SELECT id, model, imatge FROM Vehicles"; // Eliminamos el LIMIT 4 para obtener todos los usuarios
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Obtener los resultados
$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<!-- Mostrar los usuarios -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <div class="section-border"></div>
      </div>
    </div>

    <!-- Contenedor para los usuarios -->
    <div class="row no-gutters" id="user-container">
      <?php if ($vehicles): ?>
          <?php foreach ($vehicles as $vehicle): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                  <div class="card hover-shadow border-0">
                      <img src="<?= htmlspecialchars($vehicle['imatge']); ?>" alt="team-member" class="card-img-top uniform-image">
                      <div class="card-body text-center">
                          <h4><a class="text-dark"<?= $vehicle['id']; ?>"><?= htmlspecialchars($vehicle['model']); ?></a></h4>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      <?php else: ?>
          <p class="text-center col-12">No hay vehiculo disponibles.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<h1 class="margen text-white">Reservas Actuales</h1>

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

<!-- Mostrar los usuarios -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <div class="section-border"></div>
      </div>
    </div>

    <!-- Contenedor para los usuarios -->
    <div class="row no-gutters" id="user-container">
      <?php if ($reserves): ?>
          <?php foreach ($reserves as $reserve): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4 df">
                  <div class="card hover-shadow border-0 p-5">
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

</body>
</html>