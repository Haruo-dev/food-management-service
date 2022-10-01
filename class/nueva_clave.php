<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    <title>Nueva contraseña</title>
    <!--Bootstrap-->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Sweetalert-->
    <link href="./sw/dist/sweetalert2.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/registrar.css">
    <!--JS-->
    <script type="text/javascript" language="Javascript" src="./js/funciones.js"></script>
</head>
<body >
    <div class="rounded-3 shadow container contenedor contendedor-2">
        <div class="row align-items-stretch">
            <div class="col fondo rounded-3 d-none d-lg-block col-md-5 col-lg-5 col-xl-6">
            </div>
            <div class="col p-3 bg-white rounded-end">
                <div class="text-end">
                    <img src="./img/logo.png" width="48" alt="logo">
                </div>

                <h2 class="fw-bold text-center pt-5 mb-5 ">Nueva Contraseña</h2>
                <!--Form-->
                <form action="./verificar-2.php" class="pt-5 m-lg-5" method="post">
                    <div class="mb-4">
                        <label for="contraseña_usuario" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contraseña_usuario"  required>
                    </div>
                    
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary">
                            Cambiar contraseña
                        </button>
                    </div>
                    
                    <div class="my-3">
                        <span>¿Ya tienes una cuenta? <a href="./login.php">Iniciar Sesion</a></span> <br>
                        <span><a href="./recuperar.php">Volver</a></span>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    </script>
</body>
</html>