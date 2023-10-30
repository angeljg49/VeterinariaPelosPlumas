@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
    <h3 class="title-header" style="text-transform: uppercase;">
        <i class="fa fa-tags"></i>
        {{$titulo}}
        <a href="{{url('mascotas/nuevo/'.$propietario->pro_id)}}" class="btn btn-sm btn-success float-right" style="margin-left:10px;"><i class="fa fa-plus"></i> NUEVA MASCOTA</a>
    </h3>
    <div class="row">
        <div class="col-12">
                <!-- inicio card  -->
                <div class="card card-stat">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-right text-success">
                                    Propietario:
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-primary">
                                    {{$propietario->pro_nombre_completo}}
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-right text-success">
                                    Dirección:
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-primary">
                                    {{$propietario->pro_direccion}} {{$propietario->pro_zona}}
                                </h4>
                            </div>
                        </div>
                        @if($mascotas->count() == 0)
                        <div class="alert alert-info">
                            <div class="media">
                                <img src="{{asset('img/alert-info.png')}}" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">Nota.-</h5>
                                    <p>
                                        NO se tienen mascotas registradas hasta el momento.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered tabla-datos">
                                <thead>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>EDAD</th>
                                    <th>SEXO</th>
                                    <th>COLOR</th>
                                    <th>OPCION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mascotas as $item)
                                <tr>
                                    <td class="text-center">
                                        {{$item->mas_nombre}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->mas_edad}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->mas_sexo}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->mas_color}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            OPCION
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{url('mascotas/'.Crypt::encryptString($item->mas_id).'/historial')}}"><i class="fa fa-medkit"></i> Historial clinico</a>
                                            <a class="dropdown-item" href="{{url('mascotas/'.Crypt::encryptString($item->mas_id).'/vacunas')}}"><i class="fa fa-battery-half"></i> Vacunas</a>
                                            <a class="dropdown-item" href="{{url('mascotas/'.Crypt::encryptString($item->mas_id).'/cirugias')}}"><i class="fa fa-file"></i> Cirugias</a>
                                            <a class="dropdown-item" href="{{url('mascotas/'.Crypt::encryptString($item->mas_id).'/citas')}}"><i class="fa fa-tags"></i> Citas medicas</a>
                                            <hr class="dropdown-divider">                                            
                                            <a class="dropdown-item" href="{{url('mascotas/'.Crypt::encryptString($item->mas_id).'/editar')}}"><i class="fa fa-edit"></i> Editar</a>
                                            @if ($item->consultas->count() > 0)
                                            <a class="dropdown-item disabled" href="#" title="La mascota tiene registros asociados. NO es posible eliminarlo."><i class="fa fa-trash"></i> Eliminar</a>
                                            @else
                                            <a class="dropdown-item btn-eliminar-item" data-id="{{$item->mas_id}}" data-descripcion="{{$item->mas_nombre}}" data-toggle="modal" data-target="#modal-eliminar-mascota" href="#"><i class="fa fa-trash"></i> Eliminar</a>
                                            @endif
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


{{-- INICIO MODAL: ELIMINAR mascota --}}
<div class="modal fade" id="modal-eliminar-mascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form id="form-eliminar-item" action="{{url('mascotas')}}" data-simple-action="{{url('mascotas')}}" method="post">
            @method('delete')
            @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Si, eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- FIN MODAL: ELIMINAR mascota --}}


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
