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
            <h1 class="d-flex justify-content-center text-light mt-5 bordeh1 mC">Patrón de Creación</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">Los patrones de creación son una categoría de patrones de diseño que se centran en la forma en que los objetos son instanciados y cómo se gestionan sus dependencias. Estos patrones ofrecen flexibilidad en la creación de objetos y ayudan a desacoplar la lógica de negocio de la construcción de los objetos. Los principales patrones de creación son:</p>
        </div>

        <div class="contenido">
            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/factorymethod.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/factory-method-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/factorymethod.php"><h1>FACTORY</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/abstract.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/abstract-factory-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/abstractfactory.php"><h1>ABSTRACT</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/builder.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/builder-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/builder.php"><h1>BUILDER</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/prototype.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/prototype-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/prototype.php"><h1>PROTOTYPE</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/singleton.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/singleton-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/singleton.php"><h1>SINGLETON</h1></a>
                    </div>
                </figure>
            </div>

            
        </div>

        <form onsubmit="event.preventDefault(); redirectToPattern();" class="formulario">
            <select id="patternSelect" name="pattern" class="estiloF">
            <option value="default">Selecciona un patrón...</option>
            <option value="patrones/factorymethod.php">Factory</option>
            <option value="patrones/abstractfactory.php">Abstract</option>
            <option value="patrones/builder.php">Builder</option>
            <option value="patrones/prototype.php">Prototype</option>
            <option value="patrones/singleton.php">Singleton</option>
            
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