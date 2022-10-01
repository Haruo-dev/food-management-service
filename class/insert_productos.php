<?php
include('./class.php');
//crear el objeto de la clase Empleado
$prod = new Productos();

$cod_producto=$_REQUEST['cod_producto'];
$nombre_producto=$_REQUEST['nombre_producto'];
$descripcion=$_REQUEST['descripcion'];
$valor_producto=$_REQUEST['valor_producto'];
$nom_user=$_REQUEST['nom_user'];
$vista=$_REQUEST['vista'];


/*Admin*/ 
if($vista == 0 ){
    if (!preg_match("/^[\d]$/",$cod_producto)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Cod de producto incorrecto!',
            icon: 'warning',
            text: 'El Cod de producto no puede ser negativo o tener caracteres no numericos',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../admin/producto_admin.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,30}$/",$nombre_producto)){
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombre del producto incorrecto!',
                icon: 'warning',
                text: 'El nombre del producto no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../admin/producto_admin.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
                if (!preg_match("/^[1-9]+\\d*|[0]/",$valor_producto)){
                    echo "<script type='text/javascript'>
                    Swal.fire({
                        title: '¡Valor incorrecto!',
                        icon: 'warning',
                        text: 'El valor del producto no puede ser negativo',
                        backdrop: `
                            RGB(244, 244, 225)
                            url('../img/food_sad-1.gif')
                            top
                            no-repeat
                        `    
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location='../admin/producto_admin.php?nom_user=$nom_user';
                            }
                        });
                    </script>";
                } else {
                    $prod->insertar($cod_producto,$nombre_producto,$descripcion,$valor_producto,$nom_user);
                }
            }
        
    }

} 
/*Trabajador*/ 
if($vista == 1 ){
    if (!preg_match("/^[\d]$/",$cod_producto)) {
        echo "<script type='text/javascript'>
        Swal.fire({
            title: '¡Cod de producto incorrecto!',
            icon: 'warning',
            text: 'El Cod de producto no puede ser negativo o tener caracteres no numericos',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-1.gif')
                top
                no-repeat
            `    
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location='../trabajador/producto_trabajador.php?nom_user=$nom_user';
                }
            });
        </script>";
    } else {
        if (!preg_match("/^[a-zA-Z0-9\s]{4,30}$/",$nombre_producto)){
            echo "<script type='text/javascript'>
            Swal.fire({
                title: '¡Nombre del producto incorrecto!',
                icon: 'warning',
                text: 'El nombre del producto no puede tener caracteres especiale, ni ser mas largo de 30 palabras o menor que 4',
                backdrop: `
                    RGB(244, 244, 225)
                    url('../img/food_sad-1.gif')
                    top
                    no-repeat
                `    
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='../trabajador/producto_trabajador.php?nom_user=$nom_user';
                    }
                });
            </script>";
        } else {
                if (!preg_match("/^[1-9]+\\d*|[0]/",$valor_producto)){
                    echo "<script type='text/javascript'>
                    Swal.fire({
                        title: '¡Valor incorrecto!',
                        icon: 'warning',
                        text: 'El valor del producto no puede ser negativo',
                        backdrop: `
                            RGB(244, 244, 225)
                            url('../img/food_sad-1.gif')
                            top
                            no-repeat
                        `    
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location='../trabajador/producto_trabajador.php?nom_user=$nom_user';
                            }
                        });
                    </script>";
                } else {
                    $prod->insertar2($cod_producto,$nombre_producto,$descripcion,$valor_producto,$nom_user);
                }
            }
        
    }
    
}


?>