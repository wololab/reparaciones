<br/><br/><br/><br/>

<div class="container">
    <div class="alert alert-danger col-xs-5">
        Usuario o contraseña INCORRECTOS
    </div>

    <br/><br/><br/><br/>

    <p>
        Redirigiendo a la página de Login...
    </p>

    <br/><br/>
</div>

<script type="text/javascript">
    function redireccionar(){
        window.location="<?=base_url()?>usuario/login";
    }
    setTimeout ("redireccionar()", 5000);
</script>
