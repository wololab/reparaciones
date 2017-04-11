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
    <input type="date" id="fechaInicio"/>
    <input type="date" id="fechaFin"/>
    <br/>
    <input type="button" class="btn btn-primary" onclick="filtra();" value="Filtrar"/>

    <div id="resultado"></div>
</div>
<script>
    var xml; //TODO comprobar si funciona creando varias reparaciones
    cargaXML();

    function cargaXML(){
        var conector = new XMLHttpRequest();
        var url = "<?=base_url()?>administracion/xmlReparaciones";
        conector.open("POST", url, true);

        conector.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        conector.onreadystatechange = function() {
            if(conector.readyState == 4 && conector.status == 200) {
                xml = conector.responseXML;
            }
        }
        conector.send();
    }

    function filtra(){

    }
</script>