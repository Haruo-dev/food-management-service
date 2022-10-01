

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/icon_pagina.png">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../sw/dist/sweetalert2.min.css">
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
    <title>ALIMENTAMOS S.A</title>
  </head>
  <body">

<?php
class Conexion{
    public static function con(){
      $host="localhost";
      $user="root";
      $pass="";
      $dbname="alimentamos";
      //realizamos la conexion a la bd
      $link=mysqli_connect($host,$user,$pass)
      or die ("ERROR AL CONECTAR LA BD".mysqli_error($link));
      //SETEAR LA bd
      mysqli_query($link,"SET NAMES 'utf8'");
      //seleccionamos la bd
      mysqli_select_db($link,$dbname)
      or die ("ERROR AL SELECCIONAR LA BD".mysqli_error($link));
      return $link;  
    }
}

class Usuarios {
  private $user;

  public function __construct(){
    $this->user=array();
  }

  //insertar usuario
  public function insertar($id, $nom, $email, $pass, $rol, $res,$user){
    $sql = "insert into usuario values($id,'$nom','$email','$pass',$rol,'$res','')";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Operacion Exitosa',
              text: 'Se inserto el usuario con id = $id',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result)=>{
              if(result.isConfirmed){
                window.location='../admin/usuarios.php?nom_user=$user';
            }
            });
          </script>";
  }

  //ver usuario
  public function veruser(){
    $sql="select * from usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol where estado = 0";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->user[]=$row;
    }
    return $this->user;
  }
  //ver usuario2
  public function veruser2(){
    $sql="select * from usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol where estado = 1";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->user[]=$row;
    }
    return $this->user;
  }


  //editar usuario
  //obtener id
  public function get_emple_id($id){
    $sql="select * from usuario where id_usuario=$id";
    $res=mysqli_query(Conexion::con(),$sql);
    if($reg=mysqli_fetch_assoc($res)){
      $this->emple[]=$reg;
    }
      return $this->emple;
  }

  //editar
  public function edituser($id,$nom,$email,$rol,$pass,$res){

    if (!preg_match("/^[\d]$/",$id)) {
      echo "<script type='text/javascript'>
      Swal.fire({
          title: '¡ID de usuario incorrecto!',
          icon: 'warning',
          text: 'El ID de usuario no puede ser negativo',
          backdrop: `
              RGB(244, 244, 225)
              url('../img/food_sad-1.gif')
              top
              no-repeat
          `    
          }).then((result)=>{
              if(result.isConfirmed){
                  window.location='../admin/usuarios.php';
              }
          });
      </script>";
  } else {
      if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nom)) {
          echo "<script type='text/javascript'>
          Swal.fire({
              title: '¡Nombre de usuario incorrecto!',
              icon: 'warning',
              text: 'El nombre de usuario no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
              backdrop: `
                  RGB(244, 244, 225)
                  url('../img/food_sad-1.gif')
                  top
                  no-repeat
              `    
              }).then((result)=>{
                  if(result.isConfirmed){
                      window.location='../admin/usuarios.php';
                  }
              });
          </script>";
      } else {
          if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]/",$email)) {
              echo "<script type='text/javascript'>
              Swal.fire({
                  title: '¡Correo incorrecto!',
                  icon: 'warning',
                  text: 'Formato de correo no permitido',
                  backdrop: `
                      RGB(244, 244, 225)
                      url('../img/food_sad-1.gif')
                      top
                      no-repeat
                  `    
                  }).then((result)=>{
                      if(result.isConfirmed){
                          window.location='../admin/usuarios.php';
                      }
                  });
              </script>";
          } else {
              if (!preg_match("/^[a-zA-Z0-9._-]{5,15}$/",$pass)){
                  echo "<script type='text/javascript'>
                  Swal.fire({
                      title: '¡Contraseña incorrecta!',
                      icon: 'warning',
                      text: 'Formato de contraseña incorrecta, no se permiten caracteres alfanumericos',
                      backdrop: `
                          RGB(244, 244, 225)
                          url('../img/food_sad-1.gif')
                          top
                          no-repeat
                      `    
                      }).then((result)=>{
                          if(result.isConfirmed){
                              window.location='../admin/usuarios.php';
                          }
                      });
                  </script>";
              } else {
                if (!preg_match("/^[a-zA-Z0-9\s]{4,20}$/",$res)) {
                  echo "<script type='text/javascript'>
                  Swal.fire({
                      title: '¡Respuesta incorrecta!',
                      icon: 'warning',
                      text: 'Formato de respuesta incorrecta, no se permiten caracteres especiales ni que sea menor de 4 caracteres o mayor que 50',
                      backdrop: `
                          RGB(244, 244, 225)
                          url('../img/food_sad-1.gif')
                          top
                          no-repeat
                      `    
                      }).then((result)=>{
                          if(result.isConfirmed){
                              window.location='../admin/usuarios.php';
                          }
                      });
                  </script>";
                } else {
                  $sql="update usuario set nombre_de_usuario='$nom',correo_usuario='$email',contraseña_usuario='$pass',id_rol='$rol',respuesta='$res', estado ='' where id_usuario=$id";
                  $res=mysqli_query(Conexion::con(),$sql);

                  echo "<script type='text/javascript'>
                        Swal.fire({
                          icon : 'success',
                          title : 'Exito!!',
                          text : 'El usuario $nom fuen modificado Correctamente',
                          backdrop: `
                                  RGB(237, 250, 229)
                                  url('../img/food_happy-1.gif')
                                  top
                                  no-repeat
                          `
                        }).then((result) => {
                          if (result.isConfirmed) {
                          window.location='../admin/usuarios.php'  
                        }
                      });
                    </script>";
                }
                
              }
          }
      }
  }

  }
  // deshabilitar
  public function desuser($id) {
    $user = new Usuarios();
    $reg = $user->get_emple_id($id);
    
    if ($reg[0]['estado'] == 0) {
      $sql="update usuario set estado = 1 where id_usuario = $id";
      $res=mysqli_query(Conexion::con(),$sql);
      
      echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El usuario con id = $id fue deshabilitado correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/usuarios.php'  
          }
        });
      </script>";
    } 
    
    if ($reg[0]['estado']  == 1) {

      $sql="update usuario set estado = 0 where id_usuario = $id";
      $res=mysqli_query(Conexion::con(),$sql);

      echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El empleado con id $id fue habilitado correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/usuarios.php'  
          }
        });
      </script>";
    }
  }
  //eliminar
  public function eliuser($id){
    $sql="delete from usuario where id_usuario=$id";
    $res=mysqli_query(Conexion::con(),$sql);
    echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El empleado con id $id fue eliminado Correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/usuarios.php'  
          }
        });
      </script>";
  }

  //Recuperar conraseña
