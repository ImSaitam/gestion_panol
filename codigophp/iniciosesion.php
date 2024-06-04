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
    // Preparar la consulta SQL
$stmt = $mysqli->prepare("SELECT id_usuario, contrasena FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Verificar si hay algún resultado
if ($stmt->num_rows > 0) {
    // Vincular los resultados
    $stmt->bind_result($id, $hashed_password);

    $login_successful = false;

    // Iterar a través de todos los resultados
    while ($stmt->fetch()) {
        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            // Iniciar sesión exitosa
            $_SESSION['id_usuario'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['pedido'] = null; // Asegúrate de usar un solo signo de igual
            $login_successful = true;
            header("Location: ../inicio.php");
            exit;
        }
    }

    // Si ninguna contraseña coincide
    if (!$login_successful) {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Nombre de usuario no encontrado.";
}


    $stmt->close();
    $mysqli->close();
}
?>

