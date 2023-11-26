@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-plus"></i>
			{{$titulo}}
			<a href="{{url('veterinarios')}}" title="Volver a lista de veterinarios" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form id="form-nuevo-citas" action="{{url('citas/store_reserva')}}" method="POST">
								  @csrf
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-6 offset-md-3">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
															Citas disponibles:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer la cita"></i>
														</label>
														<select required class="form-control @error('cdi_id') is-invalid @enderror" name="cdi_id" id="cdi_id">
															<option value="">Seleccione una opción</option>
															@foreach ($citas as $item)
															<option value="{{$item->cdi_id}}" {{ old('cdi_id') == $item->cdi_id ? 'selected' : '' }}>{{$item->cdi_fecha}} {{$item->cdi_hora}}</option>
															@endforeach
														</select>
														@error('cdi_id')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
												</div>

												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<input type="hidden" name="mas_id" value="{{$mascota->mas_id}}">
													<input type="hidden" id="cit_fecha_hora" name="cit_fecha_hora_reserva" value="0">
														<button type="submit" class="btn btn-success">
															<i class="fa fa-save"></i>
															Guardar
													</button>
												</div>
											</div>
										</div>
									</div>
								  </section>								  
								</form>
							</div>
						</div>
					</div>
				</div>

				<!-- fin card  -->

			</div>
		</div>
	</div>

<script>
$(function(){
	$( "#cdi_id" ).on( "change", function() {
		console.log($(this).find("option:selected").text());
		$('#cit_fecha_hora').val($(this).find("option:selected").text());
	} );
});	


	</script>


    @endsection