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


</script>