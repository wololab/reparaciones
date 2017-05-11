<div class="container">
    <h1>Es su primer inicio de sesión, cambie su contraseña.</h1>
    <p id="info" class="alert alert-danger" hidden="hidden">Las contraseñas deben ser iguales</p>
    <form method="post" action="<?=base_url()?>usuario/cambiaPass" onsubmit="return sonIguales();">
        <label for="pwd1">Contraseña</label>
        <input type="password" id="pwd1" name="pwd" class="form-control" required="required"/>
        <label for="pwd2">Repita Contraseña</label>
        <input type="password" id="pwd2" class="form-control" required="required"/>
        <input type="submit" value="Cambiar" class="btn btn-primary"/>
    </form>
</div>
<script>
    function sonIguales(){
        var pwd1 = $('#pwd1').val();
        var pwd2 = $('#pwd2').val();
        if(pwd1 == pwd2){
            return true;
        } else {
            $('#info').show();
            return false;
        }
    }
</script>