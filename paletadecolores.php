<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="paletadecolores.php" method="post">
        <input type="color" name="color1" id="color1">
        <input type="color" name="color2" id="color2">
        <input type="color" name="color3" id="color3">
        <input type="color" name="color4" id="color4">
        <input type="submit">
    </form>
    <button id="boton1">color1</button>
    <button id="boton2">color2</button>
    <button id="boton3">color3</button>
    <button id="boton4">color4</button>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $colores = [$_POST["color1"],$_POST["color2"], $_POST["color3"],$_POST["color4"]];
        echo '
        <style> 
            :root {
                --color-primary: '.$colores[0].';
                --color-secondary: '.$colores[1].';
                --color-accent: '.$colores[2].';
                --color-background: '.$colores[3].';
            }
        
            #boton1 {
                background-color: var(--color-primary);
            }
            #boton2 {
                background-color: var(--color-secondary);
            }
            #boton3 {
                background-color: var(--color-accent);
            }
            #boton4 {
                background-color: var(--color-background);
            }
        </style>
        '; 
    }
    ?>
</body>
</html>
