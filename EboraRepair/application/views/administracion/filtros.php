<div class="container">
    <form onsubmit="return filtra();">
        <label for="texto">Filtro</label>
        <input type="text" class="form-control" id="texto" disabled="disabled"/>
        <label for="filtro">Búsqueda por</label>
        <select id="filtro" class="form-control">
            <option selected="selected" value="todos">Todas las Reparaciones</option>
            <option value="matricula">Matrícula</option>
            <option value="aseguradora">Aseguradora</option>
            <option value="nombreReparador">Reparador</option>
            <option value="nombreTaller">Nombre de Taller</option>
            <option value="nombre">Cliente</option>
            <option value="modelo">Modelo de Coche</option>
            <option value="poblacion">Población</option>
        </select>
        <label for="facturada">Facturada</label>
        <input type="checkbox" id="facturada"/>
        <label for="desactivar">Desactivar Check</label>
        <input type="checkbox" id="desactivar"/>
        <br/>
        <label>Rango</label>
        <input type="date" class="form-control" id="fechaInicio" value="2000-01-01" required="required"/>
        <input type="date" class="form-control" id="fechaFin" value="2020-01-01" required="required"/>
        <br/>
        <input id="filtrar" disabled="disabled" type="submit" class="btn btn-primary" value="Filtrar"/>
    </form>
    <div id="resultado">
        <table id="tablaFiltrada" class="" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Día</th>
                <th>Mes</th>
                <th>Año</th>
                <th>Tipo</th>
                <th>Aseguradora</th>
                <th>Número de Siniestro</th>
                <th>Cliente</th>
                <th>Código Postal</th>
                <th>Población</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Matrícula</th>
                <th>Bastidor</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Reparador</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Activo</th>
                <th>Facturada</th>
                <th>Facturar</th>
                <th>Detalles</th>
            </tr>
            </thead>
            <tbody id="tableBody">

            </tbody>
        </table>
    </div>
