<?php
session_start();
include("./class.php");


class Login{
    
    //funcion validar 
    public function validar($user,$pass){
        $sql = "select * from usuario where correo_usuario='$user'";
        $res = mysqli_query(Conexion::con(),$sql);

        if($row = mysqli_fetch_array($res)){
            $sql = "select * from usuario where correo_usuario='$user' and contraseña_usuario='$pass'";
            $res = mysqli_query(Conexion::con(),$sql);

            if($row=mysqli_fetch_array($res)){
                
                //creamos la variable de sesion
                $_SESSION['usuario']=$row['correo_usuario'];

                $sql = "select id_rol from usuario where correo_usuario='$user' and contraseña_usuario='$pass'";
                $res = mysqli_query(Conexion::con(),$sql);
                $row=mysqli_fetch_array($res);
                
                /**Validacion admin */
                if($row[0]==0){
                    echo "
                            Swal.fire({
                                icon: 'success',
                                title: 'BIENVENIDO $user',
                                text: 'Al Sistema',
                                backdrop: `
                                RGB(237, 250, 229)
                                url('../img/food_happy-1.gif')
                                top
                                no-repeat
                            `
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location='../admin/inicio_admin.php?nom_user=$user';
                                }
                            });
                        </script>";
                }
                /**Validacion trabajador */
                if($row[0]==1) {
                    echo "
                            Swal.fire({
                                icon: 'success',
                                title: 'BIENVENIDO  $user',
                                text: 'Al Sistema',
                                backdrop: `
                                RGB(237, 250, 229)
                                url('../img/food_happy-1.gif')
                                top
                                no-repeat
                            `
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location='../trabajador/inicio_trabajador.php?nom_user=$user';
                                }
                            });
                        </script>";
                }
                /**Validacion cliente */
                if($row[0]==2) {
                    echo "
                            Swal.fire({
                                icon: 'success',
                                title: 'BIENVENIDO  $user',
                                text: 'Al Sistema',
                                backdrop: `
                                RGB(237, 250, 229)
                                url('../img/food_happy-1.gif')
                                top
                                no-repeat
                            `
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location='../cliente/inicio_cliente.php?nom_user=$user';
                                }
                            });
                        </script>";
                }
            } else {
                echo "
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR!!!',
                            text: 'Usuario o contraseña incorrecta',
                            backdrop: `
                            RGB(244, 244, 225)
                            url('../img/food_sad-3.gif')
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
        }else {
            echo "
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR!!!',
                    text: 'No existe el usuario $user',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-3.gif')
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
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">