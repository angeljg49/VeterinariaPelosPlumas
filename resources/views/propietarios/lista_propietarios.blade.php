@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
    <h3 class="title-header" style="text-transform: uppercase;">
        <i class="fa fa-tags"></i>
        {{$titulo}}
        <a href="{{url('propietarios/nuevo')}}" class="btn btn-sm btn-success float-right" style="margin-left:10px;"><i class="fa fa-plus"></i> NUEVA propietario</a>
    </h3>
    <div class="row">
        <div class="col-12">
                <!-- inicio card  -->
                <div class="card card-stat">
                    <div class="card-body">
                        @if($propietarios->count() == 0)
                        <div class="alert alert-info">
                            <div class="media">
                                <img src="{{asset('img/alert-info.png')}}" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">Nota.-</h5>
                                    <p>
                                        NO se tienen propietarios registradas hasta el momento.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered tabla-datos">
                                <thead>
                                <tr>
                                    <th>NOMBRE DEL PROPIETARIO</th>
                                    <th>CI</th>
                                    <th>DIRECCION</th>
                                    <th>ZONA</th>
                                    <th>USUARIO</th>
                                    <th>EMAIL</th>
                                    <th>OPCION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($propietarios as $item)    
                                <tr>
                                    <td class="text-center">
                                        {{$item->pro_nombre_completo}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->pro_ci}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->pro_direccion}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->pro_zona}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->usuario->usu_nombre}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->usuario->usu_email}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            OPCION
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{url('propietarios/'.Crypt::encryptString($item->pro_id).'/editar')}}"><i class="fa fa-edit"></i> Editar</a>
                                            @if ($item->citas->count() > 0 || $item->autorizaciones->count() > 0 || $item->mascotas->count() > 0 )
                                            <a class="dropdown-item disabled" href="#" title="El propietario tiene registros asociados. NO es posible eliminarlo."><i class="fa fa-trash"></i> Eliminar</a>
                                            @else
                                            <a class="dropdown-item btn-eliminar-item" data-id="{{$item->pro_id}}" data-descripcion="{{$item->pro_nombre_completo}}" data-toggle="modal" data-target="#modal-eliminar-propietario" href="#"><i class="fa fa-trash"></i> Eliminar</a>
                                            @endif
                                            <hr class="dropdown-divider">                                            
                                            <a class="dropdown-item" href="{{url('propietarios/'.Crypt::encryptString($item->pro_id).'/mascotas')}}"><i class="fa fa-paw"></i> Gestionar Mascotas</a>
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


{{-- INICIO MODAL: ELIMINAR propietario --}}
<div class="modal fade" id="modal-eliminar-propietario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form id="form-eliminar-item" action="{{url('propietarios')}}" data-simple-action="{{url('propietarios')}}" method="post">
            @method('delete')
            @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Si, eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- FIN MODAL: ELIMINAR propietario --}}


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
