<div class="container">
    <form action="<?= base_url() ?>reparacion/reparacion/registrarReparacion" method="post" enctype="multipart/form-data">
        <br/>
        <fieldset>
            <legend>Matrícula *</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="matricula" type="file" style="display: none;" onchange="readURL(this, 1)" required="required"/>
            </label>
            <br/>
            <br/>
            <img id="prev1" src="#" alt="Matrícula" class="previewForm"/>
        </fieldset>
        <fieldset>
            <legend>Detalle de Luna *</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="detalleLuna" type="file" style="display: none;" onchange="readURL(this, 2)" required="required"/>
            </label>
            <br/>
            <br/>
            <img id="prev2" src="#" alt="Detalle de Luna" class="previewForm"/>
        </fieldset>
        <fieldset>
            <legend>Permiso de Circulación *</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="permiso" type="file" style="display: none;" onchange="readURL(this, 3)" required="required"/>
            </label>
            <br/>
            <br/>
            <img id="prev3" src="#" alt="Permiso de Circulación" class="previewForm"/>
        </fieldset>
        <fieldset>
            <legend>Póliza</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="poliza" type="file" style="display: none;" onchange="readURL(this, 4)"/>
            </label>
            <br/>
            <br/>
            <img id="prev4" src="#" alt="Póliza" class="previewForm"/>
        </fieldset>
        <fieldset>
            <legend>Recibo</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="recibo" type="file" style="display: none;" onchange="readURL(this, 5)"/>
            </label>
            <br/>
            <br/>
            <img id="prev5" src="#" alt="Recibo" class="previewForm"/>
        </fieldset>
        <fieldset>
            <legend>Máquina de Reparar o Luna Quitada *</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="maquinaOLunaQuitada" type="file" style="display: none;" onchange="readURL(this, 6)" required="required"/>
            </label>
            <br/>
            <br/>
            <img id="prev6" src="#" alt="Máquina de Reparar o Luna Quitada" class="previewForm"/>
        </fieldset>
        <fieldset>
            <legend>Orden de Trabajo *</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="ordenTrabajo" type="file" style="display: none;" onchange="readURL(this, 7)" required="required"/>
            </label>
            <br/>
            <br/>
            <img id="prev7" src="#" alt="Orden de Trabajo" class="previewForm"/>
        </fieldset>
        <fieldset>
            <legend>Impacto Reparado o Luna Montada</legend>
            <label class="btn btn-default btn-file">
                Browse <input name="impactoOLunaMontada" type="file" style="display: none;" onchange="readURL(this, 8)"/>
            </label>
            <br/>
            <br/>
            <img id="prev8" src="#" alt="Impacto Reparado o Luna Montada" class="previewForm"/>
        </fieldset>
        <fieldset id="imagenes">
            <legend>Imagenes Extra</legend>
            <input type="button" class="btn btn-darkblue" onclick="aniadirImagenExtra();" value="Añadir Imagen"/>
            <br/>
        </fieldset>
        <br/>
        <input type="submit" value="Registrar Reparación" class="btn btn-primary"/>
    </form>
</div>
<script>
    var index = 1;
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev' + id).attr('src', e.target.result);
                $('#prev' + id).toggle();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function aniadirImagenExtra(){
        $('#imagenes').append('<label for="titulo' + index + '">Título de Imagen</label>');
        $('#imagenes').append('<input type="text" class="form-control" id="titulo' + index + '" name="titulo' + index + '" required="required"/>');
        $('#imagenes').append('<label class="btn btn-default btn-file">' +
        'Browse <input name="img' + index + '" type="file" style="display: none;" onchange="readURL(this, ' + (8+index) + ')" required="required"/>' +
            '</label><br/> <br/>' +
            '<img id="prev' + (8+index) + '" src="#" alt="Imagen Extra" class="previewForm"/> <br/>');
        index += 1;

    }
</script>