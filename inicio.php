<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./index.php");
    exit;
}

include './codigophp/conexionbs.php'
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
            <a href="inicio.php" class="logo imagen" ></a>
            <button class="usuario imagen"></button>
        </div>
        <div id="subheader">
            <h1>Bienvenido <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div id="contenido">
            <form class="barra" method="post">
                <input type="submit" class="equis" value=""></button>
                <input type="text" placeholder="Buscar..">
                <div></div>
            </form>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <h1>TITULO</h1>
                    <div class="scroll-x">
                        <div class="conscroll-x">
                            
                            <button onclick="console.log('a')" class="cubo"> <h1>TITULO</h1> <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Lorem, ipsum.</p></button>
                            <button class="cubo"> <h1>TITULO</h1> <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Lorem, ipsum.</p></button>
                            <button class="cubo"> <h1>TITULO</h1> <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Lorem, ipsum.</p></button>
                            <button class="cubo"> <h1>TITULO</h1> <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Lorem, ipsum.</p></button>
                            
                        </div>
                    </div>
                    <h1>PAÑOLEROS</h1>
                    <div class="scroll-x"style="height: 28vh;">
                        <div class="conscroll-x" > 
                            <?php
                            $sql = "SELECT nombre, apellido, horario FROM usuarios WHERE rol = 'panolero' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<div class='rectangulo'><h1>".$row["nombre"]." ".$row["apellido"]
                                ."</h1><p>".$row["horario"]."</p></div>";
                            }
                            }
                            ?>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="notificaciones.php" class="campana imagen izquierda">Notificaciones</a>
            <a href="pedidos.php" class="logoboton imagen centro">Pedidos</a>
            <a href="reportes.php" class="alerta imagen derecha">Reportes</a>
        </div>
    </div>
   
</body>
</html>

