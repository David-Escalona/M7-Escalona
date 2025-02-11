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
    <link rel="stylesheet" href="../estilo.css">
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
<body class="bodyAdapter">

    <main>

    <div class="d-flex flex-column espacio as">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeFly">Patrón - Flyweight</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El Patrón Flyweight es un patrón de diseño estructural que permite optimizar el uso de memoria compartiendo objetos similares en lugar de crearlos repetidamente. Se usa cuando tienes una gran cantidad de objetos similares que consumen demasiados recursos.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // La clase flyweight contiene una parte del estado de un árbol.
            // Estos campos almacenan valores que son únicos para cada árbol
            // en particular. Por ejemplo, aquí no encontrarás las
            // coordenadas del árbol. Pero la textura y los colores que
            // comparten muchos árboles sí están aquí. Ya que esta cantidad
            // de datos suele ser GRANDE, dedicarás mucha memoria a
            // mantenerla en cada objeto árbol. En lugar de eso, podemos
            // extraer la textura, el color y otros datos repetidos y
            // colocarlos en un objeto independiente que muchos objetos
            // individuales del árbol pueden referenciar.
            class TreeType is
                field name
                field color
                field texture
                constructor TreeType(name, color, texture) { ... }
                method draw(canvas, x, y) is
                    // 1. Crea un mapa de bits de un tipo, color y textura
                    // concretos.
                    // 2. Dibuja el mapa de bits en el lienzo con las
                    // coordenadas X y Y.


            // La fábrica flyweight decide si reutiliza el flyweight
            // existente o si crea un nuevo objeto.
            class TreeFactory is
                static field treeTypes: collection of tree types
                static method getTreeType(name, color, texture) is
                    type = treeTypes.find(name, color, texture)
                    if (type == null)
                        type = new TreeType(name, color, texture)
                        treeTypes.add(type)
                    return type

            // El objeto contextual contiene la parte extrínseca del estado
            // del árbol. Una aplicación puede crear millones de ellas, ya
            // que son muy pequeñas: dos coordenadas en números enteros y un
            // campo de referencia.
            class Tree is
                field x,y
                field type: TreeType
                constructor Tree(x, y, type) { ... }
                method draw(canvas) is
                    type.draw(canvas, this.x, this.y)

            // Las clases Tree y Forest son los clientes de flyweight.
            // Puedes fusionarlas si no tienes la intención de desarrollar
            // más la clase Tree.
            class Forest is
                field trees: collection of Trees

                method plantTree(x, y, name, color, texture) is
                    type = TreeFactory.getTreeType(name, color, texture)
                    tree = new Tree(x, y, type)
                    trees.add(tree)

                method draw(canvas) is
                    foreach (tree in trees) do
                        tree.draw(canvas)
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>