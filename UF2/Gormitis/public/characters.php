<?php

include '../src/config/config.php';

$personatges = isset($_SESSION['gormitis']) ? $_SESSION['gormitis'] : [];

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecció de personatges</title>
</head>
<body>
    <h1>Selecciona els teus personatges per al combat</h1>

    <?php if (empty($personatges)): ?>
        <p>No hi ha personatges creats encara.</p>
        <p><a href="index.php">Crea un nou Gormiti</a></p>
    <?php else: ?>
        <form action="precombat.php" method="post">
            <div style="display: flex; flex-wrap: wrap;">
                <?php foreach ($personatges as $index => $serialitzat): 
                   
                    $gormiti = unserialize($serialitzat); 
                ?>
                    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px; width: 200px; text-align: center;">
                        <img src="<?php echo htmlspecialchars($gormiti->imatge); ?>" alt="<?php echo htmlspecialchars($gormiti->nom); ?>" style="width: 100%; height: auto;">
                        <h3><?php echo htmlspecialchars($gormiti->nom); ?></h3>
                        <p>Salut: <?php echo htmlspecialchars($gormiti->salut); ?></p>
                        <p>Dany: <?php echo htmlspecialchars($gormiti->dany); ?></p>
                        <p>Habilitats:</p>
                        <ul>
                            <?php foreach ($gormiti->habilitats as $habilitat): ?>
                                <li><?php echo htmlspecialchars($habilitat); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <label>
                            <input type="checkbox" name="seleccionats[]" value="<?php echo $index; ?>">
                            Selecciona
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit">Enviar personatges seleccionats</button>
        </form>
    <?php endif; ?>

    <p><a href="index.php">Torna a crear més Gormitis</a></p>
    <p><a href="reset.php">Reinicia la sessió</a></p>
</body>
</html>
