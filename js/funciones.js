
function limpiar() {
    document.form.reset();
    document.form.cod.focus();
}



function deshabilitar(url) {
    Swal.fire({
        title: "Esta seguro de deshabilitar el registro?",
        text: "Podras revertir la accion",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#878180',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, deshabilitar el registro",
        backdrop: `
        RGB(244, 244, 225)
        url("../img/food_sad-1.gif")
        top
        no-repeat
        `
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url;
        }
    });

}

function habilitar(url) {
    Swal.fire({
        title: "Esta seguro de habilitar el registro?",
        text: "Podras revertir la accion",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#878180',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, habilitar el registro",
        backdrop: `
        RGB(244, 244, 225)
        url("../img/food_happy-1.gif")
        top
        no-repeat
        `
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url;
        }
    });

}