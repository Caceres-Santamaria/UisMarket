require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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

// /* menu */
// let iconoMenu = document.querySelector('.menu-movil');
// let menuResponsive = document.getElementById('contenedor-menu-main');
// let productos = document.getElementById('item-producto');
// let coleccion = document.getElementById('item-coleccion')
// let menuCat = document.getElementById('menu-categoria');
// let menuCol = document.getElementById('menu-coleccion');
// let iconoCerrarMenu = document.getElementById('close-menu-main');
// iconoMenu.addEventListener('click', () => {
//     menuResponsive.classList.add('menu-activo');
// })
// iconoCerrarMenu.addEventListener('click', () => {
//     menuResponsive.classList.remove('menu-activo');
// })

// productos.addEventListener('click', () => {
//     menuCat.classList.add('open-menu-categoria');
// })

// document.querySelector('.menu-categoria__volver').addEventListener('click', () => {
//     menuCat.classList.remove('open-menu-categoria');
// })

// coleccion.addEventListener('click', () => {
//     menuCol.classList.add('open-menu-categoria');
// })

// document.querySelector('.menu-col__volver').addEventListener('click', () => {
//     menuCol.classList.remove('open-menu-categoria');
// })
