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
            Busqueda
        </div>
    </div>
@endsection
