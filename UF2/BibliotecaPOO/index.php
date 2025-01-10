<?php

//Ejecutar codigo con cd UF2/BibliotecaPOO
//php -S 0.0.0.0:8000

session_start(); // Guarda información relacionada con peticiones

class Libro { // Creo una classe llamada Libro la cual tiene propiedades

    public $titulo; // Propiedades
    public $autor; // Propiedades
    public $publicacion; // Propiedades
    public $foto; // Propiedades

    public function __construct($titulo, $autor, $publicacion, $foto){ // Esto es una funcion de constructor que inicializa las propiedades
        $this->titulo = $titulo; // Valores proporcionados a las propiedades
        $this->autor = $autor; // Valores proporcionados a las propiedades
        $this->publicacion = $publicacion; // Valores proporcionados a las propiedades
        $this->foto = $foto; // Valores proporcionados a las propiedades
    }

    public function mostrarLibro(){ // Esto es una funcion que devolvera codigo HTML
        return "<h3><strong>Titulo:</strong> $this->titulo</h3>
                <h3><strong>Autor:</strong> $this->autor</h3>
                <h3><strong>Año de publicación:</strong> $this->publicacion</h3>
                <img src='$this->foto' alt='Imagen del libro' width='500'>";
    }
}

class Biblioteca { // Classe llamada Biblioteca
    public $libros = []; // Esto es un array que contendra objectos en libros

    public function agregarLibro($libro){ // Función llamada agregarLibro que recibe como parametro libro
        $this->libros[] = $libro; //El libro estara dentro del array libros
    }

    public function buscarLibro($text){ // Función llamada buscarLibro que recibe un texto
        $resultados = []; // Array llamado resultados
        foreach ($this->libros as $libro){ // Aqui el array libros se recorre todos los libro añadidos anteriormente
            if (stripos($libro->titulo, $text) !== false){ // Si el titulo del libro esta dentro del array
                $resultados[] = $libro; // El array resultados almacena el libro
            }
        }
        return $resultados; // Y aqui se muestra el libro o libros cuyo titulo sea igual al del buscador
    }

    public function mostrarLibros(){ // Creo una funcion llamada mostrarLibros
        return $this->libros; // Que me devuelve todo lo que hay dentro de la variable libros
    }
}

if (!isset($_SESSION['biblioteca'])){ // Si no hay una sesion para la biblioteca
    $_SESSION['biblioteca'] = new Biblioteca(); // Inicializa una nueva para que funcione
}

$biblioteca = $_SESSION['biblioteca']; // Recupera la sesion de biblioteca

if ($_SERVER["REQUEST_METHOD"] == "POST"){ // Si la solicitud llega al servidor pasamos al siguiente paso 
    if (isset($_POST['añadir'])){ // Si se ha enviado el formulario para añadir el libro pasamos a lo siguiente
        $titulo = $_POST['titulo']; // Se extrae el dato del titulo
        $autor = $_POST['autor']; // Se extrae el dato del autor
        $publicacion = $_POST['publicacion']; // Se extraer el dato de la publicacion
        $foto = $_POST['foto']; // Se extrae el dato de la foto

        $nuevoLibro = new Libro($titulo, $autor, $publicacion, $foto); // Se crea un nuevo Libro con los siguietnes valores
        $biblioteca->agregarLibro($nuevoLibro); // A la biblioteca se le guarda los valores del libro
    }

    if (isset($_POST['buscar'])){ // Si se ha podido enviar el formulario para buscar
        $textoBusqueda = $_POST['titulo']; // Se captura el texto del titulo
        $librosEncontrados = $biblioteca->buscarLibro($textoBusqueda); // Y nos busca el titulo que cooincide
    }
}
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
        body {
            background-image: url(https://img.freepik.com/foto-gratis/fondo-gris-liso-alta-calidad_53876-124606.jpg?w=360);
            background-repeat: no-repeat;
            background-size: cover;
        }
        html, h5, label {
            font-family: Bungee Spice;
        }
        h2, h1 {
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            font-family: Bungee Spice;
        }
        h3 {
            color: black;
            font-family: Bungee Spice;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">Gestión de Biblioteca</h1>
    </div>

    <div class="card mb-2 bg-dark border border-dark rounded container d-flex flex-row">
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
                <button type="submit" name="añadir" class="btn btn-primary border border-dark mb-5">Añadir libro</button>
            </form>
        </div>

        <div class="card-body text-light">
            <h5 class="card-title text-center">Busca un libro</h5>
            <form method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <button type="submit" name="buscar" class="btn btn-primary border border-dark mb-5">Buscar libro</button>
            </form>
        </div>
    </div>

    <div class="card container bg-dark text-center text-light">

        <?php
        if (isset($librosEncontrados)){ // Si la variable librosEncontrados existe hara lo siguiente
            echo "<h2>Resultado de la Busqueda</h2>"; // Crea un titulo html
            foreach ($librosEncontrados as $libro){ // Y se recorre toda la variable librosEncontrados para encontrar la similitud con el libro
                echo "<div>" . $libro->mostrarLibro() . "</div><hr>"; // No crear un div de html donde nos muestra el libro
            }
        } else { // Si no hay librosEncontrados
            echo "<h2>Todos los Libros</h2>"; // Nos crea un titulo en html
            foreach ($biblioteca->mostrarLibros() as $libro){ // Y se recorre la variable biblioteca en busca de libros
                echo "<div>" . $libro->mostrarLibro() . "</div><hr>"; // Me crea un div para mostrarme los libros
            }
        }
        ?>

    </div>
</body>
</html>
