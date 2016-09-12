@extends('layouts.app')

@section('scripts')

    @include("busquedas.functions_scripts")

    <style>
        h2 {font-size:36px;margin:0 0 10px 0}
        p {margin:0 0 10px 0}

        table.width200,table.rwd_auto {border:1px solid #ccc;width:100%;margin:0 0 50px 0;}
        .width200 th,.rwd_auto th {background:#ccc;padding:5px;text-align:center;}
        .width200 td,.rwd_auto td {border-bottom:1px solid #ccc;padding:5px;text-align:center}
        .width200 tr:last-child td, .rwd_auto tr:last-child td{border:0}

        .rwd {width:100%;overflow:auto;}
        .rwd table.rwd_auto {width:auto;min-width:100%}
        .rwd_auto th,.rwd_auto td {white-space: nowrap;}

        @media only screen and (max-width: 760px), (min-width: 768px) and (max-width: 1024px)
        {

            table.width200, .width200 thead, .width200 tbody, .width200 th, .width200 td, .width200 tr { display: block; }

            .width200 thead tr { position: absolute;top: -9999px;left: -9999px; }

            .width200 tr { border: 1px solid #ccc; }

            .width200 td { border: none;border-bottom: 1px solid #ccc; position: relative;padding-left: 50%;text-align:left }

            .width200 td:before {  position: absolute; top: 6px; left: 6px; width: 45%; padding-right: 10px; white-space: nowrap;}

            .width200 td:nth-of-type(1):before { content: "Nombre"; }
            .width200 td:nth-of-type(2):before { content: "Apellidos"; }
            .width200 td:nth-of-type(3):before { content: "Cargo"; }
            .width200 td:nth-of-type(4):before { content: "Twitter"; }
            .width200 td:nth-of-type(5):before { content: "ID"; }

            .descarto {display:none;}
            .fontsize {font-size:10px}
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-width : 320px) and (max-width : 480px)
        {
            body { width: 320px; }
            .descarto {display:none;}
        }

        /* iPads (portrait and landscape) ----------- */
        @media only screen and (min-width: 768px) and (max-width: 1024px)
        {
            body { width: 495px; }
            .descarto {display:none;}
            .fontsize {font-size:10px}
        }
    </style>

    <script>
        $().ready(function(){

            $("select[name='busco']").change(function()
            {
                if($("select[name='busco']").val() == "hechos")
                    obtenerCamposHechos("");
                else if($("select[name='busco']").val() == "personas")
                    obtenerCamposPersonas("");
                else
                    limpiar();
            });

            $("#btnAgregarCriterio").click(function(){
                var donde = $("select[name='donde']").val();
                var es = $("select[name='es']").val();
                var texto_a_buscar = $("input:text[name='texto_a_buscar']").val();

                if(donde != "" && texto_a_buscar != "")
                {
                    $("#parametros").val($("#parametros").val()+darParam($("#parametros").val())+es+"["+donde+"]="+texto_a_buscar);

                    $("#criterios_utilizados").append("<li>" + donde + " = " + texto_a_buscar + "</li>");
                    limpiarCampos();
                }
                else
                    darMensajeError("Debe completar el campo 'donde' y tambien el texto");

            });

            $("#next, #prev, #first, #last").on('click', function(e){
                e.preventDefault();
                var url = $(this).data('url');
                var parametros = darParametros();
                buscar(url,parametros);
            });

            $('#btnBuscar').on('click', function(e) {
                e.preventDefault();


                var url = "";
                var parametros = darParametros();

                if($("select[name='busco']").val() == "hechos")
                    url = "{{route('api.v1.hecho.index')}}" + "?" + "page=1";
                else if($("select[name='busco']").val() == "personas")
                    url = "{{route('api.v1.personas.index')}}" + "?" + "page=1";

                buscar(url,parametros);
            });




        });
    </script>


@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('busco', 'Busco',[]) }}
                {{ Form::select('busco',['' => 'Seleccione tipo de datos','hechos' => 'Hechos','personas' => 'Personas','planillas_datos_entrecruzados' => 'Planilla de datos entre cruzados'], null, array('id' => 'id_tipo_reconocimiento', 'class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('donde', 'Donde',[]) }}
                {{ Form::select('donde',['' => 'Seleccione'], null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('es', 'Es',[]) }}
                {{ Form::select('es',['equals' => 'Igual a','like' => 'Contiene (Texto)'], null, array('id' => 'id_tipo_reconocimiento', 'class' => 'form-control')) }}
            </div>
            <div class="col-md-6 form-inline">
                {{ Form::text( 'texto_a_buscar',null, ['class' => 'form-control','maxlength' => 20, 'style'=>'margin-top: 25px']) }}
                <button type="button" class="btn btn-success btn-sm" id="btnAgregarCriterio" style="margin-top: 25px">Agregar criterio</button>
                <button type="button" class="btn btn-info btn-sm" id="btnBuscar" style="margin-top: 25px">Buscar</button>
            </div>
        </div>
        <div class="form-group col-md-6">
            <strong>Criterios utilizados</strong>
            <div class="row" id="criterios_utilizados">
        </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group col-md-12">
                <strong>Columnas de resultados</strong>
            </div>
            <div class="form-group col-md-6">
                {{ Form::checkbox('delito', 'delito',null,['class' => 'columnas_a_traer']) }} Delitos
            </div>
        </div>

        {{ Form::hidden('parametros',null,['id' => 'parametros']) }}

        <div id="div_data" class="form-group col-md-12">
            {{ Form::button('Primera',['id' => 'first','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Anterior',['id' => 'prev','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Última',['id' => 'last','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            {{ Form::button('Siguiente',['id' => 'next','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            <table class="rwd_auto fontsize" style="overflow-x: auto;width: 700px">
                <tbody id="table">
                </tbody>
            </table>
            <label id="pagina_actual" class="pull-right" >Pagina actual: </label>
        </div>

        <h2 id="sin_datos" class="hidden text-center">No se encontraron resultados</h2>


    </div>
@endsection
