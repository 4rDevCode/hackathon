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
        <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                <li class="dropdown">
                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                        <span>3</span>
                    </i>
                    <div class="dropdown-menu bell-notify-box notify-box">
                        <span class="notify-title">Usted tiene 3 notificaciones <a href="#">ver todas</a></span>
                        <div class="nofity-list">
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                <div class="notify-text">
                                    <p>Item de la mochila principal esta por vencer.</p>
                                    <span>hace 50 segundos</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                <div class="notify-text">
                                    <p>Alerta de Tsunami en Pimentel</p>
                                    <span>hace 30 minutos</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                <div class="notify-text">
                                    <p>Se ha reprogramado el simulacro familiar.</p>
                                    <span>hace 2 días</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="maps-btn">
                    <i class="ti-map-alt"></i>
                </li>
                <a href="#" class="notify-item">
                    <li class="settings-btn">
                        <i class="ti-settings" id="btn_notificacion" name="btn_notificacion"></i>
                    </li>
                </a>

            </ul>
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
                    <li><span>
                            <?php echo $_SESSION['hackathon_menu']; ?>
                        </span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <?php include_once('../assets/includes/miperfil.php'); ?>
        </div>
    </div>
</div>
<div id="divnotif" name="divnotif" class="alert-dismiss">

</div>