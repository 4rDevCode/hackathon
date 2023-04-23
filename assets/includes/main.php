<input type="hidden" id="rutaclases" value="<?php print(URL_CLASSES); ?>">
<input type="hidden" id="rutadominio" value="<?php print(DOMAIN); ?>">
<div class="main-menu">
    <div class="menu-inner">
        <nav>
            <ul class="metismenu" id="menu">
                <li class="active">
                    <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                </li>
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="fa ti-bag"></i>
                        <span>Mochila de emergencia</span></a>
                    <ul class="collapse">
                        <li><a href="mochilas.php">Mochilas</a></li>
                        <li><a href="items.php">Items</a></li>
                        <li><a href="inventario.php">Inventario</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Reducir riesgos 
                            en casa</span></a>
                    <ul class="collapse">
                        <li><a href="re_informacion.php">informacion</a></li>

                        <li><a href="foto_zonas_s.php">Fotografias de zonas seguras</a></li>
                        <li><a href="foto_zonas_f.php">Lugares en los que suele permanecer cada familiar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="croquis.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Croquis</span></a>
                </li>
                <li>
                    <a href="organizaFamilia.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Organiza tu familia</span></a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>