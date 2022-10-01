<?php
include("./class.php");

$user =  new Usuarios();
$correo_usuario=$_REQUEST['correo_usuario'];
$respuesta=$_REQUEST['respuesta'];

if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]/",$correo_usuario)) {
    echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Correo incorrecto!',
                icon: 'warning',
                text: 'Formato de correo no permitido',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='./recuperar.php';
                    }
                });
            </script>";
} else {
    if (!preg_match("/^[a-zA-Z0-9\s]{4,20}$/",$respuesta)){
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Respuesta incorrecta!',
            icon: 'warning',
            text: 'Formato de respuesta incorrecta, no se permiten caracteres especiales ni que sea menor de 4 caracteres o mayor que 50',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='./recuperar.php';
                }
            });
        </script>";
    } else {
        $user->recuperar($correo_usuario, $respuesta);
    }
}


?>
