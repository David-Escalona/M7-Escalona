<?php

    class Gormiti {
        public $id;
        public $nom;
        public $salut;
        public $dany;
        public $imatge;
        public $habilitats;

        public function __construct($id, $nom, $salut, $dany, $imatge, $habilitats) {
            $this->id = $id;
            $this->nom = $nom;
            $this->salut = $salut;
            $this->dany = $dany;
            $this->imatge = $imatge;
            $this->habilitats = $habilitats;
        }
    }
?>
