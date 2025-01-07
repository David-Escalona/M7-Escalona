<?php

session_start();

if (!isset($_SESSION['gormitis'])) {
    $_SESSION['gormitis'] = [];
}

?>
