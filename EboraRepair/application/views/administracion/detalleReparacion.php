<div class="container">
    <h1>Detalles de Reparación</h1>
    <p>
        * DATOS * <!--TODO decirle a edu que lo haga él o preguntarle como mostrar los datos -->
        <!-- TODO botón de enviar a taller externo -->
    </p>
    <div class="row">
        <?php foreach($reparacion->ownImagenreparacionList as $imagen): ?>
            <h4><?=$imagen->titulo?></h4>
            <img src="<?=$imagen->src?>" alt="<?=$imagen->alt?>"/>
            <?php if($imagen->src == base_url() . 'assets/img/reparaciones/noimage.png') : ?>
            <input type="button" class="btn" value="Añadir Imagen" onclick="asignarSrc(<?=$imagen->id?>)"/>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function asignarSrc(idImagen){
        //TODO modal para asignar src
    }
</script>
