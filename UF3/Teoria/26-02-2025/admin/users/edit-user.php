<?php
require_once '../../config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}               

$id = (int) $_GET['id'];
$result = $mysqli->query("SELECT * FROM USERS WHERE id = $id");

$user = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $NAME = $_POST['NAME'];
    $sourname = $_POST['sourname'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];
    $rol = $_POST['rol'];
    $age = $_POST['age'];

    $query = "UPDATE USERS SET NAME = ?, sourname = ?, email = ?, avatar = ?, rol = ?, age = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
    }
    $stmt->bind_param('ssssssi', $NAME, $sourname, $email, $avatar, $rol, $age, $id);
    $stmt->execute();

    header('Location: ../admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="POST">  

        <label for="name">Nombre</label>
        <input type="text" name="NAME" value="<?= $user['NAME']; ?>">

        <label for="sourname">Apellidos</label>
        <input type="text" name="sourname" value="<?= $user['sourname']; ?>">

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $user['email']; ?>">

        <label for="avatar">Avatar</label>
        <input type="text" name="avatar" value="<?= $user['avatar']; ?>">

        <label for="PASSWORD">Contraseña</label>
        <input type="password" name="PASSWORD" value="<?= $user['PASSWORD']; ?>">

        <label for="rol">Rol</label>
        <input type="text" name="rol" value="<?= $user['rol']; ?>">

        <label for="age">Edad</label>
        <input type="number" name="age" value="<?= $user['age']; ?>">

        <label for="data_registre">Fecha de registro</label>
        <input type="date" name="data_registre" value="<?= $user['data_registre']; ?>">

        <button type="submit">Enviar</button>

    </form>

</body>
</html>