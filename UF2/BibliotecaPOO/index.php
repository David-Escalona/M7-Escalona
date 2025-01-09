<?php

//Ejecutar codigo con cd UF2/BibliotecaPOO
//php -S 0.0.0.0:8000

session_start();

class Libro {

    public $titulo;
    public $autor;
    public $publicacion;
    public $foto;

    public function __construct($titulo, $autor, $publicacion, $foto) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->publicacion = $publicacion;
        $this->foto = $foto;
    } 

    public function mostrarLibro() {
        return "<h3><strong>Titulo:</strong> $this->titulo</h3>
                <h3><strong>Autor:</strong> $this->autor</h3>
                <h3><strong>Año de publicación:</strong> $this->publicacion</h3>
                <img src='$this->foto' alt='Imagen del libro' width='500'>";
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $publicacion = $_POST['publicacion'];
    $foto = $_POST['foto'];
}

$libro = new Libro($titulo, $autor, $publicacion, $foto);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <title>Biblioteca POO</title>
    <style>

        html, h5, label{
            font-family: Bungee Spice;
        }

        h2{
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            font-family: Bungee Spice;
        }

        h3{
            color: black;
            font-family: Bungee Spice;
        }

    </style>
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-4">Gestió de Biblioteca</h1>
    </div>

    <div class="card mb-2 bg-dark border border-dark rounded container">
        <div class="card-body text-light">
            <h5 class="card-title text-center">Añade un libro</h5>
            <form method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" class="form-control" id="autor" name="autor" required>
                </div>
                <div class="mb-3">
                    <label for="publicacion" class="form-label">Año de publicación</label>
                    <input type="number" class="form-control" id="publicacion" name="publicacion" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">URL de la Foto</label>
                    <input type="url" class="form-control" id="foto" name="foto" required>
                </div>
                <button type="submit" name="afegir" class="btn btn-primary border border-dark rounded-circle mb-5">Añadir libro</button>
            </form>
        </div>
    </div>

    <div class="card container bg-dark text-center">

<?php

if (isset($libro)) {
    echo "<h2>Libro Añadido</h2>";
    echo "<div>";
    echo $libro->mostrarLibro();
    echo "</div>";
}

?>
    
    </div>

</body>
</html>

