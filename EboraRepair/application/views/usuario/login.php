<div class="container margin_60">
    <div class="row">
        <div class="col-md-8">
            <div id="message-contact"></div>
            <br/><br/>
            <form method="post" action="<?=base_url()?>usuario/loginPost" id="loginForm">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="text" class="form-control" id="user" name="user"
                                   placeholder="Introduzca su usuario" required="required"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="pwd">Contaseña</label>
                            <input type="password" class="form-control" id="pwd" name="pwd"
                                   placeholder="Introduzca su contraseña" required="required"/>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <hr/>
                <div class="row add_bottom_30">
                    <div class="col-md-6">
                        <input type="submit" value="Acceder" class="btn btn-primary" id="submit">
                    </div>
                </div>
            </form>
        </div><!-- End col-md-8 -->
    </div><!-- End row -->
</div><!-- End Container -->