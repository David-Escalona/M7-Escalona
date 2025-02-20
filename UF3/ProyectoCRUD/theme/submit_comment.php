<?php
// Conexión a la base de datos
require_once 'config.php';

// Verificar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $news_id = $_POST['news_id'];

    // Verificar si el comentario ya existe para este usuario y noticia
    $sql_check = "SELECT * FROM COMMENTS WHERE user_id = ? AND news_id = ? AND description = ?";
    $stmt_check = $mysqli->prepare($sql_check);
    $stmt_check->bind_param("iis", $user_id, $news_id, $comment);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Si el comentario ya existe, no lo insertamos
        echo "Ya has comentado esta noticia anteriormente.";
    } else {
        // Consulta SQL para insertar el nuevo comentario
        $sql = "INSERT INTO COMMENTS (user_id, news_id, description, data) 
                VALUES (?, ?, ?, NOW())";

        // Preparar la consulta
        $stmt = $mysqli->prepare($sql);
        // Supongamos que `user_id` es el ID del usuario actual. Este valor puede cambiar dependiendo de cómo manejes la autenticación.
        $user_id = 1; // Ejemplo de ID de usuario, reemplaza esto con la variable correspondiente al usuario logueado
        $stmt->bind_param("iis", $user_id, $news_id, $comment);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("Location: news.php?id=" . $news_id); // Redirigir de vuelta a la noticia
        } else {
            echo "Error al enviar el comentario: " . $stmt->error;
        }
    }
}
?>
