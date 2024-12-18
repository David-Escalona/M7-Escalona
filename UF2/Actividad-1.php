<?php

    class Llibre {
        
        public string $titol = "Don Xicote de la Mancha";
        public string $autor = "Miguelito";

        public function __construct(string $titol, string $autor) {
            $this->titol = $titol;
            $this->autor = $autor;
            }

        public function descripcio(): string {

            return "El libro " . $this->titol . "a sido escrito por: " . $this->autor . ".";
        }

        public function getAutor(){
            echo "El autor es " . $this->autor;
        }

}

$llibre = new Llibre("Don Quijote de la Mancha", "Miguel de Cervantes");
echo $llibre->descripcio();


    class Persona {
    
        public string $nom = "Anna";
        public int $edad = 25;

        public function saludar(){
            return "Hola soy " . $this->nom . " y tengo " . $this->edad . " años.";
        }

    }