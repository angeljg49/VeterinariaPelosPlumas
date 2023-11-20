@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
    <h3 class="title-header" style="text-transform: uppercase;">
        <i class="fa fa-tags"></i>
        {{$titulo}}
        <a href="{{url('veterinarios/nuevo')}}" class="btn btn-sm btn-success float-right" style="margin-left:10px;"><i class="fa fa-plus"></i> CREAR CITAS</a>
    </h3>
    <div class="row">
        <div class="col-12">
                <!-- inicio card  -->
                <div class="card card-stat">
                    <div class="card-body">
                        <div class="table-responsive">
                          <div class="accordion" id="accordionExample">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Cantidad de consultas atendidas por día
                                  </button>
                                </h2>
                              </div>
                          
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">

                                  <h4 class="text-success text-center">Gráfico de barras - Consultas atendidas por día</h4>
                                  <canvas id="grafica-consultas-por-dia"></canvas>
                                  <hr>
                                  <h4 class="text-success text-center">Tabla - Consultas atendidas por día</h4>
                                  <table class="table table-bordered table-striped">
                                    <thead>
                                      <th class="text-center">Fecha</th>
                                      <th class="text-center">Cantidad de consultas</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($consultas_por_dia as $item)
                                      <tr>
                                        <td class="text-center">{{$item->fecha}}</td>
                                        <td class="text-center">{{$item->total_consultas}}</td>                                        
                                      </tr>
                                      @endforeach
                                    </tbody>
                                      <br>
                                  </table>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                    Cantidad de consultas atendidas por mes
                                  </button>
                                </h2>
                              </div>                          
                              <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
                                <div class="card-body">

                                  <h4 class="text-success text-center">Gráfico de barras - Consultas atendidas por mes</h4>
                                  <canvas id="grafica-consultas-por-mes"></canvas>
                                  <hr>
                                  <h4 class="text-success text-center">Tabla - Consultas atendidas por messi</h4>
                                  <table class="table table-bordered table-striped">
                                    <thead>
                                      <th class="text-center">Fecha</th>
                                      <th class="text-center">Cantidad de consultas</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($consultas_por_mes as $item)
                                      <tr>
                                        <td class="text-center">{{$item->fecha}}</td>
                                        <td class="text-center">{{$item->total_consultas}}</td>                                        
                                      </tr>
                                      @endforeach
                                    </tbody>
                                      <br>
                                  </table>

                                  
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Cantidad de vacunas aplicadas por dia
                                  </button>
                                </h2>
                              </div>
                              <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                                <div class="card-body">

                                  <h4 class="text-success text-center">Gráfico de barras - Vacunas aplicadas por día</h4>
                                  <canvas id="grafica-vacunas-por-dia"></canvas>
                                  <hr>
                                  <h4 class="text-success text-center">Tabla - Vacunas aplicadas por día</h4>
                                  <table class="table table-bordered table-striped">
                                    <thead>
                                      <th class="text-center">Fecha</th>
                                      <th class="text-center">Cantidad de vacunas aplicadas</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($vacunas_por_dia as $item)
                                      <tr>
                                        <td class="text-center">{{$item->fecha}}</td>
                                        <td class="text-center">{{$item->total_vacunas}}</td>                                        
                                      </tr>
                                      @endforeach
                                    </tbody>
                                      <br>
                                  </table>

                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Cantidad de vacunas aplicadas por mes
                                  </button>
                                </h2>
                              </div>
                              <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
                                <div class="card-body">

                                  <h4 class="text-success text-center">Gráfico de barras - Vacunas aplicadas por mes</h4>
                                  <canvas id="grafica-vacunas-por-mes"></canvas>
                                  <hr>
                                  <h4 class="text-success text-center">Tabla - Vacunas aplicadas por mes</h4>
                                  <table class="table table-bordered table-striped">
                                    <thead>
                                      <th class="text-center">Fecha</th>
                                      <th class="text-center">Cantidad de vacunas aplicadas</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($vacunas_por_mes as $item)
                                      <tr>
                                        <td class="text-center">{{$item->fecha}}</td>
                                        <td class="text-center">{{$item->total_vacunas}}</td>                                        
                                      </tr>
                                      @endforeach
                                    </tbody>
                                      <br>
                                  </table>

                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Cantidad de cirugias autorizadas por dia
                                  </button>
                                </h2>
                              </div>
                              <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
                                <div class="card-body">

                                  <h4 class="text-success text-center">Gráfico de barras - Cirugias autorizadas por dia</h4>
                                  <canvas id="grafica-cirugias-por-dia"></canvas>
                                  <hr>
                                  <h4 class="text-success text-center">Tabla - Cirugias autorizadas por dia</h4>
                                  <table class="table table-bordered table-striped">
                                    <thead>
                                      <th class="text-center">Fecha</th>
                                      <th class="text-center">Cantidad de cirugias</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($cirugias_por_dia as $item)
                                      <tr>
                                        <td class="text-center">{{$item->fecha}}</td>
                                        <td class="text-center">{{$item->total_cirugias}}</td>                                        
                                      </tr>
                                      @endforeach
                                    </tbody>
                                      <br>
                                  </table>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    Cantidad de autorizadas por mes
                                  </button>
                                </h2>
                              </div>
                              <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
                                <div class="card-body">

                                  <h4 class="text-success text-center">Gráfico de barras - Cirugias autorizadas por mes</h4>
                                  <canvas id="grafica-cirugias-por-mes"></canvas>
                                  <hr>
                                  <h4 class="text-success text-center">Tabla - Cirugias autorizadas por mes</h4>
                                  <table class="table table-bordered table-striped">
                                    <thead>
                                      <th class="text-center">Fecha</th>
                                      <th class="text-center">Cantidad de cirugias</th>
                                    </thead>
                                    <tbody>
                                      @foreach ($cirugias_por_mes as $item)
                                      <tr>
                                        <td class="text-center">{{$item->fecha}}</td>
                                        <td class="text-center">{{$item->total_cirugias}}</td>                                        
                                      </tr>
                                      @endforeach
                                    </tbody>
                                      <br>
                                  </table>
                                  
                                </div>
                              </div>
                            </div>

                          </div>                          
                        </div>
                    </div>
                </div>
                <!-- fin card  -->



        </div>
    </div>
