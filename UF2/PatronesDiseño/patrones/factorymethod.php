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
<body class="bodyFactory">

    <main>

    <div class="d-flex flex-column espacio as">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeFactory">Patrón - Factory Method</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El Patrón Factory Method es un patrón de diseño creacional que permite definir un método para crear objetos sin especificar la clase exacta del objeto que se creará. En lugar de instanciar objetos directamente con new, se delega la creación a una subclase.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // La clase creadora declara el método fábrica que debe devolver
            // un objeto de una clase de producto. Normalmente, las
            // subclases de la creadora proporcionan la implementación de
            // este método.
            class Dialog is
                // La creadora también puede proporcionar cierta
                // implementación por defecto del método fábrica.
                abstract method createButton():Button

                // Observa que, a pesar de su nombre, la principal
                // responsabilidad de la creadora no es crear productos.
                // Normalmente contiene cierta lógica de negocio que depende
                // de los objetos de producto devueltos por el método
                // fábrica. Las subclases pueden cambiar indirectamente esa
                // lógica de negocio sobrescribiendo el método fábrica y
                // devolviendo desde él un tipo diferente de producto.
                method render() is
                    // Invoca el método fábrica para crear un objeto de
                    // producto.
                    Button okButton = createButton()
                    // Ahora utiliza el producto.
                    okButton.onClick(closeDialog)
                    okButton.render()


            // Los creadores concretos sobrescriben el método fábrica para
            // cambiar el tipo de producto resultante.
            class WindowsDialog extends Dialog is
                method createButton():Button is
                    return new WindowsButton()

            class WebDialog extends Dialog is
                method createButton():Button is
                    return new HTMLButton()


            // La interfaz de producto declara las operaciones que todos los
            // productos concretos deben implementar.
            interface Button is
                method render()
                method onClick(f)

            // Los productos concretos proporcionan varias implementaciones
            // de la interfaz de producto.

            class WindowsButton implements Button is
                method render(a, b) is
                    // Representa un botón en estilo Windows.
                method onClick(f) is
                    // Vincula un evento clic de OS nativo.

            class HTMLButton implements Button is
                method render(a, b) is
                    // Devuelve una representación HTML de un botón.
                method onClick(f) is
                    // Vincula un evento clic de navegador web.

            class Application is
                field dialog: Dialog

                // La aplicación elige un tipo de creador dependiendo de la
                // configuración actual o los ajustes del entorno.
                method initialize() is
                    config = readApplicationConfigFile()

                    if (config.OS == "Windows") then
                        dialog = new WindowsDialog()
                    else if (config.OS == "Web") then
                        dialog = new WebDialog()
                    else
                        throw new Exception("Error! Unknown operating system.")

                // El código cliente funciona con una instancia de un
                // creador concreto, aunque a través de su interfaz base.
                // Siempre y cuando el cliente siga funcionando con el
                // creador a través de la interfaz base, puedes pasarle
                // cualquier subclase del creador.
                method main() is
                    this.initialize()
                    dialog.render()
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>