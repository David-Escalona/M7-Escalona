<?php

include '../src/config/config.php';
include '../src/classes/Gormiti.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nom']) && !empty($_POST['salut']) && !empty($_POST['dany']) && !empty($_POST['imatge']) && !empty($_POST['habilitats'])) {
        $nom = $_POST['nom'];
        $salut = (int)$_POST['salut'];
        $dany = (int)$_POST['dany'];
        $imatge = $_POST['imatge'];
        $habilitats = explode(',', $_POST['habilitats']);

        $nouGormiti = new Gormiti(uniqid(), $nom, $salut, $dany, $imatge, $habilitats);

        $_SESSION['gormitis'][] = serialize($nouGormiti);

        header("Location: index.php");
        exit();
    } else {
        $error = "Tots els camps són obligatoris!";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Gormitis</title>
</head>
<body>
    <h1>Crear un nou Gormiti</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <label for="nom">Nom:</label><br>
        <input type="text" name="nom" id="nom" required><br><br>

        <label for="salut">Salut:</label><br>
        <input type="number" name="salut" id="salut" required><br><br>

        <label for="dany">Dany:</label><br>
        <input type="number" name="dany" id="dany" required><br><br>

        <label for="imatge">URL de la imatge:</label><br>
        <input type="text" name="imatge" id="imatge" required><br><br>

        <label for="habilitats">Habilitats (separades per comes):</label><br>
        <input type="text" name="habilitats" id="habilitats" required><br><br>

        <button type="submit">Crear Gormiti</button>
    </form>

    <p><a href="characters.php">Veure Gormitis</a></p>
    <p><a href="reset.php">Reiniciar la sessió</a></p>
</body>
</html>

