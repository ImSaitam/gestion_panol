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
            <button  class="usuario imagen" id="user"></button>
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
                            $_SESSION['pedido'] = json_decode($_POST['pedido'], true);/*array(
                                "herramientas" => array(1, 2, 3),
                                "cantidad" => array(1, 2, 3)
                            );*/

                            if($estado == "nuevopedido"){
                                $fechaHoraActual = date('Y-m-d H:i:s');
                                echo '<div class="signomas imagen boton"><select name="curso"><option value="nada">Elija un curso</option>';
                                $sql = "SELECT * FROM cursos";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'.$row["id"].'">'.$row["curso"].'</option>';
                                    }
                                }
                                echo'</select></div>';
                                echo '<div class="mapa imagen boton"><select name="aula"><option value="nada">Elija un aula</option>';
                                $sql = "SELECT * FROM aulas";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="'.$row["id_aulas"].'">'.$row["nombre"].'</option>';
                                    }
                                }
                                echo'</select></div>';
                                echo '<div class="signomas imagen boton"><input type="text" name="horario" value="' . $fechaHoraActual . '" readonly></div>';
                                
                            }
                            if($_SESSION['pedido'] == null){
                                echo "<h1>NO HAY HERRAMIENTAS AUN</h1>";
                            }else{
                                
                                $sql = "SELECT * FROM categoria WHERE categoria.id IN (" . implode(",", $_SESSION['pedido']['herramientas']) . ")";

                                $result = mysqli_query($conn, $sql);
                                
                                if ($result->num_rows > 0) {
                                    echo '<h1>HERRAMIENTAS</h1>';
                                    $cont = 0;
                                    while($row = $result->fetch_assoc()) {
                                        if($_SESSION['pedido']['cantidad'][$cont] >= $row["cantidad"]){
                                            echo '<div class="rectangulo3"><h1>'.$row["nombre"].'</h1> <input type="number" value="" placeHolder="Cantidad: '.$_SESSION['pedido']['cantidad'][$cont].'/'.$row["cantidad"].'"> <a class="imagen basura"></a></div>';
                                        }else{
                                            echo '<div class="rectangulo3"><h1>'.$row["nombre"].'</h1> <input type="number" value="'.$_SESSION['pedido']['cantidad'][$cont].'" placeHolder="Cantidad: '.$_SESSION['pedido']['cantidad'][$cont].'/'.$row["cantidad"].'"> <a onclick="console.log("a")" class="imagen basura"></a></div>';
                                        }
                                        
                                        $cont++;
                                    }
                                } else {
                                    echo "<h1>NO HAY HERRAMIENTAS AUN</h1>";
                                }
                            
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
    </div>
</body>
</html>


<script src="codigojs/sombra2.js"></script>
<script src="codigojs/volveratras.js"></script>
