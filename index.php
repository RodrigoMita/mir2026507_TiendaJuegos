<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="juegos/crud.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php
session_start();
require '_db.php'; // Archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validación de campos
    if (empty($username) || empty($password)) {
        echo 'Por favor, complete todos los campos.';
    } else {
        // Verificar si el usuario existe
        $stmt = $conexion->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id']; // Iniciar sesión
                header('Location: juegos/crud.php'); // Redirigir a crud.php
                exit();
            } else {
                echo 'Contraseña incorrecta.';
            }
        } else {
            echo 'Usuario no encontrado.';
        }

        $stmt->close();
    }
}
?>
