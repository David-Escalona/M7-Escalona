<?php
// patro_info.php

if (isset($_GET['patro'])) {
    $patro = $_GET['patro'];
} else {
    echo "No s'ha seleccionat cap patró.";
    exit;
}

// Crear un array amb la informació de cada patró
$informacioPatrons = [
    'adapter' => 'El patró Adapter permet que dues classes incompatibles treballin juntes mitjançant un adaptador que converteix una interfície en una altra.',
    'bridge' => 'El patró Bridge separa l’abstracció d’una implementació de manera que ambdues puguin variar independentment, millorant la flexibilitat.',
    'composite' => 'El patró Composite permet combinar objectes en estructures d’arbres per tractar-los de manera unificada, permetent tractar objectes individuals i col·leccions de manera uniforme.',
    'decorator' => 'El patró Decorator permet afegir comportaments a un objecte de manera dinàmica, sense afectar altres objectes de la mateixa classe.',
    'facade' => 'El patró Facade proporciona una interfície unificada i senzilla per a un conjunt d’interfícies d’un subsistema, fent-lo més fàcil d’utilitzar.',
    'flyweight' => 'El patró Flyweight utilitza objectes compartits per minimitzar l’ús de memòria quan hi ha una gran quantitat d’objectes similars.',
    'proxy' => 'El patró Proxy crea una representació o placeholder d’un objecte per controlar l’accés al seu objecte real.'
];

// Comprovar si el patró existeix en l'array i mostrar la informació
if (array_key_exists($patro, $informacioPatrons)) {
    echo "<h1>Informació sobre el patró: " . ucfirst($patro) . "</h1>";
    echo "<p>" . $informacioPatrons[$patro] . "</p>";
} else {
    echo "<h1>Patró no trobat</h1>";
    echo "<p>No es pot mostrar la informació perquè el patró seleccionat no existeix.</p>";
}
?>
