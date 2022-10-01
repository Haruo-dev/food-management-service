<?php
include('./class.php');
$condu = new Conductor();

$id_conductor = $_REQUEST['id_conductor'];
$nombres_conductor = $_REQUEST['nombres_conductor'];
$apellidos_conductor = $_REQUEST['apellidos_conductor'];
$direccion_conductor = $_REQUEST['direccion_conductor'];
$fecha_ingreso_empresa = $_REQUEST['fecha_ingreso_empresa'];
$fecha_asignacion_ruta = $_REQUEST['fecha_asignacion_ruta'];
$cod_ruta = $_REQUEST['cod_ruta'];
$id_rol = $_REQUEST['id_rol'];
$nom_user=$_REQUEST['nom_user'];
$vista=$_REQUEST['vista'];

/*Admin*/ 
if($vista == 0 ){
    if (!preg_match("/^[\d]$/",$id_conductor)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡ID de conductor incorrecto!',
            icon: 'warning',
            text: 'El ID del conductor no puede ser negativo',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../admin/conductor_admin.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombres_conductor)) {
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombres del conductor incorrecto!',
                icon: 'warning',
                text: 'Los nombres del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../admin/conductor_admin.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$apellidos_conductor)) {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Apellidos del conductor incorrecto!',
                    icon: 'warning',
                    text: 'Los apellidos del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../admin/conductor_admin.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                $condu->insertar($id_conductor, $nombres_conductor, $apellidos_conductor, $direccion_conductor, $fecha_ingreso_empresa, $fecha_asignacion_ruta, $cod_ruta, $id_rol, $nom_user);
            }
        }
    }
}

/*Admin*/ 
if($vista == 1 ){
    if (!preg_match("/^[\d]$/",$id_conductor)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡ID de conductor incorrecto!',
            icon: 'warning',
            text: 'El ID del conductor no puede ser negativo',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombres_conductor)) {
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombres del conductor incorrecto!',
                icon: 'warning',
                text: 'Los nombres del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$apellidos_conductor)) {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Apellidos del conductor incorrecto!',
                    icon: 'warning',
                    text: 'Los apellidos del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                $condu->insertar2($id_conductor, $nombres_conductor, $apellidos_conductor, $direccion_conductor, $fecha_ingreso_empresa, $fecha_asignacion_ruta, $cod_ruta, $id_rol, $nom_user);
            }
        }
    }
}


?>