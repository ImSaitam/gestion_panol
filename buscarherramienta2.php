<?php
include "./codigophp/sesion.php";
include "codigophp/conexionbs.php";

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
            <form class="barra" method="post"  action="./buscarherramienta2.php">
                <input type="submit" class="equis" value=""></button>
                <input type="text" name="busqueda" placeholder="Buscar..">
                <div></div>
            </form>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $sql="";
                        if($_POST['busqueda'] == null){
                            $sql = "SELECT * FROM categoria";
                        }else{
                            $sql = "SELECT * FROM categoria WHERE categoria.nombre = '".$_POST['busqueda']."'";
                        }
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            if($_POST['busqueda']== null){
                                echo '<h1>HERRAMIENTAS</h1>';
                            }else{
                                echo '<h1>RESULTADOS DE: '.$_POST['busqueda'].'</h1>';
                            }
                            while($row = $result->fetch_assoc()) {
                                if($row["cantidad"] == 0){
                                    echo '<div class="rectangulo3 verde"><h1>'.$row["nombre"].'</h1> <img src="" alt="" class="sinimagen imagen" ><p style="color:red;">SIN UNIDADES</p> <input type="number" name="id" style="display:none;" value="'.$row["id"].'"><a class="imagen alertablanca"></a></div>';
                                }else{
                                    echo '<div class="rectangulo3"><h1>'.$row["nombre"].'</h1> <img src="" alt="" class="sinimagen imagen" ><p>Stock: '.$row["cantidad"].'</p> <input type="number" name="id" style="display:none;" value="'.$row["id"].'"><a class="imagen signomas tocar"></a></div>';
                                }
                            } 
                        }else{
                            if($_POST['busqueda']== null){
                                echo "<h1>NO SE ENCONTRARON HERRAMIENTAS</h1>";
                            }else{
                                echo '<h1>NO SE ENCONTRO: '.$_POST['busqueda'].'</h1>';
                            }
                        }
                    }
                    ?>
                    <div class="scroll-y" style="height: 100%;">
                        <div class="conscroll-y">
                    
                        </div>
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
    <div id="sombra" class="sombra">
        <div class="contenidosombra">
            <button class="barra" id="opcionequis">
                    <div class="equis" ></div>
                        <div>Volver</div>
                        <div></div>
            </button>
            <div class="contenido2">
                <div class="con3" id="inicio" >
                <h1 style="color:white;">AAAAAA</h1>

                    <div class="scroll-y" style="height: 100%; padding-top:2vh; width: 40vh;">
                        <form class="conscroll-y" action = "./pedido.php" method = "post">
                        <div class="signomas imagen boton"><input type="number" name="pedido" value='' placeHolder="Elegir cantidad"></div>
                                <input type = "submit" class="avion imagen boton borde" style=" padding-left: 5vh;" value="Agregar herramienta">
                        </form>             
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="codigojs/sombra3.js"></script>
<script src="codigojs/volveratras.js"></script>
