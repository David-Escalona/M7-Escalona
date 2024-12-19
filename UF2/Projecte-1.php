<?php

    class Gormiti{

        public string $nom;
        public int $hp;
        public int $atac;
        public int $defensa;
        public string $habilitat;

        public function __construct(string $nom, int $hp, int $atac, int $defensa, string $habilitat) {
            $this->nom = $nom;
            $this->hp = $hp;
            $this->atac = $atac;
            $this->defensa = $defensa;
            $this->habilitat = $habilitat;
        }

        public function rebredany ($dany){

        }

        public function atacar ($objectiu){
            
        }

        public function activarHabilitat (){
            
        }
}
        
        $gormiti1 = New Gormiti("Gormiti1", 100, 20, 20, "Habilidad1");
        $gormiti2 = New Gormiti("Gormiti2", 120, 10, 10, "Habilidad2");


    class Jugador{

        public string $nom;
        public string $gormiti;

        public function __construct(string $nom) {
            $this->nom = $nom;
        }

        public function seleccionarGormiti ($gormiti){

        }

        public function realitzarAccio($accio, $objectiu){
            
        }

}

?>