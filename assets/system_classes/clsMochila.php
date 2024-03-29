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
        $id_familia = $_SESSION['hackathon_fam_id'];
        $sql = "select 
                    m.id, m.descripcion, m.peso, (select ifnull(sum(mi.cantidad),0) from tbl_items mi where mi.id_mochila = m.id) as items,  case when(m.estado = 'A') then 'Activo' else 'Inactivo' end as est, m.estado 
                from tbl_mochila m where m.id_familia = " . $id_familia . " order by m.estado, m.descripcion;";
        $ejecuta = mysqli_query($conexion, $sql);
        $datos = array();
        while ($row = mysqli_fetch_array($ejecuta)) {
            $datos[] = array(
                'id' => intval($row['id']),
                'descripcion' => strval($row['descripcion']),
                'peso' => intval($row['peso']),
                'items' => strval($row['items']),
                'est' => strval($row['est']),
                'estado' => strval($row['estado'])
            );
        }
        $close = mysqli_close($conexion); // or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
        echo $json_string = json_encode($datos, JSON_UNESCAPED_UNICODE);

    }

    if ($option == "RegistrarMochila") {
        $id = $_POST['_id'];
        $id_familia = $_SESSION['hackathon_fam_id'];
        $descripcion = $_POST['_descripcion'];
        $peso = $_POST['_peso'];
        $estado = $_POST['_estado'];
        $resultado = "";
        $sql = "CALL sp_mochila(" . $id . ", " . $id_familia . ",'" . $descripcion . "'," . $peso . ",'" . $estado . "',@msj);";
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