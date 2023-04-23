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
        $sql = "select * From encuentros where familia_id=" . $id_familia . " order by id;";
        $ejecuta = mysqli_query($conexion, $sql);
        $datos = array();
        while ($row = mysqli_fetch_array($ejecuta)) {
            $datos[] = array(
                'dia' => intval($row['dia']),
                'horario' => strval($row['horario']),
                'MiembroFamilia' => intval($row['MiembroFamilia']),
                'PuntoEncuentro' => strval($row['PuntoEncuentro']),
                'TiempoEspera' => strval($row['TiempoEspera']),
            );
        }
        $close = mysqli_close($conexion); // or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
        echo $json_string = json_encode($datos, JSON_UNESCAPED_UNICODE);

    }

    if ($option == "Registrar") {
        $dia = $_POST['_dia'];
        $horario = $_POST['_horario'];
        $miembroFamilia = $_POST['_miembroFamilia'];
        $puntoEncuentro = $_POST['_puntoEncuentro'];
        $tiempoEspera = $_POST['_tiempoEspera'];
        $resultado = "";
        $id_familia = $_SESSION['hackathon_fam_id'];

        $sql = "CALL sp_set_encuentro(" . $dia. ", " . $horario . ",'" . $miembroFamilia . "'," . $puntoEncuentro . ",'" . $tiempoEspera . "',@msj);";
        $ejecuta = mysqli_query($conexion, $sql);
        $out = mysqli_query($conexion, "select @msj as Resultado;");
               
        $datos = mysqli_fetch_array($out);
        $resultado = $datos['Resultado'];
        $return = array();
        $return[] = array('msj' => 'OK', 'mensaje' => $resultado);
        $json_string = json_encode($return);
        mysqli_close($conexion);
        echo $json_string;
    }

}

?>