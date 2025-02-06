<?php

class JocAdivinacio {
    public $numeroSecret;
    public $intents;

    public function __construct() {
        $this->numeroSecret = rand(1, 20);
        $this->intents = 0;
    }
    public function mostrarNumeroSecret() {
        echo "El numero aleatorio es: " .$this->numeroSecret . "\n";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc1 - David Escalona García</title>
    
    <style>
        h1{
            display: flex;
            justify-content: center;
            font-size: 40px;
        }
        .aleatorio{
            display: flex;
            justify-content: center;
            font-size: 30px;
        }
    </style>
    
</head>
<body>
    
    <header>
        <h1>Numero Aleatorio</h1>
        
        <div class="aleatorio">
          <?php 
        $joc = new JocAdivinacio();

        $joc->mostrarNumeroSecret();
        ?>  
        </div>
        

    </header>

</body>
</html>