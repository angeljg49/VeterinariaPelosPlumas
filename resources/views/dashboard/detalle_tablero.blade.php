@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
    <h3 class="title-header" style="text-transform: uppercase;">
        <i class="fa fa-home"></i>
        {{$titulo}}
    </h3>
    <div class="row">
        <div class="col-12">
                <!-- inicio card  -->
                <div class="card card-stat">
                    <div class="card-body">
                          </div>
                            <hr>
                            <hr>
                            <div class="row">
                            </div>
                    </div>
                </div>
                <!-- fin card  -->



        </div>
    </div>
</div>




<script type="text/javascript">
$(function(){


});


</script>




@endsection
