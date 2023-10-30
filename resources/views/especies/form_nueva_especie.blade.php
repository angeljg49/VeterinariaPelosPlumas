@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-plus"></i>
			{{$titulo}}
			<a href="{{url('especies')}}" title="Volver a lista de especies" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form id="form-nuevo-especie" action="{{url('especies')}}" method="POST">
								  @csrf
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-6 offset-md-3">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Nombre de la especie:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el nombre de la especie"></i>
															</label>
														<input required type="text" value="{{old('esp_nombre')}}" class="form-control @error('esp_nombre') is-invalid @enderror" name="esp_nombre" id="esp_nombre" placeholder="Nombre de especie">
														@error('esp_nombre')
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