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
            <h1 class="d-flex justify-content-center text-light mt-5 bordeMemento">Patrón - Memento</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El patrón Memento es un patrón de comportamiento que permite capturar y almacenar el estado interno de un objeto sin violar su encapsulación. Esto se logra guardando un "memento" (un objeto que contiene ese estado) para poder restaurarlo más tarde. Es muy útil cuando se necesita la capacidad de deshacer o rehacer cambios sin exponer detalles internos.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // El originador contiene información importante que puede
            // cambiar con el paso del tiempo. También define un método para
            // guardar su estado dentro de un memento, y otro método para
            // restaurar el estado a partir de él.
            class Editor is
                private field text, curX, curY, selectionWidth

                method setText(text) is
                    this.text = text

                method setCursor(x, y) is
                    this.curX = x
                    this.curY = y

                method setSelectionWidth(width) is
                    this.selectionWidth = width

                // Guarda el estado actual dentro de un memento.
                method createSnapshot():Snapshot is
                    // El memento es un objeto inmutable; ese es el motivo
                    // por el que el originador pasa su estado a los
                    // parámetros de su constructor.
                    return new Snapshot(this, text, curX, curY, selectionWidth)

            // La clase memento almacena el estado pasado del editor.
            class Snapshot is
                private field editor: Editor
                private field text, curX, curY, selectionWidth

                constructor Snapshot(editor, text, curX, curY, selectionWidth) is
                    this.editor = editor
                    this.text = text
                    this.curX = x
                    this.curY = y
                    this.selectionWidth = selectionWidth

                // En cierto punto, puede restaurarse un estado previo del
                // editor utilizando un objeto memento.
                method restore() is
                    editor.setText(text)
                    editor.setCursor(curX, curY)
                    editor.setSelectionWidth(selectionWidth)

            // Un objeto de comando puede actuar como cuidador. En este
            // caso, el comando obtiene un memento justo antes de cambiar el
            // estado del originador. Cuando se solicita deshacer, restaura
            // el estado del originador a partir del memento.
            class Command is
                private field backup: Snapshot

                method makeBackup() is
                    backup = editor.createSnapshot()

                method undo() is
                    if (backup != null)
                        backup.restore()
                // ...
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>