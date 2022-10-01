let form =  document.querySelector("#form");
let btn = document.querySelector("#btn_sesion");


function validar() {
    let desabilitar = false;

    if (form.email.value == "") {
        desabilitar = true;
    }

    if (form.password.value == "") {
        desabilitar = true;
    }


    //Validacion final 
    if (desabilitar == true) {
        btn.disabled = true;

    } else {
        btn.disabled = false;
    }
}



form.addEventListener("keyup", validar);
