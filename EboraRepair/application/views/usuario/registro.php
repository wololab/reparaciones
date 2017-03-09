<br/><br/><br/><br/><br/><br/>
<div class="container margin_60">
    <div class="row">
        <div class="col-md-8">
            <div id="message-contact"></div>
            <form method="post" action="<?=base_url()?>usuario/registroPost" id="register_form">

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
                    <div class="col-md-6 col-sm-6">
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
                            <label for="phone">Teléfono *</label>
                            <input type="number" id="phone" name="phone" class="form-control"
                                   placeholder="Teléfono de contacto" required="required"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row add_bottom_30">
                    <div class="col-md-6">
                        <input type="submit" value="Enviar" class="btn_1" id="submit">
                        <input type="reset" value="Borrar" class="btn_1">
                    </div>
                </div>
            </form>
        </div><!-- End col-md-8 -->
    </div><!-- End row -->
</div><!-- End Container -->