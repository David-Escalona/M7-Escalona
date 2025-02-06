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
        .dflex{
            display: flex;
            justify-content: center;
            font-size: 20px;
            margin-top: 20px;
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
        
        <div class="dflex">
            <form method="POST">
                <div>
                    <label for="Jugadores" class="form-label">Escoje tu numero</label>
                    <input type="number" class="form-control" id="Jugadores" name="jugadores" required min="1" max="20">
                </div>
                <button type="submit">Aceptar</button>
            </form>
        </div>

    </header>

</body>
</html>