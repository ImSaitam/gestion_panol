<?php
include "./codigophp/sesion.php";
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
            <button  class="usuario imagen" id="user"></button>
        </div>
        <div id="subheader">
            <h1>Notificaciones de <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p></p>
        </div>
        <div id="contenido">
            <div class="barra">
                <button class="equis"></button>
                <input type="text" placeholder="Buscar..">
                <div></div>
            </div>
            <div class="contenido2">
                <div class="con3" id="inicio">
                <h1>NOTIFICACIONES</h1>
                    <div class="scroll-y" style="height: 100%;">
                        <div class="conscroll-y">
                            <div class="rectangulo2"><h1>DIA Y HORA</h1> <p>NOTIFICACION</p> <button class="imagen opciones"></button></div>         
                                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="inicio.php" class="flecha imagen izquierda">Volver al inicio</a>
            <a href="pedidos.php" class="logoboton imagen centro">Pedidos</a>
            <a href="reportes.php" class="alerta imagen derecha">Reportes</a>
        </div>

        <div id="sombra2" class="sombra">
        <div class="contenidosombra">
        <button class="barra" id="opcionequis2">
                <div class="equis" ></div>
                    <div>Volver</div>
                    <div></div>
            </button>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <div class="scroll-y" style="height: 100%; padding-top:2vh;">
                        <div class="conscroll-y">
                                <a href="codigophp/cerrarsesion.php" class="flecha imagen boton">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    
</body>
</html>
<script src="codigojs/sombra2.js"></script>