</div>


{{-- INICIO MODAL: ELIMINAR veterinario --}}
<div class="modal fade" id="modal-eliminar-veterinario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#eee;">
          <h5 class="modal-title text-primary">
              <i class="fa fa-trash"></i>
              Eliminar item
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="box-data-xtra">
                <h5>
                    <span class="text-success">DESCRIPCION: </span>
                    <span id="txt-descripcion"></span><br>
                </h5>
            </div>
            <div class="alert alert-danger">
                <div class="media">
                    <img src="{{asset('img/alert-danger.png')}}" class="align-self-center mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Cuidado.-</h5>
                        <p>
                            ¿Está seguro que desea eliminar éste registro?
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
          <form id="form-eliminar-item" action="{{url('veterinarios')}}" data-simple-action="{{url('veterinarios')}}" method="post">
            @method('delete')
            @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Si, eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- FIN MODAL: ELIMINAR veterinario --}}


<script type="text/javascript">
$(function(){

});


/*
----------------------------------------
GRAFICAS
----------------------------------------
*/
const copd = document.getElementById('grafica-consultas-por-dia');
const copm = document.getElementById('grafica-consultas-por-mes');
const vapd = document.getElementById('grafica-vacunas-por-dia');
const vapm = document.getElementById('grafica-vacunas-por-mes');
const cipd = document.getElementById('grafica-cirugias-por-dia');
const cipm = document.getElementById('grafica-cirugias-por-mes');

new Chart(copd, {
  type: 'bar',
  data: {
    labels: [<?php foreach($consultas_por_dia as $item){ echo "'".$item->fecha."',";}?>],
    datasets: [{
      label: 'Consultas atendidas por dia',
      data: [<?php foreach($consultas_por_dia as $item){ echo "'".$item->total_consultas."',";}?>],
      borderWidth: 1,
      backgroundColor: [
      'rgb(108, 117, 125, 0.6)',
      'rgba(75, 152, 64, 0.6)',
      'rgb(115, 194, 85, 0.6)'
      ],      
      hoverOffset: 5      
    }]
  },
});

new Chart(copm, {
  type: 'bar',
  data: {
    labels: [<?php foreach($consultas_por_mes as $item){ echo "'".$item->fecha."',";}?>],
    datasets: [{
      label: 'Consultas atendidas por mes',
      data: [<?php foreach($consultas_por_mes as $item){ echo "'".$item->total_consultas."',";}?>],
      borderWidth: 1,
      backgroundColor: [
      'rgb(108, 117, 125, 0.6)',
      'rgba(75, 152, 64, 0.6)',
      'rgb(115, 194, 85, 0.6)'
      ],      
      hoverOffset: 5      
    }]
  },
});

new Chart(vapd, {
  type: 'bar',
  data: {
    labels: [<?php foreach($vacunas_por_dia as $item){ echo "'".$item->fecha."',";}?>],
    datasets: [{
      label: 'Vacunas aplicadas por dia',
      data: [<?php foreach($vacunas_por_dia as $item){ echo "'".$item->total_vacunas."',";}?>],
      borderWidth: 1,
      backgroundColor: [
      'rgb(108, 117, 125, 0.6)',
      'rgba(75, 152, 64, 0.6)',
      'rgb(115, 194, 85, 0.6)'
      ],      
      hoverOffset: 5      
    }]
  },
});

new Chart(vapm, {
  type: 'bar',
  data: {
    labels: [<?php foreach($vacunas_por_mes as $item){ echo "'".$item->fecha."',";}?>],
    datasets: [{
      label: 'Vacunas aplicadas por mes',
      data: [<?php foreach($vacunas_por_mes as $item){ echo "'".$item->total_vacunas."',";}?>],
      borderWidth: 1,
      backgroundColor: [
      'rgb(108, 117, 125, 0.6)',
      'rgba(75, 152, 64, 0.6)',
      'rgb(115, 194, 85, 0.6)'
      ],      
      hoverOffset: 5      
    }]
  },
});

new Chart(cipd, {
  type: 'bar',
  data: {
    labels: [<?php foreach($cirugias_por_dia as $item){ echo "'".$item->fecha."',";}?>],
    datasets: [{
      label: 'Cirugias por dia',
      data: [<?php foreach($cirugias_por_dia as $item){ echo "'".$item->total_cirugias."',";}?>],
      borderWidth: 1,
      backgroundColor: [
      'rgb(108, 117, 125, 0.6)',
      'rgba(75, 152, 64, 0.6)',
      'rgb(115, 194, 85, 0.6)'
      ],      
      hoverOffset: 5      
    }]
  },
});

new Chart(cipm, {
  type: 'bar',
  data: {
    labels: [<?php foreach($cirugias_por_mes as $item){ echo "'".$item->fecha."',";}?>],
    datasets: [{
      label: 'Cirugias por mes',
      data: [<?php foreach($cirugias_por_mes as $item){ echo "'".$item->total_cirugias."',";}?>],
      borderWidth: 1,
      backgroundColor: [
      'rgb(108, 117, 125, 0.6)',
      'rgba(75, 152, 64, 0.6)',
      'rgb(115, 194, 85, 0.6)'
      ],      
      hoverOffset: 5      
    }]
  },
});


</script>




@endsection
