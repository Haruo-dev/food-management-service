<?php
    include('./class.php');
    $prod = new Productos();
    $prod->desprod($_GET['cod']);
?>