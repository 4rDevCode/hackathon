<?php
session_start();
include_once "../cnx/global.php";

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
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="../assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                <?php echo $_SESSION['hackathon_datos']; ?><i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Mi Perfil</a>
                                <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
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
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-6 mt-5 mb-3">
                                    <div class="card">
                                        <div class="seo-fact sbg1">
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon"><i class="ti-thumb-up"></i> Miembros Familia</div>
                                                <h2>0</h2>
                                            </div>
                                            <canvas id="seolinechart1" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-md-5 mb-3">
                                    <div class="card">
                                        <div class="seo-fact sbg2">
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon"><i class="ti-share"></i> Productos en Mochila</div>
                                                <h2>4</h2>
                                            </div>
                                            <canvas id="seolinechart2" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mb-lg-0">
                                    <div class="card">
                                        <div class="seo-fact sbg3">
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon">Impressions</div>
                                                <canvas id="seolinechart3" height="60"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="seo-fact sbg4">
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon">New Users</div>
                                                <canvas id="seolinechart4" height="60"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                    <p>Policia Nacional</p><span></span>
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
                                                    <p>SAMU</p> Atención Médica Móvil de Urgencia<span></span>
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
                                                    <p>Policía de Carreteras</p><span></span>
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
                                                    <p>Bomberos</p><span></span>
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
                                                    <p>SUTRAN</p><span></span>
                                                </div>
                                                <div class="tm-social">
                                                    <a href="tel:"><i class="fa fa-phone"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center">
                                        <h4 class="header-title mb-0">Número de Familia</h4>
                                    </div>
                                    <div class="member-box">
                                        <div class="s-member">
                                            <div class="media align-items-center">
                                                <img src="assets/images/team/team-author1.jpg"
                                                    class="d-block ui-w-30 rounded-circle" alt="">
                                                <div class="media-body ml-5">
                                                    <p>Magali Becerra Sanchez</p><span>Esposa</span>
                                                </div>
                                                <div class="tm-social">
                                                    <a href="tel:+51959850401"><i class="fa fa-phone"></i></a>
                                                </div>
                                            </div>
                                        </div>
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
</body>

</html>