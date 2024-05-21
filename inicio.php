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
    <link rel="stylesheet" href="inicio.css">
</head>
<body>
    <div class="barra-superior">
        <img src="logo.jpg" alt="Logo" class="logo">
        <img src="fotousuario.jpg" alt="Foto de Usuario" class="foto-usuario">
    </div>
    <div class="seccion-cabecera">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Este es un texto de ejemplo que va debajo del título.</p>
    </div>
    <div class="barra-busqueda">
        <input type="text" placeholder="Buscar...">
    </div>
    <div class="navegacion">
        <h2>Categorías</h2>
        <div class="categorias">
            <div class="subcategoria">Categoría 1</div>
            <div class="subcategoria">Categoría 2</div>
            <div class="subcategoria">Categoría 3</div>
            <div class="subcategoria">Categoría 4</div>
        </div>
    </div>
    <div class="seccion-contenido">
        <h2>Pañoleros/as</h2>
        <div class="panoleros">
            <div class="panolero">Pañolero/a 1</div>
            <div class="panolero">Pañolero/a 2</div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h3>Foto de la G</h3>
            </div>
        </div>
    </footer>
</body>
</html>
