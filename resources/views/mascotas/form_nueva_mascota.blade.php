@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-plus"></i>
			{{$titulo}}
			<a href="{{url('mascotas')}}" title="Volver a lista de mascotas" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form id="form-nuevo-mascota" action="{{url('mascotas/')}}" method="POST">
								  @csrf
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-10 offset-md-1">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Nombre de la mascota:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el nombre de la mascota"></i>
															</label>
														<input required type="text" value="{{old('mas_nombre')}}" class="form-control @error('mas_nombre') is-invalid @enderror" name="mas_nombre" id="mas_nombre" placeholder="Nombre de mascota" autofocus>
														@error('mas_nombre')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Especie:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer la especie de la mascota"></i>
															</label>
															<select required class="form-control @error('raz_id') is-invalid @enderror" name="raz_id" id="raz_id">
																<option value="">Seleccione una opción</option>
																@foreach ($especies as $item)
																<option value="{{$item->esp_id}}" {{ old('raz_id') == $item->esp_id ? 'selected' : '' }}>{{$item->esp_nombre}}</option>
																@endforeach
															</select>
															@error('esp_id')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Raza:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer la raza de la mascota"></i>
															</label>
															<select required class="form-control @error('raz_id') is-invalid @enderror" name="raz_id" id="raz_id">
																<option value="">Seleccione una opción</option>
																@foreach ($razas as $item)
																<option value="{{$item->raz_id}}" {{ old('raz_id') == $item->raz_id ? 'selected' : '' }}>{{$item->raz_nombre}}</option>
																@endforeach
															</select>
															@error('raz_id')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Sexo:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer el sexo de la mascota"></i>
															</label>
															<select required class="form-control @error('mas_sexo') is-invalid @enderror" name="mas_sexo" id="mas_sexo">
																<option value="">Seleccione una opción</option>
																<option value="1" {{ old('mas_sexo') == 1 ? 'selected' : '' }}>Macho</option>
																<option value="2" {{ old('mas_sexo') == 2 ? 'selected' : '' }}>Hembra</option>
															</select>
															@error('mas_sexo')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Edad (En años):
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer la edad de la mascota"></i>
															</label>
															<input required type="number" value="{{old('mas_edad')}}" class="form-control @error('mas_edad') is-invalid @enderror" name="mas_edad" id="mas_edad" placeholder="Edad de la mascota" autofocus>
															@error('mas_edad')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
																Color:
																<span class="text-danger">*</span>
																<i class="fa fa-question-circle float-right" title="Establecer el color de la mascota"></i>
															</label>
															<input required type="text" value="{{old('mas_color')}}" class="form-control @error('mas_color') is-invalid @enderror" name="mas_color" id="mas_color" placeholder="Color de la mascota" autofocus>
															@error('mas_color')
															<div class="invalid-feedback">
																{{$message}}
															</div>											
															@enderror
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<input type="hidden" name="pro_id" id="pro_id" value="{{$propietario->pro_id}}">
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