public function recuperar($correo_usuario, $respuesta) {

      $sql = "select contraseña_usuario from usuario where correo_usuario='$correo_usuario' and respuesta='$respuesta'";
      $res = mysqli_query(Conexion::con(),$sql);
    
      
      if($reg=mysqli_fetch_assoc($res)){
        $contraseña= $reg['contraseña_usuario'];

          echo "<script type='text/javascript'>
          Swal.fire({
            icon: 'success',
            title: 'Operacion Exitosa',
            text: 'Su contraseña es = $contraseña',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result)=>{
            if(result.isConfirmed){
              window.location='./login.php';
          }
          });
        </script>";

      } else {

        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'ERROR!!!',
            text: 'No existe el usuario $correo_usuario',
            backdrop: `
                RGB(244, 244, 225)
                url('../img/food_sad-3.gif')
                top
                no-repeat
            ` 
        }).then((result)=>{
            if(result.isConfirmed){
                window.location='./recuperar.php';
            }
        });
        </script>";
      }
      
  }
}

class Sede {
  private $sede;

  public function __construct(){
    $this->sede=array();
  }

  //ver producto
  public function versede(){
    $sql="select * from sede_principal INNER JOIN ciudad  ON sede_principal.cod_ciudad_sede = ciudad.cod_ciudad";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla producto y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->sede[]=$row;
    }
    return $this->sede;
  }
}
//=============== Productos =============== 
class Productos {
  private $prod;

  public function __construct(){
    $this->prod=array();
  }

  //insertar producto
  public function insertar($cod_producto, $nombre_producto, $descripcion, $valor_producto,$user){
    $sql = "insert into producto values('$cod_producto','$nombre_producto','$descripcion',$valor_producto,'')";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Operacion Exitosa',
              text: 'Se inserto el producto con codigo = $cod_producto',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result)=>{
              if(result.isConfirmed){
                window.location='../admin/producto_admin.php?nom_user=$user';
            }
            });
          </script>";
  }
  public function insertar2($cod_producto, $nombre_producto, $descripcion, $valor_producto,$user){
    $sql = "insert into producto values('$cod_producto','$nombre_producto','$descripcion',$valor_producto,'')";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Operacion Exitosa',
              text: 'Se inserto el producto con codigo = $cod_producto',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result)=>{
              if(result.isConfirmed){
                window.location='../trabajador/producto_trabajador.php?nom_user=$user';
            }
            });
          </script>";
  }
  //ver producto
  public function verproducto(){
    $sql="select * from producto where estado = 0";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla producto y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->prod[]=$row;
    }
    return $this->prod;
  }
  public function verproducto2(){
    $sql="select * from producto where estado = 1";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla producto y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->prod[]=$row;
    }
    return $this->prod;
  }


  //editar producto
  //obtener id
  public function get_emple_cod($cod){
    $sql="select * from producto where cod_producto='$cod'";
    $res=mysqli_query(Conexion::con(),$sql);
    if($reg=mysqli_fetch_assoc($res)){
      $this->prod[]=$reg;
    }
      return $this->prod;
  }

  //editar
  public function editproducto($cod_producto,$nombre_producto,$descripcion,$valor_producto, $vista, $nom_user){
    // Admin
    if ($vista == 0) {
      if (!preg_match("/^[\d]$/",$cod_producto)){
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
          if (!preg_match("/^[a-zA-Z0-9]{4,30}$/",$nombre_producto)){
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
          
            if (!preg_match("/[\d]/",$valor_producto)){
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
              $sql="update producto set nombre_producto='$nombre_producto',descripcion='$descripcion',valor_producto='$valor_producto', estado='' where cod_producto='$cod_producto'";
              $res=mysqli_query(Conexion::con(),$sql);
              echo "<script type='text/javascript'>
                    Swal.fire({
                      icon : 'success',
                      title : 'Exito!!',
                      text : 'El producto con cod $cod_producto fuen modificado Correctamente',
                      backdrop: `
                        RGB(237, 250, 229)
                        url('../img/food_happy-1.gif')
                        top
                        no-repeat
                      `
                    }).then((result) => {
                      if (result.isConfirmed) {
                      window.location='../admin/producto_admin.php?nom_user=$nom_user'  
                    }
                  });
                </script>";
            }
          }
        
      }
    }
    // Trabajador
    if ($vista == 1) {
      if (!preg_match("/^[\d]$/",$cod_producto)){
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
          if (!preg_match("/^[a-zA-Z0-9]{4,30}$/",$nombre_producto)){
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
          
            if (!preg_match("/[\d]/",$valor_producto)){
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
              $sql="update producto set nombre_producto='$nombre_producto',descripcion='$descripcion',valor_producto='$valor_producto', estado='' where cod_producto='$cod_producto'";
              $res=mysqli_query(Conexion::con(),$sql);
              echo "<script type='text/javascript'>
                    Swal.fire({
                      icon : 'success',
                      title : 'Exito!!',
                      text : 'El producto con cod $cod_producto fuen modificado Correctamente',
                      backdrop: `
                        RGB(237, 250, 229)
                        url('../img/food_happy-1.gif')
                        top
                        no-repeat
                      `
                    }).then((result) => {
                      if (result.isConfirmed) {
                      window.location='../trabajador/producto_trabajador.php?nom_user=$nom_user'  
                    }
                  });
                </script>";
            }
          }
        
      }
    }
    
}

