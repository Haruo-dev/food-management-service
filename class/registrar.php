<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon_pagina.png">
    
    <title>Registrar</title>
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

                <h2 class="fw-bold text-center pt-5 mb-5 ">Registrarse</h2>
                <!--Form-->
                <form action="./verificar-2.php" class="pt-5 m-lg-5" method="post" id="form_2">
                    <div class="mb-4">
                        <label for="id_usuario" class="form-label">Id de usuario</label>
                        <input type="number" class="form-control" name="id_usuario" id="id_usuario" required>
                    </div>
                    <div class="mb-4">
                        <label for="nombre_de_usuario" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre_de_usuario" id="nombre_de_usuario" >
                    </div>
                    <div class="mb-4">
                        <label for="corre_usuario" class="form-label">Correo electronico</label>
                        <input type="text" class="form-control" name="corre_usuario" id="corre_usuario" required>
                    </div>
                    <div class="mb-4">
                        <label for="contraseña_usuario" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contraseña_usuario" id="contraseña_usuario" required>
                    </div>
                    <div class="mb-4">
                        <label for="contraseña_usuario2" class="form-label"> Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="contraseña_usuario2" id="contraseña_usuario2" required>
                    </div>
                    <div class="mb-4">
                        <label for="id_rol" class="form-label">Rol</label>
                        <select class="form-select" aria-label="Default select example" name="id_rol" id="id_rol" required>
                            <option selected>Rol</option>
                            <option value="1">Trabajador</option>
                            <option value="2">Cliente</option>
                        </select>
                    </div>
                    <div class="d-grid mb-4">
                        <button disabled type="submit" class="btn btn-primary" id="btn_registrar">
                            Registrarse
                        </button>
                    </div>
                    
                    <div class="my-3">
                        <span>¿Ya tienes una cuenta? <a href="./login.php">Iniciar Sesion</a></span> <br>
                        <span><a href="./recuperar.php">Recuperar Contraseña</a></span>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/validar2.js"></script>
    </script>
</body>
</html>