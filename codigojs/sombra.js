opciones = document.querySelectorAll('.opciones');
opcionesx = document.querySelectorAll('.equis');
sombra = document.getElementById("sombra")
var click = true
function blur() {
    if(click == true){
        sombra.style.display="grid"
        sombra.style.animation = "sombra both 1s";
        sombra.addEventListener('animationend', function handleAnimationEnd() {
            click = true
        });
    }
}
function sacarblur() {
    if(click == true){
        click = false
        sombra.style.animation = "sacarsombra both 1s";
        sombra.addEventListener('animationend', function handleAnimationEnd() {
            sombra.style.display="none"
            click = true
        });
    }
    
}
opciones.forEach(element => {
    element.addEventListener('click', blur);
});
opcionesx.forEach(element => {
    element.parentNode.addEventListener('click', sacarblur);
});
