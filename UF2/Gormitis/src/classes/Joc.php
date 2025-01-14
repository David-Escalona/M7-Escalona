<?php

include '/Jugador';

    class Joc {
        public $jugador;
        public $tornActual;
        public $estatJoc;

    public function __construct($estatJoc){

        $this->estatJoc = $estatJoc;

    }        

    public function afegirJugador($jugador){

        $this->$jugador = $jugador;

    }

    public function iniciarPartida(){

    }

    public function processarTorn($jugador, $accio, $objectiu){

    }

    public function comprovarGuanyador(){
        
    }

}


?>