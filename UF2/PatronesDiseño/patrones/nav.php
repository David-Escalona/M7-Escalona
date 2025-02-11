<!DOCTYPE html>
<html lang="es">
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
        header{
            font-family: Comfortaa;
        }

        .dropbtn {
            color: white;
            padding: 1px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 10px 10px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }
        a{
            line-height: none;
            list-style: none;
            text-decoration: none;
        }
    </style>

</head>
<body>
    
    <header class="d-flex flex-column align-items-center text-light bg-danger p-2 fixed-left header">

        <img src="https://refactoring.guru/images/content-public/logos/logo-new.png?id=97d554614702483f31e38b32e82d8e34" alt="Logo" class="mb-4 mt-3" width="200">
        
        <nav>
            <ul class="list-unstyled text-star">
                <li class="mb-3 fs-5"><a href="../index.php" class="text-light decoracion">Home</a></li>
                <hr>

                <div class="dropdown bg-danger">
                    <a href="../estructura.php" class="dropbtn bg-danger">Patrón de Estrucutra</a>
                    <div class="dropdown-content">
                    <a href="adapter.php">Adapter</a>
                    <a href="bridge.php">Bridge</a>
                    <a href="composite.php">Composite</a>
                    <a href="decorator.php">Decorator</a>
                    <a href="facade.php">Facade</a>
                    <a href="flyweight.php">Flyweight</a>
                    <a href="proxy.php">Proxy</a>
                    </div>
                </div>

                <hr>

                <div class="dropdown bg-danger">
                    <a href="../creacion.php" class="dropbtn bg-danger">Patrón de Creación</a>
                    <div class="dropdown-content">
                    <a href="factorymethod.php">Factory</a>
                    <a href="abstractfactory.php">Abstract</a>
                    <a href="builder.php">Builder</a>
                    <a href="prototype.php">Prototype</a>
                    <a href="singleton.php">Singleton</a>
                    </div>
                </div>

                <hr>

                <div class="dropdown bg-danger">
                    <a href="../comportamiento.php" class="dropbtn bg-danger">Patrón de Comportamiento</a>
                    <div class="dropdown-content">
                    <a href="responsability.php">Responsability</a>
                    <a href="command.php">Command</a>
                    <a href="iterator.php">Iterator</a>
                    <a href="mediator.php">Mediator</a>
                    <a href="memento.php">Memento</a>
                    </div>
                </div>
            
            </ul>
        </nav>
        
    </header>

</body>
</html>