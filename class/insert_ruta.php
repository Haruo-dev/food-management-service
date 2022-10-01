<?php
include('./class.php');
$ruta = new Ruta();

$cod_ruta = $_REQUEST['cod_ruta'];
$nombre_ruta = $_REQUEST['nombre_ruta'];
$id_sede_principal = $_REQUEST['id_sede_principal'];
$fecha_apertura = $_REQUEST['fecha_apertura'];
$cod_ciudad_origen = $_REQUEST['cod_ciudad_origen'];
$cod_ciudad_destino = $_REQUEST['cod_ciudad_destino'];
$costo_ruta = $_REQUEST['costo_ruta'];
$fecha_cambio_costo = $_REQUEST['fecha_cambio_costo'];
$nom_user=$_REQUEST['nom_user'];
$vista=$_REQUEST['vista'];

/*Admin*/ 
if($vista == 0 ){
    if (!preg_match("/^[\d]$/",$cod_ruta)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Cod de ruta incorrecto!',
            icon: 'warning',
            text: 'El Cod de ruta no puede ser negativo',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../admin/ruta_admin.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombre_ruta)) {
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombre de ruta incorrecto!',
                icon: 'warning',
                text: 'El nombre de ruta no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../admin/ruta_admin.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/[\d]/",$costo_ruta)) {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Costo de la ruta incorrecto incorrecto!',
                    icon: 'warning',
                    text: 'El costo de la ruta  no puede ser negativo',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../admin/ruta_admin.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                $ruta->insertar($cod_ruta, $nombre_ruta, $id_sede_principal, $fecha_apertura, $cod_ciudad_origen,$cod_ciudad_destino,$costo_ruta,$fecha_cambio_costo,$nom_user);
            }
        }
    }
}

/*Trabajador*/ 
if($vista == 1 ){
    if (!preg_match("/^[\d]$/",$cod_ruta)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Cod de ruta incorrecto!',
            icon: 'warning',
            text: 'El Cod de ruta no puede ser negativo',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../trabajador/ruta_trabajador.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombre_ruta)) {
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombre de ruta incorrecto!',
                icon: 'warning',
                text: 'El nombre de ruta no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../trabajador/ruta_trabajador.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/[\d]/",$costo_ruta)) {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Costo de la ruta incorrecto incorrecto!',
                    icon: 'warning',
                    text: 'El costo de la ruta  no puede ser negativo',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../trabajador/ruta_trabajador.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                $ruta->insertar2($cod_ruta, $nombre_ruta, $id_sede_principal, $fecha_apertura, $cod_ciudad_origen,$cod_ciudad_destino,$costo_ruta,$fecha_cambio_costo,$nom_user);
            }
        }
    }
} 



?>