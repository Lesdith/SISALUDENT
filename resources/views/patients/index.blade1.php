@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
<h3>Pacientes</h3>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

@section('content')
	<button data-toggle="modal" data-target="#add_patient_modal" class="btn btn-success pull-right" style="margin-bottom:10px;">
		<i class="fa fa-plus"></i> Nuevo Registro</button>

			<table id="tbl-patients" style="width:100%" class="table table-stripped table-bordered table-responsive">
				<thead>
					<tr >
						<th class="text-center">No.</th>
						<th data-priority="1" class="text-center">Nombre</th>
						<th class="text-center">Teléfono</th>
						<th class="text-center">Localidad</th>
						<th class="text-center">Dirección</th>
						<th class="text-center">Acciones</th>

					</tr>
				</thead>
			</table>
	<div class="text-right"></div>

	<!--Area de Modales por pasos de Bootstrap -->
	<!-- Modal-->

	<div class="modal fade bd-example-modal-lg" id="add_patient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
	                	<h4 class="js-title-step"></h4>
	            </div>
	            <div class="modal-body">

					<!-- Paso #1 Crear un paciente -->
					<div class="row hide" data-step="1" data-title="Información del paciente 1 de 3">
						<div class="jumbotron" style="background-color:#FFFF;">
							<div class="container">
								<!-- onsubmit="return validaCampos(); sirve para validar campos vacios al dar click al boton guardar -->
								<form  action="{{ URL::to('patients')}}" method="POST" id="frm-insert" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return validaCampos();">
										<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
											{{ csrf_field() }}
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<div class="input-group">
													<!-- <label for="names">Nombres:</label> -->
													<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													<input name="names" type="text" id="names" placeholder="Ingrese el ó los nombres" class="form-control"/>
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												<div class="input-group">
													<!-- <label for="surnames">Apellidos:</label> -->
													<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													<input name="surnames" type="text" id="surnames" placeholder="Ingrese el ó los apellidos" class="form-control"/>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-4">
												<div class="input-group">
													<!-- <label for="gender_id">Género:</label> -->
													<span class="input-group-addon"><i class="fa fa-list"></i></span>
													<select name="gender_id" id="gender_id" class="form-control"></select>
												</div>
											</div>
											<div class="col-sm-12 col-md-4">
												<div class="input-group">
													<!-- <label for="birth_date">Fecha de nacimiento:</label> -->
													<span class="input-group-addon">Nacimiento:   <i class="fa fa-calendar-o"></i></span>
													<input name="birth_date" type="date" id="birth_date" placeholder="Ingrese la fecha de nacimiento" class="form-control"/>
												</div>
											</div>
											<div class="col-sm-12 col-md-3">
												<div class="input-group">
													<!-- <label for="phone_number">Teléfono:</label> -->
													<span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
													<input name="phone_number" type="text" data-mask="9999-9999" id="phone_number" placeholder="Ingrese teléfono" class="form-control"/>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-sm-12 col-md-3">
												<div class="input-group">
													<!-- <label for="location_id">Localidad:</label> -->
													<span class="input-group-addon"><i class="fa fa-list"></i></span>
													<select name="location_id" id="location_id"  placeholder="Selecciona la localidad"  class="form-control"></select>
												</div>
											</div>
											<div class="col-sm-12 col-md-4">
												<div class="input-group">
													<!-- <label for="address">Dirección:</label> -->
													<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													<input name="address" type="text" id="address" placeholder="Ingrese una dirección" class="form-control"/>
												</div>
											</div>
											<div class="col-sm-12 col-md-4">
													<div class="input-group">
													<!-- <label for="municipality_id">Municipio:</label> -->
													<span class="input-group-addon"><i class="fa fa-list"></i></span>
													<select name="municipality_id" id="municipality_id"  placeholder="Selecciona el municipio" class="form-control"></select>
												</div>
											</div>
										</div>
										<br/>
											<!-- para poder cargar la imagen se deben de agregar las librerias de jasny.bootstrapp.min.css jasny.bootstrapp.min.js-->
										<!-- el name: debe ser exactamente igual al nombre del campo en la base de datos -->
										<div class="row">
											<div class="col-md-8 col-md-offset-4">
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div id="preview" class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
														<img src="{{ asset('../images/Paciente.png') }}" alt="...">
													</div>
													<div id="preview" class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
													<div>
														<span class="btn btn-primary btn-embossed btn-file">
															<span class="fileinput-new fa fa-upload">&nbsp;&nbsp;Subir foto</span>
															<span class="fileinput-exists fa fa-wrench">&nbsp;&nbsp;Cambiar</span>
															<input type="file" name="file" id="file">
														</span>
														<a href="#" class="btn btn-danger btn-embossed btn-file fileinput-exists fa fa-trash" data-dismiss="fileinput">&nbsp;&nbsp;Remove</a>
														<!-- <span href="#" class="close fileinput-exists fa fa-trash" data-dismiss="fileinput"> Eliminar</span> -->
													</div>
												</div>
											</div>
										</div>
												<!-- <div class="modal-footer"> -->
													<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>-->
													<input type="submit" class="btn btn-success" value="Guardar" />
												<!-- </div> -->
								</form>
							</div>
						</div>
					</div>

					<!-- Paso #2 para crear historia clínica del paciente -->
					<div class="row hide" data-step="2" data-title="Historia clínica 2 de 3">
						<div class="jumbotron" style="background-color:#FFFF;">
							<div class="container">
								<!-- onsubmit="return validaCampos(); sirve para validar campos vacíos al dar click al boton guardar -->
								<form  action="{{ URL::to('clinic_histories')}}" method="POST" id="frm-insert" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return validaCampos();">
										<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
											{{ csrf_field() }}
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<div class="input-group">
													¿Ha tenido alguna enfermedad infecciosa? <br/>
													<center>Si: <input type="radio" name="infectious_disease"  id="infectious_disease"/><br /></center>
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													<input name="disease_name" type="text" id="disease_name" placeholder="Ingrese el nombre de la enfermedad" class="form-control"/>
												</div>
											</div>
										</div>
										<hr class="my-4">
										<br/>
										<div class="row">
											<div class="col-md-12 col-md-6">
												<div class="input-group">
													¿Es alérgico? <br/>
													<center>Si:  <input type="radio" id="allergic" name="allergic"/><br /></center>
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
													<input name="what_you_allergy" type="text" id="what_you_allergy" placeholder="¿Qué le da alergia?" class="form-control"/>
												</div>
											</div>
										</div>
										<hr class="my-4">
										<br/>
										<div class="row">
											<div class="col-md-12 col-md-3">
												<div class="input-group">
													¿Es cardíaco?<br />
													<center>Si:  <input type="radio" id="cardiac" name="cardiac"/></center>
												</div>
											</div>
											<div class="col-md-12 col-md-3">
												<div class="input-group">
													¿Es diabético?<br />
													<center>Si:  <input type="radio" id="diabetic" name="diabetic"/></center>
												</div>
											</div>
											<div class="col-md-12 col-md-3">
												<div class="input-group">
													¿Está embarazada?<br/>
													<center>Si: <input type="radio" id="pregnant" name="pregnant"/></center>
												</div>
											</div>
											<div class="col-md-12 col-md-3">
												<div class="input-group">
													¿Padece epilepsia? <br/>
													<center>Si:  <input type="radio" id="epileptic" name="epileptic"/></center>
												</div>
											</div>
										</div>
								</form>
							</div>
						</div>
					</div>

						<!-- Paso #3 para crear historia odontológica del paciente -->
					<div class="row hide" data-step="3" data-title="Historia odontológica 3 de 3">
						<div class="jumbotron" style="background-color:#FFFF;">
							<div class="container">
								<!-- onsubmit="return validaCampos(); sirve para validar campos vacíos al dar click al boton guardar -->
								<form  action="{{ URL::to('clinic_histories')}}" method="POST" id="frm-insert" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return validaCampos();">
										<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
											{{ csrf_field() }}
											<div class="row">
												<div class="col-sm-12 col-md-4">
													<div class="input-group">
														<span class="input-group-addon">Última visita:   <i class="fa fa-calendar-o"></i></span>
														<input name="last_medical_visit_date" type="date" id="last_medical_visit_date" placeholder="Ingresar la fecha de la última visita al dentista" class="form-control"/>
													</div>
												</div>
												<div class="col-md-12 col-md-4">
													<div class="input-group">
														<center>¿Le provoca reacción la anestesia?<br /></center>
														<center>Si:  <input type="radio" id="reaction_anesthesia" name="reaction_anesthesia"/></center>
													</div>
												</div>
													<div class="col-sm-12 col-md-4">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
														<input name="what_reaction" type="text" id="what_reaction" placeholder="¿Qué reacción le provoca?" class="form-control"/>
													</div>
												</div>
											</div>
											<hr class="my-4">
											<div class="row">
												<div class="col-md-12 col-md-3">
													<div class="input-group">
														¿Tiene infección bucal?<br />
														<center>Si:  <input type="radio" id="mouth_infections" name="mouth_infections"/>
													</div>
												</div>
												<div class="col-md-12 col-md-3">
													<div class="input-group">
														¿Tiene úlceras bucales?<br />
														<center>Si:  <input type="radio" id="mouth_ulcers" name="mouth_ulcers"/></center>
													</div>
												</div>
												<div class="col-md-12 col-md-3">
													<div class="input-group">
														¿Tiene dolor dentario?<br />
														<center>Si:  <input type="radio" id="toothache" name="toothache"/></center>
													</div>
												</div>
												<div class="col-sm-12 col-md-3">
													<div class="input-group">
														¿Tiene hemorragia dental?<br />
														<center>Si:  <input type="radio" name="dental_hemorrhage"  id="dental_hemorrhage"/></center>
													</div>
												</div>
											</div>
									</form>
								</div>
							</div>
						</div>

				<div class="modal-footer">
						<button type="button" class="btn btn-default js-btn-step pull-left" data-orientation="cancel" data-dismiss="modal"></button>
						<button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
						<button type="button" class="btn btn-success js-btn-step" data-orientation="next"></button>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- // Modal nuevo registro -->

					<!-- Modal - Actualizar registro -->

					<div class="modal fade bd-example-modal-lg" id="update_patient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Editar registro</h4>
								</div>
									<div class="modal-body">
									<form  action="{{ URL::to('patients')}}" method="POST" id="frm-update" enctype="multipart/form-data">
									<input type="hidden" name="_method" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="row">
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
												<!-- <label for="names">Nombres:</label> -->
												<input name="names" type="text" id="update_names" placeholder="Ingrese el ó los nombres" class="form-control"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
												<!-- <label for="surnames">Apellidos:</label> -->
												<input name="surnames" type="text" id="update_surnames" placeholder="Ingrese el ó los apellidos" class="form-control"/>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-list"></i></span>
												<!-- <label for="gender_id">Género:</label> -->
												<select name="gender_id" id="update_gender_id" class="form-control"></select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
												<!-- <label for="birth_date">Fecha de nacimiento:</label> -->
												<input name="birth_date" type="date" id="update_birth_date" placeholder="Ingrese la fecha de nacimiento" class="form-control"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
												<!-- <label for="phone_number">Teléfono:</label> -->
												<input name="phone_number" type="text" id="update_phone_number" placeholder="Ingrese un numero de teléfono" class="form-control"/>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-list"></i></span>
												<!-- <label for="location_id">Localidad:</label> -->
												<select name="location_id" id="update_location_id"  placeholder="Selecciona la localidad"  class="form-control"></select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
												<!-- <label for="address">Dirección:</label> -->
												<input name="address" type="text" id="update_address" placeholder="Ingrese una dirección" class="form-control"/>
											</div>
										</div>
										<div class="col-md-4">
												<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-list"></i></span>
												<!-- <label for="municipality_id">Municipio:</label> -->
												<select name="municipality_id" id="update_municipality_id"  placeholder="Selecciona el municipio" class="form-control"></select>
											</div>
										</div>
									</div>
									<br/>
										<br/>
										<!-- para poder cargar la imagen se deben de agregar las librerias de jasny.bootstrapp.min.css jasny.bootstrapp.min.js-->
									<!-- el name: debe ser exactamente igual al nombre del campo en la base de datos -->
									<div class="row">
										<div class="col-md-8 col-md-offset-4">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div id="preview" class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<img src="{{ asset('../images/Paciente.png') }}" alt="...">
												</div>
												<div id="preview" class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
												<div>
													<span class="btn btn-primary btn-embossed btn-file">
														<span class="fileinput-new fa fa-upload">&nbsp;&nbsp;Subir foto</span>
														<span class="fileinput-exists fa fa-wrench">&nbsp;&nbsp;Cambiar</span>
														<input type="file" name="file" id="file">
													</span>
													<a href="#" class="btn btn-danger btn-embossed btn-file fileinput-exists fa fa-trash" data-dismiss="fileinput">&nbsp;&nbsp;Remove</a>
													<!-- <span href="#" class="close fileinput-exists fa fa-trash" data-dismiss="fileinput"> Eliminar</span> -->
												</div>
											</div>
										</div>
									</div>
										<input type="hidden" name="id" id="update_id">

										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<input type="submit" class="btn btn-success" value="Actualizar" />
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
					<!-- // Modal actualizar registro -->

				<!-- Modal Mostrar registro -->

					<div class="modal fade" id="show_patient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Detalles del registro</h4>
								</div>
									<div class="modal-body">
									<form  action="" method="POST" id="frm-show">
									{{ csrf_field() }}
										<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="first_name">Primer nombre:</label>
												<input name="first_name" type="text" id="show_first_name" placeholder="Ingrese el primer nombre" class="form-control"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="second_name">Segundo nombre:</label>
												<input name="second_name" type="text" id="show_second_name" placeholder="Ingrese el segundo nombre" class="form-control"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="third_name">Tercer nombre:</label>
												<input name="third_name" type="text" id="show_third_name" placeholder="Ingrese el tercer nombre" class="form-control"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="father_last_name">Apellido paterno:</label>
												<input name="father_last_name" type="text" id="show_father_last_name" placeholder="Ingrese el apellido paterno" class="form-control"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="mother_last_name">Apellido materno:</label>
												<input name="mother_last_name" type="text" id="show_mother_last_name" placeholder="Ingrese el apellido materno" class="form-control"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="gender_id">Género:</label>
												<select name="gender_id" id="show_gender_id" class="form-control"></select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="birth_date">Fecha de nacimiento:</label>
												<input name="birth_date" type="date" id="show_birth_date" placeholder="Ingrese la fecha de nacimiento" class="form-control"/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phone_number">Teléfono:</label>
												<input name="phone_number" type="text" id="show_phone_number" placeholder="Ingrese un numero de teléfono" class="form-control"/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="location_id">Localidad:</label>
												<select name="location_id" id="show_location_id"  placeholder="Selecciona la localidad"  class="form-control"></select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="address">Dirección:</label>
												<input name="address" type="text" id="show_address" placeholder="Ingrese una dirección" class="form-control"/>
											</div>
										</div>
										<div class="col-md-4">
												<div class="form-group">
												<label for="municipality_id">Municipio:</label>
												<select name="municipality_id" id="show_municipality_id"  placeholder="Selecciona el municipio" class="form-control"></select>
											</div>
										</div>
									</div>

									<div class="center-block">
										<label>Foto:</label>
										<input type="file" class="form-control" id="image">
									</div>

										<input type="hidden" name="id" id="update_id">

										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
									</div>
								</form>
				</div>
	        </div>
	    </div>
	</div>
	<!-- // Modal Mostrar registro -->
