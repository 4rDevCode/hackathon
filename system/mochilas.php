<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Mochilas";

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
                <!-- Here your code -->
                <input type="hidden" id="idMochila" name="idMochila" value="0">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-flat btn-lg mt-3" data-toggle="modal"
                                data-target="#modalMochila" id="btnRegistrarMochila" name="btnRegistrarMochila"
                                style="width:100%">Registrar una nueva
                                Mochila</button>
                            <div class="modal fade" id="modalMochila">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><span class="info-box-number" id="lblTituloMochila"
                                                    name="lblTituloMochila"></span>
                                            </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-form-label">Descripción:</label>
                                                <input class="form-control" type="text" value="" id="txtDescripcion"
                                                    name="txtDescripcion">
                                                <label class="col-form-label">Peso (Kg):</label>
                                                <input class="form-control" type="number" value="1" id="txtPeso"
                                                    name="txtPeso">
                                                <label class="col-form-label">Estado:</label>
                                                <select class="form-control" style="height:100%" id="sltEstado" name="sltEstado"> 
                                                    <option selected value="A">Activo</option>
                                                    <option value="I">Inactivo</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 ">
                                            <div id="divmsg" name="divmsg" class="alert-dismiss">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" id="btnSaveMochila"
                                                name="btnSaveMochila"><span id="lblTextoBtnSaveMochila"
                                                    name="lblTextoBtnSaveMochila"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Peso</th>
                                                <th scope="col">Items</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodytblReporte">
                                            
                                        </tbody>
                                    </table>
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
    <script src="../assets/system_js/mochila.js"></script>
</body>

</html>