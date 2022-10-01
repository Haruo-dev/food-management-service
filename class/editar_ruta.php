<?php
session_start();
if(isset($_SESSION['usuario'])){
include('./class.php');

$ruta= new Ruta();
$vista = $_GET['vista'];
$nom_user  = $_GET['nom_user'];

if(isset($_POST['grabar']) && $_POST['grabar'] == 'si'){
    $ruta->editRuta($_POST['cod_ruta'],$_POST['nombre_ruta'],$_POST['id_sede_principal'],$_POST['fecha_apertura'],$_POST['cod_ciudad_origen'],$_POST['cod_ciudad_destino'],$_POST['costo_ruta'],$_POST['fecha_cambio_costo'],$_POST['vista'], $_POST['nom_user']);
exit();
}
$reg=$ruta->get_rut_cod($_GET['cod']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Editar ruta</title>
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
        <h1>GESTION DE RUTAS</h1>
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
            <form action="./editar_ruta.php" class="m-lg-3" method="post">
            <input type="hidden" value="<?php echo $vista;?>" name="vista">
                    <input type="hidden" value="<?php echo $nom_user;?>" name="nom_user">
        
            <label for="cod_ruta" class="form-label">Cod ruta</label>
                    <input type='hidden' name='grabar' value='si'>
                    <input type="number" class="form-control rounded-3" name="cod_ruta"  value="<?php echo $reg[0]['cod_ruta'];?>" readonly>

                    <label for="nombre_ruta" class="form-label ">Nombre de la ruta</label>
                    <input type="text" class="form-control rounded-3" name="nombre_ruta" value="<?php echo $reg[0]['nombre_ruta'];?>">

                    <label for="id_sede_principal" class="form-label">Sede Principal</label>                    
                    <select class="form-select" aria-label="Default select example" name="id_sede_principal">
                        <option selected>Sede</option>
                        <option value="1">Bogota</option>
                    </select>

                    <?php
                        $minDate = date("2022-02-01");
                        $maxDate = date("Y-m-d");

                        $ciu = new Ciudad;
                        $res = $ciu->verciu();
                    ?>
                    <label for="fecha_apertura" class="form-label ">Fecha de apertura</label>
                    <input type="date" value="<?php echo $reg[0]['fecha_apertura'];?>" min="<?php echo $minDate; ?>" max="<?php echo $maxDate; ?>"  class="form-control rounded-3" name="fecha_apertura" require>
                    
                    <label for="cod_ciudad_origen" class="form-label">Ciudad origen</label>
                    <select class="form-select" aria-label="Default select example" name="cod_ciudad_origen"  required>
                        <option selected>Ciudad</option>

                        <?php
                            for ($i=0; $i < count($res); $i++) { 
                                echo
                                "
                                    <option value='".($i+1)."'>".$res[$i]['nombre_ciudad']."</option>
                                ";
                            }
                        ?>
                    </select>

                    <label for="cod_ciudad_destino" class="form-label">Ciudad destino</label>
                    <select class="form-select" aria-label="Default select example" name="cod_ciudad_destino"  required>
                        <option selected>Ciudad</option>

                        <?php
                            for ($i=0; $i < count($res); $i++) { 
                                echo
                                "
                                    <option value='".($i+1)."'>".$res[$i]['nombre_ciudad']."</option>
                                ";
                            }
                        ?>
                    </select>

                    <label for="costo_ruta" class="form-label ">Costo ruta</label>
                    <input type="number"  value="<?php echo $reg[0]['costo_ruta'];?>" min="0" class="form-control rounded-3"  name="costo_ruta" require>
                    
                    <?php
                        $minDate = date("Y-m-d");
                    ?>
                    <label for="fecha_cambio_costo" class="form-label ">Fecha cambio de precio</label>
                    <input type="date" value="<?php echo $reg[0]['fecha_cambio_costo'];?>" min="<?php echo $minDate; ?>" class="form-control rounded-3" name="fecha_cambio_costo"require>

                    <div class="d-grid pt-3">
                        <button type="submit" class="boton-enviar"> 
                            Enviar
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