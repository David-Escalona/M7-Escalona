<?php

    class Llibre {
        
        public string $titol = "Don Xicote de la Mancha";
        public string $autor = "Miguelito";

        public function descripcio(): string {

    return "El libro " . $this->titol . "a sido escrito por: " . $this->autor . ".";
    }
}