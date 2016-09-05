<script>

    function limpiar()
    {
        $("select[name='donde']").empty();
        $("select[name='donde']").append("<option value=''>Seleccione</option>");
    }


    function limpiarCampos()
    {
        $("select[name='donde']").val("");
        $("input:text[name='texto_a_buscar']").val("");
    }


    function obtenerCamposHechos(selected)
    {
        selected = selected || "";
        $("select[name='donde']").empty();
        $("select[name='donde']").append("<option value=''>Seleccione</option>");


        var url = "{{route('api.v1.hecho.getFields')}}";
        $.getJSON(url,function(data){
            $.each(data, function(id,nombre_campo){
                $("select[name='donde']").append("<option value=\""+ nombre_campo+"\">"+ nombre_campo +"</option>");
            });
        });
    }

    function obtenerCamposPersonas(selected)
    {
        selected = selected || "";
        $("select[name='donde']").empty();
        $("select[name='donde']").append("<option value=''>Seleccione</option>");

        var url = "{{route('api.v1.personas.getFields')}}";
        $.getJSON(url,function(data){
            $.each(data, function(id,nombre_campo){
                $("select[name='donde']").append("<option value=\""+ nombre_campo +"\">"+ nombre_campo +"</option>");
            });
        });
    }

    function buscar(url,parametros)
    {
//        var relations = "relaciones[]=provincia&relaciones[]=frmRec&relaciones[]=frmInscripcion&relaciones[]=tipoEntidad&relaciones[]=estado&relaciones[]=partido&relaciones[]=tipoReconocimiento&relaciones[]=banco&relaciones[]=federacion&relaciones[]=frmInscripcion&relaciones[]=estadoPredio&orderBy[nombre]=asc&&orderBy[id_provincia]=asc";
        var queryString = url + "&" + parametros; // + "&" + relations;

        queryString +=  "&methodFilter=filterWithPaginate";
        console.log(queryString);
        traerResultados(queryString);


    }

    function mostrarDatos(data)
    {
        console.log(data);
    }


</script>