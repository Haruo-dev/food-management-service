let form =  document.querySelector("#form");
let btn_3 = document.querySelector("#btn-recuperar");

function validar3() {
    let desabilitar = false;

    if (form.correo.value == "") {
        desabilitar = true;
    }

    if (form.res.value == "") {
        desabilitar = true;
    }


    //Validacion final 
    if (desabilitar == true) {
        btn_3.disabled = true;

    } else {
        btn_3.disabled = false; 
    }
    console
}

form.addEventListener("keyup", validar3);