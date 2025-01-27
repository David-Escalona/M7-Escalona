<?php

include 'baraja.class.php'; // Incluyo la clase Baraja

// Si el formulario es enviado, recogemos los datos de jugadores y cartas.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jugadores'], $_POST['cartas'])) {
    $jugadores = (int)$_POST['jugadores']; // Número de jugadores
    $cartasPorJugador = (int)$_POST['cartas']; // Número de cartas por jugador
}

$baraja = new Baraja(); // Instancia de la clase Baraja

// Inicializamos el estado de las cartas jugadas (vacío al inicio)
if (!isset($_SESSION['cartas_jugadas'])) {
    $_SESSION['cartas_jugadas'] = [];
}

// Función para repartir cartas
function repartirCartas($baraja, $jugadores, $cartasPorJugador){
    $manos = [];
    for ($i = 0; $i < $jugadores; $i++) {
        $mano = [];
        for ($j = 0; $j < $cartasPorJugador; $j++) {
            $mano[] = $baraja->obtenerCartaAleatoria();
        }
        $manos[] = $mano;
    }
    return $manos;
}

// Repartimos las cartas al inicio de la partida
if (!isset($_SESSION['manos'])) {
    $_SESSION['manos'] = repartirCartas($baraja, $jugadores, $cartasPorJugador);
}

// Asignamos una carta en mesa inicial
$cartaEnMano = $baraja->obtenerCartaAleatoria();

// Procesamos las acciones del jugador (robar carta o jugar carta)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jugadorIndex = isset($_POST['jugadorIndex']) ? (int)$_POST['jugadorIndex'] : null;

    // Robar carta
    if (isset($_POST['robar'])) {
        $nuevaCarta = $baraja->obtenerCartaAleatoria();
        $_SESSION['manos'][$jugadorIndex][] = $nuevaCarta; // Añadimos la carta robada al jugador
    }

    // Jugar carta
    if (isset($_POST['jugarCarta'])) {
        $cartaSeleccionada = $_POST['carta'];
        list($colorEnMano, $numeroEnMano) = explode(' ', $cartaEnMano);
        list($colorCarta, $numeroCarta) = explode(' ', $cartaSeleccionada);

        // Validamos que la carta jugada sea válida
        if ($colorCarta === $colorEnMano || $numeroCarta === $numeroEnMano) {
            // Actualizamos la carta en mesa
            $cartaEnMano = $cartaSeleccionada;

            // Eliminamos la carta jugada de la mano del jugador
            $claveCarta = array_search($cartaSeleccionada, $_SESSION['manos'][$jugadorIndex]);
            unset($_SESSION['manos'][$jugadorIndex][$claveCarta]);

            // Guardamos la carta jugada en el array global
            $_SESSION['cartas_jugadas'][] = $cartaSeleccionada;
        } else {
            $error = '¡Carta inválida! No coincide en color ni número.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <title>Partida - UNO</title>
    <style>
        h1, h5, label {
            font-family: Bungee Spice;
        }

        .carta {
            width: 100px;
            height: 150px;
            margin: 5px;
            background-size: cover;
            background-position: center;
            border: 2px solid black;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .container {
            margin-top: 40px;
        }

        footer {
            margin-top: 50px;
            text-align: center;
        }

        footer a {
            font-size: 18px;
            font-family: 'Bungee Spice', cursive;
            text-decoration: none;
            color: #000;
        }

        footer a:hover {
            color: #ff5733;
        }

        .mano {
            margin-top: 20px;
        }

        #carta-en-mano {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header>
    <h1 class="d-flex justify-content-center mt-5">Partida</h1>
</header>

<div class="text-center d-flex justify-content-center">
    <main class="d-flex justify-content-center container card mb-4 flex-row flex-wrap">

        <h1 class="mt-4 ">Mano de Juego</h1>
        <div id="carta-en-mano" class="col-12 mano d-flex justify-content-center">
            <div class="carta">
                <img src="img/<?php echo $cartaEnMano; ?>" alt="Carta en Mesa" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php foreach ($_SESSION['manos'] as $index => $mano): ?>
            <div class="col-12 mano">
                <h5 class="ms-4 text-start">Jugador <?php echo $index + 1; ?></h5>
                <div class="d-flex justify-content-start flex-wrap">
                    <?php foreach ($mano as $carta): ?>
                        <form method="POST" class="me-2">
                            <input type="hidden" name="jugadores" value="<?php echo $jugadores; ?>">
                            <input type="hidden" name="cartas" value="<?php echo $cartasPorJugador; ?>">
                            <input type="hidden" name="jugadorIndex" value="<?php echo $index; ?>">
                            <input type="hidden" name="carta" value="<?php echo $carta; ?>">
                            <button type="submit" name="jugarCarta" class="btn p-0">
                                <div class="carta">
                                    <img src="img/<?php echo $carta; ?>" alt="Carta" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                                </div>
                            </button>
                        </form>
                    <?php endforeach; ?>
                </div>
                <form method="POST" class="mt-3">
                    <input type="hidden" name="jugadores" value="<?php echo $jugadores; ?>">
                    <input type="hidden" name="cartas" value="<?php echo $cartasPorJugador; ?>">
                    <input type="hidden" name="jugadorIndex" value="<?php echo $index; ?>">
                    <button type="submit" name="robar" class="btn btn-primary">Robar carta</button>
                </form>
            </div>
        <?php endforeach; ?>

    </main>
</div>

<footer>
    <div class="container card color p-2 mb-5">
        <a href="index.php" class="d-flex justify-content-center text-decoration-none fs-5 w-100">Volver al inicio</a>
    </div>
</footer>

</body>
</html>
