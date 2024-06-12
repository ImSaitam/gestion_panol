<?php
include "./sesion.php";
include "./conexionbs.php";

// Obtener datos del formulario
$usuario_id = $_SESSION['id_usuario'];
$curso = $_POST['curso'];
$aula = $_POST['aula'];
$fecha = $_POST['horario'];

// Obtener el pedido de la sesión
$pedido = json_encode($_SESSION['pedido'], true);

// Crear la consulta SQL para insertar el nuevo pedido en la base de datos
$sql = "INSERT INTO pedidos (fecha_pedido, usuario_solicitante, id_aula, estado, observaciones, pedido, fk_curso) 
        VALUES ('$fecha', '$usuario_id', '$aula', 'pendiente', '', '$pedido', '$curso')";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Nuevo pedido creado correctamente.";
} else {
    echo "Error al crear el pedido: " . mysqli_error($conn);
}


// Cerrar la conexión
$conn->close();
$_SESSION['pedido'] = null;
header("Location: ../pedidos.php");
exit;
?>
