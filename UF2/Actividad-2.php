<?php

    class Cotxe{
        
        public string $marca = "SEAT";
        public string $model = "ARONA";

        public function descripcio(): string {
        return "Aquest cotxe és un " . $this->marca . " " . $this->model . ".";
        echo $cotxe->descripcio();
    }
}

    class Persona {

        public string $nom;
        public int $edat;

        public function __construct(string $nom, int $edat) {
            $this->nom = $nom;
            $this->edat = $edat;
        }

        public function descriure(): string {
        return "Hola, me llamo " . $this->nom . " y tengo " . $this->edat . " años.";
    }
}
        $persona = new Persona("David", "20");
        echo $persona->descriure();

?>