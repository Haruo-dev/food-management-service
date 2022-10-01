<?php
include('./class.php');
$user = new Usuarios();

$id_user=$_REQUEST['id_usuario'];
$user_name=$_REQUEST['nombre_usuario'];
$email_user=$_REQUEST['email_usuario'];
$pass=$_REQUEST['password_usuario'];
$rol=$_REQUEST['rol_usuario'];
$respuesta = $_REQUEST['respuesta'];
$nom_user=$_REQUEST['nom_user'];

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
                window.location='../admin/usuarios.php?nom_user=$nom_user';
            }
        });
    </script>";
} else {
    if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$user_name)) {
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
                    window.location='../admin/usuarios.php?nom_user=$nom_user';
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
                        window.location='../admin/usuarios.php?nom_user=$nom_user';
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
                            window.location='../admin/usuarios.php?nom_user=$nom_user';
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
                                window.location='../admin/usuarios.php?nom_user=$nom_user';
                            }
                        });
                    </script>";
                } else {
                    $user->insertar($id_user,$user_name,$email_user,$pass,$rol,$respuesta,$nom_user);
                }
            }
        }
    }
}
/*
$user->insertar($_REQUEST['id_usuario'],$_REQUEST['nombre_usuario'],$_REQUEST['email_usuario'],$_REQUEST['password_usuario'], $_REQUEST['rol_usuario'], $_REQUEST['nom_user']);
*/
?>