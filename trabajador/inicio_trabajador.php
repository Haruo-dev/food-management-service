<?php
session_start();
include('../class/class.php');
    if(isset($_SESSION['usuario'])){
    $nom_user = $_GET['nom_user'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    <title>ALIMENTAMOS S.A</title>
    <!--Bootstrap-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Sweetalert-->
    <link href="../sw/dist/sweetalert2.min.css">
    <!--css-->
    <link rel="stylesheet" href="../css/admin.css">
    <!--JS-->
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
    <!--Box icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!--Icons animados-->
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
</head>
<body>
    <nav class="sidebar sidebar-traba">
        <header>
            <div class="image-text ">
                <span class="image">
                    <img src="../img/logo.png" alt="">
                </span>

                <div class="text header-text">
                    <span class="name">Alimentamos S.A</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle azul'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <div class="menu-user azul2">
                    <img src="../img/trabajador_logo.png" alt="trabajador">
                    <div class="user-data azul2">
                        <span class="user-name"><?php echo $nom_user?></span>
                        <span class="user-tipe">Empleado</span>
                    </div>
                </div>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./inicio_trabajador.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-home icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./conductor_trabajador.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bxs-truck icon'></i>
                            <span class="text nav-text">Conductor</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./ruta_trabajador.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-map-pin icon'></i>
                            <span class="text nav-text">Ruta</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./clientes_trabajador.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-smile icon'></i>
                            <span class="text nav-text">Cliente</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./proveedor_trabajador.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-cart-alt icon'></i>
                            <span class="text nav-text">Proveedor</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./producto_trabajador.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-package icon'></i>
                            <span class="text nav-text">Producto</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../class/salir.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <div class="titulo_container">
        <lord-icon
            src="https://cdn.lordicon.com/waqyacxh.json"
            trigger="hover"
            style="width:550px;height:550px">
        </lord-icon>
        <h1> ALIMENTAMOS S.A</h1>
    </div>
    

<?php
}else{
    
    echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'ERROR!!!',
        text: 'Debe iniciar sesison para ingresar a esta pagina',
        backdrop: `
                RGB(244, 244, 225)
                url('./img/food_sad-3.gif')
                top
                no-repeat
            ` 
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./index.php';
        }
    });
</script>";
}
?>

        <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
        <script src="./sw/dist/sweetalert2.all.min.js"></script>
        <script src="./js/jquery-3.6.0.min.js"></script>
        <script src="../js/script.js"></script>
    </body>
</html>