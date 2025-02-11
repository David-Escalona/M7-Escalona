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
            <h1 class="d-flex justify-content-center text-light mt-5 bordeMemento">Patrón - Mediator</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El patrón Mediator es un patrón de comportamiento que facilita la comunicación entre objetos al desacoplarlos a través de un intermediario (mediador). En lugar de que los objetos interactúen directamente entre sí, envían mensajes a través del mediador, quien gestiona la comunicación.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // La interfaz mediadora declara un método utilizado por los
            // componentes para notificar al mediador sobre varios eventos.
            // El mediador puede reaccionar a estos eventos y pasar la
            // ejecución a otros componentes.
            interface Mediator is
                method notify(sender: Component, event: string)


            // La clase concreta mediadora. La red entrecruzada de
            // conexiones entre componentes individuales se ha desenredado y
            // se ha colocado dentro de la mediadora.
            class AuthenticationDialog implements Mediator is
                private field title: string
                private field loginOrRegisterChkBx: Checkbox
                private field loginUsername, loginPassword: Textbox
                private field registrationUsername, registrationPassword,
                            registrationEmail: Textbox
                private field okBtn, cancelBtn: Button

                constructor AuthenticationDialog() is
                    // Crea todos los objetos del componente y pasa el
                    // mediador actual a sus constructores para establecer
                    // vínculos.

                // Cuando sucede algo con un componente, notifica al
                // mediador, que al recibir la notificación, puede hacer
                // algo por su cuenta o pasar la solicitud a otro
                // componente.
                method notify(sender, event) is
                    if (sender == loginOrRegisterChkBx and event == "check")
                        if (loginOrRegisterChkBx.checked)
                            title = "Log in"
                            // 1. Muestra los componentes del formulario de
                            // inicio de sesión.
                            // 2. Esconde los componentes del formulario de
                            // registro.
                        else
                            title = "Register"
                            // 1. Muestra los componentes del formulario de
                            // registro.
                            // 2. Esconde los componentes del formulario de
                            // inicio de sesión.

                    if (sender == okBtn && event == "click")
                        if (loginOrRegister.checked)
                            // Intenta encontrar un usuario utilizando las
                            // credenciales de inicio de sesión.
                            if (!found)
                                // Muestra un mensaje de error sobre el
                                // campo de inicio de sesión.
                        else
                            // 1. Crea una cuenta de usuario utilizando
                            // información de los campos de registro.
                            // 2. Ingresa a ese usuario.
                            // ...


            // Los componentes se comunican con un mediador utilizando la
            // interfaz mediadora. Gracias a ello, puedes utilizar los
            // mismos componentes en otros contextos vinculándolos con
            // diferentes objetos mediadores.
            class Component is
                field dialog: Mediator

                constructor Component(dialog) is
                    this.dialog = dialog

                method click() is
                    dialog.notify(this, "click")

                method keypress() is
                    dialog.notify(this, "keypress")

            // Los componentes concretos no hablan entre sí. Sólo tienen un
            // canal de comunicación, que es el envío de notificaciones al
            // mediador.
            class Button extends Component is
                // ...

            class Textbox extends Component is
                // ...

            class Checkbox extends Component is
                method check() is
                    dialog.notify(this, "check")
                // ...
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>