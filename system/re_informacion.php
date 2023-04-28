<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Reducir riesgos en casa - Información";

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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
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
                <!--  -->

                <!-- 
                 -->
            </div>
            <!--     <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="index.html">ICO dashboard</a></li>
                                    <li><a href="index2.html">Ecommerce dashboard</a></li>
                                    <li><a href="index3.html">SEO dashboard</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Sidebar
                                        Types
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="index.html">Left Sidebar</a></li>
                                    <li><a href="index3-horizontalmenu.html">Horizontal Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Charts</span></a>
                                <ul class="collapse">
                                    <li><a href="barchart.html">bar chart</a></li>
                                    <li><a href="linechart.html">line Chart</a></li>
                                    <li><a href="piechart.html">pie chart</a></li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>REDUCIR RIESGOS
                                        EN CASA</span></a>
                                <ul class="collapse">
                                    <li><a href="accordion.html">Accordion</a></li>
                                    <li><a href="alert.html">Alert</a></li>
                                    <li><a href="badge.html">Badge</a></li>
                                    <li><a href="button.html">Button</a></li>
                                    <li><a href="button-group.html">Button Group</a></li>
                                    <li class="active"><a href="cards.html">Cards</a></li>
                                    <li><a href="dropdown.html">Dropdown</a></li>
                                    <li><a href="list-group.html">List Group</a></li>
                                    <li><a href="media-object.html">Media Object</a></li>
                                    <li><a href="modal.html">Modal</a></li>
                                    <li><a href="pagination.html">Pagination</a></li>
                                    <li><a href="popovers.html">Popover</a></li>
                                    <li><a href="progressbar.html">Progressbar</a></li>
                                    <li><a href="tab.html">Tab</a></li>
                                    <li><a href="typography.html">Typography</a></li>
                                    <li><a href="form.html">Form</a></li>
                                    <li><a href="grid.html">grid system</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>icons</span></a>
                                <ul class="collapse">
                                    <li><a href="fontawesome.html">fontawesome icons</a></li>
                                    <li><a href="themify.html">themify icons</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Tables</span></a>
                                <ul class="collapse">
                                    <li><a href="table-basic.html">basic table</a></li>
                                    <li><a href="table-layout.html">table layout</a></li>
                                    <li><a href="datatable.html">datatable</a></li>
                                </ul>
                            </li>
                            <li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li>
                            <li><a href="invoice.html"><i class="ti-receipt"></i> <span>Invoice Summary</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Pages</span></a>
                                <ul class="collapse">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="login2.html">Login 2</a></li>
                                    <li><a href="login3.html">Login 3</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="register2.html">Register 2</a></li>
                                    <li><a href="register3.html">Register 3</a></li>
                                    <li><a href="register4.html">Register 4</a></li>
                                    <li><a href="screenlock.html">Lock Screen</a></li>
                                    <li><a href="screenlock2.html">Lock Screen 2</a></li>
                                    <li><a href="reset-pass.html">reset password</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>
                                    <span>Error</span></a>
                                <ul class="collapse">
                                    <li><a href="404.html">Error 404</a></li>
                                    <li><a href="403.html">Error 403</a></li>
                                    <li><a href="500.html">Error 500</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Multi
                                        level menu</span></a>
                                <ul class="collapse">
                                    <li><a href="#">Item level (1)</a></li>
                                    <li><a href="#">Item level (1)</a></li>
                                    <li><a href="#" aria-expanded="true">Item level (1)</a>
                                        <ul class="collapse">
                                            <li><a href="#">Item level (2)</a></li>
                                            <li><a href="#">Item level (2)</a></li>
                                            <li><a href="#">Item level (2)</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Item level (1)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> -->
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">

        <?php
            include_once('../assets/includes/main-content.php');
            ?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="card-area">
                    <div class="row">


                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">

                                <div class="card-body">
                                    <h5 class="title">Ficha de croquis<img src="" alt=""></h5>
                                    <p class="card-text">Un croquis es un dibujo rápido y esquemático que se
                                        utiliza para representar una idea o concepto de forma visual y
                                        preliminar, con el fin de planificar o comunicar una posible solución
                                        o diseño.
                                    </p>

                                    <p class="card-text">Esto permitirá conocer las zonas vulnerables, objetos
                                        peligrosos, zonas
                                        seguras y rutas de evacuación en casos de sismos</p>

                                    <p>Pudes descargar el croquis en pestaña llamada "CROQUIS"</p>

                                    <!-- <a href="#" class="btn btn-secondary">descargar_croquis.pdf </a>
                                 -->


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h5 class="title">Objetos peligrosos</h5>
                                    <p class="card-text">Ahora que has identificado las zonas seguras de tu casa, es
                                        importante que identifiques los objetos peligrosos que puedan estar presentes.
                                        Aquí puedes agregar los objetos peligrosos que identifiques:</p>
                                    <div class="form-group align-middle" style=" display: flex;">
                                        <input type="text" class="form-control d-inline mr-2"
                                            id="input-objeto-peligroso" placeholder="Ingrese un objeto peligroso"
                                            style="padding-top: 0.5rem;">
                                        <button class="btn btn-primary d-inline align-middle"
                                            id="btn-agregar-objeto-peligroso">Agregar</button>
                                    </div>



                                    <div class="mt-3">
                                        <span class="badge badge-pill badge-secondary mr-2">Estanterías</span>
                                        <span class="badge badge-pill badge-secondary mr-2">Espejos y cuadros</span>
                                        <span class="badge badge-pill badge-secondary mr-2">Lámparas de techo</span>
                                        <span class="badge badge-pill badge-secondary mr-2">Electrodomésticos</span>
                                        <span class="badge badge-pill badge-secondary mr-2">Macetas</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h5 class="title">Lista de objetos peligrosos</h5>
                                    <p class="card-text">

                                        Si ya tienes tu lista de objetos peligrosos, seria bueno que cambiaran de
                                        lugar ante una posible emergencia imprevista
                                    </p>
                                    <img style="width: 100px;height: 100px;"
                                        src="https://live.staticflickr.com/8424/7772466780_b210ff6bd0_b.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h5 class="title"> Grandes vulnerabilidades</h5>
                                    <p class="card-text">Si tu casa tiene grandes
                                        vulnerabilidades como grietas, escaleras
                                        en mal estado, deficiencia en las
                                        instalaciones de gas, entre otros: seria
                                        bueno que consultaras con un ingeniero
                                        civil, electricistas y/o otros expertos.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <div class="card-body ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <img src="https://ugeli.files.wordpress.com/2019/05/recuerda.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-md-6">

                                                Reparar todas las
                                                deficiencias de las
                                                instalaciones de agua,
                                                gas y sistemas
                                                eléctrico” </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
     
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <footer>
        <?php
        include_once('../assets/includes/footer.php');
        ?>
    </footer>
    <?php
    include_once('../assets/includes/footer_scripts.php');
    ?>
    <script src="../assets/system_js/mochila.js"></script>
</body>

</html>