@extends('layouts.app')

@section('scripts')

    @include("busquedas.functions_scripts")

    @include("busquedas.css")


    <script>
        $().ready(function(){

            contarParametros();


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
                /*var donde = $("select[name='donde']").val();
                var es = $("select[name='es']").val();
                var texto_a_buscar = $("input:text[name='texto_a_buscar']").val();

                if(donde != "" && texto_a_buscar != "")
                {
                    $("#parametros").val($("#parametros").val()+darParam($("#parametros").val())+es+"["+donde+"]="+texto_a_buscar);

                    $("#criterios_utilizados").append("<li>" + donde + " = " + texto_a_buscar + "</li>");
                    limpiarCampos();
                }
                else
                    darMensajeError("Debe completar el campo 'donde' y tambien el texto");*/
                agregarCriterio();

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

        <div id="div_data" class="form-group col-md-12 hidden">
            {{ Form::button('Primera',['id' => 'first','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Anterior',['id' => 'prev','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Última',['id' => 'last','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            {{ Form::button('Siguiente',['id' => 'next','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            <table class="rwd_auto fontsize form-group col-md-12" style="overflow-x: auto">
                <tbody id="table" style="position:absolute;overflow-x: scroll" class="form-group col-md-12">
                </tbody>
            </table>
        </div>

        <h2 id="sin_datos" class="hidden text-center">No se encontraron resultados</h2>


    </div>
@endsection
