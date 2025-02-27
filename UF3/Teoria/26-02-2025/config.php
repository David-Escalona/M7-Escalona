<?php

// Conexión a la base de datos
$mysqli = new mysqli('mysql-davidescalonagarcia.alwaysdata.net', '393689', 'Alumno_1516', 'davidescalonagarcia_base');

// Comprobar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Eliminar cualquier salida aquí
// echo 'Conexión exitosa a la base de datos \'davidescalonagarcia_base\' en el host \'mysql-davidescalonagarcia.alwaysdata.net\'.';

?>
