<?php

//Ejecutar codigo con cd ruta/del/archivo
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

    public function obtenirDetalls() {
        return "$this->titulo - $this->autor ($this->publicacion)";
    }

}


class Biblioteca {

    public $libros = [];

    public function añadirLibro($libro) {
        $this->libros[] = $libro;
    }

    public function mostrarLibro() {
        return $this->libros;
    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Biblioteca POO</title>
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-4">Gestió de Biblioteca</h1>
    </div>

    <div class="card mb-2 bg-secondary border border-dark rounded">
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
                <button type="submit" name="afegir" class="btn btn-primary border border-dark rounded-circle">Añadir libro</button>
            </form>
        </div>
    </div>

</body>
</html>

