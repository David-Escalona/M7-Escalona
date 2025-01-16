<?php

    class Baraja{
        
        public $conjunto_cartas =[];

        public function __construct() {
           
            $this->conjunto_cartas = [
                '0_blue.png',
                '0_green.png',
                '0_red.png',
                '0,yellow.png'
            ] ;

        }

        public function obtenerCartaAleatoria() {
            $indice = array_rand($this->conjunto_cartas);  
            return $this->conjunto_cartas[$indice]; 
        }
    }
?>