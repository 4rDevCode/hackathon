<?php
session_start();
include_once('../../cnx/cnx.php');
date_default_timezone_set('America/Lima');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


if (isset($_POST['Option'])) {
    $option = $_POST['Option'];

    if ($option == "nueva") {
        $CodigoFamilia = $_POST['_CodigoFamilia'];
        $NombreFamilia = $_POST['_NombreFamilia'];
        $idUsuario = $_SESSION['hackathon_id'];
        $resultado = "";
        $sql = "CALL sp_registrar_familia(" . $idUsuario . ",'" . $CodigoFamilia . "','" . $NombreFamilia . "',@msj);";
        $ejecuta = mysqli_query($conexion, $sql);
        $out = mysqli_query($conexion, "select @msj as Resultado;");
        $datos = mysqli_fetch_array($out);
        $resultado = $datos['Resultado'];
        $return = array();
        $return[] = array('msj' => 'OK', 'mensaje' => utf8_encode($resultado));
        $json_string = json_encode($return);
        echo $json_string;
    }
}