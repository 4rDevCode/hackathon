<?php
session_start();
include_once "../cnx/global.php";
$_SESSION['hackathon_menu'] = "Lugares En Los Que Suele Permanecer Cada Familiar";

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
            <!-- header area start -->

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Bootstrap Grid start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title">Fotografias</div>

                                <h5></h5>

                                <div>
                                    <h5>

                                        Maria Jose Urbina Mendoza

                                    </h5>
                                    <div class="d-flex" style="margin-bottom: 10px;">
                                        <p style="margin-right: 10px;">Subir foto</p>
                                        <input type="file">
                                    </div>



                                    <div class="row">


                                        <div class="">
                                            <div class="grid-col">

                                                <img width="200px" height="200px" src="https://www.lavanguardia.com/files/og_thumbnail/uploads/2012/03/02/5f9aea22589be.jpeg" alt="">

                                            </div>
                                        </div>
                                        <div class="">

                                            <div class="grid-col">

                                                <img width="200px" height="200px" src="https://ichef.bbci.co.uk/news/640/amz/worldservice/live/assets/images/2016/04/01/160401142827_huerto_urbano_624x351_getty.jpg" alt="">

                                            </div>

                                        </div>
                                   


                                    </div>

                                </div>

                                <div>
                                    <h5>
                                        Jefrinsson J, Jefrinsson J

                                    </h5>

                                    <div class="row">
                                        <div class="">
                                            <div class="grid-col">

                                                <img width="200px" height="200px" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFRgVFRUYGBgaGRgYGhgZGhgZGBwYGBkaGRoaGBwcIS4lHB4rHxgZJjgmLC8xNTU1GiU9QDs0Py40NTEBDAwMEA8QHhISHjQrJCs0NDQ0NDc0NDQxNDQ0MTQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ/NDQ/NP/AABEIALcBFAMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAADAAIEBQYBB//EAEQQAAIBAgMECAMFBQcDBQEAAAECAAMRBBIhBTFBUQYiYXGBkaGxEzJSQmJywdGCkrLS8BQWI1Oi4fEVJDNDY3OTwgf/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAkEQEBAAICAQQCAwEAAAAAAAAAAQIRITFBAxIyURMiYXGBkf/aAAwDAQACEQMRAD8AtkWHVZxFhVWcHQlWOUWjgsdaAbDvbQ7uEk2kFeRkvDvfQ7+HbOmOXhnKeRlETCdAnXE6xg20E54QrmwgJzyy1NNYzZGICJRHgTk2QEeBOgToEqEBOgRwEcBAg7VxLUqL1FAJUXAO7eBr4GZVNu46oLpS0O4rTdh53Imr25Tvh6o+4x8heRuiTAYZL8Cw9b/nN4yXtxz91ykl0oMm1H4OP/qT3sY7/oGPf5qpH4qr+y3E2/xR2zjVgOE1JPpPx/drFr0Lqt89ZL9zP72kmn0HT7VZj+FAvuxmm/tq8P6ubWj2r/1rN6/hPxY/TP0+heHG9qjd7KB6LI22+jmHpUHdEIdctiXc72AOl7bieE1T1DK/bfWw1XjoPRlMLlhjq8KfoUP+3P42/IzRFZQ9Ch/gt/8AI3sJoiJzrXpfGAsIMiGYRjCR0BIg2EORBsIAGEGwh2EGwgRnWBdZKYQTLAilIoW0UIMiwqiJVjwsw2QE6BOgRwEgaROofOOtEVgTKL5h28YVxIKNrcSTUq3AtOuOXHLFxCc3MaIo5ROdu61Jp1RCATgEeohXAI8CdAjwIRwCOAnQJ0CURtoJelUHNHHmplP0S1wx7HPss0NRLqRzBHmJnOiB/wC2ccmv/XlN4uOXyn+roNpaMU3Fz2ThF7czuEGRZTm00Y2FzoOZ3A6TpI2ocfWGbQ2ub3vv1vbzvNClS6K3G0ymPpgKMrFiLXUizDrG1raHU28po6DjJkuAcoF2I9hO2XxiWauonK2nO/GR9orfDVfwH0/4naHy7+Fr90diNaFYfcb+EzjUynCn6Fj/AA3H/uH2E0ZEzvQz5ao+/wDlNIROV7PS+MBYRjCGYQZEOgREGwhmEYRACwgmEMwjGEADCBcSQwgnECPlnY+0UCSqx4WOVY4LMqZljgsdadCyBuWdtH5Z0LIoWWOtxhAs4ywGqIQCcUQiiAlEeBEFjwJUICPAiUR4WUNAjgI60cBAaBMx0VWyYhOTfzTVgTM9HVtVxSfef0Yj85vFxz+UFr4wIVFiSfISNtRWIzqzXHaQBzsBvIhcTUAYCwZr2vyXfdr8BKXH4lrWUnWxPZfXWdb6cyjvMpjqu0MN1gXzWG/WzMRbXs3S7AVSGIQZjlvlGUCxIvfu9TKfA0WfUk6W1vLZV1yXzLbv5kG/MTV9KTGS8s31N5cO4zHsjIFC2Iu2XUctCN0njrUq34G9UaU1HDnPZdxud3gQZeYZAUq2+hh2bmGkZYyYzSZ60pOhh/8AN+MH3mmImY6FfNWHah/imqInny7c/R+MBYQbCFYRjCHUFhGsIQxjQAtGNCtBtACwg2EM0EwgCyzkdadgTAI8CdAjgsimgToEcFnQJBwCOCzoEcBGgwLEywoWdtMmwVWEURAQiiBxRHAToEeBKBU8QjC4YEd8e1dAL5haU1en8JyG0QklW4a65TyP5W7YOvjLjIgu7aBRv/2HbJv/AKm1/h6quuZTcG+vcbH1EKBAYDDZEVN9gLnmd5PneSwJohtpmtirbG4pOYY+bKfzmpAmW2n0crvXerTqqga25nVvlAN7DmJrG6cvUl4sg+I2RXZhZVIsb3I32sPynTsByOsq3/Fpa3dIP92cXxxJ/feDbotiTvxN/wBpzOsz1zHO5ZWa9qzTYLhCt133GthbkdIfDbGIYNddAdAed+yUR6IVuNcf64h0Mq/548n/AFk93O9nvz6mK+XYr6ddRvuNeJJ5SbRwmRCLj5SPfWZb+5b/AOeP3W/mnG6Euf8A11/cb+aLke7O+HOg7der3Ifea4iUvR7YDYZnY1A+YAaKVtY95l4wmK6+lLMdUFxBMIZxBkSOihw9VwpUu2dGKtzt9ltdTcWPjC/Gc/bIhtobOznOjZHAtm3hhyccRKx6WJGnw0Par2HkdYnDNGxuKsrEuQLc4LYiMULm/XYsL/TYKvoL+MHT2O7kGuy5RqES+U/iJ390ucto1zsgTCCYQ7CCcTTQdop2KZFiFnQJ0COtAbaOAnGNhBpil+IKdjmKZ7/ZtfLv53kNj2jgJ0ToEKQEcBEI4CQCtHARERwkHbR4E4I9ZRxkBFiARyOojaOFRPkRV/CAPaEEcIR0COAga9UIpY7gLnwgNmbRWsmdQQL2sbXvYHgbbiINp8TMBKyrt3Dre9VdOVz7CZTb3SU1bpSuF4ncT+glc8s8cYt9r9KkQlKQDtuzfZ8Pq9pmMTtvEVN9RgOSmw8ltIKJzj9JHmy9S5Gmq/1H1/WSMNtWuny1G7rm3kdIK0aQJWJfqtRsvpfchay/tKLHxX9Jq6NdXUMjBlO4ieVMgP8AXtJuytsPhm33U7wflP8AKe2Nu+Hq2fJ6UTGtKXDdJaDjVsh5N+o0lhh9oU3NkdWNr2Bubc5XeZS9CvBmRdq7RSggd7m5ygKLknU+wMLhsQrorr8rAMO46w1s5oNhCmDaANhBtCNBtAE0G0I0G00B2inZyBaRRWg8S5C6QhuJqqqMWIAsd5sJkqu2HOJptTBK2CKLEB7nrf8APC0mYvAl8RTFdyyVC+RFvlAUAgN2m+tpfrs9Opp/4ySliQBfTcJNMXd4RztKqN+HJsLnLUQ+9jJ2AxXxEzZGTsYcCLggjeJyol2y/UhH5fnI/R570EF9VzKeO46DyIka5l7WYj1jRHrI0aw1nROtEIHQI8RLHhYFP0g20uFRHZCwZsuhAsbE6+UpB0+pX1pPvI+YcPCa3F4JKi5aiK63vZgCL89ZXt0dwp34dPIj2MmjaHhOklPE0ajordTeDa+4n8pB6J7RRVak5VR84JIAJNgRrLWtsmjRpOKVNUzjrWvr1SBvPaZ5+51ljh6uVxsq86Tth2cCiBm3uyk5eOmmhOu+UqqBGi86BJt58r7rsRTeOyiNEeDJskhgPC86oG+cvr5RKdJq004R2xpMcY0iZ2ugjTHO3dpNr0VSiqEoTnPz5jdh2L93jMW1434hGo0PMGalawy9t22PTaqpoqnFnFuy2pJ9vGTtg4gPQQgEWULY8Cotv4zz+rXdrZmZu8k+82vRNv8At/229hK64Z+7JPxm1qNJsruFYgG1iTY9w7DIp6QYb/MH7r/yys6RdGXxFUVUdV6iqQ1+BJvoO2VP9xamv+Imt/q4/sxdvQ07bdw/+avkw/KSqdZXUMpDKdxG6YtuhdUfI6dgJew4cppdh4BqFBKbEFgWJIvbrMW0v3wic0Y0cTBsZoNnIooRazjrcEdhnROiEZ/az5Uw9T6KoB7jv/hE0F5nts0ycPUA+ywP+oX9CZIwOx0dVd3dw6IcrOxG4HXW57jeGd6yqRjdqUkdeuGYE9VOu3ksrdkV6+eqlFEVRUzn4l1YBzuyjsEuK2GRE6iKoBBsoA49ki4U5cbUXg9NX/dyj+aC742vBHrGCdBmWzqhgTVAjsQdJVvUMjRVtv0luAwYjkR7yK+33PysqjssT6zKbdQCu/aFPoJCUDmeXCNPJl61xys023/Wqv1+i/pAV+lLpvcE8goMytPvMJsnZxxNVkuVRAGqMN4W4Fh97X0lkZnrZZXWMavZW3HxIfMFsuWwAN9b6k37N1pl6mCcMVNgRvuf0vNthMVgqShKVgo8yebE6kx1HYiOocOpzDNx3nU+sl5vD0eyXH9mQw+xqrrmSzC9uXvaMxGzaiWzgLfdqNbb903tHE0aYFM710O7fxI15mQsXs44ly6EZRZACbcAx/iHlJZ9J+HHyyCYBybKyk8hmv8Awzj4CsPsP35Wt7TY7P2R8F81SwNrLx37zp2aeMl48ZkKobs1lFt/WNo1dH4cXngoOdQNO8D3McmDq2uEYjXVRm9pp16Nv9B8ppsLhKaIqBl6oA3jfx9byyW9pfRxeYPh3FsyML7rgi/deObBVOCg/tJ+s2u3Nn/EcBesFW/V11YkcPwyuwuwiXQEEC4vcEaDUj0ku9r+HH7ZGqrKbMLHvB9oNyeR8p622AHIHymO22WSuSgy5ABoALk6k+Rt5zVlnJPQxvVY7NNv0Sf/AAD+NvZZHoYylVBXEU1bQnMF62gubW14cJGwGPp0aLlL2LtlVrXBsLC436C8Sy9Jj6Vwu/DT4jE5RoLnlIibVv8AYO892kzI266sWVELNa5ZjuF7DQDnGrt97f8Ahp27KjD3Bmbbvh1meLX4XFB82lrfneFaeePi3d3cnLewChjoAOel4v7U/B3/AHm/WalZuTe1IBmmV2TiKj1VGdyBdmBYkWHDXtImlLyxZdn5ooPNOSqvROicE6JUVeKp5lrp9SEjvym3qI/o5UzYZOzMvkxA9LQzaVhfcyW8pX9FWyo6cUqEeFgPdTJGb8ouMYt0bulVVNsTh3+tGU+AJ/8A0JcObgjsMzm0agUYZz9mplPdcE/wwZdNRmizQDPBtVhpIqtcSudYZq4A1IHfI3xQd2sxY1Kpdr7JFUl1Yh8tgD8ptztr4zCVdouhIKWINjrxHhPUzhmbUDz0lMdk06VQ1GRGdmLdaz2J10Xh328Y93t7csvRmV2z2zcLWqDMUKIftNx/CLXPfumt2FTp0UZFDsahu5+o/s62EsKFcuLGqqk7go1820/rfIGIwqq2lUsSdbDXzvrM5ZXvwuPpY49dljdmXPUo2HElgSfC+kmbKrsBkCoii/HW/HS/qYSk9EplZ3P4i1yfDTwkDG4YhrJTfLzIJv3Dh4ydcx17M23grsXeotzuAupNuQF798dsTGLSuDUc3+zYEd995P8AWukk4BnPU+EijiWv+epMJi8GwOcOiAbiBkt3kRrn3Q74P2xVrOF+GCSOJsBY20Ive+kq8LjMQlRQ4W4KmxbLuIOpN9DYjxj8Pjjms9Rso4gXv3EjQdv/ADDDCUHzFM5I1OW5JP7QOsd3Z1w1A2mtr5l/fH6TE4/ajh2CG63NjzEk4XPSJK0WPawYkDloLSQmKNUH5E++bMf2Qff34ayy3wkmhOj+0nzG6MbgAkZbCxJXeeOZtO7tlrtLHk0nupXTexS2mvBpnTspVBPx9BrYC58g0bhsaqLY02c8Sx9gRpLLqaprd2gr0gYb0PgD+U0eya9KsjZ0BOa5zAg6qttSJEV/jKVRETTVyAbA7rCw1Ppv5XDS2JXtZK2g7WA/OSbn8rdJ74GhRqLUW4Buh1uqlhoTfUbreMx+0FWg1WkSAWctTB4qQLW9vCXePSsmHV6jKymoARoxyG63zDT+hM30pc3os17pdS3NLrkJ7dGHgZuWfTOUtxqGLm+p39n6Rrgj7XmBApjUJsrqePEH2j2rg8R4GXl8/rsjfmPL/eDaqw5bwN3OODgf8iDqm40HERNruND0YUF2PEqb+DCX7TPdF95/Cf4hL8mHsw+MdvORt4obaG8WeCzRpeaZCxj2dG7SPOVex6gTE4lObZh4MSf4xJW1H6qnkwmHwm0MmJz5tPiNfX7LNrfnoZnyxldWPSmeYPpLibFFzH7Ztc2ubWNvAy/2jt+jRvncFvpXrN5Dd4zHMtfE1M6IVS1gz6Cx49u87r75Lddrl+01Gv2dtlBh0eo4BAym5uxK6bt5NrSuxXSdnOTD0yx+oi/jlHuTH7N6O4dQDXqFzy1RdeHNvMd0s8SlNBlp02TtsVXyO/0kt43GsZdcqfDbDq1zmxNcAfQCCf5V8LywGzqFAWpklu7MT3tfTwhcJUN7ZA55EE+m70l62cr/AONSeRYG3hYD1md+7FqSRTYOsoPXzn7qnTx4mTcThadriixJ5Bh52gmd6bXKhCfui2nAW/KWOGeo4uSi93WbyvYf1pMybmmlXhqwp/YF/HNruAlnUWo6/KiH73XPoLD1kXGbOa+ZqtzwzXB7gBf0jcDTRdXc35C4HiRqYnHFTf0CcPUpG+dbnjfW3da9u6WNJwVs1YX5rlXyuI2ulE3IBZt9kLFu8jgO0yrcWbVDlv8AK17kfeIA9PWOcb/CnY5EX5GZzfiNN+t25+c5hMSi70LsdNdf3V/oy3wOKZ9BTso0uDZR2AfpGYnCVWa6hVtuymx8TYRrXMN7MxGDDLdaKZjzsCPAcfGQzUq0VAIVV3D5d/cup751sTURshfXS+oYDtNr7uW/3krJhm1d87cWYsD4AaAdgl764TrtHGJWolqlQKD9lND+0TfyHmYx9lUiuZPiPyy2tfvyw+NwdNQMlN2Jsb9crbt53iXajqLZFFtwysPS8WzqklAwz1KS2WiRzOV7nvMk4fFPVBBdUH1Ai+vBbn199bEQtiAVdgibjl0LHkL/AGQN547ucb/doH5XP7oPsZZLOuV4RR0cDfJWJ47r99yGknZOxyFrWrXIBUBCbXK3BN+HDTtk3YmyFVnzPnI0tqFsd57Tw7ItjD4deqhOgHH7raHyMSTc4PFUfwjVwJTiHsPBg1vImOq7NSph1trmCuGNiS9rqdBa1tLDS3fGlGSuiZuoVeqBwJa6gnwtb9TGbNxjUqXw6iEOtwqnS68D2WJt5Tck8plXlePzUq7gqAbm45XPDstGf2/7vr/tLnblJvjl2N81yeV/69pAyKfsjyEsu3lzkmWrABjhxX2jv7WvI+n6xxoofsiMOHTl6n9ZWZcfpqehj3DnW1jbuJE0t5nuidMKpsfsA91zu9Je3kj0Y/GCXig7xStLf4sa1SZPHdLEXSmuc/U2i+A3n0mcx22atXR3JH0jRf3R+cM7avpDt+kiFEfO/DLqoNjqW3eV5ndi7NfEWLMKaAk5ipJJOhsOO4chpHdFdk/2nEoji6Ld6naia2vwBOUeJmrFTI7IRoCQNw04Dykv2mt3kXCbHwdEZrB233brt4Dcvfadr1gT1FyjvJJ8Nw8JebHoIKYbcz3YnnqcvgBac2jhEA0RSx47t3da8mWNs3W5qcRX7OqkGy0gzfVrfxY3t6CWdes6jSme/Rh4BdYOjjGQWKAAfTp6R7Ymq65qSdU7mawJ7VHEdsTrW1QUxTKSQbXOugGvDS0saDVnGtkHAkHP+7fTxt3Spq0HzXdXLHS5B8hw8pZ4LA1Bqzsg+m5J8twmMd78ruI2I2U9yxcN2sSD66CcweEQm7uB939SfyljicCW1NRtPqCkDytKqq2UkKwb7wvlv47/AAPlJZ7bvQuK2Go2zNYADeGIHoZS4ioubqZsvM7z3aXA7/SWGCqUF6zZi/1MAbfhC3C+/aZKxFaiBcopvuutvMkTVxlm+DaDgscRZEpjXgtwSeZJJJ7zLOuKxFlVRz61z3Dq2kDD4orcoEAPIX8L75IXaLscioGY8NRYfUx+yvb5XOkmNlmrREqipTF2LKN18wI15AG/pCYarnv8SoQv0C9z+JgNB2A8td4kmrskuczVLt+HqjsXXQevOAxGysguXHdY3PcI1cS2Cf2LDkEiwA1+ZvzkBWpq+ZFBA3ZjfXnYS4wNWkgsLgneSNT5cOySquMpBSSwI7jck7gAd5vw4y6mXWiKsbWI1KjvvaFrYWrXXUmmp+xYliPvajKOzfztukLFLUZsxpsg3Bcu4c2sLE+g4cy1cTUGmZh2XI9rSS64q9dC/wB3nHyup7OsPa8m7F2UQSzte2mUG/iT+kmYSjVNMl2IJ3L2dp33PfHbOezleY9v6McSxJLqo+FXJiMo3EEeFgw9pV9J6NkqVVbQsqsQd+liunC4F+e7hra7ToNmd1NiqE35WXW3aRp2anlKzBYf4+Gele3+IpvvsujHx0aJNcf21vyr9soA9FyQLKiWPIEOSf8ATKvpDtfDi96qZhcghr68tL75kemO1Xd/hA6LfM1zcsXLEDkLZP3ZllQXGbdfW2k6yOeWWlzt7avxHAUFQlxfiTKxcQ3P2hcTQQdYuddd198CEThUXxDD8pNOFvu5PGJbs8ov7UeQ9Y0UL7nQ/tr+ZnTg6nBb91j7QcLnZW2mo3GQMCF3kg7ry1TpMvGmR3Nf8hMxUPXN+qbDQg8AF4bt3rH2S2rbtNA2vHW4/SWadMd6an+8lP6X/wBP6xTGuxv/ALRS8LyIikyXSoTtNZJooWIUbybDvOkyaavoxWXDYbEVh87AInJVH2j48ONh22bsxPjDNmbPxub3sLi9+y0BtvDth8MtE7yc5NrBr2APby8IToyjo4cqQhXeeNt1r79CdYnN1WrNLTCbbdAFZAQABoSpAHfv9JJxu0lchlzKBocw/QmVdakMu7hu8JabHsc6/hNue+WbvDO+SONORtb9U+011J0sBYWAAHhoJl8VgUysVAVrGxHsRuPlK/DbYroR18w00cZrDvFj6xP1vKthtArYLe19Tbs3SKiEbnbz0lVTx71hf4eq6HKbjXjYgWjqeL4EkcNRby4SU5XOH2f8YMXYlb5VANt28kWsddPCJ9gD7Lkd4v6iStlOfhj8T/xtJVWt1GPYfaPbLOS1VYTAIurAse0dXy4+Mssy2+Ye3vIQxGl416qvlQ7mYL4EgEeRMnU4ELH4kPoqAD62UZj2rfd3yNRZkvlJF99iwvYWubHU9pmyygjhblpaR6+ES3yLfuA9pLj5atVWzxWfXMQvM2PlmBvJGI2aznN8TX7y38NCJLGcbiPK3tG1KzqCSoPdv/54eUuprlJVPjMC1NSzOlh3gnsUa3PZeM2e6K2dwWI+QdXKmmpN21fUi/Abt5Jn1tl1KhzMylrfLrZexf1492kC+yWH2Qe43/3mPbq7katWCbRQ8T4KW/hvH1KmYWXxJGo7LHcZFwGzNczDQbhzPaJaV00uN49pq22E1s6i1xKqtdGZgLkZiB2cz2C49JLp1goYncBf+u+Dd70XY72VvzAHmfWSftIvVCwLlqDljcnPc8TpKA0KmHprVbS7qcnHRH38jqdJNGIamEQ9XKwZuZJIax7hYQPT7aNNaDIXHxDqqDVrEEXtw38YnP8AcS8f68XqguxY72JJ7zrBNSlklOcqUp0rkqnpwTUJYPTgishKgNQhMOGQnLaSCsbG1sl4ptJCSSYXLHJpOmCcBWijrzsm1S0M1PQbZ3xsRmPypYnvO7SKKXHsaX/+iKmWkzC+R7kc10DeAuDbjK7F11BRb2bVra7srX1tFFN3qpPDRYrZFMruI6ovYm97dt5AxNJcPZgSbhRaw+m4N+PERRQrqY5HU5TyuCDz1B5+czLVMpAGosLeUUUmfg8NH0Yra1B+E/xTQmiHGo7jYRRTU+IyNXNSqtTDMMrWBDMCRYWuQdbCw15S0wO0qrdQudWynMquAGAG/Q77+cUU5Rb2n4vC1QoYZW3XGo4675HaoUqDMMoR0Y3N+qCCSMvYp0iiirOmlw2JDjqm/bqPeNx9WyA/e/miim70z5RExR/qwnWxgJA+8l/30/WKKYqroGcza27LxRTSHCdiikiq7FUOq3JRcDt33Php5zmziGRVIv8AMdewj8z6RRTM+TXhkume0TQLZRmc6rusLgG5vyvunn+IdncvUJZmNyxNySYoprDyxnbo5U0jHSKKWsxFqpIrLFFJ4AmWDtFFAeoiYxRQ0Hmiiigf/9k=" alt="">

                                            </div>
                                        </div>
                                        <div class="">

                                            <div class="grid-col">

                                                <img width="200px" height="200px" src="https://i.blogs.es/79fe25/traajos-en-programacion/1366_2000.jpg" alt="">

                                            </div>

                                        </div>
                                    

                                    </div>

                                </div>

                                <div>
                                    <h5>
                                        Becerra Sanchez, Becerra Sanchez

                                    </h5>

                                    <div class="row">
                                        <div class="">
                                            <div class="grid-col">

                                                <img width="200px" height="200px" src="https://i.ytimg.com/vi/E9eZgB5vYZ4/maxresdefault.jpg" alt="">

                                            </div>
                                        </div>
                                        <div class="">

                                            <div class="grid-col">

                                                <img width="200px" height="200px" src="https://img10.naventcdn.com/avisos/18/00/01/04/47/12/1200x1200/9934733.jpg" alt="">

                                            </div>

                                        </div>
                                     

                                    </div>




                                </div>

                                <div>
                                    <h5>
                                    Calderon Vilchez, Calderon Vilchez
                                    </h5>

                                    <div class="row">
                                        <div class="">
                                            <div class="grid-col">

                                                <img width="200px" height="200px" src="data:image/jpeg;base64,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" alt="">

                                            </div>
                                        </div>
                                 
                                        <div class="">

                                            <div class="grid-col">


                                            <img width="200px" height="200px" src="https://i.imgur.com/4bBYYh0.jpg" alt="">
                                            </div>

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