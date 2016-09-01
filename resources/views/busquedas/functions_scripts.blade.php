<script>

    function limpiar()
    {
        $("select[name='donde']").empty();
        $("select[name='donde']").append("<option value=''>Seleccione</option>");
    }

    function obtenerCamposHechos(selected)
    {
        selected = selected || "";
        $("select[name='donde']").empty();
        $("select[name='donde']").append("<option value=''>Seleccione</option>");


        var url = "{{route('api.v1.hecho.getFields')}}";
        $.getJSON(url,function(data){
            $.each(data, function(k,v){
                $("select[name='donde']").append("<option value=\""+ k+"\">"+ v+"</option>");
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
            $.each(data, function(k,v){
                $("select[name='donde']").append("<option value=\""+ k+"\">"+ v+"</option>");
            });
        });
    }


</script>