// deshabilitar
public function get_proy_id($cod){
  $sql="select * from producto where cod_producto=$cod";
  $res=mysqli_query(Conexion::con(),$sql);
  if($reg=mysqli_fetch_assoc($res)){
    $this->produ[]=$reg;
  }
    return $this->produ;
}

public function desprod($cod) {
  $user = new Productos();
  $reg = $user->get_proy_id($cod);
  
  if ($reg[0]['estado'] == 0) {
    $sql="update producto set estado = 1 where cod_producto = $cod";
    $res=mysqli_query(Conexion::con(),$sql);
    
    echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text : 'El producto con codigo = $cod fue deshabilitado correctamente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result) => {
          if (result.isConfirmed) {
            window.location='../admin/producto_admin.php'  
        }
      });
    </script>";
  } 
  
  if ($reg[0]['estado']  == 1) {

    $sql="update producto set estado = 0 where cod_producto = $cod";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text : 'El producto con codigo = $cod fue habilitado correctamente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result) => {
          if (result.isConfirmed) {
            window.location='../admin/producto_admin.php'  
        }
      });
    </script>";
  }
}
  //eliminar
  public function eliprod($cod){
    $sql="delete from producto where cod_producto='$cod'";
    $res=mysqli_query(Conexion::con(),$sql);
    echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El empleado con id $cod fue eliminado Correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/producto_admin.php'  
          }
        });
      </script>";
  }
}

//=============== Proveedor =============== 
class Proveedor {
  private $prov;

  public function __construct(){
    $this->prov=array();
  }

  //insertar proveedor
  public function insertar($nit, $nombre_proveedor, $persona_contacto, $direccion_proveedor,$id_sede,$cod_producto,$user){
    $sql = "insert into proveedor values($nit,'$nombre_proveedor','$persona_contacto','$direccion_proveedor',$id_sede,$cod_producto, '')";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Operacion Exitosa',
              text: 'Se inserto el proveedor con nit = $nit',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result)=>{
              if(result.isConfirmed){
                window.location='../admin/proveedor_admin.php?nom_user=$user';
            }
            });
          </script>";
  }
  public function insertar2($nit, $nombre_proveedor, $persona_contacto, $direccion_proveedor,$id_sede,$cod_producto,$user){
    $sql = "insert into proveedor values($nit,'$nombre_proveedor','$persona_contacto','$direccion_proveedor',$id_sede,$cod_producto, '')";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Operacion Exitosa',
              text: 'Se inserto el proveedor con nit = $nit',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result)=>{
              if(result.isConfirmed){
                window.location='../trabajador/proveedor_trabajador.php?nom_user=$user';
            }
            });
          </script>";
  }

  //ver proveedor
  public function verproveedor(){
    $sql="select * from proveedor INNER JOIN producto ON proveedor.cod_producto = producto.cod_producto
    INNER JOIN sede_principal on proveedor.id_sede = sede_principal.id_sede
    where proveedor.estado = 0";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla producto y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->prov[]=$row;
    }
    return $this->prov;
  }

  public function verproveedor2(){
    $sql="select * from proveedor INNER JOIN producto ON proveedor.cod_producto = producto.cod_producto
    INNER JOIN sede_principal on proveedor.id_sede = sede_principal.id_sede
    where proveedor.estado = 1";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla producto y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->prov[]=$row;
    }
    return $this->prov;
  }

  //editar producto
  //obtener id
  public function get_emple_nit($nit){
    $sql="select * from proveedor where nit='$nit'";
    $res=mysqli_query(Conexion::con(),$sql);
    if($reg=mysqli_fetch_assoc($res)){
      $this->prov[]=$reg;
    }
      return $this->prov;
  }

  //editar
  public function editproveedor($nit, $nombre_proveedor, $persona_contacto, $direccion_proveedor,$id_sede,$cod_producto,$vista ,$nom_user){
    // Admin
    if ($vista == 0) {
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
      if (!preg_match("/[a-zA-Z0-9\s]{4,30}/",$nombre_proveedor)){
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
                $sql="update proveedor set nombre_proveedor='$nombre_proveedor',persona_conctacto='$persona_contacto',direccion_proveedor='$direccion_proveedor',id_sede='$id_sede',cod_producto='$cod_producto', estado = '' where nit='$nit'";
                $res=mysqli_query(Conexion::con(),$sql);
                echo "<script type='text/javascript'>
                      Swal.fire({
                        icon : 'success',
                        title : 'Exito!!',
                        text : 'El proveedor con NIT $nit fuen modificado Correctamente',
                        backdrop: `
                          RGB(237, 250, 229)
                          url('../img/food_happy-1.gif')
                          top
                          no-repeat
                        `
                      }).then((result) => {
                        if (result.isConfirmed) {
                        window.location='../admin/proveedor_admin.php?nom_user=$nom_user'  
                      }
                    });
                  </script>";
              }
            }
          }
        }
      }
    }
    }
    // Trabajador
    if ($vista == 1) {
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
      if (!preg_match("/[a-zA-Z0-9\s]{4,30}/",$nombre_proveedor)){
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
                            window.location='../atrabajador/proveedor_trabajador.php?nom_user=$nom_user';
                        }
                    });
                </script>";
              } else {
                $sql="update proveedor set nombre_proveedor='$nombre_proveedor',persona_conctacto='$persona_contacto',direccion_proveedor='$direccion_proveedor',id_sede='$id_sede',cod_producto='$cod_producto', estado = '' where nit='$nit'";
                $res=mysqli_query(Conexion::con(),$sql);
                echo "<script type='text/javascript'>
                      Swal.fire({
                        icon : 'success',
                        title : 'Exito!!',
                        text : 'El proveedor con NIT $nit fuen modificado Correctamente',
                        backdrop: `
                          RGB(237, 250, 229)
                          url('../img/food_happy-1.gif')
                          top
                          no-repeat
                        `
                      }).then((result) => {
                        if (result.isConfirmed) {
                        window.location='../trabajador/proveedor_trabajador.php?nom_user=$nom_user'  
                      }
                    });
                  </script>";
              }
            }
          }
        }
      }
    }
    }
    
  }

