<?php

    session_start(); // Inicio la sesion de PHP
    include 'baraja.class.php'; // Incluyo variables del archivo baraja

    $jugadores = isset($_POST['jugadores']) ? (int)$_POST['jugadores'] : 5; // Asigno un maximo de 5 jugadores a la partida
    $cartasPorJugador = isset($_POST['cartas']) ? (int)$_POST['cartas'] : 7; // Asigno un maximo de cartas a la partirda

    $baraja = new Baraja(); // Creo una instancia de la clase Baraja

    function repartirCartas($baraja, $jugadores, $cartasPorJugador) { // Creo una funcion reparitCartas(con tres variables)
        $manos = []; // Creo un array vacio
        for ($i = 0; $i < $jugadores; $i++) { // Hago un bucle de entrada donde la I inicializa en 0
            // Y debe ser menor al numero de jugadores que son (5 por defecto) 
            $mano = []; // Si se cumplen los parametros se crea otro array vacio
            for ($j = 0; $j < $cartasPorJugador; $j++) { // Hago un bucle de salida con el valor j con valor de 0 y menor a las cartas
                $mano[] = $baraja->obtenerCartaAleatoria(); // Dentro del array vacio se guardaran todos los datos de la classe baraja
                // Que hemos instanciado antes recogiendo los datos de la funcion obtenerCartaAleatoria de la clase baraja.class.php
            }
            $manos[] = $mano; // En el array de manos de guarda la carta aleatorio del array mano
        }
        return $manos; // Devolvemos el array
}

    $manos = repartirCartas($baraja, $jugadores, $cartasPorJugador); // En la variable manos se guarda la funcion repartirCartas

    if (!isset($_SESSION['cartaEnMano'])) { // Si la variable cartaen mano no existe
        $_SESSION['cartaEnMano'] = $baraja->obtenerCartaAleatoria(); // Se crea una una carta aleatoria
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['robar'])) { // Si se ha enviado una solicitud para robar
        $jugadorIndex = (int)$_POST['jugadorIndex']; // Se comprueba que jugador es
        $nuevaCarta = $baraja->obtenerCartaAleatoria(); // En la variable nuevacarta se robara una nueva
        echo json_encode(['jugadorIndex' => $jugadorIndex, 'carta' => $nuevaCarta]); // Se le asigna la carta robada al jugador
        exit; // Se termina
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jugarCarta'])) { //Se comprueba si se ha enviado una solicutud para jugar
        $jugadorIndex = (int)$_POST['jugadorIndex']; // Se comprueba el jugador
        $cartaSeleccionada = $_POST['carta']; // Se guarda la carta

        list($colorEnMano, $numeroEnMano) = explode(' ', $_SESSION['cartaEnMano']); // Este es el valor almacenado de la cartaenmado
        list($colorCarta, $numeroCarta) = explode(' ', $cartaSeleccionada); // Este es el valor almacenado de la cartaseleccionada

        if ($colorCarta === $colorEnMano || $numeroCarta === $numeroEnMano) { // Si las variables son iguales es decir
            // El color de la carta es el que esta en mano
            $_SESSION['cartaEnMano'] = $cartaSeleccionada; // La carta sera valida para poder jugarla
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
