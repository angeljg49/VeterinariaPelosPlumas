@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-file"></i>
			{{$titulo}}
			<a href="{{url('mascotas/'.Crypt::encryptString($consulta->mascota->mas_id).'/consultas')}}" title="Volver a lista de consultas" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
			<a href="" onClick="window.print()" title="Imprimir ficha" data-placement="bottom" class="btn btn-sm btn-success float-right" style="margin-left:10px;"><i class="fa fa-print"></i> IMPRIMIR</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-10 offset-md-1" style="border: 2px solid #ccc; border-radius:7px; padding:5px;">
											<div class="row">
												<div class="col-md-6">
													<strong class="text-success">PACIENTE:</strong> 
													{{$consulta->mascota->mas_nombre}}
												</div>
												<div class="col-md-6">
													<strong class="text-success">PROPIETARIO:</strong> 
													{{$consulta->mascota->propietario->pro_nombre_completo}}
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<strong class="text-success">FECHA DE CONSULTA:</strong> 
													{{$consulta->created_at}}
												</div>
												<div class="col-md-6">
													<strong class="text-success">VETERINARIO:</strong> 
													{{$consulta->veterinario->vet_nombre_completo}}
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Motivo de la consulta:
															</label>
															<strong>{{$consulta->con_motivo}}</strong>
													</div>
												</div>
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label class="label-blue label-block" for="">
																Signos vitales:
																</label>
																	<div class="row">
																		<div class="col-md-2">
																			Temp.:
																			<strong>{{$consulta->signos_vitales[0]->svi_temperatura}}</strong>
																		</div>
																		<div class="col-md-2">
																			Peso:
																			<strong>{{$consulta->signos_vitales[0]->svi_peso}}</strong>
																		</div>
																		<div class="col-md-2">
																			F.C.:
																			<strong>{{$consulta->signos_vitales[0]->svi_fc}}</strong>
																		</div>
																		<div class="col-md-2">
																			F.R.:
																			<strong>{{$consulta->signos_vitales[0]->svi_fr}}</strong>
																		</div>
																		<div class="col-md-4">
																			 M.M.:
																			<strong>{{$consulta->signos_vitales[0]->svi_mm}}</strong>
																		</div>
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
																</label>
																<strong>{{$consulta->con_antecedentes}}</strong>
															</div>
	
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="label-blue label-block" for="">
																Signos clinicos:
																</label>
																<strong>{{$consulta->con_signos_clinicos}}</strong>

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
														</label>
														<strong>{{$consulta->con_diagnostico_presuntivo}}</strong>
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
														</label>
														<div class="clinicos">
															<div class="row">
																<div class="col-md-4">
																	<strong>Farmaco: {{$consulta->tratamientos[0]->tra_farmaco}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>mg: {{$consulta->tratamientos[0]->tra_mg}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>ml: {{$consulta->tratamientos[0]->tra_ml}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>Via: {{$consulta->tratamientos[0]->tra_via}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>Observaciones: {{$consulta->tratamientos[0]->tra_observaciones_indicaciones}}</strong>
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
														</label>
														<div class="clinicos">
															<div class="row">
																<div class="col-md-4">
																	<strong>Farmaco: {{$consulta->tratamientos[1]->tra_farmaco}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>mg: {{$consulta->tratamientos[1]->tra_mg}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>ml: {{$consulta->tratamientos[1]->tra_ml}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>Via: {{$consulta->tratamientos[1]->tra_via}}</strong>
																</div>
																<div class="col-md-2">
																	<strong>Observaciones: {{$consulta->tratamientos[1	]->tra_observaciones_indicaciones}}</strong>
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
														</label>
														<strong>{{$consulta->con_quirurgico}}</strong>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Higienico / dietético:
														</label>
														<strong>{{$consulta->con_higienico}}</strong>
												</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Examenes complementarios:
														</label>
														<strong>{{$consulta->examenes_complementarios[0]->eco_descripcion}}</strong>
												</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Proxima revisión:
														</label>
														<strong>{{$consulta->con_proxima_revision}}</strong>
												</div>
												</div>
											</div>


										</div>
									</div>

								  </section>
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