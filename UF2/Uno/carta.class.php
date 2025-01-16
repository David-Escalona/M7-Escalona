<?php

    class Carta {

        public string $palo;
        public int $numero;
        public int $index;

        public function __construct($palo, $numero, $index){

            $this->palo = $palo;
            $this->numero = $numero;
            $this->index = $index;

        }

        public function pinta_carta(){

            return "<img src='cartas_uno/{$this->palo}_{$this->numero}.png' alt='{$this->palo} {$this->numero}' />";

        }

        public function pinta_carta_link(){

        }

        public function pinta_carta_girada(){

        }
}

?>