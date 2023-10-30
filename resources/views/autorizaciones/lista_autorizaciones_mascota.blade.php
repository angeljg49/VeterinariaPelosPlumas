@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
    <h3 class="title-header" style="text-transform: uppercase;">
        <i class="fa fa-file"></i>
        {{$titulo}}
        <a href="{{url('cirugias/'.Crypt::encryptString($mas_id).'/autorizar')}}" class="btn btn-sm btn-success float-right" style="margin-left:10px;"><i class="fa fa-plus"></i> Nueva autorización</a>
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
                        @if($autorizaciones->count() == 0)
                        <div class="alert alert-info">
                            <div class="media">
                                <img src="{{asset('img/alert-info.png')}}" class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">Nota.-</h5>
                                    <p>
                                        NO se tienen cirugías registradas hasta el momento.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered tabla-datos">
                                <thead>
                                <tr>
                                    <th>ESTADO VACUNAS</th>
                                    <th>ALIMENTACION</th>
                                    <th>DESPARACITACION</th>
                                    <th>FECHA</th>
                                    <th>HORA INGRESO</th>
                                    <th>OPCION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($autorizaciones as $item)
                                <tr>
                                    <td class="text-center">
                                        {{$item->aci_estado_vacunas == 2 ? "AL DIA":"INCOMPLETO"}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->aci_alimentacion == 2 ? "CORRECTO": "FALTANTE"}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->aci_desparacitacion == 2 ? "SI":"NO"}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->aci_fecha}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->aci_hora_ingreso}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            OPCION
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item btn-eliminar-item" data-id="{{$item->aci_id}}" data-descripcion="Autorizacion de fecha {{$item->aci_fecha}} y hora {{$item->aci_hora_ingreso}}" data-toggle="modal" data-target="#modal-eliminar-autorizacion" href="#"><i class="fa fa-trash"></i> Eliminar</a>
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
<div class="modal fade" id="modal-eliminar-autorizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form id="form-eliminar-item" action="{{url('cirugias/delete_autorizacion')}}" data-simple-action="{{url('cirugias/delete_autorizacion')}}" method="post">
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
