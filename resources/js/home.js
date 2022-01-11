/*Busqueda*/
let cerarBusqueda = document.getElementById('busqueda__close');
let busqueda = document.getElementById('busqueda');
let buscar = document.getElementById('link-buscar');
buscar.addEventListener('click', (e) => {
    e.preventDefault();
    busqueda.classList.add('open-menu')
});
cerarBusqueda.addEventListener('click', () => {
    busqueda.classList.remove('open-menu')
});
/* Ir arriba */
const arriba = document.getElementById('ir-arriba');
const obtener_pixeles_inicio = () => document.documentElement.scrollTop || document.body.scrollTop;
const ir_arriba = () => {
    if (obtener_pixeles_inicio() > 0) {
        requestAnimationFrame(ir_arriba);
        scrollTo(0, obtener_pixeles_inicio() - (obtener_pixeles_inicio() / 10));
        indicarScroll();
    }
}
const indicarScroll = () => {
    if (obtener_pixeles_inicio() > 100) {
        arriba.classList.add('open-menu');
    } else {
        arriba.classList.remove('open-menu')
    }
}
arriba.addEventListener('click', ir_arriba);
window.addEventListener('scroll', indicarScroll);