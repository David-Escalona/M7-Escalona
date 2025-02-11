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
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

    </style>

</head>
<body>
    
    <header class="d-flex flex-column align-items-center text-light bg-danger p-2 fixed-left header">

        <img src="../img/logo.png" alt="Logo" class="mb-4 mt-3" width="200">
        
        <nav>
            <ul class="list-unstyled text-star">
                <li class="mb-3 fs-5"><a href="../index.php" class="text-light decoracion">Home</a></li>
                <hr>

                <div class="dropdown bg-danger">
                    <button class="dropbtn bg-danger">Patrón de Estrucutra</button>
                    <div class="dropdown-content">
                    <a href="../patrones/adapter.php">Adapter</a>
                    <a href="../patrones/bridge.php">Bridge</a>
                    <a href="../patrones/composite.php">Composite</a>
                    <a href="../patrones/decorator.php">Decorator</a>
                    <a href="../patrones/facade.php">Facade</a>
                    <a href="../patrones/flyweight.php">Flyweight</a>
                    <a href="../patrones/proxy.php">Proxy</a>
                    </div>
                </div>

                <hr>

                <div class="dropdown bg-danger">
                    <button class="dropbtn bg-danger">Patrón de Creación</button>
                    <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    </div>
                </div>

                <hr>

                <div class="dropdown bg-danger">
                    <button class="dropbtn bg-danger">Patrón de Comportamiento</button>
                    <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    </div>
                </div>
            
            </ul>
        </nav>
        
    </header>

</body>
</html>