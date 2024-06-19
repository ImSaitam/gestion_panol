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
            <form class="barra" method="post"  action="./buscarherramienta.php">
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
                                    echo '<div class="rectangulo3 verde"><h1>'.$row["nombre"].'</h1> <img src="" alt="" class="sinimagen imagen" ><p id="can" style="color:red;">SIN UNIDADES</p> <input type="number" name="id" id="id" style="display:none;" value="'.$row["id"].'"><input type="number" name="id" id="can2" style="display:none;" value="'.$row["cantidad"].'"><a class="imagen alertablanca"></a></div>';
                                }else{
                                    echo '<div class="rectangulo3"><h1>'.$row["nombre"].'</h1> <img src="" alt="" class="sinimagen imagen" ><p id="can">Stock: '.$row["cantidad"].'</p> <input type="number" name="id" id="id"  style="display:none;" value="'.$row["id"].'"><input type="number" name="id" id="can2" style="display:none;" value="'.$row["cantidad"].'"><a class="imagen signomas tocar"></a></div>';
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
                <h1 style="color:white;" id="cantidad"></h1>

                    <div class="scroll-y" style="height: 100%; padding-top:2vh; width: 40vh;">
                        <form class="conscroll-y" action = "./pedido.php" method = "post">
                        <div class="signomas imagen boton"><input type="number" id="can3" name="cantidad" value='' placeHolder="Elegir cantidad" min="1" max=""></div>
                                <input type = "text" id="input" name="id"  style=" display:none;" value="" >
                                <input type="text" style="display:none;" name="estado" value="2">
                                <input type="text" style="display:none;" name="codigo" value="1">
                                <input type = "submit" class="avion imagen boton borde" style=" padding-left: 5vh;" value="Agregar herramienta">
                        </form>             
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
<script> 
opciones = document.querySelectorAll('.tocar');
opcionequis = document.getElementById("opcionequis");
sombra = document.getElementById("sombra");
texto = document.getElementById("cantidad");
cantidad3 = document.getElementById("can3");
click = true;
som = false;

function aplicarBlur() {
    if (click == true) {
        sombra.style.display = "grid";
        sombra.style.animation = "sombra both 0.5s";
    }
}

function sacarBlur() {
    if (click == true) {
        click = false;
        sombra.style.animation = "sacarsombra both 0.5s";
    }
}

sombra.addEventListener('animationend', function handleAnimationEnd() {
    if (som == true) {
        som = false;
        sombra.style.display = "none";
    } else {
        som = true;
    }
    click = true;
});

opciones.forEach(element => {
    element.addEventListener('click', () => {
        let parentNode = element.parentNode;
        let cantidad = parentNode.querySelector("#can").textContent;
        let idInput = parentNode.querySelector("#id").value;
        let max = parentNode.querySelector("#can2").value;
        texto.textContent = cantidad;
        cantidad3.setAttribute("max", max);
        document.getElementById("input").value = idInput;
        aplicarBlur();
    });
});

opcionequis.addEventListener('click', sacarBlur);
</script>
<script src="codigojs/volveratras.js"></script>