//obtener id
public function get_prove_id($nit){
  $sql="select * from proveedor where nit = $nit";
  $res=mysqli_query(Conexion::con(),$sql);
  if($reg=mysqli_fetch_assoc($res)){
    $this->prove[]=$reg;
  }
    return $this->prove;
}
  // deshabilitar
public function desprove($nit) {
    $user = new Proveedor;
    $reg = $user->get_prove_id($nit);
    
    if ($reg[0]['estado'] == 0) {
      $sql="update proveedor set estado = 1 where nit = $nit";
      $res=mysqli_query(Conexion::con(),$sql);
      
      echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El proveedor con nit = $nit fue deshabilitado correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/proveedor_admin.php'  
          }
        });
      </script>";
    } 
    
    if ($reg[0]['estado']  == 1) {

      $sql="update proveedor set estado = 0 where nit = $nit";
      $res=mysqli_query(Conexion::con(),$sql);

      echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El proveedor con nit = $nit fue habilitado correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/proveedor_admin.php'  
          }
        });
      </script>";
    }
  }
  //eliminar
  public function eliprove($nit){
    $sql="delete from proveedor where nit='$nit'";
    $res=mysqli_query(Conexion::con(),$sql);
    echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El proveedor con NIT $nit fue eliminado Correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/proveedor_admin.php'  
          }
        });
      </script>";
  }
}

//=============== Ciudad =============== 
class Ciudad {
  private $ciu;

  public function __construct(){
    $this->ciu=array();
  }

  //obtener id
  public function get_ciud_cod($cod){
    $sql="select * from ciudad where cod_ciudad=cod";
    $res=mysqli_query(Conexion::con(),$sql);
    if($reg=mysqli_fetch_assoc($res)){
      $this->ciu[]=$reg;
    }
      return $this->ciu;
  }
  
  public function verciu(){
    $sql="select * from ciudad";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->ciu[]=$row;
    }
    return $this->ciu;
  }

  public function verciu_id($id){
    $sql="select * from ciudad where cod_ciudad = $id";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->ciu[]=$row;
    }
    return $this->ciu;
  }
}


//=============== Ruta =============== 
class Ruta {
  private $ruta;

  public function __construct(){
    $this->ruta=array();
  }

///====== Obtener cod  /======
public function get_rut_cod($cod){
  $sql="select * from ruta where cod_ruta=$cod";
  $res=mysqli_query(Conexion::con(),$sql);
  if($reg=mysqli_fetch_assoc($res)){
    $this->cod[]=$reg;
  }
    return $this->cod;
}

///====== ver ruta /======
  public function verRu(){
    $sql="select * from ruta 
    INNER JOIN sede_principal ON ruta.id_sede_principal = sede_principal.id_sede 
    INNER JOIN ciudad ON ruta.cod_ciudad_origen = ciudad.cod_ciudad where ruta.estado = 0";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->ruta[]=$row;
    }
    return $this->ruta;
  }

///====== ver ruta2 /======
  public function verRu2(){
    $sql="select * from ruta 
    INNER JOIN sede_principal ON ruta.id_sede_principal = sede_principal.id_sede 
    INNER JOIN ciudad ON ruta.cod_ciudad_origen = ciudad.cod_ciudad where ruta.estado = 1";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->ruta[]=$row;
    }
    return $this->ruta;
  }

