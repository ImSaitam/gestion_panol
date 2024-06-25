<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./index.php");
    exit;
}

function espanol($contenido){
    if ($_SESSION['cargo'] == "panolero") {
        echo $contenido;
    }
}
?>