<?php
include "./codigophp/sesion.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="estiloscss/animaciones.css">
    <link rel="stylesheet" href="estiloscss/styles.css">
    <link rel="stylesheet" href="estiloscss/imagenes.css">
</head>
<body>
    <div id="pagina2">
        <div id="header">
            <a href="inicio.php" class="logo imagen"></a>
            <button class="usuario imagen"></button>
        </div>
        
        <div id="contenido">
            <form action="buscarherramienta.php" method="post">
                <button class="barra" type="submit">
                    <div class="mas"></div>
                        <div>AÑADIR HERRAMIENTA</div>
                        <div></div>
                        <input type="text" value="" name="busqueda" style="display:none;">
                </button>
            </form>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <h1>INFORMACIÓN DEL PEDIDO</h1>
                    <div class="scroll-y" style="height: 100%;">
                        <form class="conscroll-y" method="post" action="./codigophp/crearpedido.php">
                        <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $estado = trim($_POST['estado']);
                            $_SESSION['pedido'] = $_POST['pedido'];
                            if($estado == "nuevopedido"){
                                $fechaHoraActual = date('Y-m-d H:i:s');
                                echo '<input type="text" name="nombre" value="'.$_SESSION['nombrecompleto'].'" readonly>';
                                echo '<input type="text" name="rol" value="' . $_SESSION['cargo'] . '" readonly>';
                                echo '<input type="text" name="curso" value="" placeholder="Ingrese el curso">';
                                echo '<input type="text" name="aula" value="" placeholder="Ingrese el aula">';
                                echo '<input type="text" name="horario" value="' . $fechaHoraActual . '" readonly>';
                                if($_SESSION['pedido'] == null){
                                    echo "<h1>NO HAY HERRAMIENTAS AUN</h1>";
                                }
                            }else{
                                echo '<h1>HERRAMIENTAS</h1>';
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
                            }
                            
                        }
                        ?>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="notificaciones.php" class="campana imagen izquierda">Notificaciones</a>
            <a onclick="goBack()" class="flecha imagen centro">Volver al inicio</a>
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
<script src="codigojs/volveratras.js"></script>
