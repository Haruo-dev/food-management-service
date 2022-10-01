<?php
session_start();
session_destroy();
include('./class.php');
echo "<script type='text/javascript'>
      Swal.fire({
        icon : 'success',
        title : 'Operacion Exitosa!!',
        text : 'A cerrado sesion Correctamente',
        backdrop: `
                RGB(237, 250, 229)
                url('../img/food_happy-1.gif')
                top
                no-repeat
              `
      }).then((result) => {
        if (result.isConfirmed) {
          window.location='../index.php'  
        }
      });
    </script>";
?>