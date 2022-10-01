<?php
    include('./class.php');
    $prove = new Proveedor();
    $prove->desprove($_GET['nit']);
?>