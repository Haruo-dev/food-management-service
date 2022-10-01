<?php
    include('./class.php');
    $user = new Usuarios();
    $user->desuser($_GET['id']);
?>