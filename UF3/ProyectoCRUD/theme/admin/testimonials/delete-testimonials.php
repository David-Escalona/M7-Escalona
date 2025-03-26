<?php

session_start();
require_once('../../config.php');

// VERIFICAR QUE EL USUARIO SEA ADMIN
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit();
}

// COMPROBAR SI SE HA RECIBIDO UN ID VÁLIDO
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID de testimonio no válido.";
    exit();
}

$id = $_GET['id'];

// PREPARAR LA CONSULTA PARA ELIMINAR EL TESTIMONIO
$stmt = $mysqli->prepare("DELETE FROM TESTIMONIS WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // REDIRECCIONAR AL PANEL DE ADMINISTRACIÓN
    header("Location: ../users/adminPanel.php");
    exit();
} else {
    echo "Error al eliminar el testimonio.";
}

$stmt->close();
$mysqli->close();

?>