///====== Insertar ruta /======
  public function insertar($cod_ruta, $nombre_ruta, $id_sede_principal, $fecha_apertura, $cod_ciudad_origen,$cod_ciudad_destino,$costo_ruta,$fecha_cambio_costo,$user){
    $sql = "insert into ruta values($cod_ruta,'$nombre_ruta',$id_sede_principal,'$fecha_apertura',$cod_ciudad_origen,$cod_ciudad_destino,$costo_ruta,'$fecha_cambio_costo','')";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Operacion Exitosa',
              text: 'Se inserto la ruta con cod = $cod_ruta',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result)=>{
              if(result.isConfirmed){
                window.location='../admin/ruta_admin.php?nom_user=$user';
            }
            });
          </script>";
  }
  public function insertar2($cod_ruta, $nombre_ruta, $id_sede_principal, $fecha_apertura, $cod_ciudad_origen,$cod_ciudad_destino,$costo_ruta,$fecha_cambio_costo,$user){
    $sql = "insert into ruta values($cod_ruta,'$nombre_ruta',$id_sede_principal,'$fecha_apertura',$cod_ciudad_origen,$cod_ciudad_destino,$costo_ruta,'$fecha_cambio_costo','')";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Operacion Exitosa',
              text: 'Se inserto la ruta con cod = $cod_ruta',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result)=>{
              if(result.isConfirmed){
                window.location='../trabajador/ruta_trabajador.php?nom_user=$user';
            }
            });
          </script>";
  }

///====== editar  ruta /======
  public function editRuta($cod_ruta, $nombre_ruta, $id_sede_principal, $fecha_apertura, $cod_ciudad_origen,$cod_ciudad_destino,$costo_ruta,$fecha_cambio_costo,$vista,$nom_user){
    // Admin
    if ($vista == 0) {
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
              $sql = "update ruta set cod_ruta = '$cod_ruta', nombre_ruta = '$nombre_ruta',
              id_sede_principal = '$id_sede_principal', fecha_apertura = '$fecha_apertura',
              cod_ciudad_origen = '$cod_ciudad_origen',cod_ciudad_destino = '$cod_ciudad_destino',
              costo_ruta = '$costo_ruta', fecha_cambio_costo = '$fecha_cambio_costo' where cod_ruta = '$cod_ruta'";
              
              $res=mysqli_query(Conexion::con(),$sql);
              echo "<script type='text/javascript'>
                      Swal.fire({
                        icon : 'success',
                        title : 'Exito!!',
                        text : 'La ruta con codigo = $cod_ruta fuen modificado Correctamente',
                        backdrop: `
                          RGB(237, 250, 229)
                          url('../img/food_happy-1.gif')
                          top
                          no-repeat
                        `
                      }).then((result) => {
                        if (result.isConfirmed) {
                        window.location='../admin/ruta_admin.php?nom_user=$nom_user''  
                      }
                    });
                  </script>";
            }
        }
    }
    }
    // Trabajador
    if ($vista == 1) {
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
              $sql = "update ruta set cod_ruta = '$cod_ruta', nombre_ruta = '$nombre_ruta',
              id_sede_principal = '$id_sede_principal', fecha_apertura = '$fecha_apertura',
              cod_ciudad_origen = '$cod_ciudad_origen',cod_ciudad_destino = '$cod_ciudad_destino',
              costo_ruta = '$costo_ruta', fecha_cambio_costo = '$fecha_cambio_costo' where cod_ruta = '$cod_ruta'";
              
              $res=mysqli_query(Conexion::con(),$sql);
              echo "<script type='text/javascript'>
                      Swal.fire({
                        icon : 'success',
                        title : 'Exito!!',
                        text : 'La ruta con codigo = $cod_ruta fuen modificado Correctamente',
                        backdrop: `
                          RGB(237, 250, 229)
                          url('../img/food_happy-1.gif')
                          top
                          no-repeat
                        `
                      }).then((result) => {
                        if (result.isConfirmed) {
                        window.location='../trabajador/ruta_trabajador.php?nom_user=$nom_user''  
                      }
                    });
                  </script>";
            }
        }
    }
    }
    
  }

///====== edeshabilitar ruta /======
public function desRuta($cod) {
  $ruta = new Ruta;
  $reg = $ruta->get_rut_cod($cod);
  
  if ($reg[0]['estado'] == 0) {
    $sql="update ruta set estado = 1 where cod_ruta = $cod";
    $res=mysqli_query(Conexion::con(),$sql);
    
    echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text : 'La ruta con codigo = $cod fue deshabilitado correctamente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result) => {
          if (result.isConfirmed) {
            window.location='../admin/ruta_admin.php'  
        }
      });
    </script>";
  } 
  
  if ($reg[0]['estado']  == 1) {

    $sql="update ruta set estado = 0 where cod_ruta = $cod";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text : 'La ruta con codigo = $cod fue habilitado correctamente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result) => {
          if (result.isConfirmed) {
            window.location='../admin/ruta_admin.php'  
        }
      });
    </script>";
  }
}
}

//=============== Conductor =============== 
class Conductor {
  private $conduct;

  public function __construct(){
    $this->conduct=array();
  }

///====== Obtener id  /======
  public function get_id_cond($id){
    $sql="select * from conductor where id_conductor = $id";
    $res=mysqli_query(Conexion::con(),$sql);

    if($reg=mysqli_fetch_assoc($res)){
      $this->cod[]=$reg;
    }
      return $this->cod;
  }

///====== ver conductor /======
  public function verCon(){
    $sql="select * from conductor 
    INNER JOIN ruta ON conductor.cod_ruta = ruta.cod_ruta 
    INNER JOIN rol ON conductor.id_rol = rol.id_rol 
    where conductor.estado = 0";
    
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->conduct[]=$row;
    }
    return $this->conduct;
  }
  public function verCon2(){
    $sql="select * from conductor 
    INNER JOIN ruta ON conductor.cod_ruta = ruta.cod_ruta 
    INNER JOIN rol ON conductor.id_rol = rol.id_rol 
    where conductor.estado = 1";
    
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->conduct[]=$row;
    }
    return $this->conduct;
  }

