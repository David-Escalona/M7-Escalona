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

$llibre = new Llibre("Don Xicote de la Mancha", "Miguelito");
echo $llibre->descripcio();


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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interacció HTML i PHP</title>
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
    // Processar el formulari
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $edat = intval($_POST['edat']);

        // Creem una instància de la classe Persona
        $persona = new Persona($nom, $edat);

        // Mostrem la informació de la persona
        echo "<h2>Resultat:</h2>";
        echo "<p>" . $persona->saludar() . "</p>";
    }
    ?>
</body>
</html>
