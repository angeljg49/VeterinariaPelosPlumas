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
								<form id="form-nuevo-vacuna" action="{{url('cirugias/store_autorizacion')}}" method="POST">
								  @csrf
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-6 offset-md-3">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Estado de vacunas:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer el estado de vacunacion"></i>
															</label>
															<select required class="form-control @error('aci_estado_vacunas') is-invalid @enderror" name="aci_estado_vacunas" id="aci_estado_vacunas">
																<option value="">Seleccione una opción</option>
																<option value="1" {{ old('aci_estado_vacunas') == 1 ? 'selected' : '' }}>Al día</option>
																<option value="2" {{ old('aci_estado_vacunas') == 2 ? 'selected' : '' }}>Incompleto</option>
															</select>
															@error('aci_estado_vacunas')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Alimentacion:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer el estado de alimentacion"></i>
															</label>
															<select required class="form-control @error('aci_alimentacion') is-invalid @enderror" name="aci_alimentacion" id="aci_alimentacion">
																<option value="">Seleccione una opción</option>
																<option value="1" {{ old('aci_alimentacion') == 1 ? 'selected' : '' }}>Correcto</option>
																<option value="2" {{ old('aci_alimentacion') == 2 ? 'selected' : '' }}>Faltante</option>
															</select>
															@error('aci_alimentacion')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Desparasitación:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer el sexo de la mascota"></i>
															</label>
															<select required class="form-control @error('aci_desparacitacion') is-invalid @enderror" name="aci_desparacitacion" id="aci_desparacitacion">
																<option value="">Seleccione una opción</option>
																<option value="1" {{ old('aci_desparacitacion') == 1 ? 'selected' : '' }}>SI</option>
																<option value="2" {{ old('aci_desparacitacion') == 2 ? 'selected' : '' }}>NO</option>
															</select>
															@error('aci_desparacitacion')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Fecha:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer fecha de la vacuna"></i>
															</label>
														<input required type="date" value="{{old('aci_fecha', date('Y-m-d'))}}" class="form-control @error('aci_fecha') is-invalid @enderror" name="aci_fecha" id="aci_fecha" placeholder="Fecha de cirugia">
														@error('aci_fecha')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Hora de ingreso:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer la hora de ingreso a cirugia"></i>
															</label>
														<input required type="time" value="{{old('aci_hora_ingreso')}}" class="form-control @error('aci_hora_ingreso') is-invalid @enderror" name="aci_hora_ingreso" id="aci_hora_ingreso" placeholder="Hora de ingreso">
														@error('aci_hora_ingreso')
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
													<input type="hidden" name="pro_id" value="{{$pro_id}}">
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