@extends('layouts.app')

@section('scripts')

    <script>

        $().ready(function(){

            var url = "{{route('busquedas.getData')}}";

            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    console.log(data);
                }
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
                {{ Form::select('donde',['' => 'Seleccione el campo','campo1' => 'campo1','campo2' => 'campo2','campo3' => 'campo3'], null, array('id' => 'id_tipo_reconocimiento', 'class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('es', 'Es',[]) }}
                {{ Form::select('es',['igual_a' => 'Igual a','contiene' => 'Contiene (Texto)'], null, array('id' => 'id_tipo_reconocimiento', 'class' => 'form-control')) }}
            </div>
        </div>
    </div>
@endsection
