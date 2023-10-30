@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-plus"></i>
			{{$titulo}}
			<a href="{{url('vacunas')}}" title="Volver a lista de vacunas" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form id="form-nuevo-vacuna" action="{{url('vacunas')}}" method="POST">
								  @csrf
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-6 offset-md-3">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Nombre de la vacuna:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el nombre de la vacuna"></i>
															</label>
														<input required type="text" value="{{old('vac_nombre')}}" class="form-control @error('vac_nombre') is-invalid @enderror" name="vac_nombre" id="vac_nombre" placeholder="Nombre de vacuna" autofocus>
														@error('vac_nombre')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Descripción:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer descripcion de la vacuna"></i>
															</label>
														<input required type="text" value="{{old('vac_descripcion')}}" class="form-control @error('vac_descripcion') is-invalid @enderror" name="vac_descripcion" id="vac_descripcion" placeholder="Descripcion de la vacuna">
														@error('vac_descripcion')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Tipo:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el tipo de vacuna"></i>
															</label>
															<select required class="form-control @error('vac_tipo') is-invalid @enderror" name="vac_tipo" id="vac_tipo">
																<option value="">Seleccione una opción</option>
																<option value="1" {{ old('vac_tipo') == 1 ? 'selected' : '' }}>Canino</option>
																<option value="2" {{ old('vac_tipo') == 2 ? 'selected' : '' }}>Felino</option>
															</select>
														@error('vac_tipo')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Periodo:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el nombre de la vacuna"></i>
															</label>
														<input required type="text" value="{{old('vac_periodo')}}" class="form-control @error('vac_periodo') is-invalid @enderror" name="vac_periodo" id="vac_periodo" placeholder="Periodo de vigencia de la vacuna">
														@error('vac_periodo')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
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