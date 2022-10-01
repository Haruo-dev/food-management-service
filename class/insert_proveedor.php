<?php
include('./class.php');
//crear el objeto de la clase Empleado
$prov = new Proveedor();

$nit=$_REQUEST['nit'];
$nombre_proveedor=$_REQUEST['nombre_proveedor'];
$persona_contacto=$_REQUEST['persona_contacto'];
$direccion_proveedor=$_REQUEST['direccion_proveedor'];
$id_sede=$_REQUEST['id_sede'];
$cod_producto=$_REQUEST['cod_producto'];
$nom_user=$_REQUEST['nom_user'];
$vista=$_REQUEST['vista'];

/*Admin*/ 
if($vista == 0 ){
    if (!preg_match("/[\d]/",$nit)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Nit del proveedor incorrecto!',
            icon: 'warning',
            text: 'El Nit del proveedor no puede ser negativo o tener caracteres no numericos',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../admin/proveedor_admin.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,30}$/",$nombre_proveedor)){
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombre del proveedor incorrecto!',
                icon: 'warning',
                text: 'El nombre del proveedor no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../admin/proveedor_admin.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/^[a-zA-Z0-9\s]{4,30}$/",$persona_contacto)){
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Persona contacto incorrecta!',
                    icon: 'warning',
                    text: 'La persona contacto no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../admin/proveedor_admin.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                if (!preg_match("/[a-zA-Z0-9\s]{4,30}/",$direccion_proveedor)){
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
                                window.location='../admin/proveedor_admin.php?nom_user=$nom_user';
                            }
                        });
                    </script>";
                } else {
                    if (!preg_match("/^[\d]$/",$id_sede)) {
                        echo "<script type='text/javascript'>
                        Swal.fire({
                            title: '¡ID de la sede incorrecto!',
                            icon: 'warning',
                            text: 'El id de la sede no puede ser negativo o tener caracteres no numericos',
                            backdrop: `
                                RGB(244, 244, 225)
                                url('../img/food_sad-1.gif')
                                top
                                no-repeat
                            `    
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location='../admin/proveedor_admin.php?nom_user=$nom_user';
                                }
                            });
                        </script>";
                    } else {
                        if (!preg_match("/^[\d]$/",$cod_producto)) {
                            echo "<script type='text/javascript'>
                            Swal.fire({
                                title: '¡Cod del producto incorrecto!',
                                icon: 'warning',
                                text: 'El cod del producto no puede ser negativo o tener caracteres no numericos',
                                backdrop: `
                                    RGB(244, 244, 225)
                                    url('../img/food_sad-1.gif')
                                    top
                                    no-repeat
                                `    
                                }).then((result)=>{
                                    if(result.isConfirmed){
                                        window.location='../admin/proveedor_admin.php?nom_user=$nom_user';
                                    }
                                });
                            </script>";
                        } else {
                            //enviar los datos capturados en el formulario
                            $prov->insertar($nit,$nombre_proveedor,$persona_contacto,$direccion_proveedor,$id_sede, $cod_producto, $nom_user);
                        }
                    }
                }
            }
        }
    }
}

/*Trabajador*/ 
if($vista == 1 ){
    if (!preg_match("/[\d]/",$nit)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Nit del proveedor incorrecto!',
            icon: 'warning',
            text: 'El Nit del proveedor no puede ser negativo o tener caracteres no numericos',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../trabajador/proveedor_trabajador.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,30}$/",$nombre_proveedor)){
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombre del proveedor incorrecto!',
                icon: 'warning',
                text: 'El nombre del proveedor no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../trabajador/proveedor_trabajador.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
            if (!preg_match("/^[a-zA-Z0-9\s]{4,30}$/",$persona_contacto)){
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: '¡Persona contacto incorrecta!',
                    icon: 'warning',
                    text: 'La persona contacto no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                    backdrop: `
                        RGB(244, 244, 225)
                        url('../img/food_sad-1.gif')
                        top
                        no-repeat
                    `    
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='../trabajador/proveedor_trabajador.php?nom_user=$nom_user';
                        }
                    });
                </script>";
            } else {
                if (!preg_match("/[a-zA-Z0-9\s]{4,30}/",$direccion_proveedor)){
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
                                window.location='../trabajador/proveedor_trabajador.php?nom_user=$nom_user';
                            }
                        });
                    </script>";
                } else {
                    if (!preg_match("/^[\d]$/",$id_sede)) {
                        echo "<script type='text/javascript'>
                        Swal.fire({
                            title: '¡ID de la sede incorrecto!',
                            icon: 'warning',
                            text: 'El id de la sede no puede ser negativo o tener caracteres no numericos',
                            backdrop: `
                                RGB(244, 244, 225)
                                url('../img/food_sad-1.gif')
                                top
                                no-repeat
                            `    
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location='../trabajador/proveedor_trabajador.php?nom_user=$nom_user';
                                }
                            });
                        </script>";
                    } else {
                        if (!preg_match("/^[\d]$/",$cod_producto)) {
                            echo "<script type='text/javascript'>
                            Swal.fire({
                                title: '¡Cod del producto incorrecto!',
                                icon: 'warning',
                                text: 'El cod del producto no puede ser negativo o tener caracteres no numericos',
                                backdrop: `
                                    RGB(244, 244, 225)
                                    url('../img/food_sad-1.gif')
                                    top
                                    no-repeat
                                `    
                                }).then((result)=>{
                                    if(result.isConfirmed){
                                        window.location='../trabajador/proveedor_trabajador.php?nom_user=$nom_user';
                                    }
                                });
                            </script>";
                        } else {
                            //enviar los datos capturados en el formulario
                            $prov->insertar2($nit,$nombre_proveedor,$persona_contacto,$direccion_proveedor,$id_sede, $cod_producto, $nom_user);
                        }
                    }
                }
            }
        }
    }

}
?>