require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// const Swal = window.Swal = require('sweetalert2');
import Swal from "sweetalert2";
window.Swal = Swal;
window.simpleAlert = function(position, icon, title, text, boton, timer = undefined) {
    Swal.fire({
        position: position == 'na' ? 'center' : position,
        icon: icon,
        title: title,
        'text': text,
        showConfirmButton: boton,
        timer: timer
    })
}

window.confirmacionUserAlert = function(id, type, message, funcion = 'eliminar') {
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
        confirmButtonText: type == 'inhabilitar' ? 'Sí, inhabilitar!' : 'Sí, habilitar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            if (type == 'inhabilitar') {
                Livewire.emit(funcion, id);
            } else {
                Livewire.emit('activar', id);
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

window.confirmacionAlert = function(event, confirButton, text, textError, livewireEvent = null, livewireEventTo = null, pivot = null) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    })

    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: confirButton,
        cancelButtonText: 'No, cancelar!',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            if (livewireEvent) {
                Livewire.emit(livewireEvent);
            } else if (livewireEventTo) {
                Livewire.emitTo(livewireEventTo, 'delete', pivot)
            } else {
                event.target.parentElement.submit();
            }
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                textError,
                'error'
            )
        }
    })
}

window.successUserAlert = function(type) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: type == 'habilitar' ? 'Habilitado!' : 'Inhabilitado!',
        text: 'La acción se ha realizado exitosamente',
        // showConfirmButton: false,
        // timer: 1900
    })
}