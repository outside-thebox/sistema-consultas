@extends('layouts.app')

@section('scripts')

    @include("busquedas.functions_scripts")


    <script>

        $().ready(function(){

            /*var url = "@{{route('busquedas.getData')}}";

            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    console.log(data);
                }
            });*/

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
                    $("#criterios_utilizados").append("<li>" + donde + " = " + texto_a_buscar + "</li>");
                    limpiarCampos();
                }
                else
                    alert("Debe completar el campo 'donde' y tambien el texto");

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
                {{ Form::select('es',['=' => 'Igual a','like' => 'Contiene (Texto)'], null, array('id' => 'id_tipo_reconocimiento', 'class' => 'form-control')) }}
            </div>
            <div class="col-md-6 form-inline">
                {{ Form::text( 'texto_a_buscar',null, ['class' => 'form-control','maxlength' => 20, 'style'=>'margin-top: 25px']) }}
                <button type="button" class="btn btn-success btn-sm" id="btnAgregarCriterio" style="margin-top: 25px">Agregar criterio</button>
            </div>
        </div>
        <strong>Criterios utilizados</strong>
        <div class="row" id="criterios_utilizados">

        </div>


    </div>
@endsection
