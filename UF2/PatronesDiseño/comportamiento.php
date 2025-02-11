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
        .comfortaa{
            font-family: Comfortaa;
        }
    </style>

</head>
<body class="bodyComposite">

    <main class="comfortaa">

    <div class="espacioEs d-flex flex-column espacio">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeh1 mCo">Patrón de Comportamiento</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">Los patrones de comportamiento son un grupo de patrones de diseño que se centran en cómo los objetos interactúan entre sí y cómo se organiza la comunicación entre ellos. Su objetivo principal es mejorar la flexibilidad y reutilización del código, evitando acoplamientos innecesarios.</p>
        </div>

        <div class="contenido">
            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/responsability.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/chain-of-responsibility-mini.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/responsability.php"><h1>RESPON</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/command.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/command-mini.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/command.php"><h1>COMMAND</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/iterator.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/iterator-mini.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/iterator.php"><h1>ITERATOR</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/mediator.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/mediator-mini.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/mediator.php"><h1>MEDIATOR</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/memento.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/memento-mini.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/memento.php"><h1>MEMENTO</h1></a>
                    </div>
                </figure>
            </div>

            
        </div>

        <form onsubmit="event.preventDefault(); redirectToPattern();" class="formulario">
            <select id="patternSelect" name="pattern" class="estiloF">
            <option value="default">Selecciona un patrón...</option>
            <option value="patrones/responsability.php">Responsability</option>
            <option value="patrones/command.php">Command</option>
            <option value="patrones/iterator.php">Iterator</option>
            <option value="patrones/mediator.php">Mediator</option>
            <option value="patrones/memento.php">Memento</option>
            
            </select>
            <button type="submit" class="boton">Enviar</button>
        </form>
        
    </div>

    

    </main>

    <?php include 'nav.php'; ?>
    <?php include 'header.php'; ?>

    <script>
    // Función para redirigir al usuario según la opción seleccionada
    function redirectToPattern() {
      const selectElement = document.getElementById("patternSelect");
      const selectedPattern = selectElement.value;

      // Si el valor seleccionado no es "default", redirigir a la página correspondiente
      if (selectedPattern !== "default") {
        window.location.href = selectedPattern;
      } else {
        alert("Por favor, selecciona un patrón de estructura.");
      }
    }
  </script>

</body>
</html>