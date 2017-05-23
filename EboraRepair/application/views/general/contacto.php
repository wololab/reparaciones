<br/><br/>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="message-contact"></div>
            <form method="post" action="<?=base_url()?>general/contactoPost" enctype="multipart/form-data" id="contact_form">
                <!-- contactform send the form by jquery -->

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Nombre *</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Introduzca su nombre" required="required"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="lastName">Primer apellido *</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                   placeholder="Introduzca su primer apellido" required="required"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="lastName2">Segundo apellido *</label>
                            <input type="text" class="form-control" id="lastName2" name="lastName2"
                                   placeholder="Introduzca su segundo apellido" required="required"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <hr/>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="adress">Dirección</label>
                            <input type="text" class="form-control" id="adress" name="adress"
                                   placeholder="Introduzca su dirección"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="Email de contacto" required="required"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="number" id="phone" name="phone" class="form-control"
                                   placeholder="Teléfono de contacto"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <hr/>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="adress">Motivo del Contacto *</label>
                            <input type="text" class="form-control" id="adress" name="adress"
                                   placeholder="Indíquenos el motivo de su contacto" required="required"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Escriba su mensaje"
                                      style="height:150px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row add_bottom_30">
                    <div class="col-md-6">
                        <input type="submit" value="Enviar" class="btn btn-primary" id="submit">
                        <input type="reset" value="Borrar" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div><!-- End col-md-8 -->

        <div class="col-md-4">
            <div class="box_style_1">
                <h2 class="title">Contacto</h2>
                <h5>Dirección</h5>
                <p>
                    Av. de Pío XII, nº20.
                    <br/>
                    45600, Talavera de la Reina.
                    <br/>
                    Toledo, España.
                </p>
                <h5>Teléfono</h5>
                <p><a href="tel://34605615647"> +34 605 61 56 47</a></p>
                <h5>Email</h5>
                <p><a href="mailto:info@eborarepair.com">info@eborarepair.com</a></p>
                <p><a href="mailto:eborarepair@hotmail.com">eborarepair@hotmail.com</a></p>
            </div>
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3057.9577692333073!2d-4.829812117606861!3d39.96469688594437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd401bf5bf70c349%3A0xd00a04448ad5260!2sAv.+P%C3%ADo+XII%2C+20%2C+45600+Talavera+de+la+Reina%2C+Toledo!5e0!3m2!1ses!2ses!4v1489028525408" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!-- end map-->
        </div><!-- End col-md-4 -->
    </div><!-- End row -->
</div><!-- End Container -->
<br/>