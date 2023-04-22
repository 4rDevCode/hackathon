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
        $datosobtenidos = explode('$', $resultado);
        if ($datosobtenidos[0] == "Registro exitoso.") {            
            $datosusuario = explode("|", $datosobtenidos[1]);
            $_SESSION['hackathon_fam_id'] = $datosusuario[0];
            $_SESSION['hackathon_fam_code'] = $datosusuario[1];
            $_SESSION['hackathon_fam_name'] = $datosusuario[2];
            $resultado='Registro exitoso.';
        }
        $return = array();

        $return[] = array('msj' => 'OK', 'mensaje' => utf8_encode($resultado));
        $json_string = json_encode($return);
        mysqli_close($conexion);
        echo $json_string;
    }
    if ($option == "buscarfamiliaporcodigo") {
        $CodigoFamilia = $_POST['_CodigoFamilia'];
        $resultado = "";
        $sql = "select id, nombre from tbl_familia where codigo='" . $CodigoFamilia . "' and estado = 'A';";
        $ejecuta = mysqli_query($conexion, $sql);
        $datos = array();
        $name = "";
        while ($row = mysqli_fetch_array($ejecuta)) {
            $datos[] = array(
                'id' => intval($row['id']),
                'nombre' => strval($row['nombre'])
            );
        }
        $close = mysqli_close($conexion); // or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
        echo $json_string = json_encode($datos, JSON_UNESCAPED_UNICODE);
    }

}