///====== Insertar conductor /======
  public function insertar ($id_conductor, $nombres_conductor, $apellidos_conductor, $direccion_conductor, $fecha_ingreso_empresa, $fecha_asignacion_ruta, $cod_ruta, $id_rol, $nom_user) {
    $sql = "insert into conductor values($id_conductor, '$nombres_conductor', '$apellidos_conductor', '$direccion_conductor', '$fecha_ingreso_empresa', '$fecha_asignacion_ruta', $cod_ruta, $id_rol,'')";
    $res=mysqli_query(Conexion::con(),$sql);
    echo "hola";
      echo "<script type='text/javascript'>
      Swal.fire({
        icon: 'success',
        title: 'Operacion Exitosa',
        text: 'Se inserto el conductor con ID = $id_conductor',
        backdrop: `
          RGB(237, 250, 229)
          url('../img/food_happy-1.gif')
          top
          no-repeat
        `
      }).then((result)=>{
        if(result.isConfirmed){
          window.location='../admin/conductor_admin.php?nom_user=$nom_user';
      }
      });
    </script>";
  }
  public function insertar2($id_conductor, $nombres_conductor, $apellidos_conductor, $direccion_conductor, $fecha_ingreso_empresa, $fecha_asignacion_ruta, $cod_ruta, $id_rol, $nom_user) {
    $sql = "insert into conductor values($id_conductor, '$nombres_conductor', '$apellidos_conductor', '$direccion_conductor', '$fecha_ingreso_empresa', '$fecha_asignacion_ruta', $cod_ruta, $id_rol,'')";
    $res=mysqli_query(Conexion::con(),$sql);
    echo "hola";
      echo "<script type='text/javascript'>
      Swal.fire({
        icon: 'success',
        title: 'Operacion Exitosa',
        text: 'Se inserto el conductor con ID = $id_conductor',
        backdrop: `
          RGB(237, 250, 229)
          url('../img/food_happy-1.gif')
          top
          no-repeat
        `
      }).then((result)=>{
        if(result.isConfirmed){
          window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user';
      }
      });
    </script>";
  }

