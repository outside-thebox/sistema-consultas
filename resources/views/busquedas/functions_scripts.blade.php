<script>

    function darParametros()
    {
        var relaciones = "&"; // initialize empty array
        $(".columnas_a_traer:checked").each(function(){
            relaciones += "relaciones[]="+$(this).val();
        });
        var parametros = $("#parametros").val() + relaciones;

        return parametros;


    }

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
                $("select[name='donde']").append("<option value=\""+ id+"\">"+ nombre_campo +"</option>");
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
//        console.log(queryString);
        traerResultados(queryString);


    }

    function mostrarDatos(data)
    {
        console.log(data);
        $("#table").empty();
        var data_pagina = data.data;
        var data = data.data.data;
        if(data.length > 0) {

            $("#sin_datos").addClass("hidden");
            $("#div_data").removeClass("hidden");

            var firstUrl = "{{route('api.v1.hecho.index')}}" + "?page=1";
            if(data_pagina.next_page_url)
            {
                var nextUrl = data_pagina.next_page_url;
                $("#next").removeClass("hidden");
            }
            else
            {
                $("#next").addClass("hidden");
            }

            if(data_pagina.prev_page_url)
            {
                var prevUrl = data_pagina.prev_page_url;
                $("#prev").removeClass("hidden");
            }
            else
            {
                $("#prev").addClass("hidden");
            }
            var lastUrl = "{{route('api.v1.hecho.index')}}" + "?page="+data_pagina.last_page;

            console.log(firstUrl);
            $("#first").data('url',firstUrl);
            $("#next").data('url',nextUrl);
            $("#pagina_actual").text('Página '+ data_pagina.current_page + ' de '+ data_pagina.last_page + '. Cantidad de registros: ' + data_pagina.total);
            $("#prev").data('url',prevUrl);
            $("#last").data('url',lastUrl);

            var len = data.length;
            var txt = "";

            if(len > 0) {

                for (var i = 0; i < len; i++) {

                    txt += "<tr>";
                    txt += "<td>"+data[i].HE_ADEPSUM+"</td>";
                    txt += "<td>"+data[i].HE_DEPEN+"</td>";
                    txt += "<td>"+data[i].HE_NUMSUM+ "</td>";
                    txt += "<td>"+data[i].HE_FECHINI+"</td>";
                    txt += "<td>"+data[i].HE_FECHFIN+"</td>";
                    txt += "<td>"+data[i].HE_DILIJUD+"</td>";
                    txt += "<td>"+data[i].HE_ACTANT+"</td>";
                    txt += "<td>"+data[i].HE_ACTORIG+"</td>";
                    txt += "<td>"+data[i].HE_ACTGIR+"</td>";
                    txt += "<td>"+data[i].HE_MODALI+"</td>";
                    txt += "<td>"+data[i].HE_PROV+"</td>";
                    txt += "<td>"+data[i].HE_LOCALI+"</td>";
                    txt += "<td>"+data[i].HE_LUGHECH+"</td>";
                    txt += "<td>"+data[i].HE_MEDIOEM+"</td>";
                    txt += "<td>"+data[i].HE_GIS+"</td>";
                    txt += "<td>"+data[i].HE_DICE1+"</td>";
                    txt += "<td>"+data[i].HE_DICE2+"</td>";
                    txt += "<td>"+data[i].HE_DICE3+"</td>";
                    txt += "<td>"+data[i].HE_DICE4+"</td>";
                    txt += "<td>"+data[i].HE_TIPOHEC+"</td>";
                    txt += "<td>"+data[i].HE_COLISIO+"</td>";
                    txt += "<td>"+data[i].HE_UBICACI+"</td>";
                    txt += "<td>"+data[i].HE_LUGVIA+"</td>";
                    txt += "<td>"+data[i].HE_ESTVIA+"</td>";
                    txt += "<td>"+data[i].HE_ESTCLIM+"</td>";
                    txt += "<td>"+data[i].HE_CALLE+"</td>";
                    txt += "</tr>";

                }

                if(txt != ""){
                    $("#table").append(txt).removeClass("hidden");
                }
            }



        }
        else
        {
            $("#div_data").addClass("hidden");
            $("#sin_datos").removeClass("hidden");
        }



    }


</script>