<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Fotografías De Zonas Seguras";

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

                <input type="hidden" id="rutaclases" value="<?php print(URL_CLASSES); ?>">
                <input type="hidden" id="rutadominio" value="<?php print(DOMAIN); ?>">

          
            </div>
            
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <?php
            include_once('../assets/includes/main-content.php');
            ?>
            <!-- header area start -->

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Bootstrap Grid start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title">Zonas seguras en el hogar</div>

                                <div class="d-flex" style="margin-bottom: 10px;">
                                    <p style="margin-right: 10px;">Subir foto</p>
                                    <input type="file">
                                </div>


                                <!-- Start 1 column grid system -->
                                <div class="row">
                                 
                                    <div class="">

                                        <div class="grid-col">

                                            <img width="200px" height="200px" src="https://www.agi-architects.com/blog/wp-content/uploads/2020/10/1595px-Barrio_de_Santa_Cruz_Sevilla._Portal-1024x769.jpg" alt="">

                                        </div>

                                    </div>
                                    <div class="">

                                        <div class="grid-col" height="2000px">

                                            <img width="200px" height="2000px" style="background-size: cover;" src="https://i.ebayimg.com/00/s/NzY0WDEwMjQ=/z/rJEAAOSw87JfkSqm/$_19.JPG?set_id=2" alt="">

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Order classes end -->
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
    
</body>

</html>