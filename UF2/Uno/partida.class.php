<?php
session_start();

class Carta {
    public $color;
    public $valor;

    public function __construct($color, $valor) {
        $this->color = $color;
        $this->valor = $valor;
    }

    public function pinta_carta() {
        // Aquí deberías devolver el HTML que represente la carta (esto debe estar en tu carpeta de imágenes)
        return "<img src='img/{$this->valor}_{$this->color}.png' alt='{$this->valor} de {$this->color}' width='80'>";
    }
}

class Jugador {
    public $id;
    public $mano = [];

    public function __construct($id) {
        $this->id = $id;
    }

    public function añadir_carta($carta) {
        $this->mano[] = $carta;
    }
}

class Baraja {
    private $colores = ['rojo', 'verde', 'azul', 'amarillo'];
    private $valores = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'reverse', 'skip', '+2'];

    public function generar_baraja() {
        $baraja = [];
        foreach ($this->colores as $color) {
            foreach ($this->valores as $valor) {
                $baraja[] = new Carta($color, $valor);
            }
        }
        shuffle($baraja);
        return $baraja;
    }
}

class Partida {
    public $numero_jugadores;
    public $numero_cartas;
    public $jugadores = [];
    public $baraja;
    public $carta_en_mesa;
    public $turno = 0;
    public $sentido = 1; // 1 es sentido horario, -1 es antihorario

    public function __construct($jugadores, $cartas) {
        $this->numero_jugadores = $jugadores;
        $this->numero_cartas = $cartas;

        // Crear jugadores
        for ($i = 0; $i < $this->numero_jugadores; $i++) {
            $this->jugadores[] = new Jugador($i);
        }

        // Inicializar baraja
        $this->baraja = (new Baraja())->generar_baraja();
        
        // Repartir cartas a los jugadores
        foreach ($this->jugadores as $jugador) {
            for ($i = 0; $i < $this->numero_cartas; $i++) {
                $jugador->añadir_carta(array_pop($this->baraja));
            }
        }

        // Colocar la primera carta sobre la mesa
        $this->carta_en_mesa = array_pop($this->baraja);
    }

    public function jugar_carta($jugador, $index) {
        $carta_jugada = $jugador->mano[$index];
        $carta_en_mesa = $this->carta_en_mesa;

        // Validar que la carta sea válida
        if ($carta_jugada->color == $carta_en_mesa->color || $carta_jugada->valor == $carta_en_mesa->valor) {
            // Jugar carta
            $this->carta_en_mesa = $carta_jugada;
            unset($jugador->mano[$index]);

            // Aplicar reglas de cartas especiales
            $this->aplicar_reglas($carta_jugada);
            return true;
        }

        return false;
    }

    public function aplicar_reglas($carta) {
        if ($carta->valor == 'reverse') {
            $this->sentido *= -1;
        } elseif ($carta->valor == 'skip') {
            $this->cambiar_turno();
        } elseif ($carta->valor == '+2') {
            // Obligación de que el siguiente jugador robe 2 cartas
            $this->jugadores[($this->turno + $this->sentido) % $this->numero_jugadores]->añadir_carta(array_pop($this->baraja));
            $this->jugadores[($this->turno + $this->sentido) % $this->numero_jugadores]->añadir_carta(array_pop($this->baraja));
            $this->cambiar_turno();
        }
    }

    public function cambiar_turno() {
        $this->turno = ($this->turno + $this->sentido) % $this->numero_jugadores;
    }
}

// Comprobamos si la partida ya ha sido iniciada
if (isset($_SESSION['partida'])) {
    $partida = $_SESSION['partida'];
} else {
    if (isset($_POST['jugadores'], $_POST['cartas'])) {
        $jugadores = $_POST['jugadores'];
        $cartas = $_POST['cartas'];

        // Iniciar la partida
        $partida = new Partida($jugadores, $cartas);
        $_SESSION['partida'] = $partida;
    }
}

// Si el jugador hace una jugada
if (isset($_GET['accion']) && $_GET['accion'] == 'jugar' && isset($_GET['index'])) {
    $index_carta = $_GET['index'];
    $jugador_actual = $partida->jugadores[$partida->turno];

    if ($partida->jugar_carta($jugador_actual, $index_carta)) {
        $partida->cambiar_turno();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Juego de UNO</title>
    <style>
        .carta {
            width: 80px;
            margin: 10px;
        }
        h1, h5 {
            font-family: 'Bungee Spice', cursive;
        }
        .tablero {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div class="container mt-5 text-center">
        <h1>Partida de UNO</h1>

        <h3>Carta sobre la mesa:</h3>
        <div>
            <?php
            if ($partida->carta_en_mesa !== null) {
                echo $partida->carta_en_mesa->pinta_carta();
            } else {
                echo "<p>No hay carta en la mesa.</p>";
            }
            ?>
        </div>

        <h3>Cartas de los Jugadores:</h3>
        <div class="tablero">
            <?php
            // Mostrar las cartas de todos los jugadores
            foreach ($partida->jugadores as $jugador):
            ?>
                <div class="jugador">
                    <h4>Jugador <?php echo $jugador->id + 1; ?></h4>
                    <div>
                        <?php foreach ($jugador->mano as $index => $carta): ?>
                            <a href="?accion=jugar&index=<?php echo $index; ?>" class="carta">
                                <?php echo $carta->pinta_carta(); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>
</html>
