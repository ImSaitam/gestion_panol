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
                        <div class="conscroll-y">  
                            <?php
                                $sql = "SELECT * FROM reportes WHERE reportes.id_usuario = ?";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $_SESSION['id_usuario']); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="rectangulo2"><h1>'.$row["id_usuario"].'</h1> <p>'.$row["observaciones"].' </p> <input type="hidden" name="id" id="id" value="'.$row["id_pedido"].'"><input type="hidden" name="pedido" id="pedido" value="'.htmlspecialchars($row["id"],ENT_QUOTES, 'UTF-8').'"> <button class="imagen opciones tocar"></button></div>';
                        }
                    } else {
                        echo "<h1>NO HAY REPORTES AUN</h1>";
                    }
                    
                    $stmt->close();
                    $conn->close();
                    ?>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="notificaciones.php" class="campana imagen izquierda">Notificaciones</a>
            <a href="pedidos.php" class="logoboton imagen centro">Pedidos</a>
            <a href="inicio.php" class="flecha imagen derecha">Volver al inicio</a>
        </div>
    </div>
</body>
</html>