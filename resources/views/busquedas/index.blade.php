@extends('layouts.app')

@section('scripts')

    @include("busquedas.functions_scripts")


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
                    alert("Debe completar el campo 'donde' y tambien el texto");

            });

            $("#next, #prev, #first, #last").on('click', function(e){
                e.preventDefault();
                var url = $(this).data('url');
//            console.log(url);
                buscar(false, url);
            });

            $('#btnBuscar').on('click', function(e) {
                e.preventDefault();
                var url = "";
                var parametros = $("#parametros").val();
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
        <strong>Criterios utilizados</strong>
        <div class="row" id="criterios_utilizados">

        </div>

        {{ Form::hidden('parametros',null,['id' => 'parametros']) }}

        <!--<div id="div_data" class="hidden">
            {{ Form::button('Primera',['id' => 'first','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Anterior',['id' => 'prev','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Última',['id' => 'last','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            {{ Form::button('Siguiente',['id' => 'next','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            <table class="table responsive table-bordered table-hover table-striped" >
                <thead>
                <tr>
                    <th width="10%">CUIT</th>
                    <th width="11%">Tipo de entidad</th>
                    <th width="19%">Provincia</th>
                    <th width="17%">Nombre</th>
                    <th width="4%">Estado</th>
                    <th width="10%">Domicilio</th>
                    <th width="5%">CP</th>
                    <th width="8%">Telefono</th>
                    <th width="7%">Organismo</th>
                    <th width="5%">Alerta</th>
                    <th width="4%">Acciones</th>
                </tr>
                </thead>
                <tbody id="table">
                </tbody>
            </table>
            <label id="pagina_actual" class="pull-right" >Pagina actual: </label>
        </div>
        <h2 id="sin_datos" class="hidden text-center">No se encontraron resultados</h2>-->


    </div>
@endsection
