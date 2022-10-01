<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Recuperar contraseña</title>
    <!--Bootstrap-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Sweetalert-->
    <link href="../sw/dist/sweetalert2.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/registrar.css">
    <!--JS-->
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
</head>
<body >
    <div class="rounded-3 shadow container contenedor contendedor-2">
        <div class="row align-items-stretch">
            <div class="col fondo rounded-3 d-none d-lg-block col-md-5 col-lg-5 col-xl-6">
            </div>
            <div class="col p-3 bg-white rounded-end">
                <div class="text-end">
                    <img src="../img/logo.png" width="48" alt="logo">
                </div>

                <h2 class="fw-bold text-center pt-5 mb-5 ">Recuperar <br> Contraseña</h2>
                <p class="text-center"> Digite su correo de usuario y la respuesta a la pregunta de seguridad <br> para recuperar su clave</p>
                
                <!--Form-->
                <form action="./recuperar_contraseña.php" class="pt-5 m-lg-5" method="post" id="form">
                    <div class="mb-4">
                        <label for="correo_usuario" class="form-label">Correo electronico</label>
                        <input type="text" class="form-control" name="correo_usuario" required id="correo">
                    </div>
                    
                    <div class="mb-4">
                        <label for="respuesta" class="form-label">¿Cuál es su cancion favorita?</label>
                        <input type="text" class="form-control" name="respuesta" required id="res">
                    </div>

                    <div class="d-grid mb-4">
                        <button disabled type="submit" class="btn btn-primary" id="btn-recuperar">
                            Recuperar contraseña
                        </button>
                    </div>
                    
                    <div class="my-3">
                        <span>¿Ya tienes una cuenta? <a href="./login.php">Iniciar Sesion</a></span> <br>
                        <span>¿No tienes cuenta? <a href="./registrar.php">Registrate</a></span> <br>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/validar3.js"></script>
    </script>
</body>
</html>