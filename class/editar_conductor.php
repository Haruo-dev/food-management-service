<?php
session_start();
if(isset($_SESSION['usuario'])){
include('./class.php');

$condu= new Conductor();
$vista = $_GET['vista'];
$nom_user  = $_GET['nom_user'];

if(isset($_POST['grabar']) && $_POST['grabar'] == 'si'){
    $condu->ediCon($_POST['id_conductor'],$_POST['nombres_conductor'],$_POST['apellidos_conductor'],$_POST['direccion_conductor'],$_POST['fecha_ingreso_empresa'],$_POST['fecha_asignacion_ruta'],$_POST['cod_ruta'],$_POST['id_rol'],$_POST['vista'], $_POST['nom_user']);
exit();
}
$reg = $condu->get_id_cond($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Editar conductor</title>
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
            <form action="./editar_conductor.php" class="m-lg-3" method="post">
                <input type="hidden" value="<?php echo $vista;?>" name="vista">
                <input type="hidden" value="<?php echo $nom_user;?>" name="nom_user">
    
                <label for="id_conductor" class="form-label">ID conductor</label>
                    <input type='hidden' name='grabar' value='si'>
                    <input type="number" min="0" class="form-control rounded-3" name="id_conductor" value="<?php echo $reg[0]['id_conductor'];?>" readonly>

                    <label for="nombres_conductor" class="form-label ">Nombres conductor</label>
                    <input type="text" class="form-control rounded-3" name="nombres_conductor" value="<?php echo $reg[0]['nombres_conductor'];?>" require>

                    <label for="apellidos_conductor" class="form-label ">Apellidos conductor</label>
                    <input type="text" class="form-control rounded-3" name="apellidos_conductor" value="<?php echo $reg[0]['apellidos_conductor']?>" require>

                    <label for="direccion_conductor" class="form-label">Direccion conductor</label>
                    <input type="text" class="form-control rounded-3" name="direccion_conductor" value="<?php echo $reg[0]['direccion_conductor']?>" require>
                    
                    <?php
                        $minDate = date("2022-02-01");
                        $maxDate = date("Y-m-d");

                        $ciu = new Ruta;
                        $res = $ciu->verRu();
                    ?>
                    <label for="fecha_ingreso_empresa" class="form-label ">Fecha de ingreso</label>
                    <input type="date" min="<?php echo $minDate; ?>" max="<?php echo $maxDate; ?>"  class="form-control rounded-3"  name="fecha_ingreso_empresa" value="<?php echo $reg[0]['fecha_ingreso_empresa']?>" require>

                    <?php
                        $minDate = date("2022-02-01");
                        $maxDate = date("Y-m-d");
                    ?>
                    <label for="fecha_asignacion_ruta" class="form-label ">Fecha de asignacion</label>
                    <input type="date" min="<?php echo $minDate; ?>" max="<?php echo $maxDate; ?>"  class="form-control rounded-3" name="fecha_asignacion_ruta" value="<?php echo $reg[0]['fecha_asignacion_ruta']?>" require>

                    <label for="cod_ruta" class="form-label">Ruta</label>
                    <select class="form-select" aria-label="Default select example" name="cod_ruta"  required>
                        <option selected>Ruta</option>

                        <?php
                            for ($i=0; $i < count($res); $i++) { 
                                echo
                                "
                                    <option value='".($i+1)."'>".$res[$i]['nombre_ruta']."</option>
                                ";
                            }
                        ?>
                    </select>

                    <label for="id_rol" class="form-label">Rol</label>
                    <select class="form-select" aria-label="Default select example" name="id_rol"  required>
                        <option selected>Rol</option>
                        <option value="0">Administrador</option>
                        <option value="1">Trabajador</option>
                        <option value="2">Cliente</option>
                    </select>
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