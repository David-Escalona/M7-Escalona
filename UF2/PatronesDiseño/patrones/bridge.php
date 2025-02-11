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
<body class="bodyBridge">

    <main>

    <div class="d-flex flex-column espacio as">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeBridge">Patron - Bridge</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El Patrón Bridge (Puente) es un patrón de diseño estructural que se utiliza para desacoplar una abstracción de su implementación, permitiendo que ambas evolucionen de manera independiente. Es útil cuando quieres evitar una estructura rígida de herencia y prefieres la composición para mayor flexibilidad.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // La "abstracción" define la interfaz para la parte de
            // "control" de las dos jerarquías de clase. Mantiene una
            // referencia a un objeto de la jerarquía de "implementación" y
            // delega todo el trabajo real a este objeto.
            class RemoteControl is
                protected field device: Device
                constructor RemoteControl(device: Device) is
                    this.device = device
                method togglePower() is
                    if (device.isEnabled()) then
                        device.disable()
                    else
                        device.enable()
                method volumeDown() is
                    device.setVolume(device.getVolume() - 10)
                method volumeUp() is
                    device.setVolume(device.getVolume() + 10)
                method channelDown() is
                    device.setChannel(device.getChannel() - 1)
                method channelUp() is
                    device.setChannel(device.getChannel() + 1)


            // Puedes extender clases de la jerarquía de abstracción
            // independientemente de las clases de dispositivo.
            class AdvancedRemoteControl extends RemoteControl is
                method mute() is
                    device.setVolume(0)


            // La interfaz de "implementación" declara métodos comunes a
            // todas las clases concretas de implementación. No tiene por
            // qué coincidir con la interfaz de la abstracción. De hecho,
            // las dos interfaces pueden ser completamente diferentes.
            // Normalmente, la interfaz de implementación únicamente
            // proporciona operaciones primitivas, mientras que la
            // abstracción define operaciones de más alto nivel con base en
            // las primitivas.
            interface Device is
                method isEnabled()
                method enable()
                method disable()
                method getVolume()
                method setVolume(percent)
                method getChannel()
                method setChannel(channel)


            // Todos los dispositivos siguen la misma interfaz.
            class Tv implements Device is
                // ...

            class Radio implements Device is
                // ...


            // En algún lugar del código cliente.
            tv = new Tv()
            remote = new RemoteControl(tv)
            remote.togglePower()

            radio = new Radio()
            remote = new AdvancedRemoteControl(radio)
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>