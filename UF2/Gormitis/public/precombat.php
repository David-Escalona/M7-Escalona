<?php
include '../src/config/config.php';

if (!isset($_POST['seleccionats']) || count($_POST['seleccionats']) !== 2) {
    die('Has de seleccionar exactament dos personatges.');
}

$seleccionats = $_POST['seleccionats'];
$gormitis = $_SESSION['gormitis'];

$personatge1 = unserialize($gormitis[$seleccionats[0]]);
$personatge2 = unserialize($gormitis[$seleccionats[1]]);
