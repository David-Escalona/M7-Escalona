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

        public function persona(string $nom, int $edat): void {
            $this->nom = $nom;
            $this->edat = $edat;
        }

        public function actualitzar(string $nom, int $edat): void {
            $this->nom = $nom;
            $this->edat = $edat;
        }

        public function descriure(): string {
        return "Hola, me llamo " . $this->nom . " y tengo " . $this->edat . " años.";
    }
}

        $persona = new Persona("David", 20);
        $personaTipatge = new Persona("David Escalona", 30);

        echo $persona->descriure() . "<br>";                                                                                    
        echo $personaTipatge->descriure() . "<br>";

        $personaTipatge->actualitzar("David Escalona Garcia", 40);
        echo $personaTipatge->descriure();


    class Calculadora {

        public function sumar(int $a, int $b): int {
        return $a + $b;
    }
}
        $calculadora = new Calculadora();
        echo $calculadora->sumar(68, 1);


    class Animal {

        public string $nom;
        public string $tipus;
        
        public function __construct(string $nom, string $tipus) {
            $this->nom = $nom;
            $this->tipus = $tipus;
        }
        
        public function saludar(): string {
        return "Hola, sóc un " . $this->tipus . " i em dic " . $this->nom;
    }
}
        
        $animal = new Animal("animal", "Elefante");
        echo $animal->saludar();
        
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interacció HTML i Classe Persona</title>
</head>
<body>
    <h1>Formulari de Persona</h1>
    <form method="POST" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="edat">Edat:</label>
        <input type="number" id="edat" name="edat" required><br><br>

        <button type="submit">Crear Persona</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom']) && isset($_POST['edat'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $edat = intval($_POST['edat']);

        // Crear l'objecte Persona amb els valors del formulari
        $persona = new Persona($nom, $edat);

        echo "<h2>Descripció de la Persona</h2>";
        echo "<p>" . $persona->descriure() . "</p>";
    }
    ?>

</body>
</html>