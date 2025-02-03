<?php

    require_once 'carta.class.php';

class Baraja {
    public $conjunto_cartas = [];
    
    public function crea_baraja()
{
    $index = 0;

    foreach (['red', 'yellow', 'blue', 'green'] as $color) {
        for ($i = 1; $i <= 9; $i++) {
            $this->conjunto_cartas[] = new Carta($color, $i, null); // Agrega un valor para el tercer parámetro
        }
        // Afegeix cartes especials
        $this->conjunto_cartas[] = new Carta($color, 'reverse', null);
        $this->conjunto_cartas[] = new Carta($color, 'skip', null);
        $this->conjunto_cartas[] = new Carta($color, '+2', null);
    }
}
   

    public function mezcla()
    {
        shuffle($this->conjunto_cartas);
    }

    public function pintar_baraja(){
        foreach ($this->conjunto_cartas as $carta) {
            echo $carta->pinta_carta_link();
        }

    }

    public function pintar_baraja_girada(){
        foreach ($this->conjunto_cartas as $c) {
            echo $c->pinta_carta_girada();
        }    
    }
}