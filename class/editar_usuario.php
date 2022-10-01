<?php
session_start();
if(isset($_SESSION['usuario'])){
include('./class.php');
$user= new Usuarios();
if(isset($_POST['grabar']) && $_POST['grabar'] == 'si'){
    $user->edituser($_POST['id_usuario'],$_POST['nombre_usuario'],$_POST['email_usuario'],$_POST['rol_usuario'],$_POST['password_usuario'], $_POST['respuesta']);
exit();
}
$reg=$user->get_emple_id($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Editar usuario</title>
    <!--Bootstrap-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Sweetalert-->
    <link href="../sw/dist/sweetalert2.min.css">
    <!--css-->
    <link rel="stylesheet" href="../css/admin.css">
    <!--JS-->
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
</head>
<body class="cuerpo-editar" >
<section class="section-editar">
    <div>
        <h1>GESTION DE USUARIOS</h1>
    </div>
    <div>
        <div class="card card-form-usuario">
            <div class="tools">
                <div class="circle">
                    <span class="red box"></span>
                </div>
                <div class="circle">
                    <span class="yellow box"></span>
                </div>
                <div class="circle">
                    <span class="green box"></span>
                </div>
            </div>
            <div class="card__content">
                <form action="./editar_usuario.php" class="m-lg-3" method="post">
                    <label for="id_usuario" class="form-label">id usuario</label>
                    <input type='hidden' name='grabar' value='si'>
                    <input type="number" class="form-control rounded-3" name="id_usuario" value="<?php echo $reg[0]['id_usuario'];?>" readonly>

                    <label for="nombre_usuario" class="form-label ">Nombre de usuario</label>
                    <input type="text" class="form-control rounded-3" name="nombre_usuario" value="<?php echo $reg[0]['nombre_de_usuario'];?>">

                    <label for="email_usuario" class="form-label">Correo usuario</label>
                    <input type="email" class="form-control rounded-3" name="email_usuario" value="<?php echo $reg[0]['correo_usuario'];?>">

                    <!-- 
                    <label for="rol_usuario" class="form-label"> rol</label>
                    <input type="number" class="form-control rounded-3" name="rol_usuario" value="<?php echo $reg[0]['id_rol'];?>">
                    -->
                    <label for="rol_usuario" class="form-label">Rol</label>
                    <select class="form-select" aria-label="Default select example" name="rol_usuario" required>
                        <option selected><?php echo $reg[0]['id_rol'];?></option>
                        <option value="0">Administrador</option>
                        <option value="1">Trabajador</option>
                        <option value="2">Cliente</option>
                    </select>
                    <label for="respuesta" class="form-label">¿Cuál es su cancion favorita?</label>
                    <input type="text" class="form-control rounded-3" name="respuesta" value="<?php echo $reg[0]['respuesta'];?>">

                    <label for="password_usuario" class="form-label"> Contraseña</label>
                    <input type="text" class="form-control rounded-3" name="password_usuario" value="<?php echo $reg[0]['contraseña_usuario'];?>">
                    
                    <div class="d-grid pt-5">
                        <button type="submit" class="boton-enviar"> 
                            Editar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    }else{
        
        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'ERROR!!!',
            text: 'Debe iniciar sesison para ingresar a esta pagina',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-3.gif')
                top
                no-repeat
            `  
        }).then((result)=>{
            if(result.isConfirmed){
                window.location='../index.php';
            }
        });
        </script>";
    }
?>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
</body>
</html>