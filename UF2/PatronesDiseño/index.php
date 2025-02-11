<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
    <title>David Escalona García</title>

    <style>

        main{
            font-family: Comfortaa;
        }

        .mi{
            margin-left: 405px;
        }


    </style>

</head>
<body>
    
    <?php include 'nav.php'; ?>

    <main>

    <div class="d-flex flex-column espacio">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeh1">Patrones de Diseño</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">Los patrones de diseño son unas técnicas para resolver problemas comunes en el desarrollo de software y otros ámbitos referentes al diseño de interacción o interfaces.
            Un patrón de diseño resulta ser una solución a un problema de diseño. Para que una solución sea considerada un patrón debe poseer ciertas características. Una de ellas es que debe haber comprobado su efectividad resolviendo problemas similares en ocasiones anteriores. Otra es que debe ser reutilizable, lo que significa que es aplicable a diferentes problemas de diseño en distintas circunstancias.</p>
        </div>
        
        <h1 class="d-flex justify-content-center text-light margenPatron">Tipos de Patrones</h1> 
    </div>     

    <div class="margenes">
        <div class="d-flex flex-column mi" style="width: 40rem;">
            <div class="diseño1">
                <a href="estructura.php"><img src="https://dcreations.es/storage/files/1/cursos/curso-patrones-de-dise%C3%B1o-en-php-gratis/patrones-estructurales-en-php/patrones-estructurales-en-php.webp" class="card-img-top" alt="Patron Estructural"></a>
            </div>

        <div class="d-flex justify-content-start">    

        <div class="diseño1">
            <a href="creacion.php"><img src="https://dcreations.es/storage/files/1/cursos/curso-patrones-de-dise%C3%B1o-en-php-gratis/patrones-creacionales-en-php/patrones-creacionales-en-php.webp" class="card-img-top" alt="Patron de Creación"></a>
        </div>
        </div>

        <div class="d-flex justify-content-center mb-5">    

        <div class="diseño1">
            <a href="comportamiento.php"><img src="https://dcreations.es/storage/files/1/cursos/curso-patrones-de-dise%C3%B1o-en-php-gratis/patrones-de-comportamiento-en-php/patrones-de-comportamiento-en-php.webp" class="card-img-top" alt="Patron de Comportamiento"></a>
        </div>

        </div>
        </div> 
    </div>
    
    </main>

</body>
</html>