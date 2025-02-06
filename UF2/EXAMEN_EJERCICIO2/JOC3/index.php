<?php

session_start();

class Usuari {

    public  $nom;
    public  $edat;
    public  $correu;

    public function __construct($nom, $edat, $correu) {
        $this->nom = $nom;
        $this->edat = $edat;
        $this->correu = $correu;
    }

    public function validarDates() {
        return $this->nom . " - " . $this->edat . " - " . $this->correu . " ";
    }
}

class comprobarUsuari {

    public $usuarios = [];

    public function afegirUsuari(Usuari $usuari) {
        $this->usuarios[] = $usuari;
    }

    public function calcularTotal($text) {
        $resultados = [];
        foreach ($this->usuarios as $usuari) { 
            if (stripos($usuari->nom, $text) !== false) { 
                $resultados[] = $usuari;
            }
        }
        return $resultados;
    }

    public function obtenirUsuaris() {
        return $this->usuarios;
    }
}

if (!isset($_SESSION['usu'])) {
    $_SESSION['usu'] = new comprobarUsuari();
}

$usu = $_SESSION['usu']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['añadir'])) { 
        $nom = $_POST['nom']; 
        $edat = $_POST['edat'];
        $correu = $_POST['correu'];

        $nuevoUsuario = new Usuari($nom, $edat, $correu);
        $usu->afegirUsuari($nuevoUsuario);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Joc3 - David Escalona García</title>
    
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
            <form method="POST" class="form">
            <div>
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div>
                <label for="edat" class="form-label">Edat</label>
                <input type="number" class="form-control" id="edat" name="edat" required>
            </div>
            <div>
                <label for="correu" class="form-label">Email</label>
                <input type="email" class="form-control" id="correu" name="correu" required>
            </div>
            <button type="submit" name="añadir" class="mt-4 rounded">Añadir usuario</button>
            </form>
        </div>

    </header>

    <main>
        <div class="dflex container">
            <table class="table">
                <tr class="table">
                    <td class="table">
                    <?php
                    if (isset($usu)) {
                        echo "<h2>Listado de usuarios</h2>"; 
                        foreach ($usu->obtenirUsuaris() as $usuario) {
                            echo "<div>" . $usuario->validarDates() . "</div><hr>";
                        }
                    } else { 
                        echo "<h2>No hay usuarios registrados.</h2>"; 
                    }
                    ?>
                    </td>
                </tr>
            </table>
        </div>
    </main>
    

</body>
</html>
