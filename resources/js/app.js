require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// const Swal = window.Swal = require('sweetalert2');
import Swal from "sweetalert2";
window.successProductAlert = function (){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Producto agregado exitosamente',
        showConfirmButton: false,
        timer: 1900
    })
}

window.errorProductAlert = function (){
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'La cantidad excede el Stock disponible',
        showConfirmButton: false,
        timer: 1900
    })
}

window.confirmacionUserAlert = function(id, type, message){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true
  })
  
  swalWithBootstrapButtons.fire({
    title: '¿Estás seguro?',
    text: message,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: type=='inhabilitar' ? 'Sí, inhabilitar!' : 'Sí, habilitar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: false
  }).then((result) => {
    if (result.isConfirmed) {
      if(type=='inhabilitar'){
        Livewire.emit('eliminar',id);
      }
      else{
        Livewire.emit('activar',id);
      }
    } else if (
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'No se ha realizado la acción',
        'error'
      )
    }
  })
}

window.successUserAlert = function (type){
  Swal.fire({
      position: 'center',
      icon: 'success',
      title: type=='habilitar' ? 'Habilitado!':'Inhabilitado!',
      text: 'La acción se ha realizado exitosamente',
      // showConfirmButton: false,
      // timer: 1900
  })
}

