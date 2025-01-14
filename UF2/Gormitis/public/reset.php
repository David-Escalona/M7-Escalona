<?php

// Iniciar la sesión
session_start();

// Borrar todos los datos de la sesión
session_unset(); // Elimina todas las variables de sesión

// Destruir la sesión
session_destroy(); // Elimina la sesión completamente

// Redirigir al index.php después de reiniciar
header("Location: index.php");
exit(); // Asegurarse de que el script se detenga después de redirigir

?>
