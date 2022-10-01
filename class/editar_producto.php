<?php
session_start();
if(isset($_SESSION['usuario'])){
include('./class.php');

$prod= new Productos();
$vista = $_GET['vista'];
$nom_user  = $_GET['nom_user'];

if(isset($_POST['grabar']) && $_POST['grabar'] == 'si'){
    $prod->editproducto($_POST['cod_producto'],$_POST['nombre_producto'],$_POST['descripcion'],$_POST['valor_producto'],$_POST['vista'], $_POST['nom_user']);
exit();
}
$reg=$prod->get_emple_cod($_GET['cod']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Editar producto</title>
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
                <form action="./editar_producto.php" class="m-lg-3" method="post">
                <input type="hidden" value="<?php echo $vista;?>" name="vista">
                <input type="hidden" value="<?php echo $nom_user;?>" name="nom_user">
    
                <label for="cod_producto" class="form-label">Codigo del producto</label>
                    <input type='hidden' name='grabar' value='si'>
                    <input type="text" class="form-control rounded-3" name="cod_producto" value="<?php echo $reg[0]['cod_producto'];?>" readonly>

                    <label for="nombre_producto" class="form-label ">Nombre del producto</label>
                    <input type="text" class="form-control rounded-3" name="nombre_producto" value="<?php echo $reg[0]['nombre_producto'];?>">

                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control rounded-3" name="descripcion" value="<?php echo $reg[0]['descripcion'];?>">

                    <label for="valor_producto" class="form-label"> rol</label>
                    <input type="number" class="form-control rounded-3" name="valor_producto" value="<?php echo $reg[0]['valor_producto'];?>">

                    <div class="d-grid pt-5">
                        <button type="submit" class="boton-enviar"> 
                            Editar Producto
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