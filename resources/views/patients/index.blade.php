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

	<!-- Bootstrap Modals -->
	<!-- Modal - Agregar nuevo registro -->

	<div class="modal fade bd-example-modal-lg" id="add_patient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
	                	<h4 class="modal-title" id="myModalLabel">Agregar paciente</h4>
	            </div>
	            <div class="modal-body">
	 				<form  action="{{ URL::to('patients')}}" method="POST" id="frm-insert" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return validaCampos();">
					 <!-- onsubmit="return validaCampos(); sirve para validar campos vacios al dar click al boton guardar -->

						{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<!-- <label for="names">Nombres:</label> -->
								<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
								<input name="names" type="text" id="names" placeholder="Ingrese el ó los nombres" class="form-control"/>
							</div>
						</div>
						<div class="col-md-6">
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
						<div class="col-md-4">
							<div class="input-group">
								<!-- <label for="birth_date">Fecha de nacimiento:</label> -->
								<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
								<input name="birth_date" type="date" id="birth_date" placeholder="Ingrese la fecha de nacimiento" class="form-control"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<!-- <label for="phone_number">Teléfono:</label> -->
								<span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
								<input name="phone_number" type="text" data-mask="9999-9999" id="phone_number" placeholder="Ingrese un número de teléfono" class="form-control"/>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<div class="input-group">
								<!-- <label for="location_id">Localidad:</label> -->
								<span class="input-group-addon"><i class="fa fa-list"></i></span>
								<select name="location_id" id="location_id"  placeholder="Selecciona la localidad"  class="form-control"></select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<!-- <label for="address">Dirección:</label> -->
								<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
								<input name="address" type="text" id="address" placeholder="Ingrese una dirección" class="form-control"/>
							</div>
						</div>
						<div class="col-md-4">
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
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<input type="submit" class="btn btn-success" value="Guardar" />
							</div>
					</form>
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
							"<button type='button' id='del' class='delete btn btn-danger' title='Eliminar'><i class='fa fa-trash-o'></i></button>"+
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


	//-----------Crear Paciente --------

			$('#frm-insert').on('submit', function(e){
				e.preventDefault();
				var datos 	= $(this).serializeArray();
				var url 	= $(this).attr('action');
				var post 	= $(this).attr('method');
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
					type 		: post,
					url 		: url,
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
							console.log(preview)
			$('#frm-update').find('#update_names').val(data.names)
			$('#frm-update').find('#update_surnames').val(data.surnames)
			$('#frm-update').find('#update_birth_date').val(data.birth_date)
			$('#frm-update').find('#update_location_id').val(data.gender_id)
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

				// $.ajax({
				// 	url:     'patients/' + vid , {id:vid},
				// 	type:    'GET',
				//     data:    { src: 'patients.show' },
				// 	success: function(response) {
				// 	// window.location.href = 'patients/' +vid;
				// 	}
				// });

		//


			// $('#frm-show').find('#show_name').val(data.name)

		// 	//se utilizo para mostrar en texto el valor de un select (tooth_types)
		// 	$.get('get-tooth_types', function(data){
		// 	$.each(data,	function(i, value){
		// 		if(value.id === rowData.tooth_type_id ){
		// 	//		console.log(value)
		// 		$('#frm-show').find('#show_tooth_type').val(value.name)
		// 			}
		// 		});
		// 	});

		// 	//se utilizo para mostrar en texto el valor de un select (tooth_stages)
		// 	$.get('get-tooth_stages', function(data){
		// 	$.each(data,	function(i, value){
		// 		if(value.id === rowData.tooth_stage_id ){
		// 	$('#frm-show').find('#show_tooth_stage').val(value.name)
		// 			}
		// 		});
		// 	});

		// 	//se utilizo para mostrar en texto el valor de un select (tooth_positions)
		// 	$.get('get-tooth_positions', function(data){
		// 	$.each(data,	function(i, value){
		// 		if(value.id === rowData.tooth_stage_id ){
		// 	$('#frm-show').find('#show_tooth_position').val(value.name)
		// 			}
		// 		});
		// 	});
		// 	$('#frm-show').find('#show_tooth_id').val(data.id)
		// 	$('#show_tooth_modal').modal('show');
		 });
	});


	// $('body').delegate('#tbl-teeth #show', 'click', function(e){
	// 	e.preventDefault();
	// 		var $tr = $(this).closest('li').length ?
	// 				$(this).closest('li'):
	// 				$(this).closest('tr');
    // 				var rowData = $('#tbl-teeth').DataTable().row($tr).data();
   	// 					console.log(rowData);
	// 				var vid = rowData.id;
	// 		$('#frm-show').find('#show_name').val(rowData.name)
	// 		$('#frm-show').find('#show_tooth_type').val(rowData.tooth_type.name)
	// 		$('#frm-show').find('#show_tooth_stage').val(rowData.tooth_stage.name)
	// 		$('#frm-show').find('#show_tooth_position').val(rowData.tooth_position.name)
	// 		$('#show_tooth_modal').modal('show');
	// });


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