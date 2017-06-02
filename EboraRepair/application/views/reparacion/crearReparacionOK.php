<br/><br/><br/>

<div class="container margin_60">
    <div class="alert alert-success col-xs-6">
        Guardada reparación de: <?=$_SESSION['marca']?> <?=$_SESSION['modelo']?>
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
        window.location = '<?=base_url()?>administracion/filtros';
    }, 5000);
</script>