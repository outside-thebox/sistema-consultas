<script>

    function contarParametros()
    {
        if($("input[name='parametros']").val() != "")
            var lista = jQuery.parseJSON($("input[name='parametros']").val());
        else
        {
            $("#btnBuscar").addClass("hidden");
            var lista = [];
        }

        if(lista.length > 0)
        {
            var val = "";
                $.each(lista,function(index, value){
                if(value.deleted_at == null)
                {
                    return val = true;
                }
            });
        }
        if(val)
            $("#btnBuscar").removeClass("hidden");
        else
            $("#btnBuscar").addClass("hidden");

    }


    function agregarCriterio()
    {
        if($("input[name='parametros']").val() != "")
            var lista = jQuery.parseJSON($("input[name='parametros']").val());
        else
            var lista = [];

//        console.log(lista.length);
        var donde = $("select[name='donde']").val();
        var es = $("select[name='es']").val();
        var texto_a_buscar = $("input:text[name='texto_a_buscar']").val();


        if(donde != "" && texto_a_buscar != "")
        {

            var lugar_hecho = $("select[name='donde'] option:selected").text();
            if(es == "equals")
                var criterio = lugar_hecho + " = " + texto_a_buscar;
            else
                var criterio = lugar_hecho + " contiene " + texto_a_buscar;

            var nuevo = {id:lista.length+1,'criterio':criterio,'donde':donde,'es':es,'texto':texto_a_buscar,'deleted_at':null};

            lista.push(nuevo);
            $("input[name='parametros']").val(JSON.stringify(lista));
            darListaParametros(lista);
            limpiarCampos();


        }
        else
            darMensajeError("Debe completar el campo 'donde' y tambien el texto");
    }

    function darListaParametros(lista)
    {
        lista = lista || [];
        if(lista.length == 0)
            $("#criterios_utilizados").html("");
        else
        {
            var salida = "";
            $.each(lista,function(index, value){
                if(value.deleted_at == null)
                {
                    var eliminarCriterio = 'eliminarCriterio("' + value.id+ '")';
                    salida = salida + '<span  class="label label-info" style="margin-left: 5px; margin-top: 3px; display: inline-block; font-size: 18px">'+ value.criterio +'<i class="glyphicon glyphicon-remove styleButtonImage" onclick='+ eliminarCriterio +' style="margin-left: 3px"></i></span>';
                }
            });
            $("#criterios_utilizados").html(salida);
        }

        contarParametros();

    }

    function eliminarCriterio(id_criterio)
    {
        var lista = jQuery.parseJSON($("input[name='parametros']").val());
        var nueva_lista = [];
        $.each(lista,function(index, value){

            if (value.id == id_criterio)
            {
                var f = new Date();
                value.deleted_at = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()
            }

            nueva_lista.push(value);


        });
        $("input[name='parametros']").val(JSON.stringify(nueva_lista));
        darListaParametros(nueva_lista);
    }




    /* ----------------------------------------------------------------------------------------------------*/


    function darParametros()
    {
        var relaciones = "&"; // initialize empty array
        $(".columnas_a_traer:checked").each(function(){
            relaciones += "relaciones[]="+$(this).val();
        });


        var lista_parametros = jQuery.parseJSON($("#parametros").val());

        var parametros = "";
        $.each(lista_parametros,function(index, value){

            if(value.deleted_at == null)
            {
                if(parametros == "")
                    parametros = value.es+"["+value.donde+"]="+value.texto;
                else
                    parametros = parametros + "&" + value.es+"["+value.donde+"]="+value.texto;

            }
        });

        parametros = parametros + relaciones;

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

//            console.log(firstUrl);
            $("#first").data('url',firstUrl);
            $("#next").data('url',nextUrl);
            $("#pagina_actual").text('Página '+ data_pagina.current_page + ' de '+ data_pagina.last_page + '. Cantidad de registros: ' + data_pagina.total);
            $("#prev").data('url',prevUrl);
            $("#last").data('url',lastUrl);

            var len = data.length;
            var txt = "";

            if(len > 0) {


                var firstItem = data[0];

                txt += "<tr>";
                for(key in firstItem) {
                    txt += "<th>"+key+"</th>";
                }
                txt += "</tr>";

                $.each(data, function(key, value){
                    txt += "<tr>";
                    $.each(value, function(key, value){
                        console.log(key, value);
                        txt += "<td>"+value+"</td>";
                    });
                    txt += "</tr>";
                });

//                for (var i = 0; i < len; i++) {
//
//                    txt += "<tr>";
//                    txt += "<td>"+data[i].HE_ADEPSUM+"</td>";
//                    txt += "<td>"+data[i].HE_DEPEN+"</td>";
//                    txt += "<td>"+data[i].HE_NUMSUM+ "</td>";
//                    txt += "<td>"+data[i].HE_FECHINI+"</td>";
//                    txt += "<td>"+data[i].HE_FECHFIN+"</td>";
//                    txt += "<td>"+data[i].HE_DILIJUD+"</td>";
//                    txt += "<td>"+data[i].HE_ACTANT+"</td>";
//                    txt += "<td>"+data[i].HE_ACTORIG+"</td>";
//                    txt += "<td>"+data[i].HE_ACTGIR+"</td>";
//                    txt += "<td>"+data[i].HE_MODALI+"</td>";
//                    txt += "<td>"+data[i].HE_PROV+"</td>";
//                    txt += "<td>"+data[i].HE_LOCALI+"</td>";
//                    txt += "<td>"+data[i].HE_LUGHECH+"</td>";
//                    txt += "<td>"+data[i].HE_MEDIOEM+"</td>";
//                    txt += "<td>"+data[i].HE_GIS+"</td>";
//                    txt += "<td>"+data[i].HE_DICE1+"</td>";
//                    txt += "<td>"+data[i].HE_DICE2+"</td>";
//                    txt += "<td>"+data[i].HE_DICE3+"</td>";
//                    txt += "<td>"+data[i].HE_DICE4+"</td>";
//                    txt += "<td>"+data[i].HE_TIPOHEC+"</td>";
//                    txt += "<td>"+data[i].HE_COLISIO+"</td>";
//                    txt += "<td>"+data[i].HE_UBICACI+"</td>";
//                    txt += "<td>"+data[i].HE_LUGVIA+"</td>";
//                    txt += "<td>"+data[i].HE_ESTVIA+"</td>";
//                    txt += "<td>"+data[i].HE_ESTCLIM+"</td>";
//                    txt += "<td>"+data[i].HE_CALLE+"</td>";
//                    txt += "</tr>";
//
//                }



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