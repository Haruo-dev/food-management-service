<?php
session_start();
include("./class.php");

class Registrar{
    //funcion registrar 
    public function registrar($id_rol,$nom_user,$email_user,$pass_user,$rol){
        
        $sql = "select * from usuario where correo_usuario='$email_user'";
        $res = mysqli_query(Conexion::con(),$sql);

        if ($row = mysqli_fetch_array($res)) {
            echo "<script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: 'ERROR!!!',
                text: 'El correo electronio ya se ha utilizado en otra cuenta',
                backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-2.gif')
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
            $sql = "select * from usuario where id_usuario='$id_rol'";
            $res = mysqli_query(Conexion::con(),$sql);

            if ($row = mysqli_fetch_array($res)) {
                echo "<script type='text/javascript'>
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR!!!',
                    text: 'El Id ya ya se ha utilizado en otra cuenta',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-2.gif')
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
                $sql = "insert into usuario values('$id_rol','$nom_user','$email_user','$pass_user','$rol','')";
                $res=mysqli_query(Conexion::con(),$sql);

                echo "<script type='text/javascript'>
                        Swal.fire({
                        icon: 'success',
                        title: 'Operacion Exitosa',
                        text: 'Se registro el usuarios $email_user con exito!',
                        backdrop: `
                                RGB(237, 250, 229)
                                url('../img/food_happy-1.gif')
                                top
                                no-repeat
                            `
                        }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='./login.php';
                        }
                        });
                    </script>";
            }
        }
    }

    public function validar_campos($id_user,$user_name,$email_user,$pass){
        
    }
}

?>
