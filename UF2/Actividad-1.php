<?php

class Llibre {

    public string $titol;
    public string $autor;

    public function __construct(string $titol = "Don Xicote de la Mancha", string $autor = "Miguelito") {
        $this->titol = $titol;
        $this->autor = $autor;
    }

    public function descripcio(): string {
        return "El libro " . $this->titol . " ha sido escrito por: " . $this->autor . ".";
    }

    public function getAutor() {
        echo "El autor es " . $this->autor;
    }
}

class Persona {

    public string $nom;
    public int $edad;

    public function __construct(string $nom = "Anna", int $edad = 25) {
        $this->nom = $nom;
        $this->edad = $edad;
    }

    public function saludar(): string {
        return "Hola, soy " . $this->nom . " y tengo " . $this->edad . " años.";
    }
}

class Producte {

    public string $nom;
    public int $preu;

    public function __construct(string $nom = "David", int $preu = 2000000000) {
        $this->nom = $nom;
        $this->preu = $preu;
    }

    public function mostrarPreu(): string {
        return "El producte " . $this->nom . " té un preu de " . $this->preu . " euros.";
    }
}

class Calculadora {

    public function sumar(){

    }

    public function restar(){
        
    }

    public function multiplicar(){

    }

    public function dividir(){
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interacció HTML i PHP</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Formulari de Persona</h1>
    <form method="POST" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="edat">Edat:</label>
        <input type="number" id="edat" name="edat" required><br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $edat = intval($_POST['edat']);

        $persona = new Persona($nom, $edat);

        echo "<h2>Resultat:</h2>";
        echo "<p>" . $persona->saludar() . "</p>";
    }

    // Crear una llista d'objectes Producte
    $productes = [
        new Producte("Ordinador", 800),
        new Producte("Mòbil", 600),
        new Producte("Tablet", 300),
        new Producte("Auriculars", 50)
    ];

    // Mostrar els productes en una taula
    echo "<h2>Llista de Productes</h2>";
    echo "<table>";
    echo "<tr><th>Nom del Producte</th><th>Preu (€)</th></tr>";

    foreach ($productes as $producte) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($producte->nom) . "</td>";
        echo "<td>" . htmlspecialchars($producte->preu) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>