///====== editar conductor /======
  public function ediCon($id_conductor, $nombres_conductor, $apellidos_conductor, $direccion_conductor, $fecha_ingreso_empresa, $fecha_asignacion_ruta, $cod_ruta, $id_rol, $vista, $nom_user){
  
    // Admin
  if ($vista == 0) {
    if (!preg_match("/^[\d]$/",$id_conductor)) {
      echo "<script type='text/javascript'>
      Swal.fire({
          title: '¡ID de conductor incorrecto!',
          icon: 'warning',
          text: 'El ID del conductor no puede ser negativo',
          backdrop: `
              RGB(244, 244, 225)
              url('../img/food_sad-1.gif')
              top
              no-repeat
          `    
          }).then((result)=>{
              if(result.isConfirmed){
                  window.location='../admin/conductor_admin.php?nom_user=$nom_user';
              }
          });
      </script>";
    } else {
      if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombres_conductor)) {
          echo "<script type='text/javascript'>
          Swal.fire({
              title: '¡Nombres del conductor incorrecto!',
              icon: 'warning',
              text: 'Los nombres del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
              backdrop: `
                  RGB(244, 244, 225)
                  url('../img/food_sad-1.gif')
                  top
                  no-repeat
              `    
              }).then((result)=>{
                  if(result.isConfirmed){
                      window.location='../admin/conductor_admin.php?nom_user=$nom_user';
                  }
              });
          </script>";
      } else {
          if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$apellidos_conductor)) {
              echo "<script type='text/javascript'>
              Swal.fire({
                  title: '¡Apellidos del conductor incorrecto!',
                  icon: 'warning',
                  text: 'Los apellidos del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                  backdrop: `
                      RGB(244, 244, 225)
                      url('../img/food_sad-1.gif')
                      top
                      no-repeat
                  `    
                  }).then((result)=>{
                      if(result.isConfirmed){
                          window.location='../admin/conductor_admin.php?nom_user=$nom_user';
                      }
                  });
              </script>";
          } else {

            $sql = "update conductor set id_conductor = '$id_conductor', nombres_conductor = '$nombres_conductor',
            apellidos_conductor = '$apellidos_conductor', direccion_conductor = '$direccion_conductor',
            fecha_ingreso_empresa = '$fecha_ingreso_empresa', fecha_asignacion_ruta = '$fecha_asignacion_ruta',
            cod_ruta = '$cod_ruta', id_rol = '$id_rol'
            where id_conductor = '$id_conductor'
            ";

            $res=mysqli_query(Conexion::con(),$sql);
            echo "<script type='text/javascript'>
                    Swal.fire({
                      icon : 'success',
                      title : 'Exito!!',
                      text : 'El conductor con id = $id_conductor fuen modificado Correctamente',
                      backdrop: `
                        RGB(237, 250, 229)
                        url('../img/food_happy-1.gif')
                        top
                        no-repeat
                      `
                    }).then((result) => {
                      if (result.isConfirmed) {
                      window.location='../admin/conductor_admin.php?nom_user=$nom_user'  
                    }
                  });
                </script>";
          }
      }
  }
  }

  // Trabajador
  if ($vista == 1) {
    if (!preg_match("/^[\d]$/",$id_conductor)) {
      echo "<script type='text/javascript'>
      Swal.fire({
          title: '¡ID de conductor incorrecto!',
          icon: 'warning',
          text: 'El ID del conductor no puede ser negativo',
          backdrop: `
              RGB(244, 244, 225)
              url('../img/food_sad-1.gif')
              top
              no-repeat
          `    
          }).then((result)=>{
              if(result.isConfirmed){
                  window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user';
              }
          });
      </script>";
    } else {
      if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$nombres_conductor)) {
          echo "<script type='text/javascript'>
          Swal.fire({
              title: '¡Nombres del conductor incorrecto!',
              icon: 'warning',
              text: 'Los nombres del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
              backdrop: `
                  RGB(244, 244, 225)
                  url('../img/food_sad-1.gif')
                  top
                  no-repeat
              `    
              }).then((result)=>{
                  if(result.isConfirmed){
                      window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user';
                  }
              });
          </script>";
      } else {
          if (!preg_match("/^[a-zA-Z0-9\s]{4,15}$/",$apellidos_conductor)) {
              echo "<script type='text/javascript'>
              Swal.fire({
                  title: '¡Apellidos del conductor incorrecto!',
                  icon: 'warning',
                  text: 'Los apellidos del conductor no puede tener caracteres especiale, ni ser mas largo de 15 palabras o menor que 5',
                  backdrop: `
                      RGB(244, 244, 225)
                      url('../img/food_sad-1.gif')
                      top
                      no-repeat
                  `    
                  }).then((result)=>{
                      if(result.isConfirmed){
                          window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user';
                      }
                  });
              </script>";
          } else {

            $sql = "update conductor set id_conductor = '$id_conductor', nombres_conductor = '$nombres_conductor',
            apellidos_conductor = '$apellidos_conductor', direccion_conductor = '$direccion_conductor',
            fecha_ingreso_empresa = '$fecha_ingreso_empresa', fecha_asignacion_ruta = '$fecha_asignacion_ruta',
            cod_ruta = '$cod_ruta', id_rol = '$id_rol'
            where id_conductor = '$id_conductor'
            ";

            $res=mysqli_query(Conexion::con(),$sql);
            echo "<script type='text/javascript'>
                    Swal.fire({
                      icon : 'success',
                      title : 'Exito!!',
                      text : 'El conductor con id = $id_conductor fuen modificado Correctamente',
                      backdrop: `
                        RGB(237, 250, 229)
                        url('../img/food_happy-1.gif')
                        top
                        no-repeat
                      `
                    }).then((result) => {
                      if (result.isConfirmed) {
                      window.location='../trabajador/conductor_trabajador.php?nom_user=$nom_user'  
                    }
                  });
                </script>";
          }
      }
    }
  }
}

///====== edeshabilitar ruta /======
public function desCond($id) {
  $cond = new Conductor;
  $reg = $cond->get_id_cond($id);
  
  if ($reg[0]['estado'] == 0) {
    $sql="update conductor set estado = 1 where id_conductor = $id";
    $res=mysqli_query(Conexion::con(),$sql);
    
    echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text : 'El conductor con ID = $id fue deshabilitado correctamente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result) => {
          if (result.isConfirmed) {
            window.location='../admin/conductor_admin.php'  
        }
      });
    </script>";
  } 
  
  if ($reg[0]['estado']  == 1) {

    $sql="update conductor set estado = 0 where id_conductor = $id";
    $res=mysqli_query(Conexion::con(),$sql);

    echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text : 'El conductor con id = $id fue habilitado correctamente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result) => {
          if (result.isConfirmed) {
            window.location='../admin/conductor_admin.php'  
        }
      });
    </script>";
  }
}

}


//=============== Conductor =============== 
class Cliente {
  private $clien;

  public function __construct(){
    $this->clien=array();
  }

///====== Obtener id  /======
  public function get_id_cli($id){
    $sql="select * from cliente where id_cliente = $id";
    $res=mysqli_query(Conexion::con(),$sql);

    if($reg=mysqli_fetch_assoc($res)){
      $this->clien[]=$reg;
    }
      return $this->clien;
  }

///====== Ver cliente  /======
  public function verCli(){
    $sql="
    SELECT * from cliente
    INNER JOIN ciudad ON cliente.cod_ciudad_cliente = ciudad.cod_ciudad 
    INNER JOIN ruta ON cliente.cod_ruta_asociada = ruta.cod_ruta
    INNER JOIN rol ON cliente.id_rol = rol.id_rol
    WHERE cliente.estado = 0";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->clien[]=$row;
    }
    return $this->clien;
  }

  public function verCli2(){
    $sql="
    SELECT * from cliente
    INNER JOIN ciudad ON cliente.cod_ciudad_cliente = ciudad.cod_ciudad 
    INNER JOIN ruta ON cliente.cod_ruta_asociada = ruta.cod_ruta
    INNER JOIN rol ON cliente.id_rol = rol.id_rol
    WHERE cliente.estado = 1";
    $res=mysqli_query(Conexion::con(),$sql);
    //recorrer la tabla usuario y almacenarla en el vector
    while($row=mysqli_fetch_array($res)){
      $this->clien[]=$row;
    }
    return $this->clien;
  }

///====== Insertar Cliente /======
public function insertar($id_cliente, $nombre_cliente, $persona_contacto, $direccion_cliente, $cod_ciudad_cliente,$fecha_entrega_productos,$cantidad_productos,$cod_ruta_asociada,$nom_user){
  $sql = "insert into cliente values($id_cliente,'$nombre_cliente','$persona_contacto','$direccion_cliente',$cod_ciudad_cliente,'$fecha_entrega_productos',$cantidad_productos,$cod_ruta_asociada,2,'')";
  $res=mysqli_query(Conexion::con(),$sql);

  echo "<script type='text/javascript'>
          Swal.fire({
            icon: 'success',
            title: 'Operacion Exitosa',
            text: 'Se inserto la ruta con cod = $id_cliente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result)=>{
            if(result.isConfirmed){
              window.location='../admin/clientes_admin.php?nom_user=$nom_user';
          }
          });
        </script>";
}
public function insertar2($id_cliente, $nombre_cliente, $persona_contacto, $direccion_cliente, $cod_ciudad_cliente,$fecha_entrega_productos,$cantidad_productos,$cod_ruta_asociada,$nom_user){
  $sql = "insert into cliente values($id_cliente,'$nombre_cliente','$persona_contacto','$direccion_cliente',$cod_ciudad_cliente,'$fecha_entrega_productos',$cantidad_productos,$cod_ruta_asociada,2,'')";
  $res=mysqli_query(Conexion::con(),$sql);

  echo "<script type='text/javascript'>
          Swal.fire({
            icon: 'success',
            title: 'Operacion Exitosa',
            text: 'Se inserto la ruta con cod = $id_cliente',
            backdrop: `
              RGB(237, 250, 229)
              url('../img/food_happy-1.gif')
              top
              no-repeat
            `
          }).then((result)=>{
            if(result.isConfirmed){
              window.location='../trabajador/clientes_trabajador.php?nom_user=$nom_user';
          }
          });
        </script>";
}
///====== Editar Cliente /======
public function editCli($id_cliente, $nombre_cliente, $persona_contacto, $direccion_cliente, $cod_ciudad_cliente,$fecha_entrega_productos,$cantidad_productos,$cod_ruta_asociada, $vista, $nom_user){
  
  // Admin
  if ($vista == 0) {
    if (!preg_match("/[\d]/", $id_cliente)) {
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
                      $sql = "update cliente set id_cliente = '$id_cliente',
                      nombre_cliente = '$nombre_cliente',persona_contacto = '$persona_contacto',
                      direccion_cliente = '$direccion_cliente', cod_ciudad_cliente = '$cod_ciudad_cliente',
                      fecha_entrega_productos = '$fecha_entrega_productos', cantidad_productos = '$cantidad_productos',
                      cod_ruta_asociada = '$cod_ruta_asociada' where id_cliente = '$id_cliente'
                      ";
  
                      $res=mysqli_query(Conexion::con(),$sql);
                      echo $vista;
                      echo "<script type='text/javascript'>
                      Swal.fire({
                        icon : 'success',
                        title : 'Exito!!',
                        text : 'El cliente con ID = $id_cliente fuen modificado Correctamente',
                        backdrop: `
                          RGB(237, 250, 229)
                          url('../img/food_happy-1.gif')
                          top
                          no-repeat
                        `
                      }).then((result) => {
                        if (result.isConfirmed) {
                        window.location='../admin/clientes_admin.php?nom_user=$nom_user'  
                      }
                    });
                  </script>";
                  }
              }
          }
      }
    }
  }
  // Trabajador
  if ($vista == 1) {
    if (!preg_match("/[\d]/", $id_cliente)) {
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
                      $sql = "update cliente set id_cliente = '$id_cliente',
                      nombre_cliente = '$nombre_cliente',persona_contacto = '$persona_contacto',
                      direccion_cliente = '$direccion_cliente', cod_ciudad_cliente = '$cod_ciudad_cliente',
                      fecha_entrega_productos = '$fecha_entrega_productos', cantidad_productos = '$cantidad_productos',
                      cod_ruta_asociada = '$cod_ruta_asociada' where id_cliente = '$id_cliente'
                      ";
  
                      $res=mysqli_query(Conexion::con(),$sql);
                      echo $vista;
                      echo "<script type='text/javascript'>
                      Swal.fire({
                        icon : 'success',
                        title : 'Exito!!',
                        text : 'El cliente con ID = $id_cliente fuen modificado Correctamente',
                        backdrop: `
                          RGB(237, 250, 229)
                          url('../img/food_happy-1.gif')
                          top
                          no-repeat
                        `
                      }).then((result) => {
                        if (result.isConfirmed) {
                        window.location='../trabajador/clientes_trabajador.php?nom_user=$nom_user'  
                      }
                    });
                  </script>";
                  }
              }
          }
      }
    }
  }
}

///====== edeshabilitar cliente /======
  public function desCli($id) {
    $clien = new Cliente;
    $reg = $clien->get_id_cli($id);
    
    if ($reg[0]['estado'] == 0) {
      $sql="update cliente set estado = 1 where id_cliente = $id";
      $res=mysqli_query(Conexion::con(),$sql);
      
      echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El cliente con ID = $id fue deshabilitado correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/clientes_admin.php'  
          }
        });
      </script>";
    } 
    
    if ($reg[0]['estado']  == 1) {

      $sql="update cliente set estado = 0 where id_cliente = $id";
      $res=mysqli_query(Conexion::con(),$sql);

      echo "<script type='text/javascript'>
          Swal.fire({
              icon : 'success',
              title : 'Operacion Exitosa!!',
              text : 'El cliente con ID  = $id fue habilitado correctamente',
              backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
            }).then((result) => {
            if (result.isConfirmed) {
              window.location='../admin/clientes_admin.php'  
          }
        });
      </script>";
    }
  }
}



?>

    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="../js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="../js/script_tabla.js"></script>

  </body>
</html>