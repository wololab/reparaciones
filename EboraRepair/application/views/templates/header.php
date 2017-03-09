
<div class="toolbar-wrapp">
    <div class="sticky-toolbar">
        <ul>
            <li id="support"><a title="Contacte con nosotros" href="#" ><i class="fa fa-question"></i></a></li>
            <?php if (isset($header['usuario']['nombre'])): ?>
                <li id="accountlogin2"><a title="Cerrar sesión" href="<?=base_url()?>usuario/logout" ><i class="fa fa-unlock"></i></a></li>
            <?php else: ?>
                <li id="accountlogin"><a title="Acceso usuarios" href="#" ><i class="fa fa-lock"></i></a></li>
            <?php endif; ?>
        </ul>
    </div><!--/ sticky-toolbar-->

    <div class="popup">
        <ul>
            <li><a href="<?=base_url()?>general/contacto">Contacto</a></li>
            <li><a href="#ContactFormModal" data-toggle="modal">Pregúntenos</a></li>
        </ul>
    </div>
    <!--/ popup-->

    <div class="loginpopup">
        <h3><i class="fa fa-key"></i> Acceso usuarios</h3>
        <form id="loginform" method="post" name="loginform" action="<?=base_url()?>usuario/login2">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre de usuario" required="required"/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" required="required"/>
                </div>
            </div>
            <!--
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox"> Recuérdame</label>
                </div>
            </div>
            -->
            <div class="form-group">
                <input type="submit" title="Acceder" class="btn btn-primary" value="Acceder"/>
            </div>
        </form>
    </div><!--/ login-popup-->
</div><!--/ toolbar-wrapp-->

<div class="modal fade" id="ContactFormModal" tabindex="-1" role="dialog" aria-labelledby="ContactFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="big_title">¿Tiene alguna pregunta?
                    <small>Estamos aquí para ayudarle.</small>
                </h3>
            </div>
            <div class="modal-body clearfix">
                <div class="text-left">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="ImageWrapper boxes_img">
                            <img src="<?=base_url()?>assets/img/about/01_about_peq.jpg" class="img-responsive" alt="Ebora Repair">
                            <div class="ImageOverlayH"></div>
                            <div class="Buttons StyleSc">
                                 <span class="WhiteSquare">
                                    <a href="https://twitter.com/eborarepair" target="_blank">
                                        <i class="fa fa-twitter"></i></a>
                                </span>
                                <span class="WhiteSquare">
                                    <a href="https://www.facebook.com/Ebora-Repair-1319213998143133/" target="_blank">
                                        <i class="fa fa-facebook"></i></a>
                                </span>

                                <!--<span class="WhiteSquare"><a href="#"><i class="fa fa-google-plus"></i></a></span>-->
                            </div>
                        </div>
                        <div class="servicetitle"><h3>Detalles de contacto</h3></div>
                        <ul>
                            <li><i class="fa fa-external-link"></i> www.eborarepair.com</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:info@eborarepair.com"> info@eborarepair.com</a></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:eborarepair@hotmail.com"> eborarepair@hotmail.com</a></li>
                            <li><i class="fa fa-phone-square"></i><a href="tel://34605615647"> +34 605 61 56 47</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <form id="contact" class="row" action="<?=base_url()?>general/contacto" name="contactform" method="post">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono">
                            <input type="text" name="motivo" id="motivo" class="form-control" placeholder="Motivo del contacto">
                            <textarea class="form-control" name="mensaje" id="mensaje" rows="6" placeholder="Su mensaje..."></textarea>
                            <button type="button" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="topbar clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="callus">
                    <p>
                        <span><i class="fa fa-envelope"></i><a href="mailto:info@eborarepair.com"> info@eborarepair.com</a></span>
                        <span><i class="fa fa-phone-square"></i><a href="tel://34605615647"> +34 605 61 56 47</a></span>
                    </p>
                </div><!-- end callus-->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="marketing">
                    <ul class="topflags pull-right">
                        <li><a data-placement="bottom" data-toggle="tooltip" data-original-title="Español" title="" href="#">
                                <img alt="es" src="<?=base_url()?>assets/img/flags/es.png"></a></li>
                    </ul><!-- end flags -->
                    <ul class="topmenu pull-right">

                        <?php if (isset($header['usuario']['nombre'])): ?>
                            <li><a href="<?=base_url()?>aplicacion/formularioReparacion"><?= $header['usuario']['nombre'] ?></a></li>
                        <?php else: ?>
                            <li><a href="<?=base_url()?>usuario/login"><i class="fa fa-lock"></i> Acceso Usuarios</a></li>
                        <?php endif; ?>

                    </ul><!-- topmenu -->
                </div><!-- end marketing -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end topbar -->

<header class="header1">
    <div class="container">
        <div class="row header-row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="logo-wrapper clearfix">
                    <div class="logo">
                        <a href="<?=base_url()?>" title="Inicio">
                            <img src="<?=base_url()?>assets/img/logos/logo.png" alt="Estate">
                        </a>
                    </div><!-- /.site-name -->
                </div><!-- /.logo-wrapper -->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12  pull-right">
                <div class="social clearfix pull-right">
                    <span>
                        <a data-placement="bottom" data-toggle="tooltip" data-original-title="Twitter" title="" href="https://twitter.com/eborarepair" target="_blank">
                            <i class="fa fa-twitter"></i></a>
                    </span>
                    <span>
                        <a data-placement="bottom" data-toggle="tooltip" data-original-title="Facebook" title="" href="https://www.facebook.com/Ebora-Repair-1319213998143133/" target="_blank">
                            <i class="fa fa-facebook"></i></a>
                    </span>
                    <!--
                    <span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Google Plus" title="" href="#">
                            <i class="fa fa-google-plus"></i></a></span>
                    <span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Linkedin" title="" href="#">
                            <i class="fa fa-linkedin"></i></a></span>
                    <span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Github" title="" href="#">
                            <i class="fa fa-github"></i></a></span>
                    <span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Pinterest" title="" href="#">
                            <i class="fa fa-pinterest"></i></a></span>
                    <span><a data-placement="bottom" data-toggle="tooltip" data-original-title="RSS" title="" href="#">
                            <i class="fa fa-rss"></i></a></span>
                    -->
                </div><!-- end social -->
            </div>
        </div><!-- end row -->