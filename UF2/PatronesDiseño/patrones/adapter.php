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
<body>
    
    

    <main class="espacio">

    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeh1">Patrones de Diseño</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">Los patrones de diseño son unas técnicas para resolver problemas comunes en el desarrollo de software y otros ámbitos referentes al diseño de interacción o interfaces.
            Un patrón de diseño resulta ser una solución a un problema de diseño. Para que una solución sea considerada un patrón debe poseer ciertas características. Una de ellas es que debe haber comprobado su efectividad resolviendo problemas similares en ocasiones anteriores. Otra es que debe ser reutilizable, lo que significa que es aplicable a diferentes problemas de diseño en distintas circunstancias.</p>
        </div>
        
        <h1 class="d-flex justify-content-center text-light margenPatron">Tipos de Patrones</h1> 
    </div>

    <pre>
          <code>
          // Digamos que tienes dos clases con interfaces compatibles:
          // RoundHole (HoyoRedondo) y RoundPeg (PiezaRedonda).
          class RoundHole is
              constructor RoundHole(radius) { ... }

              method getRadius() is
                  // Devuelve el radio del agujero.

              method fits(peg: RoundPeg) is
                  return this.getRadius() >= peg.getRadius()

          class RoundPeg is
              constructor RoundPeg(radius) { ... }

              method getRadius() is
                  // Devuelve el radio de la pieza.


          // Pero hay una clase incompatible: SquarePeg (PiezaCuadrada).
          class SquarePeg is
              constructor SquarePeg(width) { ... }

              method getWidth() is
                  // Devuelve la anchura de la pieza cuadrada.


          // Una clase adaptadora te permite encajar piezas cuadradas en
          // hoyos redondos. Extiende la clase RoundPeg para permitir a
          // los objetos adaptadores actuar como piezas redondas.
          class SquarePegAdapter extends RoundPeg is
              // En realidad, el adaptador contiene una instancia de la
              // clase SquarePeg.
              private field peg: SquarePeg

              constructor SquarePegAdapter(peg: SquarePeg) is
                  this.peg = peg

              method getRadius() is
                  // El adaptador simula que es una pieza redonda con un
                  // radio que pueda albergar la pieza cuadrada que el
                  // adaptador envuelve.
                  return peg.getWidth() * Math.sqrt(2) / 2


          // En algún punto del código cliente.
          hole = new RoundHole(5)
          rpeg = new RoundPeg(5)
          hole.fits(rpeg) // verdadero

          small_sqpeg = new SquarePeg(5)
          large_sqpeg = new SquarePeg(10)
          hole.fits(small_sqpeg) // esto no compila (tipos incompatibles)

          small_sqpeg_adapter = new SquarePegAdapter(small_sqpeg)
          large_sqpeg_adapter = new SquarePegAdapter(large_sqpeg)
          hole.fits(small_sqpeg_adapter) // verdadero
          hole.fits(large_sqpeg_adapter) // falso
          </code>
        </pre>

    </main>
    <?php include 'nav.php'; ?>
</body>
</html>