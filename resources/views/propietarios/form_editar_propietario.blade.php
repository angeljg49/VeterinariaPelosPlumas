@extends('layouts.autenticado')
@section('titulo', $titulo)

@section('contenido')

<div class="col-md-10 content-pane">
		<h3 class="title-header" style="text-transform: uppercase;">
			<i class="fa fa-plus"></i>
			{{$titulo}}
			<a href="{{url('propietarios')}}" title="Volver a lista de propietarios" data-placement="bottom" class="btn btn-sm btn-secondary float-right" style="margin-left:10px;"><i class="fa fa-angle-double-left"></i> ATRÁS</a>
		</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- inicio card  -->
				<div class="card">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<form id="form-nuevo-propietario" action="{{url('propietarios/'.$propietario->pro_id)}}" method="POST">
								  @csrf
								  @method('put')
								  <section id="seccion-datos-generales">
									<div class="row">
										<div class="col-md-10 offset-md-1">
											<h4 class="text-success">DATOS DEL PROPIETARIO</h4>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Nombre del propietario:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el nombre del propietario"></i>
															</label>
														<input required type="text" value="{{old('pro_nombre_completo', $propietario->pro_nombre_completo)}}" class="form-control @error('pro_nombre_completo') is-invalid @enderror" name="pro_nombre_completo" id="pro_nombre_completo" placeholder="Nombre de propietario">
														@error('pro_nombre_completo')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Nro. CI:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer el CI propietario"></i>
														</label>
													<input required type="text" value="{{old('pro_ci', $propietario->pro_ci)}}" class="form-control @error('pro_ci') is-invalid @enderror" name="pro_ci" id="pro_ci" placeholder="CI propietario">
													@error('pro_ci')
													<div class="invalid-feedback">
														{{$message}}
													</div>											
													@enderror
												</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Dirección:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer la dirección del propietario"></i>
															</label>
														<input required type="text" value="{{old('pro_direccion', $propietario->pro_direccion)}}" class="form-control @error('pro_direccion') is-invalid @enderror" name="pro_direccion" id="pro_direccion" placeholder="Dirección">
														@error('pro_direccion')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label-blue label-block" for="">
														Zona:
														<span class="text-danger">*</span>
														<i class="fa fa-question-circle float-right" title="Establecer la zona del propietario"></i>
														</label>
													<input required type="text" value="{{old('pro_zona', $propietario->pro_zona)}}" class="form-control @error('pro_zona') is-invalid @enderror" name="pro_zona" id="pro_zona" placeholder="Zona">
													@error('pro_zona')
													<div class="invalid-feedback">
														{{$message}}
													</div>											
													@enderror
												</div>
												</div>
											</div>

											<h4 class="text-success">DATOS PARA LA CUENTA DE USUARIO</h4>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Nombre de usuario:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer nombre de usuario"></i>
															</label>
														<input required type="text" value="{{old('usu_nombre', $propietario->usuario->usu_nombre)}}" class="form-control @error('usu_nombre') is-invalid @enderror" name="usu_nombre" id="usu_nombre" placeholder="Nombre de usuario">
														@error('usu_nombre')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															E-mail:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el email del usuario"></i>
															</label>
														<input required type="text" value="{{old('usu_email', $propietario->usuario->usu_email)}}" class="form-control @error('usu_email') is-invalid @enderror" name="usu_email" id="usu_email" placeholder="Email del usaurio">
														@error('usu_email')
														<div class="invalid-feedback">
															{{$message}}
														</div>											
														@enderror
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
															<label class="label-blue label-block" for="">
															Password:
															<span class="text-danger">*</span>
															<i class="fa fa-question-circle float-right" title="Establecer el nombre del propietario"></i>
															</label>
														<input required type="password" value="{{old('usu_password', $propietario->usuario->password)}}" class="form-control @error('usu_password') is-invalid @enderror" name="usu_password" id="usu_password" placeholder="Password" readonly>
														@error('usu_password')
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