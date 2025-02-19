<?php

require_once 'config.php';

$result = $mysqli->query("SELECT * FROM USERS ORDER BY id DESC");

if (!$result) {
    die("Error en la consulta SQL: " . $mysqli->error);
}

print_r($result);

print '<br>';

$USERS = $result->fetch_all(MYSQLI_ASSOC);

echo '<pre>';
print_r($USERS);
echo '</pre>';
?>
