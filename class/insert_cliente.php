<?php
include('./class.php');
$clien = new Cliente();

$id_cliente = $_REQUEST['id_cliente'];
$nombre_cliente = $_REQUEST['nombre_cliente'];
$persona_contacto = $_REQUEST['persona_contacto'];
$direccion_cliente = $_REQUEST['direccion_cliente'];
$cod_ciudad_cliente = $_REQUEST['cod_ciudad_cliente'];
$fecha_entrega_productos = $_REQUEST['fecha_entrega_productos'];
$cantidad_productos = $_REQUEST['cantidad_productos'];
$cod_ruta_asociada = $_REQUEST['cod_ruta_asociada'];
$nom_user=$_REQUEST['nom_user'];
$vista=$_REQUEST['vista'];

/*Admin*/ 
if($vista == 0 ){
    if (!preg_match("/^[\d]$/",$id_cliente)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡ID de cliente incorrecto!',
            icon: 'warning',
            text: 'El ID del cliente no puede ser negativo',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../admin/clientes_admin.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombre_cliente)) {
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombres del cliente incorrecto!',
                icon: 'warning',
                text: 'Los nombres del cliente no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../admin/clientes_admin.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$persona_contacto)) {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Persona contacto incorrecta!',
                    icon: 'warning',
                    text: 'La persona contacto  no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../admin/clientes_admin.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                if (!preg_match("/[a-zA-Z0-9\s]{4,30}/",$direccion_cliente)){
                    echo "<script type='text/javascript'>
                    Swal.fire({
                        title: '¡Direccion incorrecta!',
                        icon: 'warning',
                        text: 'La direccion no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                        backdrop: `
                            RGB(244, 244, 225)
                            url('../img/food_sad-1.gif')
                            top
                            no-repeat
                        `    
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location='../admin/clientes_admin.php?nom_user=$nom_user';
                            }
                        });
                    </script>";
                } else {
                    if (!preg_match("/[\d]/",$cantidad_productos)) {
                        echo "<script type='text/javascript'>
                        Swal.fire({
                            title: '¡La cantidad incorrecta!',
                            icon: 'warning',
                            text: 'La cantidad de productos no puede ser negativo',
                            backdrop: `
                                RGB(244, 244, 225)
                                url('../img/food_sad-1.gif')
                                top
                                no-repeat
                            `    
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location='../admin/clientes_admin.php?nom_user=$nom_user';
                                }
                            });
                        </script>";
                    } else {
                        $clien->insertar($id_cliente, $nombre_cliente, $persona_contacto, $direccion_cliente, $cod_ciudad_cliente,$fecha_entrega_productos,$cantidad_productos,$cod_ruta_asociada,$nom_user);
                    }
                }
            }
        }
    }
}

/*Trabajador*/ 
if($vista == 1 ){
    if (!preg_match("/^[\d]$/",$id_cliente)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡ID de cliente incorrecto!',
            icon: 'warning',
            text: 'El ID del cliente no puede ser negativo',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../trabajador/clientes_trabajador.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombre_cliente)) {
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombres del cliente incorrecto!',
                icon: 'warning',
                text: 'Los nombres del cliente no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../trabajador/clientes_trabajador.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$persona_contacto)) {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Persona contacto incorrecta!',
                    icon: 'warning',
                    text: 'La persona contacto  no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../trabajador/clientes_trabajador.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                if (!preg_match("/[a-zA-Z0-9\s]{4,30}/",$direccion_cliente)){
                    echo "<script type='text/javascript'>
                    Swal.fire({
                        title: '¡Direccion incorrecta!',
                        icon: 'warning',
                        text: 'La direccion no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                        backdrop: `
                            RGB(244, 244, 225)
                            url('../img/food_sad-1.gif')
                            top
                            no-repeat
                        `    
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location='../trabajador/clientes_trabajador.php?nom_user=$nom_user';
                            }
                        });
                    </script>";
                } else {
                    if (!preg_match("/[\d]/",$cantidad_productos)) {
                        echo "<script type='text/javascript'>
                        Swal.fire({
                            title: '¡La cantidad incorrecta!',
                            icon: 'warning',
                            text: 'La cantidad de productos no puede ser negativo',
                            backdrop: `
                                RGB(244, 244, 225)
                                url('../img/food_sad-1.gif')
                                top
                                no-repeat
                            `    
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location='../trabajador/clientes_trabajador.php?nom_user=$nom_user';
                                }
                            });
                        </script>";
                    } else {
                        $clien->insertar2($id_cliente, $nombre_cliente, $persona_contacto, $direccion_cliente, $cod_ciudad_cliente,$fecha_entrega_productos,$cantidad_productos,$cod_ruta_asociada,$nom_user);
                    }
                }
            }
        }
    }
}

?>