/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
/*Busqueda*/
var cerarBusqueda = document.getElementById('busqueda__close');
var busqueda = document.getElementById('busqueda');
var buscar = document.getElementById('link-buscar');
buscar.addEventListener('click', function (e) {
  e.preventDefault();
  busqueda.classList.add('open-menu');
});
cerarBusqueda.addEventListener('click', function () {
  busqueda.classList.remove('open-menu');
});
/* Ir arriba */

var arriba = document.getElementById('ir-arriba');

var obtener_pixeles_inicio = function obtener_pixeles_inicio() {
  return document.documentElement.scrollTop || document.body.scrollTop;
};

var ir_arriba = function ir_arriba() {
  if (obtener_pixeles_inicio() > 0) {
    requestAnimationFrame(ir_arriba);
    scrollTo(0, obtener_pixeles_inicio() - obtener_pixeles_inicio() / 10);
    indicarScroll();
  }
};

var indicarScroll = function indicarScroll() {
  if (obtener_pixeles_inicio() > 100) {
    arriba.classList.add('open-menu');
  } else {
    arriba.classList.remove('open-menu');
  }
};

arriba.addEventListener('click', ir_arriba);
window.addEventListener('scroll', indicarScroll);
/******/ })()
;