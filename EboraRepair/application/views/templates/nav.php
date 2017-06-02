        <nav class="navbar navbar-default fhmm col-md-8 col-sm-8 col-xs-8" role="navigation">
            <div class="menudrop container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar">
                        </span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div><!-- end navbar-header -->
                <div id="defaultmenu" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!-- Mega Menu -->
                        <li class="dropdown fhmm-fw active"><a href="<?=base_url()?>"><i class="fa fa-home"></i> INICIO</a></li><!-- mega menu -->

                        <li><a href="<?=base_url()?>general/nosotros">NOSOTROS</a></li>

                        <li><a href="<?=base_url()?>general/galeria">GALERÍA</a></li>

                        <li><a href="<?=base_url()?>general/contacto">CONTACTO</a></li>

                        <?php if (isset($_SESSION['usuActivo']) && $_SESSION['usuActivo'] != null): ?>
                            <!-- standard drop down -->
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    <?php echo strtoupper($_SESSION['usuActivo']->nombre.' '.$_SESSION['usuActivo']->primer_apellido) ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?=base_url()?>aplicacion/formularioReparacion">Nueva Reparación</a></li>

                            <?php if($_SESSION['usuActivo']->rol == 'administrador'):?>
                                <li><a href="<?=base_url()?>administracion/filtros">Lista de Reparaciones</a></li>

                                <li><a href="<?=base_url()?>administracion/listaEmpleados">Lista de Empleados</a></li>

                                <!--<li><a href="<?=base_url()?>administracion/panel">Panel de control</a></li>-->
                            <?php endif; ?>

                                <li><a href="<?=base_url()?>usuario/logout">Cerrar Sesión</a></li>
                            </ul><!-- end dropdown-menu -->
                        </li><!-- end standard drop down -->
                        <?php endif; ?>

                    </ul><!-- end nav navbar-nav -->
                </div><!-- end #navbar-collapse-1 -->
            </div><!-- end dm_container -->
        </nav><!-- end navbar navbar-default fhmm -->
    </div><!-- end container -->
</header><!-- end header -->