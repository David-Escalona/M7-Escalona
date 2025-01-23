<?php

    session_start();
    include 'baraja.class.php';

    $jugadores = isset($_POST['jugadores']) ? (int)$_POST['jugadores'] : 2;
    $cartasPorJugador = isset($_POST['cartas']) ? (int)$_POST['cartas'] : 5;

    $baraja = new Baraja();

    function repartirCartas($baraja, $jugadores, $cartasPorJugador) {
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

    $manos = repartirCartas($baraja, $jugadores, $cartasPorJugador);

    if (!isset($_SESSION['cartaEnMano'])) {
        $_SESSION['cartaEnMano'] = $baraja->obtenerCartaAleatoria();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['robar'])) {
        $jugadorIndex = (int)$_POST['jugadorIndex'];
        $nuevaCarta = $baraja->obtenerCartaAleatoria();
        echo json_encode(['jugadorIndex' => $jugadorIndex, 'carta' => $nuevaCarta]);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jugarCarta'])) {
        $jugadorIndex = (int)$_POST['jugadorIndex'];
        $cartaSeleccionada = $_POST['carta'];

        list($colorEnMano, $numeroEnMano) = explode(' ', $_SESSION['cartaEnMano']);
        list($colorCarta, $numeroCarta) = explode(' ', $cartaSeleccionada);

        if ($colorCarta === $colorEnMano || $numeroCarta === $numeroEnMano) {
            $_SESSION['cartaEnMano'] = $cartaSeleccionada;
            unset($manos[$jugadorIndex][array_search($cartaSeleccionada, $manos[$jugadorIndex])]);

            echo json_encode(['success' => true, 'nuevaCarta' => $cartaSeleccionada, 'jugadorIndex' => $jugadorIndex]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Carta inválida']);
        }
        exit;
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
            cursor: pointer;
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
    <header>
        <h1 class="d-flex justify-content-center mt-5">Partida</h1>
    </header>

    <div class="text-center d-flex justify-content-center">
        <main class="d-flex justify-content-center container card mb-4 flex-row flex-wrap">

        <h1 class="mt-4 ">Mano de Juego</h1>
            <div id="carta-en-mano" class="col-12 mano d-flex justify-content-center">
                <div class="carta" id="carta-en-mano-div">
                    <img src="img/<?php echo $_SESSION['cartaEnMano']; ?>" alt="Carta en Mano" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
            </div>

            <?php foreach ($manos as $index => $mano): ?>
                <div class="col-12 mano">
                    <h5 class="ms-4 text-start">Jugador <?php echo $index + 1; ?></h5>
                    <div class="d-flex justify-content-start flex-wrap" id="mano-<?php echo $index; ?>">
                        <?php foreach ($mano as $carta): ?>
                            <div class="carta" data-carta="<?php echo $carta; ?>" data-jugador="<?php echo $index; ?>">
                                <img src="img/<?php echo $carta; ?>" alt="Carta" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="btn btn-primary mt-3 robar-carta mb-5" data-jugador="<?php echo $index; ?>">Robar carta</button>
                </div>
            <?php endforeach; ?>

        </main>
    </div>

    <footer>
        <div class="container card color p-2 mb-5">
            <a href="index.php" class="d-flex justify-content-center text-decoration-none fs-5 w-100">Volver al inicio</a>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            $('.carta').on('click', function() {
                const cartaSeleccionada = $(this).data('carta');
                const jugadorIndex = $(this).data('jugador');

                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {
                        jugarCarta: true,
                        jugadorIndex: jugadorIndex,
                        carta: cartaSeleccionada
                    },
                    success: function(response) {
                        const data = JSON.parse(response);

                        if (data.success) {
                            $('#carta-en-mano img').attr('src', 'img/' + data.nuevaCarta);

                            $(`div[data-carta="${cartaSeleccionada}"]`).remove();
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function() {
                        alert('Hubo un error al intentar jugar la carta.');
                    }
                });
            });

            $('.robar-carta').on('click', function() {
                const jugadorIndex = $(this).data('jugador');
                
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {
                        robar: true,
                        jugadorIndex: jugadorIndex
                    },
                    success: function(response) {
                        const data = JSON.parse(response);
                        const cartaHtml = `
                            <div class="carta" data-carta="${data.carta}" data-jugador="${data.jugadorIndex}">
                                <img src="img/${data.carta}" alt="Carta" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        `;
                        $(`#mano-${data.jugadorIndex}`).append(cartaHtml);

                        $(`#mano-${data.jugadorIndex} .carta`).off('click').on('click', function() {
                            const cartaSeleccionada = $(this).data('carta');
                            const jugadorIndex = $(this).data('jugador');

                            $.ajax({
                                url: '',
                                type: 'POST',
                                data: {
                                    jugarCarta: true,
                                    jugadorIndex: jugadorIndex,
                                    carta: cartaSeleccionada
                                },
                                success: function(response) {
                                    const data = JSON.parse(response);

                                    if (data.success) {
                                        $('#carta-en-mano img').attr('src', 'img/' + data.nuevaCarta);

                                        $(`div[data-carta="${cartaSeleccionada}"]`).remove();
                                    } else {
                                        alert(data.message);
                                    }
                                },
                                error: function() {
                                    alert('Hubo un error al intentar jugar la carta.');
                                }
                            });
                        });
                    }
                });
            });
        });
    </script>

</body>
</html>
