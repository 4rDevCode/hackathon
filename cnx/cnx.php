<?php
    require_once "global.php";
    $conexion = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    mysqli_set_charset($conexion, 'utf8');
?>
