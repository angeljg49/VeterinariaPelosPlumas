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

                        <div class="row">                            
                            <div class="col-md-3">
                                <div class="box-result">
                                    <h1>{{$mascotas->count()}}</h1>
                                    MASCOTAS REGISTRADAS
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="box-result">
                                  <h1>{{$propietarios->count()}}</h1>
                                  PROPIETARIOS REGISTRADOS
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="box-result">
                                  <h1>{{$vacunas->count()}}</h1>
                                  VACUNAS CONTROLADAS
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="box-result">
                                  <h1>{{$vacunas_aplicadas->count()}}</h1>
                                  VACUNAS APLICADAS
                              </div>
                            </div>
                        </div>                        
                        <hr>
                        <div class="row">                            
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box-result">
                                            <h1>{{$cirugias->count()}}</h1>
                                            CIRUGIAS ATENDIDAS
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box-result">
                                            <h1>{{$consultas->count()}}</h1>
                                            CONSULTAS ATENDIDAS
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box-result">
                                            <h1>{{$citas->count()}}</h1>
                                            CITAS GENERADAS
                                        </div>        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box-result">
                                            <h1>{{$veterinarios->count()}}</h1>
                                            VETERINARIOS REGISTRADOS
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-success">CONSULTAS ATENDIDOS POR DIA</h4>
                                {{-- @foreach ($cpd as $item)
                                    {{$item->fecha}} {{$item->total_consultas}}
                                    <br>
                                @endforeach --}}
                                <canvas id="grafica-consultas"></canvas>
                            </div>
                        </div>                       
                        <hr> 
                        
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

/*
----------------------------------------
GRAFICA DE CONSULTAS
----------------------------------------
*/
const ctx = document.getElementById('grafica-consultas');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php foreach($cpd as $item){ echo "'".$item->fecha."',";}?>],
    datasets: [{
      label: 'Consultas atendidas por dia',
      data: [<?php foreach($cpd as $item){ echo "'".$item->total_consultas."',";}?>],
      borderWidth: 1,
      backgroundColor: [
      'rgb(108, 117, 125, 0.6)',
      'rgba(75, 152, 64, 0.6)',
      'rgb(115, 194, 85, 0.6)'
      ],      
      hoverOffset: 5      
    }]
  },
  options: {
    // scales: {
    //   y: {
    //     beginAtZero: true
    //   }
    // }
  }
});


</script>




@endsection
