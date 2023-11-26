@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
    <h3 class="title-header" style="text-transform: uppercase;">
        <i class="fa fa-file"></i>
        {{$titulo}}
        <a href="{{url('propietarios/'.Crypt::encryptString($mascota->propietario->pro_id).'/mascotas')}}" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-arrow-left"></i> Atras</a>
        <a href="{{url('consultas/'.Crypt::encryptString($mas_id).'/registrar/'.Crypt::encryptString(0))}}" class="btn btn-sm btn-success float-right" style="margin-left:10px;"><i class="fa fa-plus"></i> Nueva consulta</a>
    </h3>
    <div class="alert alert-secondary" role="alert">
        <div className="row">
            <div class="col-md-6"><strong class="text-success">Mascota: </strong>{{$mascota->mas_nombre}}</div>
            <div class="col-md-6"><strong class="text-success">Propietario: </strong>{{$mascota->propietario->pro_nombre_completo}}</div>
        </div>
    </div>    
    <div class="row">
        <div class="col-12">
                <!-- inicio card  -->
                <div class="card card-stat">
                    <div class="card-body">
                        @if($consultas->count() == 0)
                        <div class="alert alert-info">
                            <div class="media">
                                <img src="{{asset('img/alert-info.png')}}" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">Nota.-</h5>
                                    <p>
                                        NO se tienen consultas registradas hasta el momento.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered tabla-datos">
                                <thead>
                                <tr>
                                    <th>MOTIVO CONSULTA</th>
                                    <th>DIAGNOSTIVO PRESUNTIVO</th>
                                    <th>TRATAMIENTOS</th>
                                    <th>EXAMENES COMPLEMENTARIOS</th>
                                    <th>OPCION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($consultas as $item)
                                <tr>
                                    <td class="text-center">
                                        {{$item->con_motivo}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->con_diagnostico_presuntivo}}
                                    </td>
                                    <td class="text-center">
                                        {{count($item->tratamientos)}}
                                        {{-- <table class="table table-condensed table-bordered">
                                            @foreach($item->tratamientos as $it)
                                            <tr>
                                                <td>{{$it->tra_farmaco}}</td>
                                                <td>{{$it->tra_mg}}</td>
                                                <td>{{$it->tra_ml}}</td>
                                                <td>{{$it->tra_via}}</td>
                                                <td>{{$it->tra_observaciones_indicaciones}}</td>
                                            </tr>
                                        @endforeach
                                        </table> --}}
                                    {{-- {{$item->tratamientos.length == 0 ? "NO": "SI"}} --}}
                                    </td>
                                    <td class="text-center">
                                        {{count($item->examenes_complementarios)}}
                                        {{-- {{$item->examenes_complementarios.length == 0 ? "NO" : "SI"}} --}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            OPCION
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{url('consultas/show_consulta/'.Crypt::encryptString($item->con_id))}}"><i class="fa fa-eye"></i> Ver detalle</a>
                                            <a class="dropdown-item btn-eliminar-item" data-id="{{$item->con_id}}" data-descripcion="Consulta con motivo: {{$item->con_motivo}}" data-toggle="modal" data-target="#modal-eliminar-consulta" href="#"><i class="fa fa-trash"></i> Eliminar</a>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>    
                        </div>
                        @endif
                    </div>
                </div>
                <!-- fin card  -->

        </div>
    </div>
</div>


{{-- INICIO MODAL: ELIMINAR vacuna --}}
<div class="modal fade" id="modal-eliminar-consulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form id="form-eliminar-item" action="{{url('consultas/delete_consulta')}}" data-simple-action="{{url('consultas/delete_consulta')}}" method="post">
            @method('delete')
            @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Si, eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- FIN MODAL: ELIMINAR vacuna --}}


<script type="text/javascript">
$(function(){
    /*
    -------------------------------------------------------------
    * CONFIGURACION DATA TABLES
    -------------------------------------------------------------
    */
    $('.tabla-datos').DataTable({"language":{url: '{{asset('js/datatables-lang-es.json')}}'}, "order": [[ 1, "desc" ]]});

    /*
    --------------------------------------------------------------
    ELIMINAR ITEM
    --------------------------------------------------------------
    */
    $('.btn-eliminar-item').click(function(){
       let usu_id = $(this).attr('data-id');
       let usu_nombre = $(this).attr('data-descripcion');
       $('#txt-descripcion').html(usu_nombre);
       //form data
       action = $('#form-eliminar-item').attr('data-simple-action');
       action = action+'/'+usu_id;
       $('#form-eliminar-item').attr('action',action);
   });



});


</script>




@endsection
