<?php
include "./codigophp/sesion.php";
include "./codigophp/conexionbs.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="estiloscss/styles.css">
    <link rel="stylesheet" href="estiloscss/imagenes.css">
</head>
<body>
    <div id="pagina">
        <div id="header">
            <a href="inicio.php" class="logo imagen"></a>
            <button class="usuario imagen"></button>
        </div>
        <div id="subheader">
            <h1>Lista de reportes de <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <p></p>
        </div>
        <div id="contenido">
            <button class="barra">
                <div class="mas"></div>
                    <div>Escribir nuevo reporte</div>
                    <div></div>
            </button>
            <div class="contenido2">
                <div class="con3" id="inicio">
                <h1>TUS REPORTES</h1>
                    <div class="scroll-y" style="height: 100%;">
                        <form class="conscroll-y" action="./formularioreportes.php" method="post">
                            <input type="hidden" id="herramientas" name="herramientas" value="1">
                            <input type="hidden" id="pedidos" name="pedidos" value="1">
                            <label for="observaciones"></label>
                            <div class = "signomas imagen boton"> <input type="text" placeHolder="observaciones" id="observaciones" name="observaciones" maxlength="200" required><br></div>

                            <div class = "avion imagen boton"> <input type="submit" value="Crear Reporte"></div>
                        

                        <script>
                            // Obtener la variable 'herramientas' de la barra de búsqueda
                            const urlParams = new URLSearchParams(window.location.search);
                            const herramientas = urlParams.get('herramientas');
                            const pedidos = urlParams.get('pedidos');
                            // Asignar el valor al input escondido
                            if (herramientas) {
                                document.getElementById('herramientas').value = herramientas;
                            }
                            if (pedidos) {
                                document.getElementById('pedidos').value = pedidos;
                            }
                        </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="notificaciones.php" class="campana imagen izquierda">Ver pedidos</a>
            <a href="pedidos.php" class="logoboton imagen centro">Pedir herramientas</a>
            <a href="inicio.php" class="flecha imagen derecha">Volver al inicio</a>
        </div>
    </div>
</body>
</html>
<?php
include "./codigophp/sesion.php";
include "./codigophp/conexionbs.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $observaciones = trim($_POST['observaciones']);
    $id_herramienta = trim($_POST['herramientas']);
    $id_pedidos = trim($_POST['pedidos']);

// Obtener datos del formulario
$id_usuario = $_SESSION['id_usuario'];

// Crear la consulta SQL para insertar el nuevo pedido en la base de datos
$sql = "INSERT INTO `reportes`(`id_usuario`, `id_pedido`, `id_herramienta`, `observaciones`) VALUES 
('$id_usuario', '$id_pedido', '$id_herramienta', '$observaciones')";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Nuevo pedido creado correctamente.";
} else {
    echo "Error al crear el pedido: " . mysqli_error($conn);
}


// Cerrar la conexión
$conn->close();
header("Location: ./reportes.php");
exit;
}
?>
