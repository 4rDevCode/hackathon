<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Items";

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
                <input type="hidden" id="idItem" name="idItem" value="0">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 ">
                                <label class="col-form-label">Mochila:</label>
                                    <select class="form-control" id="sltMochila" name="sltMochila">
                                    </select>
                                </div>
                                <div class="col-sm-6 ">
                                    <button type="button" class="btn btn-primary btn-flat btn-lg mt-3"
                                        data-toggle="modal" data-target="#modalItem" id="btnRegistrarItem"
                                        name="btnRegistrarItem" style="width:100%">Registrar una nuevo
                                        Item</button>
                                </div>
                            </div>
                            <br>
                            <div class="modal fade" id="modalItem">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><span class="info-box-number" id="lblTituloItem"
                                                    name="lblTituloItem"></span>
                                            </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-form-label">Tipo:</label>
                                                <select class="form-control" style="height:100%" id="sltTipo"
                                                    name="sltTipo">
                                                    <option selected value="Alimento">Alimento</option>
                                                    <option value="Medicamento">Medicamento</option>
                                                    <option value="Herramienta">Herramienta</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                                <label class="col-form-label">Nombre:</label>
                                                <input class="form-control" type="text" value="" id="txtNombre"
                                                    name="txtNombre">
                                                <label class="col-form-label">Cantidad:</label>
                                                <input class="form-control" type="number" value="1" id="txtCantidad"
                                                    name="txtCantidad">
                                                <label class="col-form-label">Fecha Vencimiento:</label>
                                                <input class="form-control" type="date"
                                                    value="<?php echo date("Y-m-d") ?>" id="txtFechaVencimiento"
                                                    name="txtFechaVencimiento">
                                                <label class="col-form-label">Estado:</label>
                                                <select class="form-control" style="height:100%" id="sltEstado"
                                                    name="sltEstado">
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
                                            <button type="button" class="btn btn-primary" id="btnSaveItem"
                                                name="btnSaveItem"><span id="lblTextoBtnSaveItem"
                                                    name="lblTextoBtnSaveItem"></span></button>
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
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Vencimiento</th>
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
    <script src="../assets/system_js/item.js"></script>
</body>

</html>