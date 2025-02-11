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
            <h1 class="d-flex justify-content-center text-light mt-5 bordeFacade">Patron - Facade</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El Patrón Facade es un patrón de diseño estructural que proporciona una interfaz simplificada para un conjunto de subsistemas complejos. Su objetivo es reducir la complejidad y mejorar la facilidad de uso de un sistema al encapsular detalles internos detrás de una única interfaz.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // Estas son algunas de las clases de un framework de conversión
            // de video de un tercero. No controlamos ese código, por lo que
            // no podemos simplificarlo.

            class VideoFile
            // ...

            class OggCompressionCodec
            // ...

            class MPEG4CompressionCodec
            // ...

            class CodecFactory
            // ...

            class BitrateReader
            // ...

            class AudioMixer
            // ...


            // Creamos una clase fachada para esconder la complejidad del
            // framework tras una interfaz simple. Es una solución de
            // equilibrio entre funcionalidad y simplicidad.
            class VideoConverter is
                method convert(filename, format):File is
                    file = new VideoFile(filename)
                    sourceCodec = (new CodecFactory).extract(file)
                    if (format == "mp4")
                        destinationCodec = new MPEG4CompressionCodec()
                    else
                        destinationCodec = new OggCompressionCodec()
                    buffer = BitrateReader.read(filename, sourceCodec)
                    result = BitrateReader.convert(buffer, destinationCodec)
                    result = (new AudioMixer()).fix(result)
                    return new File(result)

            // Las clases Application no dependen de un millón de clases
            // proporcionadas por el complejo framework. Además, si decides
            // cambiar los frameworks, sólo tendrás de volver a escribir la
            // clase fachada.
            class Application is
                method main() is
                    convertor = new VideoConverter()
                    mp4 = convertor.convert("funny-cats-video.ogg", "mp4")
                    mp4.save()
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>