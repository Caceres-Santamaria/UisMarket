(()=>{var e=document.getElementById("busqueda__close"),n=document.getElementById("busqueda");document.getElementById("link-buscar").addEventListener("click",(function(e){e.preventDefault(),n.classList.add("open-menu")})),e.addEventListener("click",(function(){n.classList.remove("open-menu")}));var t=document.getElementById("ir-arriba"),o=function(){return document.documentElement.scrollTop||document.body.scrollTop},c=function(){o()>100?t.classList.add("open-menu"):t.classList.remove("open-menu")};t.addEventListener("click",(function e(){o()>0&&(requestAnimationFrame(e),scrollTo(0,o()-o()/10),c())})),window.addEventListener("scroll",c)})();