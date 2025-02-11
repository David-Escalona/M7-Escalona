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
            <h1 class="d-flex justify-content-center text-light mt-5 bordeAdapter">Patrón - Iterator</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El patrón Iterator es un patrón de comportamiento que permite recorrer una colección de elementos sin exponer su estructura interna. Proporciona una interfaz estándar para acceder a los elementos de una colección uno por uno, sin que el cliente tenga que preocuparse por cómo están almacenados.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // La interfaz de colección debe declarar un método fábrica para
            // producir iteradores. Puedes declarar varios métodos si hay
            // distintos tipos de iteración disponibles en tu programa.
            interface SocialNetwork is
                method createFriendsIterator(profileId):ProfileIterator
                method createCoworkersIterator(profileId):ProfileIterator


            // Cada colección concreta está acoplada a un grupo de clases
            // iteradoras concretas que devuelve, pero el cliente no lo
            // está, ya que la firma de estos métodos devuelve interfaces
            // iteradoras.
            class Facebook implements SocialNetwork is
                // ... El grueso del código de la colección debe ir aquí ...
                // Código de creación del iterador.
                method createFriendsIterator(profileId) is
                    return new FacebookIterator(this, profileId, "friends")
                method createCoworkersIterator(profileId) is
                    return new FacebookIterator(this, profileId, "coworkers")


            // La interfaz común a todos los iteradores.
            interface ProfileIterator is
                method getNext():Profile
                method hasMore():bool


            // La clase iteradora concreta.
            class FacebookIterator implements ProfileIterator is
                // El iterador necesita una referencia a la colección que
                // recorre.
                private field facebook: Facebook
                private field profileId, type: string

                // Un objeto iterador recorre la colección
                // independientemente de otro iterador, por eso debe
                // almacenar el estado de iteración.
                private field currentPosition
                private field cache: array of Profile

                constructor FacebookIterator(facebook, profileId, type) is
                    this.facebook = facebook
                    this.profileId = profileId
                    this.type = type

                private method lazyInit() is
                    if (cache == null)
                        cache = facebook.socialGraphRequest(profileId, type)

                // Cada clase iteradora concreta tiene su propia
                // implementación de la interfaz iteradora común.
                method getNext() is
                    if (hasMore())
                        result = cache[currentPosition]
                        currentPosition++
                        return result

                method hasMore() is
                    lazyInit()
                    return currentPosition < cache.length


            // Aquí tienes otro truco útil: puedes pasar un iterador a una
            // clase cliente en lugar de darle acceso a una colección
            // completa. De esta forma, no expones la colección al cliente.
            //
            // Y hay otra ventaja: puedes cambiar la forma en la que el
            // cliente trabaja con la colección durante el tiempo de
            // ejecución pasándole un iterador diferente. Esto es posible
            // porque el código cliente no está acoplado a clases iteradoras
            // concretas.
            class SocialSpammer is
                method send(iterator: ProfileIterator, message: string) is
                    while (iterator.hasMore())
                        profile = iterator.getNext()
                        System.sendEmail(profile.getEmail(), message)


            // La clase Aplicación configura colecciones e iteradores y
            // después los pasa al código cliente.
            class Application is
                field network: SocialNetwork
                field spammer: SocialSpammer

                method config() is
                    if working with Facebook
                        this.network = new Facebook()
                    if working with LinkedIn
                        this.network = new LinkedIn()
                    this.spammer = new SocialSpammer()

                method sendSpamToFriends(profile) is
                    iterator = network.createFriendsIterator(profile.getId())
                    spammer.send(iterator, "Very important message")

                method sendSpamToCoworkers(profile) is
                    iterator = network.createCoworkersIterator(profile.getId())
                    spammer.send(iterator, "Very important message")
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>