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
            <div class="main-content-inner">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Informacion basica</h4>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Nombre</label>
                                <input class="form-control" type="text" value="Jose Wilmer" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Apellidos</label>
                                <input class="form-control" type="text" value="Sanchez Diaz" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">DNI</label>
                                <input class="form-control" type="text" value="989787832" id="example-text-input">
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Informacion de contacto</h4>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Correo</label>
                                <input class="form-control" type="text" value="Sdwilmer@gmail.com" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Apellidos</label>
                                <input class="form-control" type="text" value="*******" id="example-text-input">
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="text-center"> 
                    <button type="button" class="btn btn-success mb-3 mx-5">Guardar</button>
                    <button type="button" class="btn btn-primary mb-3">Cancelar</button><br/>
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