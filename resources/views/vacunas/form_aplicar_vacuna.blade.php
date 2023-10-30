@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-plus"></i>
			{{$titulo}}
			<a href="{{url('mascotas/'.Crypt::encryptString($mas_id).'/vacunas')}}" title="Volver a lista de vacunas aplicadas" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form id="form-nuevo-vacuna" action="{{url('vacunas/store_aplicar')}}" method="POST">
								  @csrf
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-6 offset-md-3">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Fecha:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer fecha de la vacuna"></i>
															</label>
														<input required type="date" value="{{old('vap_fecha', date('Y-m-d'))}}" class="form-control @error('vap_fecha') is-invalid @enderror" name="vap_fecha" id="vap_fecha" placeholder="Fecha de aplicacion">
														@error('vap_fecha')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Vacuna:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer la vacuna"></i>
															</label>
															<select required class="form-control @error('vac_id') is-invalid @enderror" name="vac_id" id="vac_id">
																<option value="">Seleccione una opción</option>
																@foreach ($vacunas as $item)
																<option value="{{$item->vac_id}}" {{ old('vac_id') == $item->vac_id ? 'selected' : '' }}>{{$item->vac_nombre}}</option>
																@endforeach
															</select>
														@error('vac_id')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Observacion:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Alguna observación"></i>
															</label>
														<input required type="text" value="{{old('vap_observaciones')}}" class="form-control @error('vap_observaciones') is-invalid @enderror" name="vap_observaciones" id="vap_observaciones" placeholder="Alguna observacion">
														@error('vap_observaciones')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<input type="hidden" name="mas_id" value="{{$mas_id}}">
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

});	


	</script>


    @endsection