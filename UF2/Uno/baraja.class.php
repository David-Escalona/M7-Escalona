<?php

    class Baraja{
        
        public $conjunto_cartas =[];

        public function __construct() {
           
            $this->conjunto_cartas = [
                '0_blue.png', '1_blue.png', '2_blue.png', '3_blue.png', '4_blue.png', '5_blue.png', '6_blue.png', '7_blue.png', '8_blue.png', '9_blue.png',
                '0_green.png', '1_green.png', '2_green.png', '3_green.png', '4_green.png', '5_green.png', '6_green.png', '7_green.png', '8_green.png', '9_green.png',
                '0_red.png', '1_red.png', '2_red.png', '3_red.png', '4_red.png', '5_red.png', '6_red.png', '7_red.png', '8_red.png', '9_red.png',
                '0_yellow.png', '1_yellow.png', '2_yellow.png', '3_yellow.png', '4_yellow.png', '5_yellow.png', '6_yellow.png', '7_yellow.png', '8_yellow.png', '9_yellow.png',
                'carta_girada.png',
                'color_changer.png',
                'picker_blue.png',
                'picker_green.png',
                '',    
            ] ;

        }

        public function obtenerCartaAleatoria() {
            $indice = array_rand($this->conjunto_cartas);  
            return $this->conjunto_cartas[$indice]; 
        }
    }
?>