<?php
session_start();
include_once "cnx/global.php";
require_once "cnx/cnx.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php print(SYSTEM_NAME); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
        <input type="hidden" id="rutaclases" value="<?php print(URL_CLASSES); ?>">
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form>
                    <div class="login-form-head">
                        <h4>Registrate</h4>
                        <p>- Frase romántica 2 - </p>
                    </div>
                    <div class="login-form-body">
                        <?php
                        $id = 0;
                        if (!empty($_GET)) {
                            if (!empty($_GET['codigo'])) {
                                //Ingresaron código                        
                                $codigo = $_GET['codigo'];
                                $sql = "select id, nombre from tbl_familia where codigo='" . $codigo . "' and estado = 'A';";
                                try {
                                    $ejecuta = mysqli_query($conexion, $sql);
                                    $datos = array();
                                    $name = "";
                                    while ($row = mysqli_fetch_array($ejecuta)) {
                                        $id = intval($row['id']);
                                        $name = strval($row['nombre']);
                                    }
                                    $close = mysqli_close($conexion);
                                    if ($id > 0) {
                                        ?>
                                        <div class="form-gp">
                                            <label for="exampleInputName1">Familia:</label>
                                            <input type="text" id="txtFamilia" readonly name="txtFamilia" value="<?php echo $name; ?>">
                                        </div>
                                        <?php
                                    }
                                } catch (Exception $e) {
                                    echo 'Excepción capturada: ', $e->getMessage(), "\n";
                                }
                            }
                        }
                        ?>
                        <input type="hidden" id="idFamilia" name="idFamilia" value="<?php echo $id; ?>">
                        <div class="form-gp">
                            <label for="exampleInputName1">Número de documento</label>
                            <input type="text" id="txtNroDoc" name="txtNroDoc">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">Nombre(s)</label>
                            <input type="text" id="txtNombres" name="txtNombres">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">Apellidos</label>
                            <input type="text" id="txtApellidos" name="txtApellidos">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Correo electrónico</label>
                            <input type="email" id="txtEmail" name="txtEmail">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" id="txtPassword" name="txtPassword">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Confirmar contraseña</label>
                            <input type="password" id="txtPassword2" name="txtPassword2">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 ">
                                <div id="divmsg" name="divmsg" class="alert-dismiss">
                                </div>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button type="button" id="btnRegisrar" class="ti-arrow-right">
                                Registrarme
                            </button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">¿Ya tienes cuenta? <a href="index.php">Acceder</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/system_js/usuario.js"></script>
</body>

</html>