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

    }

?>