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
    
    <title>Clientes</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Sweetalert-->
    <link href="../sw/dist/sweetalert2.min.css">
    <!--css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <!--JS-->
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
    <!--Box icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c2cad6ff8e.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/logo.png" alt="">
                </span>

                <div class="text header-text">
                    <span class="name">Alimentamos S.A</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <!---=========== Menu Nav ===========-->
        <div class="menu-bar">
            <div class="menu">
                <div class="menu-user">
                    <img src="../img/admin_logo.png" alt="">
                    <div class="user-data">
                        <span class="user-name"> <?php echo $nom_user?></span>
                        <span class="user-tipe">Admind</span>
                    </div>
                </div>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./inicio_admin.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-home icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./usuarios.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./conductor_admin.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bxs-truck icon'></i>
                            <span class="text nav-text">Conductor</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./ruta_admin.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-map-pin icon'></i>
                            <span class="text nav-text">Ruta</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./clientes_admin.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-smile icon'></i>
                            <span class="text nav-text">Cliente</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./proveedor_admin.php?nom_user=<?php echo $nom_user?>">
                            <i class='bx bx-cart-alt icon'></i>
                            <span class="text nav-text">Proveedor</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./producto_admin.php?nom_user=<?php echo $nom_user?>">
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
    <!---=========== Cuerpo ===========-->
    <section class="section-usuarios">
        <!---=========== Contenedor ===========-->
        <div class="contenedor-flexible">
            <!---=========== mini nav ===========-->
            <div class="container_botones">
                <!-- =========== Registrar===========  -->
                <div class="habilitar">
                    <button type="button" class="btn_habilitar rosa" data-bs-toggle="modal" data-bs-target="#registrar">
                        Registrar
                    </button>
                    <!-- Modal -->
                    <div class="modal " id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content ">
                                <div class="modal-header ">
                                    <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Cuerpo -->
                                <div class="modal-body">
                                    <!-- Formulario -->
                                    <form action="../class/insert_cliente.php?nom_user= <?php echo$nom_user?>&vista=0" class="m-lg-3" method="post">
                                        <label for="id_cliente" class="form-label">ID cliente</label>
                                        <input type="number" min="0" class="form-control rounded-3" name="id_cliente" placeholder="1" require>

                                        <label for="nombre_cliente" class="form-label ">Nombre cliente</label>
                                        <input type="text" class="form-control rounded-3" name="nombre_cliente" placeholder="Frutas y mas" require>
                                        
                                        <label for="persona_contacto" class="form-label ">Persona contacto</label>
                                        <input type="text" class="form-control rounded-3" name="persona_contacto" placeholder="Camila Linares" require>
                                        
                                        <label for="direccion_cliente" class="form-label ">Direccion cliente</label>
                                        <input type="text" class="form-control rounded-3" name="direccion_cliente" placeholder="Calle 45" require>

                                        <?php
                                            $minDate = date("Y-m-d");

                                            $ciu = new Ciudad;
                                            $res = $ciu->verciu();
                                            $ruta = new Ruta;
                                            $res2 = $ruta->verRu();
                                        ?>
                                        
                                        <label for="cod_ciudad_cliente" class="form-label">Ciudad cliente</label>
                                        <select class="form-select" aria-label="Default select example" name="cod_ciudad_cliente"  required>
                                            <option selected>Ciudad</option>

                                            <?php
                                                for ($i=0; $i < count($res); $i++) { 
                                                    echo
                                                    "
                                                        <option value='".($i+1)."'>".$res[$i]['nombre_ciudad']."</option>
                                                    ";
                                                }
                                            ?>
                                        </select>

                                        <label for="fecha_entrega_productos" class="form-label ">Fecha de entrega</label>
                                        <input type="date" min="<?php echo $minDate; ?>"  class="form-control rounded-3" name="fecha_entrega_productos"require>


                                        <label for="cantidad_productos" class="form-label ">Cantidad de productos</label>
                                        <input type="number" min="0" class="form-control rounded-3" placeholder="15" name="cantidad_productos" require>
                                        
                                        <label for="cod_ruta_asociada" class="form-label">Ruta asociada</label>
                                        <select class="form-select" aria-label="Default select example" name="cod_ruta_asociada"  required>
                                            <option selected>Ruta</option>

                                            <?php
                                                for ($i=0; $i < count($res2); $i++) { 
                                                    echo
                                                    "
                                                        <option value='".($i+1)."'>".$res2[$i]['nombre_ruta']."</option>
                                                    ";
                                                }
                                            ?>
                                        </select>

                                        <div class="d-grid pt-3">
                                            <button type="submit" class="boton-enviar"> 
                                                Enviar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Pie -->       
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary bg-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $user = new Cliente();
                    $reg2 = $user->verCli2();
                ?>
                <!--=========== Habilitar ===========-->
                <div class="habilitar">
                    <!-- Habilitar -->
                    <button type="button" class="btn_habilitar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Habilitar
                    </button>
                        
                    <!-- Modal -->
                    <div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content ">
                                <div class="modal-header ">
                                    <h5 class="modal-title" id="exampleModalLabel">Clientes Deshabilitados</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="table table-striped">
                                            <table class="table table-striped table-hover id="table_id">
                                                <thead>
                                                    <th>ID cliente</th>
                                                    <th>Nombre cliente</th>
                                                    <th>Persona contacto</th>
                                                    <th>Direccion cliente</th>
                                                    <th>Ciudad cliente</th>
                                                    <th>Fecha entrega productos</th>
                                                    <th>Cantidad de productos</th>
                                                    <th>Ruta asociada</th>
                                                    <th>Rol</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        for ($i=0; $i < count($reg2); $i++) { 
                                                            echo
                                                            "<tr>
                                                                <td>".$reg2[$i]['id_cliente']."</td>
                                                                <td>".$reg2[$i]['nombre_cliente']."</td>
                                                                <td>".$reg2[$i]['persona_contacto']."</td>
                                                                <td>".$reg2[$i]['direccion_cliente']."</td>
                                                                <td>".$reg2[$i]['nombre_ciudad']."</td>
                                                                <td>".$reg2[$i]['fecha_entrega_productos']."</td>
                                                                <td>".$reg2[$i]['cantidad_productos']."</td>
                                                                <td>".$reg2[$i]['nombre_ruta']."</td>
                                                                <td>".$reg2[$i]['nombre_rol']."</td>
                                                            ";
                                                    ?>
                                                    ?>
                                                        
                                                        <td align="center">
                                                            <button class=" boton-eliminar green"  onclick="habilitar('../class/deshabilitar_cliente.php?id=<?php echo $reg2[$i]['id_cliente'];?>')">
                                                                <span class="text">Habilitar</span>
                                                                <span class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="m10.933 13.519-2.226-2.226-1.414 1.414 3.774 3.774 5.702-6.84-1.538-1.282z"></path><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z"></path></svg>
                                                                </span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary bg-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--=========== Vista ===========-->
            <?php
                $clien = new Cliente();
                $reg = $clien->verCli();
            ?>
            <!--Card Crud-->
            <div class="card card-crud card_usuarios">
                <div class="titulo-crud">
                    <p>Clientes</p>
                </div>
                <div class="tools">
                    <div class="circle">
                        <span class="red box"></span>
                    </div>
                    <div class="circle">
                        <span class="yellow box"></span>
                    </div>
                    <div class="circle">
                        <span class="green box"></span>
                    </div>
                </div>

                <div class="card__content">
                    <!--CRUD-->
                    <div class="table table-striped">
                        <table class="table table-striped table-hover" id="tabla">
                            <thead>
                                <tr>
                                    <th>ID cliente</th>
                                    <th>Nombre cliente</th>
                                    <th>Persona contacto</th>
                                    <th>Direccion cliente</th>
                                    <th>Ciudad cliente</th>
                                    <th>Fecha entrega productos</th>
                                    <th>Cantidad de productos</th>
                                    <th>Ruta asociada</th>
                                    <th>Rol</th>
                                    <th>Editar</th>
                                    <th>Deshabilitar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $ciu = new Ciudad;
                                    
                                    for ($i=0; $i < count($reg); $i++) { 
                                        echo
                                        "<tr>
                                            <td>".$reg[$i]['id_cliente']."</td>
                                            <td>".$reg[$i]['nombre_cliente']."</td>
                                            <td>".$reg[$i]['persona_contacto']."</td>
                                            <td>".$reg[$i]['direccion_cliente']."</td>
                                            <td>".$reg[$i]['nombre_ciudad']."</td>
                                            <td>".$reg[$i]['fecha_entrega_productos']."</td>
                                            <td>".$reg[$i]['cantidad_productos']."</td>
                                            <td>".$reg[$i]['nombre_ruta']."</td>
                                            <td>".$reg[$i]['nombre_rol']."</td>
                                        ";
                                        $id = $reg[$i]['id_cliente'];
                                ?>
                                    <td align="center">
                                        <button class=" boton-eliminar boton-des blue" onclick=window.location="../class/editar_cliente.php?id=<?php echo $id;?>&vista=0&nom_user=<?php echo $nom_user;?>">
                                        
                                            <span class="text">Editar</span>
                                            <span class="icon">
                                                <svg enable-background="new 0 0 64 64" height="64px" id="Layer_1" version="1.1" viewBox="0 0 64 64" width="64px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M55.736,13.636l-4.368-4.362c-0.451-0.451-1.044-0.677-1.636-0.677c-0.592,0-1.184,0.225-1.635,0.676l-3.494,3.484   l7.639,7.626l3.494-3.483C56.639,15.998,56.639,14.535,55.736,13.636z"/><polygon points="21.922,35.396 29.562,43.023 50.607,22.017 42.967,14.39  "/><polygon points="20.273,37.028 18.642,46.28 27.913,44.654  "/><path d="M41.393,50.403H12.587V21.597h20.329l5.01-5H10.82c-1.779,0-3.234,1.455-3.234,3.234v32.339   c0,1.779,1.455,3.234,3.234,3.234h32.339c1.779,0,3.234-1.455,3.234-3.234V29.049l-5,4.991V50.403z"/></g></svg>
                                            </span>
                                        </button>
                                    </td>
                                    <td align="center">
                                        <button class=" boton-eliminar"  onclick="deshabilitar('../class/deshabilitar_cliente.php?id=<?php echo $reg[$i]['id_cliente'];?>')">
                                            <span class="text">Deshabilitar</span>
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                                </svg>
                                                
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

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
                window.location='../index.php';
            }
        });
        </script>";
    }
?>

    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    
    <script src="../js/script.js"></script>
    <script src="../js/script_tabla.js"></script>
    </body>
</html>