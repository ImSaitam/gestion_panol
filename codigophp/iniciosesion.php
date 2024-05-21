<?php
// login.php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Conectar a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "panol");

    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }

    // Buscar el usuario
    $stmt = $mysqli->prepare("SELECT id_usuario, password FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Iniciar sesión exitosa
            $_SESSION['id_usuario'] = $id;
            $_SESSION['username'] = $username;
            echo "Contraseña correcta.";
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Nombre de usuario no encontrado.";
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
