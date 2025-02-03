<?php

class Cartas {
    public $palo;
    public $numero;
    public $index;

    public function __construct($palo, $numero, $index) {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    public function pinta_carta(): string {
        return "<div><img src='./img/{$this->numero}_{$this->palo}.png' alt='{$this->numero} {$this->palo}'></div>";
    }

    public function pinta_carta_link(): string {
        return "<div><a href='?accion=jugar&index={$this->index}'>
                    <img src='./img/{$this->numero}_{$this->palo}.png' alt='{$this->numero} {$this->palo}'>
                </a></div>";
    }

    public function pinta_carta_girada() {
        return "<div><img src='./img/carta_girada.png' alt='carta girada'></div>";
    }
}

class Baraja {
    public $conjunto_cartas = [];

    public function crea_baraja() {
        $index = 0;
        $colores = ['red', 'yellow', 'blue', 'green'];

        foreach ($colores as $color) {
            for ($i = 1; $i <= 9; $i++) {
                $this->conjunto_cartas[] = new Carta($color, $i, $index++);
            }
            $this->conjunto_cartas[] = new Carta($color, 'reverse', $index++);
            $this->conjunto_cartas[] = new Carta($color, 'skip', $index++);
            $this->conjunto_cartas[] = new Carta($color, '+2', $index++);
        }
    }

    public function mezcla() {
        shuffle($this->conjunto_cartas);
    }

    public function pinta_baraja() {
        $output = "";
        foreach ($this->conjunto_cartas as $carta) {
            $output .= $carta->pinta_carta() . " ";
        }
        return $output;
    }

    public function pinta_baraja_girada() {
        $output = "";
        foreach ($this->conjunto_cartas as $carta) {
            $output .= $carta->pinta_carta_girada() . " ";
        }
        return $output;
    }
}


?>
