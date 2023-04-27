<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Inventario";

if (empty($_SESSION['hackathon_active'])) {
    header('location: index.php');
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
                    <a href="index.php">
                        <!--<img src="../assets/images/icon/logo.png" alt="logo">-->
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
                <div class="main-content-inner">
                    <!-- Here your code -->
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div id="tbl_filter" class="dataTables_filter">
                                        <label>Buscar:<input type="text" value="" id="searchdata"
                                                class="form-control input-sm" placeholder=""
                                                aria-controls="tbl"></label>
                                    </div>
                                </div>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">LOCAL</th>
                                                    <th scope="col">FECHA</th>
                                                    <th scope="col">TIPO COMPROBANTE</th>
                                                    <th scope="col">FORMA PAGO</th>
                                                    <th scope="col">NRO. DOCUMENTO</th>
                                                    <th scope="col">NRO. DOC. CLIENTE</th>
                                                    <th scope="col">CLIENTE</th>
                                                    <th scope="col">EFECTIVO</th>
                                                    <th scope="col">TARJETA</th>
                                                    <th scope="col">OTRO MEDIO PAGO</th>
                                                    <th scope="col">DOCUMENTO AFECTADO</th>
                                                    <th scope="col">OP. GRABADA</th>
                                                    <th scope="col">OP. INAFECTA</th>
                                                    <th scope="col">OP_EXONERADA</th>
                                                    <th scope="col">IGV</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">COSTO</th>
                                                    <th scope="col">GANANCIA</th>
                                                    <th scope="col">DOCUMENTOS</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bodytblReporte">
                                            </tbody>

                                        </table>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="dataTables_paginate paging_simple_numbers" id="divpager">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Table end -->
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
    <script src="../assets/system_js/inventario.js"></script>
</body>

</html>