<?php
session_start();
include_once "../cnx/global.php";
require_once "../cnx/cnx.php";
$_SESSION['hackathon_menu'] = "Dashboard";

if (empty($_SESSION['hackathon_active'])) {
    header('location: ../index.php');
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
    include_once('../assets/includes/head.php');
    ?>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><!--<img src="../assets/images/icon/logo.png" alt="logo">-->
                        <h3 style="color: white;">
                            <?php print(SYSTEM_NAME); ?>
                        </h3>
                    </a>
                </div>
            </div>
            <?php
            include_once('../assets/includes/main.php');
            ?>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <?php
            include_once('../assets/includes/main-content.php');
            ?>
            <!-- page title area end -->
            <div class="main-content-inner">
                </br>
                <input type="hidden" id="lbliduser" name="lbliduser" value="<?php echo $_SESSION['hackathon_id'] ?>">
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Última Noticia</h4>
                                    <div class="letest-news mt-5">
                                        <div class="single-post mb-xs-30 mb-sm-30">
                                            <div class="lts-thumb">
                                                <img src="../assets/images/blog/senamhi.png" alt="post thumb">
                                            </div>
                                            <div class="lts-content">
                                                <h2><a href="blog.html">SENAMHI INFORMA</a></h2>
                                                <p>Que entre el 19 y 21 de abril, se presentarán precipitaciones de
                                                    moderada a extrema intensidad en la costa norte y sierra
                                                    norte-centro.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <?php if ($_SESSION['hackathon_fam_id'] == 0) { ?>
                            <div class="col-xl-5 col-lg-12 mt-0">
                                <div class="card">
                                    <div class="card-body bg1">
                                        <h4 class="header-title text-white">
                                            Aún no tienes una familia registrada
                                        </h4>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-secundary btn-flat btn-lg mt-3"
                                                data-toggle="modal" data-target="#modalFamilia" id="btnRegistrarFamilia"
                                                name="btnRegistrarFamilia" style="width:100%">Registrar una nueva
                                                familia</button> <br>
                                            <button type="button" class="btn btn-secundary btn-flat btn-lg mt-3"
                                                data-toggle="modal" data-target="#modalFamilia" style="width:100%"
                                                id="btnSeleccionarFamilia" name="btnSeleccionarFamilia">Seleccionar una
                                                familia ya registrada
                                            </button>
                                            <div class="card">
                                                <span class="info-box-number" id="lblCodigoFamilia" style="display: none"
                                                    name="lblCodigoFamilia"></span>
                                                <input type="hidden" id="lblTipoFamiliaRegistro"
                                                    name="lblTipoFamiliaRegistro" value="">
                                                <div class="modal fade" id="modalFamilia">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><span class="info-box-number"
                                                                        id="lblTituloFamilia"
                                                                        name="lblTituloFamilia"></span>
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Código de Familia:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input class="form-control" type="text" value=""
                                                                            id="txtCodigoFamilia" name="txtCodigoFamilia"
                                                                            style="text-align: center">
                                                                        <div class="input-group-prepend">
                                                                            <button class="btn btn-outline-secondary"
                                                                                type="button" id="btnCodigoFamiliaBC"
                                                                                name="btnCodigoFamiliaBC"><span
                                                                                    id="lblTextoBtnCodigoFamiliaBC"
                                                                                    name="lblTextoBtnCodigoFamiliaBC"></span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Nombre de Familia:</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        id="txtNombreFamilia" name="txtNombreFamilia">
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12 ">
                                                                        <div id="divmsgFamilia" name="divmsgFamilia"
                                                                            class="alert-dismiss">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancelar</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    id="btnSaveFamilia" name="btnSaveFamilia"><span
                                                                        id="lblTextoBtnSaveFamilia"
                                                                        name="lblTextoBtnSaveFamilia"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } else {
                            ?>
                            <div class="col-xl-6 col-lg-12 mt-0">
                                <div class="card">
                                    <div class="card-body bg1">
                                        <h4 class="header-title text-white">
                                            <?php echo $_SESSION['hackathon_fam_name']; ?>
                                        </h4>
                                        <input class="form-control" type="text"
                                            value="<?php echo $_SESSION['hackathon_fam_code']; ?>" id="lblCodigoFamilia2"
                                            name="lblCodigoFamilia2" style="text-align: center">
                                        <span class="info-box-number" style="color:#FFF">

                                        </span>

                                        <button type="button" class="btn btn-secundary btn-flat btn-lg mt-3"
                                            data-toggle="modal" data-target="#modalFamilia" id="btnCompartirPorWsp"
                                            name="btnCompartirPorWsp" style="width:100%">Compartir link de registro por
                                            Whatsapp</button> <br>
                                    </div>
                                    <div id="frmNotificacion" name="frmNotificacion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="col-form-label">Notificación:</label>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" type="text" value="" id="txtNotificacion"
                                                        name="txtNotificacion" style="text-align: center">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            id="btnEnviarNotificación"
                                                            name="btnEnviarNotificación">Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php }

                        ?>

                        <div class="col-xl-4 col-lg-5 col-md-12 mt-5">

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center">
                                        <h4 class="header-title mb-0">Números de emergencia</h4>
                                    </div>
                                    <div class="member-box">
                                        <div class="s-member">
                                            <div class="media align-items-center">
                                                <img src="assets/images/team/team-author1.jpg"
                                                    class="d-block ui-w-30 rounded-circle" alt="">
                                                <div class="media-body ml-5">
                                                    <p>Policia Nacional</p><span>105</span>
                                                </div>
                                                <div class="tm-social">
                                                    <a href="tel:105"><i class="fa fa-phone"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="s-member">
                                            <div class="media align-items-center">
                                                <img src="assets/images/team/team-author2.jpg"
                                                    class="d-block ui-w-30 rounded-circle" alt="">
                                                <div class="media-body ml-5">
                                                    <p>SAMU</p> Atención Médica Móvil de Urgencia<span>106</span>
                                                </div>
                                                <div class="tm-social">
                                                    <a href="tel:106"><i class="fa fa-phone"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="s-member">
                                            <div class="media align-items-center">
                                                <img src="assets/images/team/team-author3.jpg"
                                                    class="d-block ui-w-30 rounded-circle" alt="">
                                                <div class="media-body ml-5">
                                                    <p>Policía de Carreteras</p><span>110</span>
                                                </div>
                                                <div class="tm-social">
                                                    <a href="tel:110"><i class="fa fa-phone"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="s-member">
                                            <div class="media align-items-center">
                                                <img src="assets/images/team/team-author4.jpg"
                                                    class="d-block ui-w-30 rounded-circle" alt="">
                                                <div class="media-body ml-5">
                                                    <p>Bomberos</p><span>116</span>
                                                </div>
                                                <div class="tm-social">
                                                    <a href="tel:116"><i class="fa fa-phone"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="s-member">
                                            <div class="media align-items-center">
                                                <img src="assets/images/team/team-author5.jpg"
                                                    class="d-block ui-w-30 rounded-circle" alt="">
                                                <div class="media-body ml-5">
                                                    <p>SUTRAN</p><span>0800-12345</span>
                                                </div>
                                                <div class="tm-social">
                                                    <a href="tel:080012345"><i class="fa fa-phone"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Sismos registrados en las últimas 24 horas</h4>
                                    <div id="mapamchart6"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center">
                                        <h4 class="header-title mb-0">Números de Familia</h4>
                                    </div>
                                    <div class="member-box">
                                        <?php
                                        $sql = "select apellidos, nombres, celular from tbl_usuario where id <> " . $_SESSION['hackathon_id'] . " and id_familia = " . $_SESSION['hackathon_fam_id'] . ";";
                                        $ejecuta = mysqli_query($conexion, $sql);

                                        while ($row = mysqli_fetch_array($ejecuta)) {
                                            $apellidos = strval($row['apellidos']);
                                            $nombres = strval($row['nombres']);
                                            $celular = strval($row['celular']);

                                            ?>
                                            <div class="s-member">
                                                <div class="media align-items-center">
                                                    <img src="assets/images/team/team-author1.jpg"
                                                        class="d-block ui-w-30 rounded-circle" alt="">
                                                    <div class="media-body ml-5">
                                                        <p>
                                                            <?php echo $nombres . ", " . $nombres; ?>
                                                        </p><span>+51
                                                            <?php echo $celular; ?>
                                                        </span>
                                                    </div>
                                                    <div class="tm-social">
                                                        <a href="tel:+51<?php echo $celular; ?>"><i
                                                                class="fa fa-phone"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        $close = mysqli_close($conexion);

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <?php
            include_once('../assets/includes/footer.php');
            ?>
        </footer>
    </div>
    <?php
    include_once('../assets/includes/footer_scripts.php');
    ?>
    <!-- start amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap_amcharts_extension.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/continentsLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- maps js -->
    <script src="../assets/js/maps.js"></script>
    <script src="../assets/system_js/index.js"></script>
</body>

</html>