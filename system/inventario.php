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
    <style type="text/css">
        #pageStyle {
            display: inline-block;
            width: 32px;
            height: 32px;
            border: 1px solid #CCC;
            line-height: 32px;
            text-align: center;
            color: #999;
            margin-top: 20px;
            text-decoration: none;
        }

        #pageStyle:hover {
            background-color: #CCC;
        }

        #pageStyle .active {
            background-color: #0CF;
            color: #ffffff;
        }
    </style>

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
                    <div class="col-13 mt-4">
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
                                                    <th scope="col">MOCHILA</th>
                                                    <th scope="col">TIPO</th>
                                                    <th scope="col">ITEM</th>
                                                    <th scope="col">CANTIDAD</th>
                                                    <th scope="col">VENCIMIENTO</th>
                                                    <th scope="col">ESTADO</th>
                                                    <th scope="col">DIAS PARA VENCER</th>
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