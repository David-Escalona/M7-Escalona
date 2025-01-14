<?php

    class Jugador {
        public $nom;
        public $gormiti;
    
    public function __construct($nom) {
        
        $this->nom = $nom;

    }

    public function seleccionarGormiti($gormiti) {
        
        $this->gormiti = $gormiti;
        echo $this->nom . " ha seleccionado a " . $gormiti->nombre . " como su Gormiti.\n";

    }

    public function realitzarAccio($accio, $objectiu) {
        
        if ($accio == 'atacar') {

        } elseif ($accio == 'habilidad') {

        }

    }
}

?>