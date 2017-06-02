<div class="container">
    <div class="text-center clearfix">
        <h3 class="big_title">Detalles de Reparación</h3>
    </div>
    <div style="background-color: white; padding: 10px">
    <div class="row">
        <div class="col-xs-12"><!--TODO diseño de los datos por parte de edu -->
            <div class="col-xs-12">
                <fieldset>
                    <legend>Fecha</legend>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Fecha: </strong><?= $reparacion->dia . '/' . $reparacion->mes . '/' . $reparacion->anyo ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Hora: </strong> <?= $reparacion->hora ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12">
                <fieldset>
                    <legend>Reparador</legend>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Nombre: </strong> <?= $reparacion->empleado->nombre?>
                        </div>
                        <div class="col-md-2">
                            <strong>Primer apellido: </strong> <?= $reparacion->empleado->primer_apellido ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Segundo apellido: </strong> <?= $reparacion->empleado->segundo_apellido ?>
                        </div>
                        <div class="col-md-2">
                            <strong>DNI: </strong> <?= $reparacion->empleado->dni_o_cod_taller ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Teléfono: </strong> <?= $reparacion->empleado->telefono ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Email: </strong> <?= $reparacion->empleado->email ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12">
                <fieldset>
                    <legend>Ordenante</legend>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Nombre: </strong> <?= $reparacion->nombre_ordenante ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Primer apellido: </strong> <?= $reparacion->primer_apellido_ordenante ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Segundo apellido: </strong> <?= $reparacion->segundo_apellido_ordenante ?>
                        </div>
                        <div class="col-md-2">
                            <strong>DNI: </strong> <?= $reparacion->dni_ordenante ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Teléfono: </strong> <?= $reparacion->telefono_ordenante ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12">
                <fieldset>
                    <legend>Vehículo</legend>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Marca: </strong> <?= $reparacion->coche->marca ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Modelo: </strong> <?= $reparacion->coche->modelo ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Año: </strong> <?= $reparacion->coche->anyo ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Matrícula: </strong> <?= $reparacion->coche->matricula ?>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Bastidor: </strong> <?= $reparacion->coche->bastidor ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Kms: </strong> <?= $reparacion->coche->kms ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Color: </strong> <?= $reparacion->coche->color ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12">
                <fieldset>
                    <legend>Asegurado</legend>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Nombre: </strong> <?= $reparacion->cliente->nombre ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Primer apellido: </strong> <?= $reparacion->cliente->primer_apellido ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Segundo apellido: </strong> <?= $reparacion->cliente->segundo_apellido ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Dirección: </strong> <?= $reparacion->cliente->direccion ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Código postal: </strong> <?= $reparacion->cliente->cp ?>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Población: </strong> <?= $reparacion->cliente->poblacion ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Teléfono: </strong> <?= $reparacion->cliente->telefono ?>
                        </div>
                        <div class="col-md-2">
                            <strong>DNI: </strong> <?= $reparacion->cliente->dni ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Email: </strong> <?= $reparacion->cliente->email ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12">
                <fieldset>
                    <legend>Siniestro</legend>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Nº siniestro: </strong> <?= $reparacion->numero_siniestro ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Nº poliza: </strong> <?= $reparacion->numero_poliza ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Fecha: </strong> <?= $reparacion->dia_siniestro . '/' . $reparacion->mes_siniestro . '/' . $reparacion->anyo_siniestro ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Aseguradora: </strong> <?= $reparacion->aseguradora ?>
                        </div>
                        <div class="col-md-2">
                            <strong>Tipo de siniestro: </strong> <?= $reparacion->tipo ?>
                        </div>
                    </div>
                </fieldset>
            </div>

            <?php if($reparacion->taller == null) : ?>
                <input type="button" class="btn" value="Asignar a taller externo" data-target="#asignarTaller" data-toggle="modal"/>
            <?php else: ?>
                <div class="col-xs-12">
                    <fieldset>
                        <legend>Taller</legend>
                        <div class="row">
                            <div class="col-md-2">
                                <strong>Nombre: </strong> <?= $reparacion->taller->nombre ?>
                            </div>
                            <div class="col-md-2">
                                <strong>Ciudad: </strong> <?= $reparacion->taller->ciudad ?>
                            </div>
                            <div class="col-md-2">
                                <strong>Teléfono: </strong> <?= $reparacion->taller->telefono ?>
                            </div>
                            <div class="col-md-2">
                                <strong>Dirección: </strong> <?= $reparacion->taller->direccion ?>
                            </div>
                            <div class="col-md-2">
                                <strong>CIF: </strong> <?= $reparacion->taller->cif ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
            <?php endif; ?>
            <a href="<?=base_url()?>reparacion/descargarDatos?id=<?=$reparacion->id?>" class="btn">Descargar Datos</a>
        </div>
    </div>
    </div>
    <hr/>
    <div class="col-xs-12">
        <?php $cont = 0; foreach($reparacion->ownImagenreparacionList as $imagen): ?>
            <?php if($cont%3 == 0) : ?>
                <div class="row">
            <?php $cont = 0; endif; ?>
            <div class="col-md-4 col-xs-12">
                <h6><?=$imagen->titulo?></h6>
                <img src="<?=$imagen->src?>" alt="<?=$imagen->alt?>" width="300" height="auto"/>
                <?php if($imagen->src == base_url() . 'assets/img/reparaciones/noimage.png') : ?>
                    <input type="button" class="btn" value="Añadir Imagen" onclick="asignarSrc(<?=$imagen->id?>, '<?=$imagen->titulo?>')"
                       data-target="#asignarSrc" data-toggle="modal" />
                <?php endif; ?>
            </div>
            <?php if($cont == 2) : ?>
                </div>
            <?php endif; ?>
        <?php $cont += 1; endforeach; ?>
        <?php if($cont != 3) : ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<br/><br/>

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
