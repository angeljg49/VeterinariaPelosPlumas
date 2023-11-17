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
								<form id="form-nuevo-citas" action="{{url('citas')}}" method="POST">
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
															<i class="fa fa-question-circle float-right" title="Establecer la fecha para las citas"></i>
															</label>
														<input required type="date" value="{{old('cdi_fecha')}}" class="form-control @error('cdi_fecha') is-invalid @enderror" name="cdi_fecha" id="cdi_fecha" placeholder="Fecha">
														@error('cdi_fecha')
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
															Cantidad de fichas:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer la cantidad de fichas"></i>
															</label>
														<input required type="number" value="{{old('cdi_cant')}}" class="form-control @error('cdi_cant') is-invalid @enderror" name="cdi_cant" id="cdi_cant" placeholder="Cantidad de fichas">
														@error('cdi_cant')
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
															Hora de inicio:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer la hora de inicio para generar las fichas"></i>
															</label>
														<input required type="time" value="{{old('cdi_hora')}}" class="form-control @error('cdi_hora') is-invalid @enderror" name="cdi_hora" id="cdi_hora" placeholder="Hora inicio">
														@error('cdi_hora')
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
															Intervalo:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el intervalo de tiempo entre fichas (minutos)"></i>
															</label>
														<input required type="number" value="{{old('cdi_intervalo')}}" class="form-control @error('cdi_intervalo') is-invalid @enderror" name="cdi_intervalo" id="cdi_intervalo" placeholder="Minutos">
														@error('cdi_intervalo')
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