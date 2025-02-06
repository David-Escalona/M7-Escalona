<?php

session_start();

class Producte {

    public  $nom;
    public  $preu;

    public function __construct($nom, $preu) {
        $this->nom = $nom;
        $this->preu = $preu;
    }

    public function obtenirProducte() {
        return $this->nom . " - " . $this->preu . "€";
    }
}

class carretCompra {

    public $productes = [];

    public function afegirProducte(Producte $producte) {
        $this->productes[] = $producte;
    }

    public function calcularTotal($text) {
        $resultados = [];
        foreach ($this->productes as $producte) { 
            if (stripos($producte->nom, $text) !== false) { 
                $resultados[] = $producte;
            }
        }
        return $resultados;
    }

    public function obtenirProductes() {
        return $this->productes;
    }
}

if (!isset($_SESSION['compra'])){
    $_SESSION['compra'] = new carretCompra();
}

$compra = $_SESSION['compra']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['añadir'])) { 
        $nom = $_POST['nom']; 
        $preu = $_POST['preu'];

        $nuevoProducto = new Producte($nom, $preu);
        $compra->afegirProducte($nuevoProducto);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Joc2 - David Escalona García</title>
    
    <style>
        h1 {
            display: flex;
            justify-content: center;
            font-size: 40px;
        }
        .aleatorio {
            display: flex;
            justify-content: center;
            font-size: 30px;
        }
        .dflex {
            display: flex;
            justify-content: center;
            font-size: 20px;
            margin-top: 20px;
        }
        .table {
            border: 1px solid;
        }
    </style>
    
</head>
<body>
    
    <header>
        <h1>Carrito de la compra</h1>
        
        <div class="dflex container">
            <form method="POST">
            <div>
                <label for="nom" class="form-label">Producto</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div>
                <label for="preu" class="form-label">Precio</label>
                <input type="number" class="form-control" id="preu" name="preu" required>
            </div>
            <button type="submit" name="añadir" class="mt-4 rounded">Añadir Compra</button>
            </form>
        </div>

    </header>

    <main>
        <div class="dflex container">
            <table class="table">
                <tr class="table">
                    <td class="table">
                    <?php
                    if (isset($CompraHecha)) {
                        echo "<h2>Resultado de la Búsqueda</h2>"; 
                        foreach ($CompraHecha as $producte) {
                            echo "<div>" . $producte->obtenirProducte() . "</div><hr>";
                        }
                    } else { 
                        echo "<h2>Compra</h2>"; 
                        foreach ($compra->obtenirProductes() as $producte) { 
                            echo "<div>" . $producte->obtenirProducte() . "</div><hr>";
                        }
                    }
                    ?>
                    </td>
                </tr>
            </table>
        </div>
    </main>

</body>
</html>
