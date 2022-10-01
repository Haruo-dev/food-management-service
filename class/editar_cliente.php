<?php
session_start();
if(isset($_SESSION['usuario'])){
include('./class.php');

$clien= new Cliente();
$vista = $_GET['vista'];
$nom_user  = $_GET['nom_user'];

if(isset($_POST['grabar']) && $_POST['grabar'] == 'si'){
    $clien->editCli($_POST['id_cliente'],$_POST['nombre_cliente'],$_POST['persona_contacto'],$_POST['direccion_cliente'],$_POST['cod_ciudad_cliente'],$_POST['fecha_entrega_productos'],$_POST['cantidad_productos'],$_POST['cod_ruta_asociada'],$_POST['vista'], $_POST['nom_user']);
exit();
}
$reg = $clien->get_id_cli($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Editar cliente</title>
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
        <h1>GESTION DE Clientes</h1>
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
            <form action="./editar_cliente.php" class="m-lg-3" method="post">
                    <input type="hidden" value="<?php echo $vista;?>" name="vista">
                    <input type="hidden" value="<?php echo $nom_user;?>" name="nom_user">
                    <label for="id_cliente" class="form-label">ID cliente</label>
                    <input type='hidden' name='grabar' value='si'>
                    <input type="number" min="0" class="form-control rounded-3" name="id_cliente" value="<?php echo $reg[0]['id_cliente'];?>" readonly>

                    <label for="nombre_cliente" class="form-label ">Nombre cliente</label>
                    <input type="text" class="form-control rounded-3" name="nombre_cliente" value="<?php echo $reg[0]['nombre_cliente'];?>" require>

                    <label for="persona_contacto" class="form-label ">Persona contacto</label>
                    <input type="text" class="form-control rounded-3" name="persona_contacto" value="<?php echo $reg[0]['persona_contacto'];?>" require>

                    <label for="direccion_cliente" class="form-label ">Direccion cliente</label>
                    <input type="text" class="form-control rounded-3" name="direccion_cliente" value="<?php echo $reg[0]['direccion_cliente'];?>" require>

                    
                    <?php
                        $minDate = date("Y-m-d");

                        $ciu = new Ciudad;
                        $res = $ciu->verciu();
                        $ruta = new Ruta;
                        $res2 = $ruta->verRu();
                    ?>
                    
                    <label for="cod_ciudad_cliente" class="form-label">Ciudad cliente</label>
                    <select class="form-select" aria-label="Default select example" name="cod_ciudad_cliente"  required>
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

                    <label for="fecha_entrega_productos" class="form-label ">Fecha de entrega</label>
                    <input type="date" min="<?php echo $minDate; ?>"  class="form-control rounded-3" name="fecha_entrega_productos" value="<?php echo $reg[0]['fecha_entrega_productos'];?>" require>

                    <label for="cantidad_productos" class="form-label ">Cantidad de productos</label>
                    <input type="number" min="0" class="form-control rounded-3" name="cantidad_productos" value="<?php echo $reg[0]['cantidad_productos'];?>" require>

                    <label for="cod_ruta_asociada" class="form-label">Ruta asociada</label>
                    <select class="form-select" aria-label="Default select example" name="cod_ruta_asociada"  required>
                        <option selected>Ruta</option>

                        <?php
                            for ($i=0; $i < count($res2); $i++) { 
                                echo
                                "
                                    <option value='".($i+1)."'>".$res2[$i]['nombre_ruta']."</option>
                                ";
                            }
                        ?>
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