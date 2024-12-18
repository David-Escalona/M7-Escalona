<?php

    class Llibre {
        
        public string $titol = "Don Xicote de la Mancha";
        public string $autor = "Miguelito";

        public function __construct(string $titol, int $autor) {
            $this->titol = $titol;
            $this->autor = $autor;
            }

        public function descripcio(): string {

    return "El libro " . $this->titol . "a sido escrito por: " . $this->autor . ".";
    }
}

$llibre = new Llibre("Don Xicote de la Mancha", "Miguelito");
echo $Llibre->descriure();