<?php

class Carta {

    public string $palo;
    public int $numero;
    public int $index;

    public function __construct($palo, $numero, $index) {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    public function pinta_carta() {
        return "<img src='img/{$this->palo}_{$this->numero}.png' alt='{$this->palo} {$this->numero}' />";
    }

    public function pinta_carta_girada() {
        return "<img src='img/carta_girada.png' alt='Carta Girada' />";
    }
}
?>
