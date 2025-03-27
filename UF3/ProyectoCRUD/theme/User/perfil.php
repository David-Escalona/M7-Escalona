<?php
// Iniciar sesión y verificar que el usuario esté logueado
session_start();
require_once '../config.php'; // Asegúrate de tener la configuración de la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: inicio.php"); // Si no está logueado, redirigir al login
    exit();
}

// Obtener el ID del usuario de la sesión
$user_id = $_SESSION['user_id'];

// Obtener los detalles del usuario desde la base de datos
$sql = "SELECT * FROM USERS WHERE id = ?";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();
} else {
    die("Error al preparar la consulta SQL: " . $mysqli->error);
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    
    // Validar y manejar la foto de perfil
    $new_avatar = $user['avatar']; // Si no se cambia la foto, mantener la actual

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        // Subir una nueva foto
        $file_name = $_FILES['avatar']['name'];
        $file_tmp = $_FILES['avatar']['tmp_name'];
        $file_size = $_FILES['avatar']['size'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Validar tipo de archivo (solo imágenes)
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($file_ext), $allowed_ext)) {
            // Generar un nombre único para la imagen
            $new_avatar = 'uploads/' . uniqid() . '.' . $file_ext;

            // Mover la imagen al directorio de destino
            if (move_uploaded_file($file_tmp, $new_avatar)) {
                // Si la imagen se subió correctamente, actualizar la base de datos
            } else {
                $error_message = "Error al subir la imagen.";
            }
        } else {
            $error_message = "Tipo de archivo no permitido.";
        }
    }

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE USERS SET name = ?, email = ?, avatar = ? WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sssi", $new_name, $new_email, $new_avatar, $user_id);
        if ($stmt->execute()) {
            $_SESSION['user_name'] = $new_name;
            $_SESSION['user_email'] = $new_email;
            $_SESSION['user_avatar'] = $new_avatar;
            $success_message = "Perfil actualizado con éxito.";
        } else {
            $error_message = "Error al actualizar el perfil: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Error al preparar la consulta SQL: " . $mysqli->error;
    }
}
?>

<!-- Estilos CSS -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: white;
        padding: 20px;
    }

    header h1 {
        font-size: 30px;
        margin: 0;
    }

    .nav-links a {
        color: #fff;
        margin-left: 15px;
        text-decoration: none;
        font-size: 16px;
    }

    .container {
        max-width: 900px;
        margin: 50px auto;
    }

    .card {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card-header {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .form-control:focus {
        border-color: #007bff;
    }

    .btn {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-info {
        margin-left: 20px;
    }

    .profile-info p {
        font-size: 18px;
        color: #555;
    }

    .profile-header {
        display: flex;
        align-items: center;
    }
</style>

<!-- HTML del perfil y el formulario de edición -->
<header>
    <div class="container">
        <h1>Perfil de Usuario</h1>
    </div>
</header>

<div class="container">
    <div class="card">
        <div class="card-header">
            Editar Información del Usuario
        </div>
        <div class="card-body">
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?= $error_message ?></div>
            <?php endif; ?>
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?= $success_message ?></div>
            <?php endif; ?>

            <!-- Formulario de edición -->
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Foto de perfil</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Actualizar perfil</button>
                </div>
            </form>
        </div>
    </div>
</div>
