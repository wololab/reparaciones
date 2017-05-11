<div class="container">
    <table id="tablaEmpleados" class="" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nick</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI/Cod Taller</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Activo</th>
            <th>Dar de baja</th>
        </tr>
        </thead>
        <tbody id="tableBody">
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?= $empleado->nick ?></td>
                <td><?= $empleado->nombre ?></td>
                <td><?= $empleado->primer_apellido ?> <?= $empleado->segundo_apellido ?></td>
                <td><?= $empleado->dni_o_cod_taller ?></td>
                <td><?= $empleado->telefono ?></td>
                <td><?= $empleado->email ?></td>
                <td><?= $empleado->rol ?></td>
                <td><?= $empleado->activo ? 'Sí' : 'No' ?></td>
                <td><?= !$empleado->activo ? 'Ya está dado de baja' : '<input type="button" class="btn" value="Dar de baja"
                    onclick="darDeBaja(' . $empleado->id . ', this);"/>' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <br/>
    <input type="button" class="btn btn-primary" value="Añadir Reparador" data-target="#aniadirRep" data-toggle="modal"/>
    <br/>
    <br/>
</div>

<!-- Modal -->
<div id="aniadirRep" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Contenido del modal -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Añadir Reparador</h4>
            </div>
            <div class="modal-body">

                <form class="form" action="<?= base_url() ?>empleado/guardaEmpleado"
                      method="post" onsubmit="return admitido;">
                    <p id="info"><br/></p>
                    <label for="nick">Nombre de Usuario</label>
                    <input type="text" id="nick" name="nick" required="required" class="form-control"/>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required="required" class="form-control"/>
                    <label for="primerAp">Primer Apellido</label>
                    <input type="text" class="form-control" id="primerAp" name="primerAp" required="required"/>
                    <label for="segundoAp">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundoAp" name="segundoAp" required="required"/>
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required="required"
                           pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"
                           title="Debe ser un email bien formado"/>
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" required="required"
                    pattern="[6789]\d{8}" title="Debe ser un teléfono válido"/>
                    <label for="dni">Dni o Código de Taller</label>
                    <input type="text" class="form-control" id="dni" name="dni" required="required"/>
                    <label for="rol">Rol</label>
                    <select id="rol" name="rol" class="form-control">
                        <option value="reparador">Reparador</option>
                        <option value="administrador">Administrador</option>
                    </select>
                    <br/>
                    <input type="submit" value="Crear" class="btn btn-primary"/>
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

<?php if(isset($passTemporal)) : ?>
    <!-- Modal -->
    <div id="respEmple" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Contenido del modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Empleado Añadido</h4>
                </div>
                <div class="modal-body">
                    <h1 class="alert alert-success">El empleado <?= $nuevoEmple['nombre']?> <?= $nuevoEmple['primer_apellido']?> <?= $nuevoEmple['segundo_apellido']?> ha sido creado.</h1>
                    <h3 class="alert alert-info">Recuerde que tendrá que hacer login con el usuario <?=$nuevoEmple['nick']?> y contraseña: </h3>
                    <h1 class="alert alert-warning"><?=$passTemporal?></h1>
                    <h3 class="alert alert-info">Recuerde mandar la contraseña por correo a la dirección del reparador -> <?=$nuevoEmple['email']?> .<br/>
                    Al reparador se le pedirá que cambie la contraseña la primera vez que inicie sesión.</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Fin Modal -->
<?php endif; ?>

<script>
    var admitido = false;
    window.onload = function () {
        $('#nick').keyup(comprobarSiExiste);
        $('#tablaEmpleados').DataTable({
            iDisplayLength: 10,//Set Row Per Page
            bFilter: true,//Enable Search
            bPaginate: true,//Enable Pagination
            bInfo: false,//Remove Page Info
            bLengthChange: false,//Show per Page Dropdown Remove
            sPaginationType: "full_numbers",//Full Pagination
            responsive: true,
            scrollX: true,

        });
        <?php if(isset($passTemporal)): ?>
        $('#respEmple').modal('show');
        <?php endif; ?>
    }

    function comprobarSiExiste(){
        $('#info').html('<br/>');
        var conector = new XMLHttpRequest();
        var url = "<?=base_url()?>empleado/usuarioExiste";
        conector.open("POST", url, true);
        conector.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var data = 'nick=' + $(this).val();
        conector.onreadystatechange = function () {
            if (conector.readyState == 4 && conector.status == 200) {
                var estado = conector.responseText;
                $('#info').show();
                if(estado == 0){
                    $('#info').html('Ese nick ya ha sido registrado');
                    $('#info').css('color', 'red');
                    admitido = false;
                } else {
                    $('#info').html('Ese nick puede usarse');
                    $('#info').css('color', 'green');
                    admitido = true;
                }


            }

        }
        conector.send(data);

    }

    function darDeBaja(id, boton) {
        var conector = new XMLHttpRequest();

        var data = 'id=' + id;
        var url = '<?=base_url()?>empleado/darDeBaja?' + data;
        conector.open('GET', url, true);
        conector.onreadystatechange = function () {
            if (conector.readyState == 4 && conector.status == 200) {
                var txt = document.createTextNode('Ya está dado de baja');
                boton.parentNode.previousElementSibling.childNodes[0].textContent = 'No';
                boton.parentNode.appendChild(txt);
                boton.parentNode.removeChild(boton);
            }

        }
        conector.send(null);
    }

</script>