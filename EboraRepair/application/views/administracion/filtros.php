<div class="container">
    <label for="Filtro">Filtro</label>
    <input type="text" class="form-control" id="texto"/>
    <label for="filtro">Búsqueda por</label>
    <select id="filtro" class="form-control">
        <option disabled="disabled" selected="selected">Selecciona Filtro</option>
        <option value="matricula">Matrícula</option>
        <option value="aseguradora">Aseguradora</option>
        <option value="reparador">Nombre de Reparador</option>
        <option value="taller">Nombre de Taller</option>
        <option value="cliente">Nombre de Cliente</option>
        <option value="modelo">Modelo de Coche</option>
        <option value="ciudad">Ciudad</option>
    </select>
    <label for="facturada">Facturada</label>
    <input type="checkbox" id="facturada"/>
    <br/>
    <label>Rango</label>
    <input type="date" class="form-control" id="fechaInicio"/>
    <input type="date" class="form-control" id="fechaFin"/>
    <br/>
    <input id="filtrar" disabled="disabled" type="button" class="btn btn-primary" onclick="filtra();" value="Filtrar"/>

    <div id="resultado">
        <table id="tablaFiltrada" class="display" cellspacing="0" width="100%"> <!-- DEL cambiar por el xml-->
           <thead>
           <tr>
               <th>Título 1</th>
               <th>Título 2</th>
           </tr>
           </thead>
            <tbody>
            <tr>
                <td>aaaaa</td>
                <td>bbbbb</td>
            </tr>
            <tr>
                <td>bbbbb</td>
                <td>ccccc</td>
            </tr>
            <tr>
                <td>ddddd</td>
                <td>eeeee</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    var xml;
    cargaXML();
    window.onload = function(){
        $('#tablaFiltrada').dataTable({
            'iDisplayLength': 1,//Set Row Per Page
            "bFilter": true,//Enable Search
            "bPaginate" : true,//Enable Pagination
            "bInfo": false,//Remove Page Info
            "bLengthChange":false,//Show per Page Dropdown Remove
            "sPaginationType": "full_numbers"//Full Pagination
        });
    };
    function cargaXML(){
        var conector = new XMLHttpRequest();
        var url = "<?=base_url()?>administracion/xmlReparaciones";
        conector.open("POST", url, true);
        conector.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        conector.onreadystatechange = function() {
            if(conector.readyState == 4 && conector.status == 200) {
                //                xml = conector.responseText;
                //                console.log(xml);
                xml = conector.responseXML;
                console.log(xml.getElementsByTagName('nombre').length);
                document.getElementById('filtrar').disabled=false;
            }

        }
        conector.send();
    }

    function filtra(){

    }
</script>