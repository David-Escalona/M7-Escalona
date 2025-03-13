<?php

require_once '../../config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}               

$id = (int) $_GET['id'];
$result = $mysqli->query("SELECT * FROM USERS WHERE id = $id");
                                        //TESTIMONIS

$user = $result->fetch_assoc(); 
//$testimonis


if($_SERVRE['REQUEST_METHOD'] === 'POST'){

    $NAME = $mysqli->$_POST['NAME'];
    $sourname = $mysqli->$_POST['sourname'];
    $email = $mysqli->$_POST['email'];
    $avatar = $mysqli->$_POST['avatar'];
    $PASSWORD = $mysqli->$_POST['PASSWORD'];
    $rol = $mysqli->$_POST['rol'];
    $age = $mysqli->$_POST['age'];
    $data_registre = $mysqli->$_POST['data_registre'];

}

$query = "UPDATE USERS SET name = ?, sourname = ?, email = ?, avatar = ?, PASSWORD = ?, rol = ?, age = ?, data_registre = ? WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssssssssi', $name, $sourname, $email, $avatar, $PASSWORD, $rol, $age, $data_registre, $id);
$stmt->execute();

header('Location: ../adminPanel.php');
exit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="POST">

        <label for="name">Nombre</label>
        <input type="text" name="name" value="<?= $user['name']; ?>">

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