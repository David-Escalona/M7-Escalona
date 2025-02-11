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
<body class="bodyCommand">

    <main>

    <div class="d-flex flex-column espacio as">
        <div class="d-flex justify-content-center">
            <h1 class="d-flex justify-content-center text-light mt-5 bordeAdapter">Patrón - Iterator</h1> 
        </div>

        <div class="d-flex justify-content-center espaciado">
            <p class="text-light dfl">El patrón Command es un patrón de comportamiento que encapsula una solicitud como un objeto, permitiendo parametrizar clientes con diferentes operaciones, deshacer/rehacer acciones y registrar comandos en una cola.</p>
        </div>
    </div>     
    
    <div class="espaciado text-light espacioBridge ass">
    <pre>
          <code>
            // La clase base comando define la interfaz común a todos los
            // comandos concretos.
            abstract class Command is
                protected field app: Application
                protected field editor: Editor
                protected field backup: text

                constructor Command(app: Application, editor: Editor) is
                    this.app = app
                    this.editor = editor

                // Realiza una copia de seguridad del estado del editor.
                method saveBackup() is
                    backup = editor.text

                // Restaura el estado del editor.
                method undo() is
                    editor.text = backup

                // El método de ejecución se declara abstracto para forzar a
                // todos los comandos concretos a proporcionar sus propias
                // implementaciones. El método debe devolver verdadero o
                // falso dependiendo de si el comando cambia el estado del
                // editor.
                abstract method execute()


            // Los comandos concretos van aquí.
            class CopyCommand extends Command is
                // El comando copiar no se guarda en el historial ya que no
                // cambia el estado del editor.
                method execute() is
                    app.clipboard = editor.getSelection()
                    return false

            class CutCommand extends Command is
                // El comando cortar no cambia el estado del editor, por lo
                // que debe guardarse en el historial. Y se guardará siempre
                // y cuando el método devuelva verdadero.
                method execute() is
                    saveBackup()
                    app.clipboard = editor.getSelection()
                    editor.deleteSelection()
                    return true

            class PasteCommand extends Command is
                method execute() is
                    saveBackup()
                    editor.replaceSelection(app.clipboard)
                    return true

            // La operación deshacer también es un comando.
            class UndoCommand extends Command is
                method execute() is
                    app.undo()
                    return false


            // El historial global de comandos tan solo es una pila.
            class CommandHistory is
                private field history: array of Command

                // El último dentro...
                method push(c: Command) is
                    // Empuja el comando al final de la matriz del
                    // historial.

                // ...el primero fuera.
                method pop():Command is
                    // Obtiene el comando más reciente del historial.


            // La clase editora tiene operaciones reales de edición de
            // texto. Juega el papel de un receptor: todos los comandos
            // acaban delegando la ejecución a los métodos del editor.
            class Editor is
                field text: string

                method getSelection() is
                    // Devuelve el texto seleccionado.

                method deleteSelection() is
                    // Borra el texto seleccionado.

                method replaceSelection(text) is
                    // Inserta los contenidos del portapapeles en la
                    // posición actual.


            // La clase Aplicación establece relaciones entre objetos. Actúa
            // como un emisor: cuando algo debe hacerse, crea un objeto de
            // comando y lo ejecuta.
            class Application is
                field clipboard: string
                field editors: array of Editors
                field activeEditor: Editor
                field history: CommandHistory

                // El código que asigna comandos a objetos UI puede tener
                // este aspecto.
                method createUI() is
                    // ...
                    copy = function() { executeCommand(
                        new CopyCommand(this, activeEditor)) }
                    copyButton.setCommand(copy)
                    shortcuts.onKeyPress("Ctrl+C", copy)

                    cut = function() { executeCommand(
                        new CutCommand(this, activeEditor)) }
                    cutButton.setCommand(cut)
                    shortcuts.onKeyPress("Ctrl+X", cut)

                    paste = function() { executeCommand(
                        new PasteCommand(this, activeEditor)) }
                    pasteButton.setCommand(paste)
                    shortcuts.onKeyPress("Ctrl+V", paste)

                    undo = function() { executeCommand(
                        new UndoCommand(this, activeEditor)) }
                    undoButton.setCommand(undo)
                    shortcuts.onKeyPress("Ctrl+Z", undo)

                // Ejecuta un comando y comprueba si debe añadirse al
                // historial.
                method executeCommand(command) is
                    if (command.execute())
                        history.push(command)

                // Toma el comando más reciente del historial y ejecuta su
                // método deshacer. Observa que no conocemos la clase de ese
                // comando. Pero no tenemos por qué, ya que el comando sabe
                // cómo deshacer su propia acción.
                method undo() is
                    command = history.pop()
                    if (command != null)
                        command.undo()
          </code>
        </pre>
    </div>
    
    <?php include '../nav.php'; ?>
    <?php include '../header.php'; ?>
    </main>

</body>
</html>