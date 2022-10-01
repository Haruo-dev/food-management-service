let form_2 =  document.querySelector("#form_2");
let btn_2 = document.querySelector("#btn_registrar");

function validar2() {
    let desabilitar = false;

    if (form_2.nombre_de_usuario.value == "") {
        desabilitar = true;
    }

    if (form_2.corre_usuario.value == "") {
        desabilitar = true;
    }

    if (form_2.contraseña_usuario.value == "") {
        desabilitar = true;
    }

    if (form_2.contraseña_usuario2.value == "") {
        desabilitar = true;
    }

    if (form_2.id_rol.value == "") {
        desabilitar = true;
    }

    //Validacion final 
    if (desabilitar == true) {
        btn_2.disabled = true;

    } else {
        btn_2.disabled = false; 
    }
    console
}

form_2.addEventListener("keyup", validar2);