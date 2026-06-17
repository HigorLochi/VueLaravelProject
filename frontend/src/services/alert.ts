import Swal from 'sweetalert2'

const mixin = {
    timer: 10000,
    timerProgressBar: true,
}

export default {
    success(message: any){
        return Swal.mixin(mixin).fire({
            icon: 'success',
            title: 'Success',
            text: message,
            theme: 'dark'
        })
    },

    error(message: any){
        return Swal.mixin(mixin).fire({
            icon: 'error',
            title: 'Error',
            text: message,
            theme: 'dark'
        })
    },

    warning(message: any){
        return Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: message,
            theme: 'dark'
        })
    },

    question(question: any, confirmButtonText: any, cancelButtonText: any){
        return Swal.fire({
            icon: 'question',
            title: 'Confirmation',
            text: question,
            theme: 'dark',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText
        })
    }
}