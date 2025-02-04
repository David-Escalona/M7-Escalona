<?php

require_once('jugador.class.php');
require_once('carta.class.php');

class Baraja {
    public $conjunto_cartas = [];

    public function __construct() {
        $this->crea_baraja();
    }

    // Método para crear la baraja
    public function crea_baraja() {
        $this->conjunto_cartas = [];
        $colores = ['red', 'yellow', 'blue', 'green'];

        // Crear cartas numeradas
        foreach ($colores as $color) {
            for ($i = 1; $i <= 9; $i++) {
                $this->conjunto_cartas[] = new Carta($color, $i);
            }

            // AÑADIR CARTAS ESPECIALES
            $this->conjunto_cartas[] = new Carta($color, 'reverse');
            $this->conjunto_cartas[] = new Carta($color, 'skip');
        }
    }

    // Método para barajar la baraja
    public function barajar() {
        shuffle($this->conjunto_cartas);
    }

    // Método para robar una carta de la baraja
    public function robar_carta() {
        return array_pop($this->conjunto_cartas);
    }
}

?>
