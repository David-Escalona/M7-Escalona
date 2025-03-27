<?php

$host = 'mysql-davidescalonagarcia.alwaysdata.net';
$dname = 'davidescalonagarcia_examen';
$username = '393689_examen';
$password = 'Alumno_1516';

// Crear una nueva conexión MySQLi
$mysqli = new mysqli($host, $username, $password, $dname);

if ($mysqli->connect_error) {
    // Si ocurre un error en la conexión, se muestra el mensaje de error
    die("Conexión fallida: " . $mysqli->connect_error);
} else {
    // Si la conexión es exitosa
    echo "Conexión exitosa a la base de datos '$dname' en el host '$host'.";
}

?>
