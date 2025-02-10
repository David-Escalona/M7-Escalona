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
<body class="body">

    <main class="comfortaa">

    <div class="espacioEs d-flex flex-column espacio">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeh1 mP">Patrón de Estructura</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">Un patrón de estructura en programación y desarrollo de software es una solución general que describe cómo organizar y estructurar elementos dentro de un sistema para resolver un problema específico de diseño. Estos patrones proporcionan una manera probada y reutilizable de organizar el código o los componentes del sistema, asegurando que el software sea más fácil de entender, mantener y extender.
            Los patrones de estructura están orientados a resolver problemas que surgen en la arquitectura y organización de un sistema, como la forma en que las clases, objetos, módulos o componentes interactúan entre sí. Ayudan a que el código sea más modular, escalable y flexible.
        </div>

        <div class="contenido">
            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/adapter.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/adapter-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/adapter.php"><h1>ADAPTER</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/adapter.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/bridge-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/adapter.php"><h1>BRIDGE</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/adapter.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/composite-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/adapter.php"><h1>COMPOSITE</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/adapter.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/decorator-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/adapter.php"><h1>DECORATOR</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/adapter.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/facade-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/adapter.php"><h1>FACADE</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/adapter.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/flyweight-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/adapter.php"><h1>FLYWEIGHT</h1></a>
                    </div>
                </figure>
            </div>

            <div class="imagen opacidad">
                <figure>
                    <a href="patrones/adapter.php">
                        <div>
                            <img src="https://refactoring.guru/images/patterns/cards/proxy-mini-2x.png" alt="Sobre Mi" class="ADAPTER">
                        </div>
                    </a>
                    <div class="capa">
                        <a href="patrones/adapter.php"><h1>PROXY</h1></a>
                    </div>
                </figure>
            </div>
        </div>

        <form onsubmit="event.preventDefault(); redirectToPattern();" class="formulario">
            <select id="patternSelect" name="pattern" class="estiloF">
            <option value="default">Selecciona un patrón...</option>
            <option value="patrones/adapter.php">Adapter</option>
            <option value="patrones/bridge.php">Bridge</option>
            <option value="patron_composicion.html">Composite</option>
            <option value="patron_decorador.html">Decorator</option>
            <option value="patrones/facade.php">Facade</option>
            <option value="patrones/facade.php">Flyweight</option>
            <option value="patrones/facade.php">Proxy</option>
            
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