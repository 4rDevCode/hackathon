<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Organiza tu familia";

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
                <br />
                <h2>Planificacion para cuando estemos fuera de casa</h2><br>
                <div class="form-group row">
                    <label for="input1" class="col-sm-2 col-form-label">Dia</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input1" >
                    </div>
                    <label for="input2" class="col-sm-2 col-form-label">Punto de encuentro</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input1" class="col-sm-2 col-form-label">Horario</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input1">
                    </div>
                    <label for="input2" class="col-sm-2 col-form-label">Tiempo de espera</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input1" class="col-sm-2 col-form-label">Miembro de Familia</label>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                               
                                <div class="">
                                    <div class="form-group flex-grow-1 mr-2">
                                        <select class="form-control" id="miembro">
                                            <option>Madre</option>
                                            <option>Padre</option>
                                            <option>Hermano</option>
                                            <option>Hermana</option>
                                            <option>Abuela</option>
                                            <option>Abuelo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="input2" class="col-sm-2 col-form-label">¿Que hará</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="input2">
                    </div>
                </div>
                <button class="btn btn-primary">
                    <span class="bi bi-download"></span> Guardar</button><br>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Miembro de la familia</th>
                                <th scope="col">Día</th>
                                <th scope="col">Horarios</th>
                                <th scope="col">¿Qué hará?</th>
                                <th scope="col">Punto de encuentro</th>
                                <th scope="col">Tiempo de espera</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Padre</td>
                                <td>Lunes</td>
                                <td>9:00 AM - 5:00 PM</td>
                                <td>Trabajo</td>
                                <td>Oficina</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th scope="row">Madre</th>
                                <td>Martes</td>
                                <td>10:00 AM - 2:00 PM</td>
                                <td>Compras</td>
                                <td>Centro comercial</td>
                                <td>30 minutos</td>
                            </tr>
                            <tr>
                                <th scope="row">Hijo</th>
                                <td>Miércoles</td>
                                <td>2:00 PM - 6:00 PM</td>
                                <td>Clases de guitarra</td>
                                <td>Escuela de música</td>
                                <td>15 minutos</td>
                            </tr>
                            <tr>
                                <th scope="row">Hija</th>
                                <td>Jueves</td>
                                <td>4:00 PM - 8:00 PM</td>
                                <td>Entrenamiento de fútbol</td>
                                <td>Parque deportivo</td>
                                <td>10 minutos</td>
                            </tr>
                        </tbody>
                    </table>
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
    <script src="../assets/system_js/organizaFamila.js"></script>
</body>

</html>