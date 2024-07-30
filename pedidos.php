<?php
// dashboard.php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./index.php");
    exit;
}
include "codigophp/conexionbs.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="animaciones.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="imagenes.css">
</head>
<body>
    <div id="pagina">
        <div id="header">
            <a href="inicio.php" class="logo imagen"></a>
            <button class="usuario imagen"></button>
        </div>
        <div id="subheader">
            <h1>Historial de pedidos de <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div id="contenido">
            <form action="prepararpedido.php" method="post">
                <button class="barra" type="submit">
                    <div class="mas"></div>
                        <div>Crear nuevo pedido</div>
                        <div></div>
                        <input type="hidden" value="nuevopedido" name="estado">
                        <input type="hidden" value="" name="horario">
                        <input type="hidden" value="" name="aula">
                        <input type="hidden" value="" name="profesor">
                </button>
            </form>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <h1>HISTORIAL DE PEDIDOS</h1>
                    <div class="scroll-y" style="height: 100%;">
                        <div class="conscroll-y">
                            <?php
                                $sql = "SELECT 
                                *
                            FROM 
                                pedidos WHERE 
                                pedidos.usuario_solicitante = ?
                            ";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $_SESSION['id_usuario']); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="rectangulo2"><h1>'.$row["fecha_pedido"].'</h1> <p>'.$row["id_aula"].' '.$row["curso"].'</p> <button class="imagen opciones"></button></div>';
                        }
                    } else {
                        echo "<h1>NO HAY PEDIDOS AUN</h1>";
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
            <a href="inicio.php" class="flecha imagen centro">Volver al inicio</a>
            <a href="reportes.php" class="alerta imagen derecha">Reportes</a>
        </div>
    </div>
    <div id="sombra">
        <div class="contenidosombra">
        <button class="barra">
                <div class="equis"></div>
                    <div>Volver</div>
                    <div></div>
            </button>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <div class="scroll-y" style="height: 100%; padding-top:2vh;">
                        <div class="conscroll-y">
                            <form action = "./codigophp/borrarpedido.php" method = "post">
                            <input type="text" style="display:none;" name="pedido" value="2">
                                <input type = "submit" class="basura imagen boton">
                </form>
                                <a onclick="console.log('hola')" class="flecha imagen boton">Eliminar pedido</a>
                                <a onclick="console.log('hola')" class="flecha imagen boton">Volver al inicio</a>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
      
    </style>
</body>
</html>

<script src="codigojs/sombra.js"></script>