</div>
<script>
    var xml;
    cargaXML();
    window.onload = function () {

        $('#filtro').on('change', deshabilitarTexto);
        $('#desactivar').on('click', deshabilitarFacturacion);
        $('#tablaFiltrada').dataTable({
            iDisplayLength: 10,//Set Row Per Page
            bFilter: true,//Enable Search
            bPaginate : true,//Enable Pagination
            bInfo: false,//Remove Page Info
            bLengthChange:false,//Show per Page Dropdown Remove
            sPaginationType: "full_numbers",//Full Pagination
            responsive: true,
            scrollX: true,

        });
    };

    function deshabilitarFacturacion(){
        if($(this).is(':checked')){
            $('#facturada').attr('disabled', true);
        } else {
            $('#facturada').attr('disabled', false);
        }
    }

    function deshabilitarTexto(){
        if($(this).val() == 'todos'){
            $('#texto').attr('disabled', true);
        } else {
            $('#texto').attr('disabled', false);
        }
    }

    function cargaXML() {
        var conector = new XMLHttpRequest();
        var url = "<?=base_url()?>administracion/xmlReparaciones";
        conector.open("POST", url, true);
        conector.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        conector.onreadystatechange = function () {
            if (conector.readyState == 4 && conector.status == 200) {
                //                xml = conector.responseText;
                //                console.log(xml);
                xml = conector.responseXML;
                //console.log(xml.getElementsByTagName('nombre').length);
                document.getElementById('filtrar').disabled = false;
            }

        }
        conector.send();
    }

    var anyoInicio = '';
    var mesInicio = '';
    var diaInicio = '';
    var anyoFin = '';
    var mesFin = '';
    var diaFin = '';

    function filtra() {
        try {
            $('#tablaFiltrada').DataTable().destroy();
            $('#tableBody').html('');
            var texto = $('#texto').val();
            var filtro = $('#filtro').val();
            var facturada = document.getElementById('facturada').checked;
            var fechaInicio = $('#fechaInicio').val();
            var fechaSplit = fechaInicio.split('-');
            anyoInicio = fechaSplit[0];
            mesInicio = fechaSplit[1];
            diaInicio = fechaSplit[2];
            var fechaFin = $('#fechaFin').val();
            var fechaSplit = fechaFin.split('-');
            anyoFin = fechaSplit[0];
            mesFin = fechaSplit[1];
            diaFin = fechaSplit[2];
            var reparaciones = xml.getElementsByTagName('reparacion');
           // var reparacionesQueEncajan = [];
            for (var i = 0; i < reparaciones.length; i += 1) {
                var reparacion = reparaciones[i];
                var encaja = isBetweenFechas(reparacion); //Functiona
                if (encaja) {
                    encaja = isFacturada(reparacion, facturada);
                }
                if (encaja) {
                    encaja = campoCoincide(reparacion, texto, filtro);
                }
                if (encaja) {
                   insertarEnTabla(reparacion);
                }
            }
            $('#tablaFiltrada').dataTable({
                iDisplayLength: 10,//Set Row Per Page
                bFilter: true,//Enable Search
                bPaginate : true,//Enable Pagination
                bInfo: false,//Remove Page Info
                bLengthChange:false,//Show per Page Dropdown Remove
                sPaginationType: "full_numbers",//Full Pagination
                responsive: true,
                scrollX: true,

            });
           // console.log(reparacionesQueEncajan.length);
            return false;
        } catch (e) {
            console.error(e.message);
            return false;
        }

    }

    function insertarEnTabla(reparacion){
        var fila = '<tr>';
        var elementos = [];
        var id = reparacion.getElementsByTagName('id')[0].textContent.toString();
        elementos.push(reparacion.getElementsByTagName('dia')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('mes')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('anyo')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('tipo')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('aseguradora')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('numeroSiniestro')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('nombre')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('cp')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('poblacion')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('telefono')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('email')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('matricula')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('bastidor')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('marca')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('modelo')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('anyoCoche')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('nombreReparador')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('telefonoReparador')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('emailReparador')[0].textContent.toString());
        elementos.push(reparacion.getElementsByTagName('activo')[0].textContent.toString()=='0'?'No':'Sí');
        var facturada = reparacion.getElementsByTagName('facturada')[0].textContent.toString()=='0'?'No':'Sí';
        elementos.push(facturada);
        var facturar = facturada=='Sí'?false:true;
        elementos.push('<input type="button" value="' + (facturar?'Facturar':'Desfacturar') + '" class="btn" ' +
            'onclick="' + (facturar?'facturar(this, ' + id + ');':'desfacturar(this, ' + id + ');') + '" />');
        elementos.push('<input type="button" value="Detalles" class="btn" onclick="detalles(' + id + ');" />');

        for(var i = 0; i < elementos.length; i+=1){
            fila += '<td>';
            fila += elementos[i];
            fila += '</td>';
        }

        fila += '</tr>';
        $('#tableBody').html($('#tableBody').html() + fila);
    }

    function facturar(boton, id){
        var conector = new XMLHttpRequest();
        var url = "<?=base_url()?>reparacion/facturar";
        var data = 'id=' + id;
        conector.open("POST", url, true);
        conector.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        conector.onreadystatechange = function () {
            if (conector.readyState == 4 && conector.status == 200) {
                boton.value = 'Desfacturar';
                boton.onclick = function(){desfacturar(this, id);};
                boton.parentNode.previousSibling.childNodes[0].textContent = 'Sí';
                cargaXML();
            }

        }
        conector.send(data);
    }
    function desfacturar(boton, id){
        var conector = new XMLHttpRequest();
        var url = "<?=base_url()?>reparacion/desfacturar";
        var data = 'id=' + id;
        conector.open("POST", url, true);
        conector.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        conector.onreadystatechange = function () {
            if (conector.readyState == 4 && conector.status == 200) {
                boton.value = 'Facturar';
                boton.onclick = function(){this, facturar(id);};
                boton.parentNode.previousSibling.childNodes[0].textContent = 'No';
                cargaXML();
            }

        }
        conector.send(data);
    }

    function detalles(id){
        window.location = '<?=base_url()?>administracion/detalleReparacion?id=' + id;
    }

    function campoCoincide(reparacion, texto, filtro) {
        //console.log('texto: ' + texto + ' filtro: ' + filtro);
        if (filtro == 'todos') {
            return true;
        }
        else {
            var campo = reparacion.getElementsByTagName(filtro)[0].textContent.toString().toLowerCase();
            if (texto == '' || campo.search(texto.toLowerCase()) != -1 ) {
                return true;
            }
            return false;
        }

    }

    function isFacturada(reparacion, facturada) {
        var isFact = reparacion.getElementsByTagName('facturada')[0].textContent.toString() == '0' ? false : true;
        //console.log(isFact + " " + facturada);
        if ($('#facturada').attr('disabled') || isFact == facturada) {
            return true;
        }
        return false;
    }
    function isBetweenFechas(reparacion) {
        var encaja = false;
        var anyo = parseInt(reparacion.getElementsByTagName('anyo')[0].textContent.toString());
        var mes = parseInt(reparacion.getElementsByTagName('mes')[0].textContent.toString());
        var dia = parseInt(reparacion.getElementsByTagName('dia')[0].textContent.toString());
        //console.log('dia: ' + dia + ' mes: ' + mes + ' año: ' + anyo);
        //console.log('diaFin: ' + diaFin + ' mesFin: ' + mesFin + ' añoFin: ' + anyoFin);
        //console.log('diaInicio: ' + diaInicio + ' mesInicio: ' + mesInicio + ' añoInicio: ' + anyoInicio);

        if (anyo < anyoFin && anyo > anyoInicio) { // Dentro de la franja de años
            encaja = true;
        } else if (anyo == anyoFin) { // Si está en el año fin debemos ver si los meses y días están dentro
            if (mes < mesFin) {
                encaja = true;
            } else if (mes == mesFin) {
                if (dia <= diaFin) {
                    encaja = true;
                }
            }
        } else if (anyo == anyoInicio) { // Y si no si es igual a añoinicio lo mismo
            if (mes > mesInicio) {
                encaja = true;
            } else if (mes == mesInicio) {
                if (dia >= diaFin) {
                    encaja = true;
                }
            }
        }
        return encaja;
    }
</script>