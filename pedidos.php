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
            <form action="pedido.php" method="post">
                <button class="barra" type="submit">
                    <div class="mas"></div>
                        <div>Crear nuevo pedido</div>
                        <div></div>
                        <input type="text" value="" name="numeropedido" style="display:none;">
                </button>
            </form>
            <div class="contenido2">
                <div class="con3" id="inicio">
                    <h1>HISTORIAL DE PEDIDOS</h1>
                    <div class="scroll-y" style="height: 100%;">
                        <div class="conscroll-y">
                            <?php
                                $sql = "SELECT 
                                SELECT 
                                r.id AS reporte_id,
                                DATE_FORMAT(r.fecha, '%Y-%m-%d') AS dia,
                                DATE_FORMAT(r.fecha, '%H:%i:%s') AS hora,
                                a.nombre AS aula,
                                c.nombre AS curso
                            FROM 
                                reportes r
                            INNER JOIN 
                                usuarios u ON r.id_usuario = u.id_usuario
                            INNER JOIN 
                                herramientaxunidad h ON r.id_herramienta = h.id
                            INNER JOIN 
                                categoria c ON h.id_categoria = c.id
                            INNER JOIN 
                                ubicacion_herramienta uh ON h.id = uh.id
                            INNER JOIN 
                                aulas a ON uh.id = a.id_aulas
                            ORDER BY 
                                r.fecha DESC;;
                    
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // Salida de datos por cada fila
                        while($row = $result->fetch_assoc()) {
                            echo "ID Reporte: " . $row["reporte_id"]. " - Usuario: " . $row["usuario"]. " - Email: " . $row["email"]. " - Herramienta Observación: " . $row["herramienta_observacion"]. " - Categoría: " . $row["categoria"]. " - Aula: " . $row["aula"]. " - Ubicación: " . $row["ubicacion_herramienta"]. " - Observaciones: " . $row["reporte_observaciones"]. "<br>";
                        }
                    } else {
                        echo "0 resultados";
                    }
                    
                    $conn->close();
                    ?>
                            ?>
                            <div class="rectangulo2"><h1>DIA Y HORA</h1> <p>AULA Y CURSO</p> <button class="imagen opciones"></button></div>     
                            <div class="rectangulo2"><h1>DIA Y HORA</h1> <p>AULA Y CURSO</p> <button class="imagen opciones"></button></div>     
                            <div class="rectangulo2"><h1>DIA Y HORA</h1> <p>AULA Y CURSO</p> <button class="imagen opciones"></button></div>     
                                           
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
                                <a onclick="console.log('hola')" class="basura imagen boton">Eliminar pedido</a>
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
<script src="codigojs/nuevopedido.js"></script>