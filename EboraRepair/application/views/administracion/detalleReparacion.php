<div class="container">
    <h1>Detalles de Reparación</h1>
    <p>
        * DATOS * <!--TODO diseño de los datos por parte de edu -->
        <br/>
        <?php if($reparacion->taller == null) : ?>
            <input type="button" class="btn" value="Asignar a taller externo" data-target="#asignarTaller" data-toggle="modal"/>
            <br/>
        <?php else: ?>
            *DATOS DE TALLER*
            <br/>
        <?php endif; ?>
        <a href="<?=base_url()?>reparacion/descargarDatos?id=<?=$reparacion->id?>" class="btn">Descargar Datos</a>
        <br/>
    </p>
    <div class="row">
        <?php foreach($reparacion->ownImagenreparacionList as $imagen): ?>
            <h4><?=$imagen->titulo?></h4>
            <img src="<?=$imagen->src?>" alt="<?=$imagen->alt?>"/>
            <?php if($imagen->src == base_url() . 'assets/img/reparaciones/noimage.png') : ?>
            <input type="button" class="btn" value="Añadir Imagen" onclick="asignarSrc(<?=$imagen->id?>, '<?=$imagen->titulo?>')"
                   data-target="#asignarSrc" data-toggle="modal" />
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div id="asignarTaller" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del modal -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enviar a Taller Externo</h4>
            </div>
            <div class="modal-body">
                <form class="form" action="<?= base_url() ?>reparacion/enviarATaller"
                      method="post">
                    <input type="hidden" name="id" value="<?=$reparacion->id?>"/>
                    <label for="nombre">Nombre del Taller</label>
                    <input type="text" id="nombre" name="nombre" required="required" class="form-control"/>
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" required="required"/>
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required="required"
                           pattern="[6789]\d{8}" title="El teléfono debe empezar por 6, 7, 8 o 9 y tener 8 números más"/>
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" required="required"/>
                    <label for="cif">CIF</label>
                    <input type="text" class="form-control" id="cif" name="cif" required="required"/>
                    <br/>
                    <input type="submit" value="Asignar a Taller" class="btn btn-primary"/>
                    <br/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<!-- Fin Modal -->

<!-- Modal -->
<div id="asignarSrc" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del modal -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Añadir Imágen</h4>
            </div>
            <div class="modal-body">
                <h3 id="titulo"></h3>
                <form class="form" action="<?= base_url() ?>reparacion/aniadirImagen"
                      method="post" enctype="multipart/form-data">
                    <input type="hidden" id="idImagen" name="idImagen" value=""/>
                    <label for="imagen">Imágen</label>
                    <input type="file" id="imagen" name="imagen" required="required" class="form-control"/>
                    <br/>
                    <input type="submit" value="Asignar" class="btn btn-primary"/>
                    <br/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<!-- Fin Modal -->
<script>
    function asignarSrc(idImagen, titulo){
        $('#titulo').html(titulo);
        $('#idImagen').val(idImagen);
    }
</script>
