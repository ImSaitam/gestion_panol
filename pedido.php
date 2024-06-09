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
        
        <div id="contenidob">
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
                    <div class="scroll-y" style="height: 100%; width:40vh;">
                        <form class="conscroll-y" method="post" action="./codigophp/crearpedido.php">
                        <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $estado = trim($_POST['estado']);
                            $_SESSION['pedido'] = json_decode($_POST['pedido']);/*array(
                                "herramientas" => array(1, 2, 3),
                                "cantidad" => array(1, 2, 3)
                            );*/

                            if($estado == "nuevopedido"){
                                $fechaHoraActual = date('Y-m-d H:i:s');
                                echo '<button class="signomas imagen boton"><select name="curso"><option value="nada">Elija un curso</option>';
                                $sql = "SELECT * FROM cursos";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'.$row["id"].'">'.$row["curso"].'</option>';
                                    }
                                }
                                echo'</select></button>';
                                echo '<button class="mapa imagen boton"><select name="aula"><option value="nada">Elija un aula</option>';
                                $sql = "SELECT * FROM aulas";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'.$row["id_aulas"].'">'.$row["nombre"].'</option>';
                                    }
                                }
                                echo'</select></button>';
                                echo '<input type="text" name="horario" value="' . $fechaHoraActual . '" readonly>';
                                if($_SESSION['pedido'] == null){
                                    echo "<h1>NO HAY HERRAMIENTAS AUN</h1>";
                                }else{
                                    
                                    $sql = "SELECT * FROM categoria WHERE categoria.id IN (" . implode(",", $_SESSION['pedido']['herramientas']) . ")";
  
                                    $result = mysqli_query($conn, $sql);
                                    
                                    if ($result->num_rows > 0) {
                                        echo '<h1>HERRAMIENTAS</h1>';
                                        $cont = 0;
                                        while($row = $result->fetch_assoc()) {
                                            echo '<div class="rectangulo2"><h1>'.$row["nombre"].'</h1> <p>Cantidad: '.$_SESSION['pedido']['cantidad'][$cont].'</p> <button class="imagen opciones"></button></div>';
                                            $cont++;
                                        }
                                    } else {
                                        echo "<h1>NO HAY HERRAMIENTAS AUN</h1>";
                                    }
                                
                                    $conn->close();
                                }
                            }else{
                                echo '<h1>HERRAMIENTAS</h1>';
                                $sql = "SELECT * FROM categoria WHERE categoria.id IN (?)";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $_SESSION['pedido']); 
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<h1>'.$row["nombre"].'</h1>';
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
