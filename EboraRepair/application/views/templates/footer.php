<footer class="footer1">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 first clearfix">
                <div class="widget clearfix">
                    <div class="title"><h3> Contacto</h3><hr></div>
                    <p>
                        Av. de Pío XII, nº20.
                        <br/>
                        45600, Talavera de la Reina.
                        <br/>
                        Toledo, España.
                    </p>
                    <ul class="listContacto">
                        <li><i class="fa fa-envelope"></i><a href="mailto:info@eborarepair.com"> info@eborarepair.com</a></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:eborarepair@hotmail.com"> eborarepair@hotmail.com</a></li>
                        <li><i class="fa fa-phone-square"></i><a href="tel://34605615647"> +34 605 61 56 47</a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-4 -->

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 clearfix">
                <div class="widget clearfix">
                    <div class="title"><h3>Menú</h3><hr></div>
                    <ul class="list">
                        <li><a title="Inicio" href="<?=base_url()?>">Inicio</a></li>
                        <li><a title="Nosotros" href="<?=base_url()?>general/nosotros">Nosotros</a></li>
                        <li><a title="Galería" href="<?=base_url()?>general/galeria">Galería</a></li>
                        <li><a title="Contacto" href="<?=base_url()?>general/contacto">Contacto</a></li>

                        <?php if (isset($header['usuario']['nombre'])): ?>
                            <li><a title="Reparaciones" href="<?=base_url()?>aplicacion/formularioReparacion">Reparaciones</a></li>
                            <?php if(isset($header['usuario']['perfil']) && $header['usuario']['perfil'] == 'admin'):?>
                                <li><a title="Panel de control" href="<?=base_url()?>administracion/panel">Panel de control</a></li>
                            <?php endif; ?>
                            <li><a title="Cerrar sesión" href="<?=base_url()?>usuario/logout">Cerrar sesión</a></li>
                        <?php else: ?>
                            <li><a title="Acceso usuarios" href="<?=base_url()?>usuario/login">Acceso usuarios</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div><!-- end col-lg-4 -->

        </div><!-- row -->
    </div><!-- container -->
</footer><!-- footer1 -->

<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-md-8">
                <p><small>Ebora Repair <?=date('Y')?>. Todos los derechos reservados.
                        <a href="<?=base_url()?>general/cookies">Politica de cookies</a>
                        Diseño: <a href="mailto:wololab.dev@gmail.com">Wololab Development.</a><!--TODO add link to the official web site-->
                    </small></p>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4">
                <div class="social clearfix pull-right">
                    <span>
                        <a data-placement="top" data-toggle="tooltip" data-original-title="Twitter" title="EboraRepair Twitter" href="https://twitter.com/eborarepair" target="_blank">
                            <i class="fa fa-twitter"></i></a>
                    </span>
                    <span>
                        <a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="EboraRepair Facebook" href="https://www.facebook.com/Ebora-Repair-1319213998143133/" target="_blank">
                            <i class="fa fa-facebook"></i></a>
                    </span>
                    <!--
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Google Plus" title="" href="#">
                            <i class="fa fa-google-plus"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Linkedin" title="" href="#">
                            <i class="fa fa-linkedin"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Github" title="" href="#">
                            <i class="fa fa-github"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="Pinterest" title="" href="#">
                            <i class="fa fa-pinterest"></i></a></span>
                    <span><a data-placement="top" data-toggle="tooltip" data-original-title="RSS" title="" href="#">
                            <i class="fa fa-rss"></i></a></span>
                    -->
                </div><!-- end social -->
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end copyright -->


<!-- Bootstrap core and JavaScript's
================================================== -->
<script src="<?=base_url()?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
<script src="<?=base_url()?>assets/js/jquery.parallax.js"></script>
<script src="<?=base_url()?>assets/js/jquery.fitvids.js"></script>
<script src="<?=base_url()?>assets/js/jquery.unveilEffects.js"></script>
<script src="<?=base_url()?>assets/js/retina-1.1.0.js"></script>
<script src="<?=base_url()?>assets/js/fhmm.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<script src="<?=base_url()?>assets/fancyBox/jquery.fancybox.pack.js"></script>
<script src="<?=base_url()?>assets/js/application.js"></script>

<!-- Jquery UI js -->
<script src="<?=base_url()?>assets/JqueryUI/jquery-ui.min.js"></script>

<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>

<!-- FlexSlider JavaScript
================================================== -->
<script src="<?=base_url()?>assets/js/jquery.flexslider.js"></script>
<script>
    $(window).load(function() {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: true,
            directionNav: false,
            animationLoop: true,
            slideshow: true,
            itemWidth: 114,
            itemMargin: 0,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: true,
            sync: "#carousel"
        });

        $('#property-slider .flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 6000,
            animationSpeed:	1300,
            directionNav: true,
            controlNav: false,
            keyboardNav: true
        });
    });
</script>

