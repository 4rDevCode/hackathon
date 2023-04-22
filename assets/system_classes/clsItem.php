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
    if ($option == "listar") {
        $id = $_POST['_idmochila'];
        $sql = "select id, tipo, nombre, cantidad, fecha_vencimiento, case when(estado = 'A') then 'Activo' else 'Inactivo' end as est, estado 
                from tbl_items where id_mochila = ".$id." order by estado, nombre;";
        $ejecuta = mysqli_query($conexion, $sql);
        $datos = array();
        while ($row = mysqli_fetch_array($ejecuta)) {
            $datos[] = array(
                'id' => intval($row['id']),
                'tipo' => strval($row['tipo']),
                'nombre' => strval($row['nombre']),
                'cantidad' => intval($row['cantidad']),
                'fecha_vencimiento' => strval($row['fecha_vencimiento']),
                'est' => strval($row['est']),
                'estado' => strval($row['estado'])
            );
        }
        $close = mysqli_close($conexion); // or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
        echo $json_string = json_encode($datos, JSON_UNESCAPED_UNICODE);
    }
    if ($option == "llenarMochila") {
        $id_familia = $_SESSION['hackathon_fam_id'];
        $sql = "SELECT id, descripcion FROM tbl_mochila where id_familia = ".$id_familia." ORDER BY estado, descripcion;";
      
        $ejecuta = mysqli_query($conexion, $sql);
        $datos = array();
        while ($row = mysqli_fetch_array($ejecuta)) {
            $datos[] = array(
                'id' => intval($row['id']),
                'descripcion' => strval($row['descripcion'])
            );
        }
        $close = mysqli_close($conexion); // or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
        echo $json_string = json_encode($datos, JSON_UNESCAPED_UNICODE);
    }
    if ($option == "RegistrarItem") {
        $id = $_POST['_id'];
        $id_familia = $_SESSION['hackathon_fam_id'];
        $descripcion = $_POST['_descripcion'];
        $peso = $_POST['_peso'];
        $estado = $_POST['_estado'];
        $resultado = "";
        $sql = "CALL sp_item(" . $id . ", " . $id_familia . ",'" . $descripcion . "'," . $peso . ",'" . $estado . "',@msj);";
        $ejecuta = mysqli_query($conexion, $sql);
        $out = mysqli_query($conexion, "select @msj as Resultado;");
        $datos = mysqli_fetch_array($out);
        $resultado = $datos['Resultado'];
        $return = array();
        $return[] = array('msj' => 'OK', 'mensaje' => $resultado);
        $json_string = json_encode($return);
        $close = mysqli_close($conexion);
        echo $json_string;
    }

}