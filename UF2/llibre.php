<?php

    class Llibre {
        
        public string $titol;
        public string $autor;

        public function descripcio(): string {

    return "El libro " . $this->titol . "a sido escrito por: " . $this->autor . ".";
    }
}