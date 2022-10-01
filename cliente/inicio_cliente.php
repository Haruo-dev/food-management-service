<?php
session_start();
include('../class/class.php');
if (isset($_SESSION['usuario'])) {
    $nom_user = $_GET['nom_user'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../img/icon_pagina.png">

        <title>Cliente</title>
        <!--Bootstrap-->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--Sweetalert-->
        <link href="../sw/dist/sweetalert2.min.css">
        <!--css-->
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/cliente.css">
        <!--JS-->
        <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
        <!--Box icons-->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <!--Icons animados-->
        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
    </head>

    <body>
        <!-- Navbar  -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
            <div class="container">
                <div class="user_img-container">
                    <img class="user_img" src="../img/cliente_logo.png" alt="">
                    <div class="user_nom">
                        <p><?php echo $nom_user ?></p>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto">
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./inicio_cliente.php?nom_user=<?php echo $nom_user ?>">
                                <p class="a">Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#item1">
                                <p class="a">Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <p class="a">Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <p class="a">Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../class/salir.php" class="nav-link ">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Banner Image  -->
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center">
                <div class="titulo_container cliente">
                    <lord-icon src="https://cdn.lordicon.com/waqyacxh.json" trigger="hover" style="width:550px;height:550px">
                    </lord-icon>
                    <h1> ALIMENTAMOS S.A</h1>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="container my-5 d-grid gap-5" id="item1">
            <br><br><br>
            <div id="carouselExampleCaptions" class="container my-5 d-grid gap-5 carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/fondo_frutas1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Multitud de frutas y verduras</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/fondo_frutas2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lacteos de todos los tipos</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/fondo_frutas3.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Gran variedad de carnes</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
        </div>

    <?php
} else {

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
                window.location='../index.php';
            }
        });
        </script>";
}
    ?>
    <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'shadow');
            } else {
                nav.classList.remove('bg-dark', 'shadow');
            }
        });
    </script>
    </body>

    </html>