@stop
<!-- /Content Section -->

@section('css')
<style type="text/css">

	.centrar{
		margin: 50px auto;
		float:none;
		}
</style>
@stop
	<!-- // End Style -->
@push('js')
	<script>

      	$(document).ready(function() {
		dataTableTeeth();
		getGender();
		getLocation();
		getMunicipality();
		getGenderEdit();
		getLocationEdit();
		getMunicipalityEdit();
		validar ();
		modalSteps();
		enfermedadInfecciosa();
		alergia();
		embarazada();
		check();
        });


		function dataTableTeeth()
			{
				var dt = $('#tbl-patients').DataTable({
					"serverside":	true,
					"autoWidth": 	true,
					"responsive":	true,
					"columnDefs":	[
						{responsivePriority: 1, targets: 0},
						{responsivePriority: 2, targets: -2},
						{
							"searchable": false,
							"orderable": false,
							"targets": 0
						}
					],

					"order": [[ 1, 'asc' ]],
					"fixedColumns":	true,

					"language":
                     {
                         "url":'//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                     },

					"ajax": {
						"url": 		'../get-patients',
						"type":		'GET',
						"dataSrc":	'patients',
					},

					"columns" : [
						{"data":	"id"},

						{
							/**
							 * * Permite combinar el nombre de la persona en una sola columna.
							 *
							 */
							data: null,
							render: function ( data, type, row )
							{
								/**
								 ** data se carga con los campos donde se almacena el nombre.
								 */
								return data.names+'  '+data.surnames;
							},
							//editField: ['first_name', 'second_name', 'first_surname', 'second_surname']
						},
						{"data":	"phone_number"},
						{"data":	"location.name"},
						{"data":	"address"},
						{"defaultContent":

							"<div class='btn-group btn-group-xs' > " +
							"<button type='button' id='show'  class='show btn btn-info'   title='Mostrar'   data-id='id'><i class='fa fa-eye'></i></button>"+
							"<button type='button' id='edit' class='edit btn btn-warning' title='Modificar' data-id='id'><i class='fa fa-pencil-square-o'></i></button>"+
							//"<button type='button' id='del' class='delete btn btn-danger' title='Eliminar'><i class='fa fa-trash-o'></i></button>"+
							"</div>"

						}

					]
				});
				dt.on( 'order.dt search.dt', function () {
       				dt.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            			cell.innerHTML = i+1;
       			 	});
    			}).draw();
			}

			//para cargar la lista de géneros
			function getGender(){
			$.get('get-genders', function(data){
					$('#gender_id').append($('<option>', {value: "", text: 'Seleccionar género'}));
					$.each(data,	function(i, value){
					$('#gender_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//para cargar la lista de tipos de localidad
			function getLocation(){
			$.get('get-locations', function(data){
					$('#location_id').append($('<option>', {value: "", text: 'Seleccionar Localidad'}));
					$.each(data,	function(i, value){
					$('#location_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//para cargar la lista de los municipios
			function getMunicipality(){
			$.get('get-municipalities', function(data){
					$('#municipality_id').append($('<option>', {value: "", text: 'Seleccionar municipio'}));
					$.each(data,	function(i, value){
					$('#municipality_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}


//Modal con pasos función, se debe de llamar en el document ready
	function modalSteps(){
		$('#add_patient_modal').modalSteps({
			btnCancelHtml: "Cancel",
			btnPreviousHtml: "Previous",
			btnNextHtml: "Next",
			btnLastStepHtml: "Complete",
			disableNextButton: false,
			completeCallback: function() {},
			callbacks: {},
			getTitleAndStep: function() {}
			});
	}

//Función para poder activar y desactivar el input de enfermedades

	function enfermedadInfecciosa(){
		$('#disease_name').prop('disabled', true);
			// $("#infectious_disease").click(function() {
			// 	if($("#infectious_disease").val() !== false){
			// 		$('#disease_name').prop('disabled', false);
			// 	}else{
			// 		$('#disease_name').prop('disabled', true);
			// 	}
			// });
	}


//Función para poder activar y desactivar el input de alergias

	function alergia(){
		$('#what_you_allergy').prop('disabled', true);
		// 	$("#allergic").click(function() {
		// 		if($("#allergic").val() !== false){
		// 			$('#what_you_allergy').prop('disabled', false);
		// 		}else{
		// 			$('#what_you_allergy').prop('disabled', true);
		// 		}
		// 	});
		// $('input:radio').bind('click mousedown', (function() {
		// 	var isChecked;
		// 	return function(event) {
		// 		if(isChecked) {
		// 			$('#what_you_allergy').prop('disabled', false);
		// 		}

		// 	}

		// }));


	}

//Función para poder desactivar el botón de embarazo en caso de que el genero sea masculino

	function embarazada(){
		$("#pregnant").attr('disabled', true);
			$("#gender_id").change(function() {
				if($("#gender_id").val() !== '1'){
					$("#pregnant").attr('disabled', false);
				}else{
					$("#pregnant").attr('disabled', true);
				}
			});
	}

// Función para poder seleccionar y deseleccionar el botón radio
function check(){
	// Necesitamos también enlazar click handler
	// como el botón FF establece el botón después de la eliminación, pero antes de hacer clic
	$('input:radio').bind('click mousedown', (function() {
		// Capturar el estado del botón de radio dentro de su alcance del controlador,
		// por lo que no usamos ninguna vars global y cada botón de radio mantiene su propio estado.
		// Esto es necesario para desmarcarlos más tarde.
		// Necesitamos almacenar el estado por separado cuando se verifique el estado de las actualizaciones del navegador antes de hacer clic en el controlador,
		// entonces el botón de radio siempre estará marcado.

		var isChecked;

		return function(event) {
			if(event.type == 'click') {
				if(isChecked) {
					// Desmarcar y actualizar el estado

					isChecked = this.checked = false;

					if ("#allergic") {
						$('#what_you_allergy').prop('disabled', true);
					}


				}else {
						//Estado de actualización
						// El navegador comprobará el botón por sí mismo
						isChecked = true;

						// Hacer algo más si se selecciona el botón de radio
						if ("#allergic") {
						$('#what_you_allergy').prop('disabled', false);
					}
				}
			}
			else {

				// Obtener el estado correcto antes de que el navegador lo configure
				// Necesitamos usar el evento onmousedown aquí, ya que es el único evento compatible con varios navegadores para botones de radio
				isChecked = this.checked;
			}

	}})());
}

	//-----------Crear Paciente --------

			$('#frm-insert').on('submit', function(e){
				e.preventDefault();
				var datos 	= $(this).serializeArray();
				// var url 	= $(this).attr('action');
				// var post 	= $(this).attr('method');
				var file = new FormData($('#frm-insert')[0]);

				//agregaremos los datos serializados al objecto imagen
					$.each(datos,function(key,input){
						file.append(input.name,input.value);
					});

				console.info(datos);
				console.log(file);
				$.ajax({
					headers: {
                		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            		},
					type 		: 'POST',
					url 		: '{{ URL::to('patients')}}',
					data 		: file,
					async		: true,
					contentType	: false, //'application/json', // The content type used when sending data to the server.
        			cache		: false, // To unable request pages to be cached
					dataType	: 'json',
					processData: false,

					success:function(data)
					{console.log(file);
						document.getElementById("frm-insert").reset();
						var t = $('#tbl-patients').DataTable();
						t.ajax.reload()
						$('#add_patient_modal').modal('hide');
						//getTeeth();
						toastr["success"]("¡Paciente creado exitosamente!", "Guardado")
					},
					error: function(xr, exception){
					console.log(xr.responseText);
					}
				});
			});


		//Esta función se creó para validar los campos vacíos al crear un registro
		function validaCampos(){
			var nombre	 		 = $("#names").val();
			var apellido		 = $("#surnames").val();
			var genero			 = $("#gender_id").val();
			var cumpleanios 	 = $("#birth_date").val();
			var localidad		 = $("#location_id").val();
			var direccion		 = $("#address").val();
			var municipio		 = $("#municipality_id").val();
			var telefono		 = $("#phone_number").val();
			//validamos campos
			if($.trim(nombre) == ""){
				toastr.error("Debe ingresar al menos un nombre","Aviso!");
					return false;
			}
			if($.trim(apellido) == ""){
				toastr.error("Debe ingresar al menos un apellido","Aviso!");
					return false;
			}
			if($.trim(genero) == ""){
				toastr.error("Debe seleccionar el género","Aviso!");
					return false;
			}
			if($.trim(cumpleanios) == ""){
				toastr.error("No ha ingresado la fecha de cumpleaños","Aviso!");
					return false;
			}
			if($.trim(localidad) == ""){
				toastr.error("Debe seleccionar la localidad","Aviso!");
					return false;
			}
			if($.trim(direccion) == ""){
				toastr.error("Debe ingresar una dirección","Aviso!");
					return false;
			}
			if($.trim(municipio) == ""){
				toastr.error("Debe seleccionar el municipio","Aviso!");
					return false;
			}
			if($.trim(telefono) == ""){
				toastr.error("Debe ingresar un número de teléfono","Aviso!");
					return false;
			}
		}

/* Esta función se creo para hacer validaciones mas especificas, como cantidad de caracteres, si solo permite números entre otros,
para hacer uso de ella es necesario descargar la librería jqueryvalidate.js  y la función debe ser llamada en el document ready*/

		function validar () {
			jQuery.validator.addMethod("lettersonly", function(value, element) {
				return this.optional(element) || /^[a-z\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/i.test(value);
			}, );
			jQuery.validator.addMethod("phoneguion", function(value, element) {
				return this.optional(element) || /^[0-9\-]+$/i.test(value);
			}, );
			$('#frm-insert').validate({
				keyup: true,
				rules: {
					names: {
						// required: 		true,
						lettersonly: 	true,
						minlength: 		2,
						maxlength: 		35,
					},
					surnames: {
						// required: 		true,
						lettersonly: 	true,
						minlength: 		2,
						maxlength: 		35,
					},
					gender_id: {
						required:		true,
					},
					birth_date: {
						required: 		true
					},
					location_id: {
						required: 		true,
					},
					address: {
						required: 		true,
						minlength: 		5,
					},
					municipality_id: {
						required: 		true
					},
					phone_number: {
						phoneguion: 	true,
						minlength: 		9,
						maxlength: 		9,
					}

				},
				messages: {
					names: {
						// required: 		function () {toastr.error('Por favor ingrese al menos un nombre')},
						lettersonly: 	function () {toastr.error('Los nombres solo pueden contener letras')},
						minlength: 		function () {toastr.error('Ingrese un nombre válido')},
						maxlength: 		function () {toastr.error('Ingrese un nombre válido')},
					},
					surnames: {
						// required: 		function () {toastr.error('Por favor ingrese al menos un apellido')},
						lettersonly: 	function () {toastr.error('Los apellidos solo pueden contener letras')},
						minlength: 		function () {toastr.error('Ingrese un apellido válido')},
						maxlength: 		function () {toastr.error('Ingrese un apellido válido')},
					},
					gender_id: {
						required: 		function () {toastr.error('Debe elegir un género')}
					},
					birth_date: {
						required: 		function () {toastr.error('Debe ingresa fecha de nacimiento')},
						date: 			function () {toastr.error('Ingrese una fecha válida')}
					},
					location_id: {
						required: 		function () {toastr.error('Debe elegir localidad')},
					},
					municipality_id: {
						required: 		function () {toastr.error('Debe elegir un municipio')}
					},
					address: {
						required: 		function () {toastr.error('La dirección es requerida')},
						minlength: 		function () {toastr.error('Ingrese una dirección válida')},
					},
					phone_number: {
						phoneguion: 		function () {toastr.error('Ingrese un número de teléfono válido')},
						minlength: 		function () {toastr.error('El número de teléfono debe tener 8 dígitos')},
						maxlength: 		function () {toastr.error('El número de teléfono debe tener 8 dígitos')},
					}
				},
			});
		}


	//-------------Editar paciente-------------

	$('body').delegate('#tbl-patients #edit', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');;
					var rowData = $('#tbl-patients').DataTable().row($tr).data();
					var vid = rowData.id;

		$.get('patients/' + vid + '/edit', {id:vid}, function(data){
				let preview = data.file;
				// preview.replace(/\\/g, "//");
							console.log(preview)
			$('#frm-update').find('#update_names').val(data.names)
			$('#frm-update').find('#update_surnames').val(data.surnames)
			$('#frm-update').find('#update_birth_date').val(data.birth_date)
			$('#frm-update').find('#update_gender_id').val(data.gender_id)
			$('#frm-update').find('#update_phone_number').val(data.phone_number)
			$('#frm-update').find('#update_location_id').val(data.location_id)
			$('#frm-update').find('#update_address').val(data.address)
			$('#frm-update').find('#update_municipality_id').val(data.municipality_id)
			$('#frm-update').find('#update_file').val(preview)
			$('#frm-update').find('#update_id').val(data.id)
			$('#update_patient_modal').modal('show');
		});

	});

	        //Esta función se utiliza para cargar los datos del dropdown list de tipos de localidad
			function getLocationEdit(vid){
				$('#update_location_id').empty();
				$.get('get-locations', function(data){
					$.each(data,	function(i, value){

						if(value.id === vid ){
							$('#update_location_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_location_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
	        //Esta función se utiliza para cargar los datos del dropdown list de tipos de genero
			function getGenderEdit(vid){
				$('#update_gender_id').empty();
			    $.get('get-genders', function(data){
					$.each(data,	function(i, value){

						if(value.id === vid ){
							$('#update_gender_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_gender_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

	        //Esta función se utiliza para cargar los datos del dropdown list de los municipios
			function getMunicipalityEdit(vid){
				$('#update_municipality_id').empty();
				$.get('get-municipalities', function(data){
					$.each(data,	function(i, value){

						if(value.id === vid ){
							$('#update_municipality_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_municipality_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
	//-------------Actualizar Paciente------------

	$('#frm-update').on('submit', function(e){
				e.preventDefault();
				var data 	= $('#frm-update').serializeArray();
				var id 		= $("#update_id").val();
				console.log(data);
				console.log(id);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url 	: 'patients/' + id ,
					dataType: 'json',
					type 	: 'POST',
					data 	: data,
					processData: false,
					contentType: false,
					async		: true,
					processData: false,
					success:function(data)
					{
						var $t = $('#tbl-patients').DataTable();
						$t.ajax.reload();
					console.log(data);
						$('#update_patient_modal').modal('hide');

					}
					});
				});



	//-------------Eliminar Paciente-------------

	/*se creo esta función para que al dar click al botón eliminar muestre uns alerta con
	 mensajes para que el usuario de click a la opción aceptar o cancelar */

$('body').delegate('#tbl-patients #del', 'click', function(e){
		e.preventDefault();
		// Crea los botones para que el usuario decida
		const swalWithBootstrapButtons = swal.mixin({
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
		})
		//Muestra el mensaje de la alerta y activa el botón cancelar
		swalWithBootstrapButtons({
			title: 'Eliminar',
			text: "¿Realmente desea eliminar el registro?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Si, eliminar!',
			cancelButtonText: 'No, cancelar!',
			reverseButtons: true
			// Se recoge el valor si se dio Click al botón eliminar
		}).then((result) =>{
			console.log(result);
				if (result.value) {
					var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    				var rowData = $('#tbl-patients').DataTable().row($tr).data();
   						console.log(rowData)
					var vid = rowData.id;
					var v_token = "{{csrf_token()}}";
					var parametros = {_method: 'DELETE', _token: v_token};
					$.ajax({
						type  : "POST",
						url	  : "patients/" + vid + "",
						data  : parametros,

						// Se elimina el Dato seleccionado
						success: function(data){
						$(vid).remove();

						//Se actualizan los datos en el DataTable
						var $t = $('#tbl-patients').DataTable();
						$t.ajax.reload();
						}
					});
					//Se muestra un mensaje de que el dato se elimino correctamente
					swalWithBootstrapButtons({
						title:"Poof! ",
						text: "Diente se eliminó correctamente!",
						type: "success",
					});
					// En caso de que el usuario seleccione el botón cancelar se muestra un mensaje de operación cancelada
				} else if(
					result.dismiss === swal.DismissReason.cancel){
					swalWithBootstrapButtons({
						title	:"Cancelado",
						text	:"¡Operación cancelada por el usuario!",
						type	:"error",
					});
				}
			});
		});

//--------- Se creo para poder mostrar el detalle de una fila


$('body').delegate('#tbl-patients #show', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');;
    				var rowData = $('#tbl-patients').DataTable().row($tr).data();
   						//console.log(rowData);
					var vid = rowData.id;
					console.log(vid);
				$.get('patients/' + vid , {id:vid}, function(data){
					window.location.href = 'patients/' +vid;
		 });
	});

// Esta función sirve para copiar la imagen de la vista previa en la carpeta establecida
document.getElementById("file").onchange = function (e) {
            let reader = new FileReader();

            reader.onload = function () {
                let preview = document.getElementById('preview'),
                    image = document.createElement('file');

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

        $("#button").click(function () {
            let preview = document.getElementById('preview');
            preview.innerHTML = '';
		});

</script>
@endpush