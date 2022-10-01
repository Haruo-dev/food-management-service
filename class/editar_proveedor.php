<?php
session_start();
if(isset($_SESSION['usuario'])){
include('./class.php');

$prove= new Proveedor();
$vista = $_GET['vista'];
$nom_user  = $_GET['nom_user'];

if(isset($_POST['grabar']) && $_POST['grabar'] == 'si'){
    $prove->editproveedor($_POST['nit'],$_POST['nombre_proveedor'],$_POST['persona_contacto'],$_POST['direccion_proveedor'],$_POST['id_sede'],$_POST['cod_producto'], $_POST['vista'], $_POST['nom_user']);
exit();
}
$reg=$prove->get_emple_nit($_GET['nit']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Editar proveedor</title>
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
<section class="section-editar ">
    <div>
        <h1>GESTION DE PROVEEDORES</h1>
    </div>
    <div>
        <div class="card card-form-usuario grande">
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
                <form action="./editar_proveedor.php" class="m-lg-3" method="post">
                    <label for="nit" class="form-label">Nit</label>
                    <input type="hidden" value="<?php echo $vista;?>" name="vista">
                    <input type="hidden" value="<?php echo $nom_user;?>" name="nom_user">

                    <input type='hidden' name='grabar' value='si'>
                    <input type="number" class="form-control rounded-3" name="nit" value="<?php echo $reg[0]['nit'];?>" readonly>

                    <label for="nombre_proveedor" class="form-label ">Nombre del proveedor</label>
                    <input type="text" class="form-control rounded-3" name="nombre_proveedor" value="<?php echo $reg[0]['nombre_proveedor'];?>">

                    <label for="persona_contacto" class="form-label">Persona contacto</label>
                    <input type="text" class="form-control rounded-3" name="persona_contacto" value="<?php echo $reg[0]['persona_conctacto'];?>">

                    <label for="direccion_proveedor" class="form-label"> Direccion del proveedor</label>
                    <input type="text" class="form-control rounded-3" name="direccion_proveedor" value="<?php echo $reg[0]['direccion_proveedor'];?>">

                    <label for="id_sede" class="form-label">Id sede</label>
                    <input type="number" class="form-control rounded-3" name="id_sede" value="<?php echo $reg[0]['id_sede'];?>">
                    
                    <label for="cod_producto" class="form-label">Codigo producto</label>
                    <input type="number" class="form-control rounded-3" name="cod_producto" value="<?php echo $reg[0]['cod_producto'];?>">
                    <div class="d-grid pt-5">
                        <button type="submit" class="boton-enviar"> 
                            Editar Proveedor
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