<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Clean";

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
        <div class="loader"> 
        </div>
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
            <div class="main-content-inner"><br/>
            <p>Nota: Descargar y realizarlo junto a tu familia, luego subelo
                        para tener una vision clara de tu hogar. </p><br/>
                <h2>Croquis de mi casa</h2>        
                        <br/>
                        <a href="../assets/images/Croquis/croquisCasa.png"  download>
                        <button type="button" class="btn btn-primary mb-3">
                        <span class="bi bi-download mb-3">Descargar</button></a>
                        <button type="button" class="btn btn-success mb-3 mx-5">Subir</button><br/>
                        <img src="../assets/images/Croquis/croquisCasa.png" alt="croquis">
                    <br>
                <h2>Ruta de evacuacion</h2>
                        <br/>
                        <a href="../assets/images/Croquis/croquisEvacuacion.png"  download>
                        <button type="button" class="btn btn-primary mb-3">
                        <span class="bi bi-download mb-3"></span> Descargar</button></a>
                        
                        <button type="button" class="btn btn-success mb-3 mx-5">Subir</button><br/>
                        <img src="../assets/images/Croquis/croquisEvacuacion.png" alt="croquis">
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
    <script src="../assets/system_js/here.js"></script>
</body>

</html>