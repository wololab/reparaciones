<br/><br/><br/>

<div class="container margin_60">
    <div class="alert alert-success col-xs-6">
        Bienvenido <?=$_SESSION['usuActivo']->nombre?>, tus credenciales han sido correctamente validadas.
    </div>
</div>
<div class="container margin_60">
    <p>
        Serás redirigido en unos segundos...
    </p>
</div>

<br/><br/><br/>
<script>
    setTimeout(function(){
        window.location = '<?=base_url()?>';
    }, 5000);
</script>