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
<body class="bodyComposite">

    <main>

    <div class="d-flex flex-column espacio as">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeDecorator">Patrón - Prototype</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El Patrón Prototype es un patrón de diseño creacional que permite clonar objetos en lugar de crearlos desde cero, evitando el uso del operador new y mejorando el rendimiento en algunos casos.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // Prototipo base.
            abstract class Shape is
                field X: int
                field Y: int
                field color: string

                // Un constructor normal.
                constructor Shape() is
                    // ...

                // El constructor prototipo. Un nuevo objeto se inicializa
                // con valores del objeto existente.
                constructor Shape(source: Shape) is
                    this()
                    this.X = source.X
                    this.Y = source.Y
                    this.color = source.color

                // La operación clonar devuelve una de las subclases de
                // Shape (Forma).
                abstract method clone():Shape


            // Prototipo concreto. El método de clonación crea un nuevo
            // objeto y lo pasa al constructor. Hasta que el constructor
            // termina, tiene una referencia a un nuevo clon. De este modo
            // nadie tiene acceso a un clon a medio terminar. Esto garantiza
            // la consistencia del resultado de la clonación.
            class Rectangle extends Shape is
                field width: int
                field height: int

                constructor Rectangle(source: Rectangle) is
                    // Para copiar campos privados definidos en la clase
                    // padre es necesaria una llamada a un constructor
                    // padre.
                    super(source)
                    this.width = source.width
                    this.height = source.height

                method clone():Shape is
                    return new Rectangle(this)


            class Circle extends Shape is
                field radius: int

                constructor Circle(source: Circle) is
                    super(source)
                    this.radius = source.radius

                method clone():Shape is
                    return new Circle(this)


            // En alguna parte del código cliente.
            class Application is
                field shapes: array of Shape

                constructor Application() is
                    Circle circle = new Circle()
                    circle.X = 10
                    circle.Y = 10
                    circle.radius = 20
                    shapes.add(circle)

                    Circle anotherCircle = circle.clone()
                    shapes.add(anotherCircle)
                    // La variable `anotherCircle` (otroCírculo) contiene
                    // una copia exacta del objeto `circle`.

                    Rectangle rectangle = new Rectangle()
                    rectangle.width = 10
                    rectangle.height = 20
                    shapes.add(rectangle)

                method businessLogic() is
                    // Prototype es genial porque te permite producir una
                    // copia de un objeto sin conocer nada de su tipo.
                    Array shapesCopy = new Array of Shapes.

                    // Por ejemplo, no conocemos los elementos exactos de la
                    // matriz de formas. Lo único que sabemos es que son
                    // todas formas. Pero, gracias al polimorfismo, cuando
                    // invocamos el método `clonar` en una forma, el
                    // programa comprueba su clase real y ejecuta el método
                    // de clonación adecuado definido en dicha clase. Por
                    // eso obtenemos los clones adecuados en lugar de un
                    // grupo de simples objetos Shape.
                    foreach (s in shapes) do
                        shapesCopy.add(s.clone())

                    // La matriz `shapesCopy` contiene copias exactas del
                    // hijo de la matriz `shape`.
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>