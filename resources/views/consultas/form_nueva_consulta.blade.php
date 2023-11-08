@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-plus"></i>
			{{$titulo}}
			<a href="{{url('mascotas/'.Crypt::encryptString($mascota->mas_id).'/consultas')}}" title="Volver a lista de consultas" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form id="form-nuevo-consulta" action="{{url('consultas/store_consulta')}}" method="POST">
								  @csrf
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Motivo:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el motivo de la consulta"></i>
															</label>
														<input required type="text" value="{{old('con_motivo')}}" class="form-control @error('con_motivo') is-invalid @enderror" name="con_motivo" id="con_motivo" placeholder="Motivo de la consulta">
														@error('con_motivo')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="label-blue label-block" for="">
															Signos vitales:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer los signos vitales"></i>
															</label>
																<div class="row">
																	<div class="col-md-2">
																		<input required type="text" name="svi_temperatura" class="form-control" placeholder="Temp °C">
																	</div>
																	<div class="col-md-2">
																		<input required type="text" name="svi_peso" class="form-control" placeholder="Peso Kg">
																	</div>
																	<div class="col-md-2">
																		<input required type="text" name="svi_fc" class="form-control" placeholder="FC /min">
																	</div>
																	<div class="col-md-2">
																		<input required type="text" name="svi_fr" class="form-control" placeholder="FR /min">
																	</div>
																	<div class="col-md-4">
																		<input required type="text" name="svi_mm" class="form-control" placeholder="mm">
																	</div>
																</div>	
													</div>
													</div>
												</div>	
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-blue label-block" for="">
																Antecedentes:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Antecedentes"></i>
																</label>
															<textarea required rows="3" class="form-control @error('con_antecedentes') is-invalid @enderror" name="con_antecedentes" id="con_antecedentes">{{old('con_antecedentes')}}</textarea>
															@error('con_antecedentes')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
														</div>
	
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-blue label-block" for="">
																Signos clinicos:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Signos clinicos"></i>
																</label>
															<textarea required rows="3" class="form-control @error('con_signos_clinicos') is-invalid @enderror" name="con_signos_clinicos" id="con_signos_clinicos">{{old('con_signos_clinicos')}}</textarea>
															@error('con_signos_clinicos')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
														</div>
	
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Diagnostico presuntivo:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer el diagnostico presuntivo de la atención"></i>
														</label>
													<input required type="text" value="{{old('con_diagnostico_presuntivo')}}" class="form-control @error('con_diagnostico_presuntivo') is-invalid @enderror" name="con_diagnostico_presuntivo" id="con_diagnostico_presuntivo" placeholder="Diagnostivo presuntivo">
													@error('con_diagnostico_presuntivo')
													<div class="invalid-feedback">
														{{$message}}
													</div>											
													@enderror
												</div>
												</div>
											</div>
											<strong class="text-success">
											TRATAMIENTO
											</strong>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Clínico:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer el diagnostico presuntivo de la atención"></i>
														</label>
														<div class="clinicos">
															<div class="row">
																<div class="col-md-4">
																	<input required type="text" name="trac_farmaco" class="form-control" placeholder="Fármaco">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="trac_mg" class="form-control" placeholder="mg">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="trac_ml" class="form-control" placeholder="ml">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="trac_via" class="form-control" placeholder="Vía">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="trac_observaciones_indicaciones" class="form-control" placeholder="Observaciones">
																</div>
															</div>	
														</div>
														
												</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Ambulatorio:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer el diagnostico presuntivo de la atención"></i>
														</label>
														<div class="clinicos">
															<div class="row">
																<div class="col-md-4">
																	<input required type="text" name="traa_farmaco" class="form-control" placeholder="Fármaco">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="traa_mg" class="form-control" placeholder="mg">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="traa_ml" class="form-control" placeholder="ml">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="traa_via" class="form-control" placeholder="Vía">
																</div>
																<div class="col-md-2">
																	<input required type="text" name="traa_observaciones_indicaciones" class="form-control" placeholder="Indicaciones">
																</div>
															</div>	
														</div>														
												</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Quirurgico:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer si requiere tratamiento quirurgico"></i>
														</label>
													<input required type="text" value="{{old('con_quirurgico')}}" class="form-control @error('con_quirurgico') is-invalid @enderror" name="con_quirurgico" id="con_quirurgico" placeholder="Tratamiento Quirurgico">
													@error('con_quirurgico')
													<div class="invalid-feedback">
														{{$message}}
													</div>											
													@enderror
												</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Higienico / dietético:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer si requiere tratamiento higienico / dietetico"></i>
														</label>
													<input required type="text" value="{{old('con_higienico')}}" class="form-control @error('con_higienico') is-invalid @enderror" name="con_higienico" id="con_higienico" placeholder="Tratamiento dietetico">
													@error('con_higienico')
													<div class="invalid-feedback">
														{{$message}}
													</div>											
													@enderror
												</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Examenes complementarios:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer si requiere examenes complementarios"></i>
														</label>
													<input required type="text" value="{{old('eco_descripcion')}}" class="form-control @error('eco_descripcion') is-invalid @enderror" name="eco_descripcion" id="eco_descripcion" placeholder="Examenes complementarios">
													@error('eco_descripcion')
													<div class="invalid-feedback">
														{{$message}}
													</div>											
													@enderror
												</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Proxima revisión:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer si habrá la próxima revisión"></i>
														</label>
													<input required type="date" value="{{old('con_proxima_revision')}}" class="form-control @error('con_proxima_revision') is-invalid @enderror" name="con_proxima_revision" id="con_proxima_revision" placeholder="Proxima revisión">
													@error('con_proxima_revision')
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