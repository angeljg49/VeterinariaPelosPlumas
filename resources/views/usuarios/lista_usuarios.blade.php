@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
    <h3 class="title-header" style="text-transform: uppercase;">
        <i class="fa fa-users"></i>
        {{$titulo}}
        <a href="{{url('usuarios/nuevo')}}" class="btn btn-sm btn-info float-right" style="margin-left:10px;"><i class="fa fa-plus"></i> NUEVO USUARIO</a>
    </h3>
    <div class="row">
        <div class="col-12">
              
                <!-- inicio card  -->
                <div class="card card-stat">
                    <div class="card-body">
                        @if($usuarios->count() == 0)
                        <div class="alert alert-info">
                            <div class="media">
                                <img src="{{asset('img/alert-info.png')}}" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">Nota.-</h5>
                                    <p>
                                        NO se tienen usuarios registrados hasta el momento.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered tabla-datos-clientes">
                                <thead>
                                <tr>
                                    <th>USUARIO</th>
                                    <th>PASSWORD</th>
                                    <th>EMAIL</th>
                                    <th>ROL</th>
                                    <th>FECHA REGISTRO</th>
                                    <th>OPCION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $item)
                                {{-- @if($item->usu_rol == 1)--}}
                                @if(true) 
                                <tr>
                                    <td>
                                        {{$item->usu_nombre}}
                                    </td>
                                    <td class="text-center">
                                        {{Str::limit($item->password, 20, '...') }}
                                    </td>
                                    {{-- <td class="text-center">
                                        {{$item->usu_nombres_persona}} {{$item->usu_apellidos_persona}}
                                    </td> --}}
                                    <td class="text-center">
                                        {{$item->usu_email}}
                                    </td>
                                    <td class="text-center">
                                        @if($item->usu_rol == 1)
                                        ADMIN
                                        @else
                                        CLIENTE
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{substr($item->updated_at, 0, 10)}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            OPCION
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{url('usuarios/'.Crypt::encryptString($item->usu_id).'/editar')}}"><i class="fa fa-edit"></i> Editar</a>
                                            <a class="dropdown-item btn-eliminar-usuario" data-usu-id="{{Crypt::encryptString($item->usu_id)}}" data-usu-nombre="{{$item->usu_nombre}}" data-toggle="modal" data-target="#modal-eliminar-usuario" href="#"><i class="fa fa-trash"></i> Eliminar</a>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
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


{{-- INICIO MODAL: ELIMINAR MODALIDAD --}}
<div class="modal fade" id="modal-eliminar-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#eee;">
          <h5 class="modal-title text-primary">
              <i class="fa fa-trash"></i>
              Eliminar usuario
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="box-data-xtra">
                <h5>
                    <span class="text-success">NOMBRE USUARIO: </span>
                    <span id="txt-usu-nombre"></span><br>
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
          <form id="form-eliminar-usuario" action="{{url('usuarios')}}" data-simple-action="{{url('usuarios')}}" method="post">
            @method('delete')
            @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Si, eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- FIN MODAL: ELIMINAR ESTADO --}}


<script type="text/javascript">
$(function(){
    /*
    -------------------------------------------------------------
    * CONFIGURACION DATA TABLES
    -------------------------------------------------------------
    */
    $('.tabla-datos-clientes').DataTable({"language":{url: '{{asset('js/datatables-lang-es.json')}}'}, "order": [[ 4, "desc" ]]});

    //Conf popover
    $('[data-toggle="popover"]').popover()

    /*
    --------------------------------------------------------------
    ELIMINAR USUARIO
    --------------------------------------------------------------
    */
    $('.btn-eliminar-usuario').click(function(){
       let usu_id = $(this).attr('data-usu-id');
       let usu_nombre = $(this).attr('data-usu-nombre');
       $('#txt-usu-nombre').html(usu_nombre);
       //form data
       action = $('#form-eliminar-usuario').attr('data-simple-action');
       action = action+'/'+usu_id;
       $('#form-eliminar-usuario').attr('action',action);
   });



});


</script>




@endsection
