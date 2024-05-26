<?php
// dashboard.php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
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
            <div class="barra">
                <button class="equis"></button>
                <input type="text" placeholder="Buscar..">
                <div></div>
            </div>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <h1>TITULO</h1>
                    <div class="scroll-x">
                        <div class="conscroll-x">
                            <button class="cubo"></button>
                            <button class="cubo"></button>
                            <button class="cubo"></button>
                            <button class="cubo"></button>
                            <button class="cubo"></button>
                            <button class="cubo"></button>
                            
                        </div>
                    </div>
                    <h1>PAÑOLEROS</h1>
                    <div class="scroll-x"style="height: 28vh;">
                        <div class="conscroll-x" > 
                            <div class="cubo2"></div>     
                            <div class="cubo2"></div>       
                            <div class="cubo2"></div>           
                        </div>
                    </div>
                </div>
                <div class="con3" id="pedidos" style="display:none">

                </div>
                <div class="con3" id="reportes" style="display:none">

                </div>
            </div>
        </div>
        <div id="footer">
            <a href="notificaciones.php" class="campana imagen izquierda">Notificaciones</a>
            <a href="inicio.php" class="flecha imagen centro">Volver al inicio</a>
            <a href="reportes.php" class="alerta imagen derecha">Reportes</a>
        </div>
    </div>
    
</body>
</html>