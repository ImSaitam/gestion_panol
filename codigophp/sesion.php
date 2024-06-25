<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./index.php");
    exit;
}
<<<<<<< HEAD
?>
=======

function espanol($contenido){
    if ($_SESSION['cargo'] == "panolero") {
        echo $contenido;
    }
}
?>
>>>>>>> 48c51e68a96aa5d28cba8de86a0d0fc80ffa06dc
