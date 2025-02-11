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
            <h1 class="d-flex justify-content-center text-light mt-5 bordeDecorator">Patrón - Singleton</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El Patrón Singleton es un patrón de diseño creacional que asegura que una clase tenga una única instancia en todo el sistema y proporciona un punto global de acceso a esa instancia.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // La clase Base de datos define el método `obtenerInstancia`
            // que permite a los clientes acceder a la misma instancia de
            // una conexión de la base de datos a través del programa.
            class Database is
                // El campo para almacenar la instancia singleton debe
                // declararse estático.
                private static field instance: Database

                // El constructor del singleton siempre debe ser privado
                // para evitar llamadas de construcción directas con el
                // operador `new`.
                private constructor Database() is
                    // Algún código de inicialización, como la propia
                    // conexión al servidor de una base de datos.
                    // ...

                // El método estático que controla el acceso a la instancia
                // singleton.
                public static method getInstance() is
                    if (Database.instance == null) then
                        acquireThreadLock() and then
                            // Garantiza que la instancia aún no se ha
                            // inicializado por otro hilo mientras ésta ha
                            // estado esperando el desbloqueo.
                            if (Database.instance == null) then
                                Database.instance = new Database()
                    return Database.instance

                // Por último, cualquier singleton debe definir cierta
                // lógica de negocio que pueda ejecutarse en su instancia.
                public method query(sql) is
                    // Por ejemplo, todas las consultas a la base de datos
                    // de una aplicación pasan por este método. Por lo
                    // tanto, aquí puedes colocar lógica de regularización
                    // (throttling) o de envío a la memoria caché.
                    // ...

            class Application is
                method main() is
                    Database foo = Database.getInstance()
                    foo.query("SELECT ...")
                    // ...
                    Database bar = Database.getInstance()
                    bar.query("SELECT ...")
                    // La variable `bar` contendrá el mismo objeto que la
                    // variable `foo`.
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>