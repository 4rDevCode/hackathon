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

    if ($option == "login") {
        $usuario = $_POST['_usuario'];
        $clave = $_POST['_clave'];
        $resultado = "";
        $sql = "CALL sp_login('" . $usuario . "','" . $clave . "',@msj);";
        $ejecuta = mysqli_query($conexion, $sql);
        $out = mysqli_query($conexion, "select @msj as Resultado;");
        $datos = mysqli_fetch_array($out);
        $resultado = $datos['Resultado'];

        $datosobtenidos = explode('$', $resultado);
        if ($datosobtenidos[0] == "Bienvenido")
         {
            $datosusuario = explode("|", $datosobtenidos[1]);
            $_SESSION['hackathon_active'] = true;
            $_SESSION['hackathon_id'] = $datosusuario[0];           
            $_SESSION['hackathon_datos'] = $datosusuario[1];
            /*
                $_SESSION['hackathon_usuario'] = $datosusuario[6];
                if ($datosusuario[3] == "A") {
                $_SESSION['hackathon_tipo'] = "Administrador";
                $_SESSION['hackathon_rol'] = 1;
            } else {
                $_SESSION['hackathon_tipo'] = "Otro";
                $_SESSION['hackathon_rol'] = 2;
            }*/
            $_SESSION['hackathon_email'] = $datosusuario[2];
            $_SESSION['hackathon_dni'] = $datosusuario[3];         
        } 
        $return = array();
        $return[] = array('msj' => 'OK', 'mensaje' => utf8_encode($resultado));
        $json_string = json_encode($return);
        echo $json_string;
    }


    if ($option == "registrar") {

        $nrodoc = $_POST['_nrodoc'];
        $nombres = $_POST['_nombres'];
        $apellidos = $_POST['_apellidos'];
        $email = $_POST['_email'];
        $password = $_POST['_password'];

        $resultado = "";
        $sql = "CALL sp_registrar_usuario('".$nrodoc."', '".$apellidos."', '".$nombres."', '".$email."', '".$password."', @msj);";
        $ejecuta = mysqli_query($conexion, $sql);
        $out = mysqli_query($conexion, "select @msj as Resultado;");
        $datos = mysqli_fetch_array($out);
        $resultado = $datos['Resultado'];
        $datosobtenidos = explode('$', $resultado);
        if ($datosobtenidos[0] == "Bienvenido")
         {
            $datosusuario = explode("|", $datosobtenidos[1]);
            $_SESSION['hackathon_active'] = true;
            $_SESSION['hackathon_id'] = $datosusuario[0];           
            $_SESSION['hackathon_datos'] = $datosusuario[1];
            /*
                $_SESSION['hackathon_usuario'] = $datosusuario[6];
                if ($datosusuario[3] == "A") {
                $_SESSION['hackathon_tipo'] = "Administrador";
                $_SESSION['hackathon_rol'] = 1;
            } else {
                $_SESSION['hackathon_tipo'] = "Otro";
                $_SESSION['hackathon_rol'] = 2;
            }*/
            $_SESSION['hackathon_email'] = $datosusuario[2];
            $_SESSION['hackathon_dni'] = $datosusuario[3];         
        } 
        $return = array();
        $return[] = array('msj' => 'OK', 'mensaje' => utf8_encode($resultado));
        $json_string = json_encode($return);
        echo $json_string;
    }
}