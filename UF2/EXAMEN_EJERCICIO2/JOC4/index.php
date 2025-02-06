<?php

session_start();

class Factura {
    
    public string $client;
    public string $producte;
    public int $quantitat;
    public int $preuUnitari;
    
    public function __construct($client, $producte, $quantitat, $preuUnitari) {
        $this->client = $client;
        $this->producte = $producte;
        $this->quantitat = $quantitat;
        $this->preuUnitari = $preuUnitari;
    }

    public function calcularTotal() {
        return $this->client . " - " . $this->producte . " - " . $this->quantitat . " - " . $this->preuUnitari . " ";
    }

    public function aplicarDescuento($porcentaje) {
        return $this->$this->preuUnitari . " ";
    }

}

$facturas = [
    new Factura("David", "Coche", 1, 5000),
    new Factura("Perico", "Silla", 4, 50),
    new Factura("Paco", "Helicoptero", 1, 2000000),
    new Factura("Ana", "Teclado", 1, 30),
    new Factura("Emma", "Luces", 20, 400)
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Joc4 - David Escalona García</title>
    
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
        <h1>Formulario de Validación</h1>
        
        <div class="dflex container">
            <table class="table">
                    <tr>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                       <?php
                        foreach ($facturas as $factura) {
                        echo "<tr>";
                        echo "<td>" . $factura->client . "</td>";
                        echo "<td>" . $factura->producte . "</td>";
                        echo "<td>" . $factura->quantitat . "</td>";
                        echo "<td>" . $factura->preuUnitari . "</td>";
                        echo "</tr>";
                        }
                    ?>  
                    </tr>
            </table>
        </div>

    </header>

</body>
</html>
