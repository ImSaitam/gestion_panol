<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>
<body>
    <div id="pagina">
        <div id="header">
            <button class="logo"></button>
            <button class="usuario"></button>
        </div>
        <div id="subheader"></div>
        <div id="contenido"></div>
        <div id="footer">
        <button class="usuario"></button>
        </div>
    </div>
    
</body>
</html>

<style>
#pagina{
    position: absolute;
    right:0%;
    top:0%;
    height:99%;
    width: 100%;
    display:grid;
    grid-template:
    "HEA HEA HEA"7vh
    "SHEA SHEA SHEA"20vh
    "CON CON CON"auto
    "FOO FOO FOO"7vh/
    auto auto auto;
    background-color:#202427;
}
#header{
    padding-left:2vh;
    padding-right:2vh;
    display: grid;
    grid-template:
    ". . ." auto
    "LOGO . USUARIO"5vh
    ". . ." auto/
    5vh auto 5vh;
    grid-area: HEA;
    background-color:#202427;
    box-shadow: 1vh 0.5vh 3vh 0vh rgba(61, 58, 230, 0.1);
}
#subheader{
    display: grid;
    grid-template:
    ". " auto/
    5vh auto 5vh;
    grid-area: SHEA;
    background-color:transparent;
}
#contenido{
    grid-area: CON;
    background-color:white;
    box-shadow: 1vh -0.5vh 3vh 0vh rgba(61, 58, 230, 0.1);
    border-radius:4vh 4vh 0vh 0vh;
}
#footer{
    grid-area: FOO;
    background-color:white;
    box-shadow: 1vh -0.5vh 3vh 0vh rgba(208, 207, 238, 1);
    display: grid;
    grid-column: repeat(5vh);
    gap: auto;
}
button{
    background-color: transparent;
    border: none;
}
.logo{
    background-image: URL(imagenes/logo.png);
    background-size: contain;
    background-repeat:no-repeat;
    grid-area: LOGO;
}
.usuario{
    background-image: URL(imagenes/user.png);
    background-size: contain;
    background-repeat:no-repeat;
    grid-area: USUARIO;
}
.botonlogo{
    background-image: URL(imagenes/botonlogo.png);
    background-size: contain;
    background-repeat:no-repeat;
    grid-area: USUARIO;
}
</style>

