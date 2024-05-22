<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="inicio2.css">
</head>
<body>
    <div id="pagina">
        <div id="header"></div>
        <div id="subheader"></div>
        <div id="contenido"></div>
        <div id="footer"></div>
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
    "HEA HEA HEA"4vh
    "SHEA SHEA SHEA"20vh
    "CON CON CON"auto
    "FOO FOO FOO"4vh/
    auto auto auto;
    background-color:#202427;
}
#header{
    grid-area: HEA;
    background-color:#202427;
    box-shadow: 1vh 0.5vh 3vh 0vh rgba(61, 58, 230, 0.1);
}
#subheader{
    grid-area: SHEA;
    background-color:transparent;
}
#contenido{
    grid-area: CON;
    background-color:white;
    box-shadow: 1vh -0.5vh 3vh 0vh rgba(61, 58, 230, 0.1);
}
#footer{
    grid-area: FOO;
    background-color:white;
    box-shadow: 1vh -0.5vh 3vh 0vh rgba(208, 207, 238, 1);
}
</style>

