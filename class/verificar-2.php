<?php
include("./registar_usuario.php");
$ver = new Registrar();
$id_user=$_REQUEST['id_usuario'];
$user_name=$_REQUEST['nombre_de_usuario'];
$email_user=$_REQUEST['corre_usuario'];
$pass=$_REQUEST['contraseña_usuario'];
$pass2=$_REQUEST['contraseña_usuario2'];
$rol=$_REQUEST['id_rol'];

if (!preg_match("/^[\d]$/",$id_user)) {
    echo "<script type='text/javascript'>
    Swal.fire({
        title: '¡ID de usuario incorrecto!',
        icon: 'warning',
        text: 'El ID de usuario no puede ser negativo',
        backdrop: `
            RGB(244, 244, 225)
            url('../img/food_sad-1.gif')
            top
            no-repeat
        `    
        }).then((result)=>{
            if(result.isConfirmed){
                window.location='./registrar.php';
            }
        });
    </script>";
} else {
    if (!preg_match("/^[a-zA-Z0-9]{5,15}$/",$user_name)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Nombre de usuario incorrecto!',
            icon: 'warning',
            text: 'El nombre de usuario no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='./registrar.php';
                }
            });
        </script>";
    } else {
        if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]/",$email_user)) {
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
                        window.location='./registrar.php';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/^[a-zA-Z0-9._-]{5,15}$/",$pass)){
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Contraseña incorrecta!',
                    icon: 'warning',
                    text: 'Formato de contraseña incorrecta, no se permiten caracteres alfanumericos',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='./registrar.php';
                        }
                    });
                </script>";
            } else {

                if (strcmp($pass,$pass2) === 0) {
                    $ver->registrar($id_user,$user_name,$email_user,$pass,$rol);
                } else {
                    echo "<script type='text/javascript'>
                    Swal.fire({
                        title: '¡Error en las contraseñas !',
                        icon: 'warning',
                        text: 'Las contraseñas no coinciden',
                        backdrop: `
                            RGB(244, 244, 225)
                            url('../img/food_sad-1.gif')
                            top
                            no-repeat
                        `    
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location='./registrar.php';
                            }
                        });
                    </script>";
                }
                
            }
        }
    }
}


?>