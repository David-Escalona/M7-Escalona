<?php
session_start();
session_unset();
session_destroy();

// Redirigir a la raíz del sitio, independientemente de la ruta actual
header('Location: index.php');
exit();
?>
