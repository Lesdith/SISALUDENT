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
						<div class="container-fluid">
							<form  id="frm-patient" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return validaCampos();">
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
									{{ csrf_field() }}
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="input-group">
											<!-- <label for="names">Nombres:</label> -->
											<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
											<input name="names" type="text" id="names" placeholder="Ingrese el ó los nombres" class="form-control"/>
										</div>
										<br/>
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
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<!-- <label for="gender_id">Género:</label> -->
											<span class="input-group-addon"><i class="fa fa-list"></i></span>
											<select name="gender_id" id="gender_id" class="form-control"></select>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<!-- <label for="birth_date">Fecha de nacimiento:</label> -->
											<span class="input-group-addon">Nacimiento:   <i class="fa fa-calendar-o"></i></span>
											<input name="birth_date" type="date" id="birth_date" placeholder="Ingrese la fecha de nacimiento" class="form-control"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-4">
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
											<select name="location_id" id="location_id"  placeholder="Seleccione localidad"  class="form-control"></select>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											<!-- <label for="address">Dirección:</label> -->
											<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
											<input name="address" type="text" id="address" placeholder="Ingrese una dirección" class="form-control"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-list"></i></span>
											<select name="department_id" id="department_id"  placeholder="Seleccione el departamento" class="form-control"></select>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											<!-- <label for="municipality_id">Municipio:</label> -->
											<span class="input-group-addon"><i class="fa fa-list"></i></span>
											<select name="municipality_id" id="municipality_id"  placeholder="Seleccione el municipio" class="form-control"></select>
										</div>
									</div>
								</div>
								<br/>
							</form>
						</div>
					</div>

					<!-- Paso #2 para crear historia clínica del paciente -->
					<div class="row hide" data-step="2" data-title="Historia clínica 2 de 3">
						<div class="container-fluid">
							<form  id="frm-clinic" enctype="multipart/form-data" accept-charset="UTF-8">
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
										<br/>
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
											¿Es cardíaco?<br/>
											<center>Si:  <input type="radio" id="cardiac" name="cardiac"/></center>
										</div>
										<br/>
									</div>
									<div class="col-md-12 col-md-3">
										<div class="input-group">
											¿Es diabético?<br/>
											<center>Si:  <input type="radio" id="diabetic" name="diabetic"/></center>
										</div>
										<br/>
									</div>
									<div class="col-md-12 col-md-3">
										<div class="input-group">
											¿Está embarazada?<br/>
											<center>Si: <input type="radio" id="pregnant" name="pregnant"/></center>
										</div>
										<br/>
									</div>
									<div class="col-md-12 col-md-3">
										<div class="input-group">
											¿Padece epilepsia?<br/>
											<center>Si:  <input type="radio" id="epileptic" name="epileptic"/></center>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

						<!-- Paso #3 para crear historia odontológica del paciente -->
					<div class="row hide" data-step="3" data-title="Historia odontológica 3 de 3">
						<div class="container-fluid">
							<form  id="frm-dental" enctype="multipart/form-data" accept-charset="UTF-8">
								<!-- Token para proteger contra la falsificación de solicitudes entre sitios-->
								{{ csrf_field() }}
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<span class="input-group-addon">Última visita:   <i class="fa fa-calendar-o"></i></span>
											<input name="last_medical_visit_date" type="date" id="last_medical_visit_date" placeholder="Ingresar la fecha de la última visita al dentista" class="form-control"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<center>¿Le provoca reacción la anestesia?<br/></center>
											<center>Si:  <input type="radio" id="reaction_anesthesia" name="reaction_anesthesia"/></center>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-4">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
											<input name="what_reaction" type="text" id="what_reaction" placeholder="¿Qué reacción le provoca?" class="form-control"/>
										</div>
									</div>
								</div>
								<br/>
								<hr class="my-4">
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											¿Tiene infección bucal?<br/>
											<center>Si:  <input type="radio" id="mouth_infections" name="mouth_infections"/>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											¿Tiene úlceras bucales?<br/>
											<center>Si:  <input type="radio" id="mouth_ulcers" name="mouth_ulcers"/></center>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											¿Tiene dolor dentario?<br/>
											<center>Si:  <input type="radio" id="toothache" name="toothache"/></center>
										</div>
										<br/>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="input-group">
											¿Tiene hemorragia dental?<br/>
											<center>Si:  <input type="radio" name="dental_hemorrhage"  id="dental_hemorrhage"/></center>
										</div>
									</div>
									<br/>
								</div>
								<input type="submit" class="btn btn-success" value="Guardar"/>
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
<!-- // Modal nuevo registro -->

@stop
<!-- /Content Section -->
@push('js')
	<script>

      	$(document).ready(function() {
		dataTableTeeth();
		getGender();
		getLocation();
		// getDepartment();
		// getMunicipality();
		filterMunicipality();
		disabledDepartment();
		// getGenderEdit();
		// getLocationEdit();
		// getMunicipalityEdit();
		validar ();
		modalSteps();
		enfermedadInfecciosa();
		alergia();
		embarazada();
		check();
		// getAge();
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
					$('#location_id').append($('<option>', {value: "0", text: 'Seleccionar Localidad'}));
					$.each(data,	function(i, value){
					$('#location_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			function disabledDepartment(){
					$('#department_id').prop('disabled', true);
						$('#location_id').change(function() {
							if($('#location_id').val() == '1'){
								getDepartment();
								$('#department_id').prop('disabled', false);
							}else{
								$('#department_id').prop('disabled', true);
								$('#department_id').empty();
								$('#municipality_id').prop('disabled', true);
								$('#municipality_id').empty();
							}
						});
				}


				//para cargar la lista de los departamentos
			function getDepartment(){
			$.get('get-departments', function(data){
					$('#department_id').append($('<option>', {value: "0", text: 'Seleccionar departamento'}));
					$.each(data,	function(i, value){
					$('#department_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}



			function filterMunicipality(){
				$('#municipality_id').prop('disabled', true);
				$('#municipality_id').empty();
				$("#department_id").change(function() {
					if($("#department_id").val() !== '0'){
						$('#municipality_id').empty();
						getMunicipality();
						$('#municipality_id').prop('disabled', false);
					}else{
						$('#municipality_id').prop('disabled', true);
						$('#municipality_id').empty();
					}
				});
			}

			//para cargar la lista de los municipios
			function getMunicipality(){
			$department = $('#department_id').val();
			$.get('get-municipalities/'+ $department, function(data){
					$('#municipality_id').append($('<option>', {value: "0", text: 'Seleccionar municipio'}));
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
	}


//Función para poder activar y desactivar el input de alergias

	function alergia(){
		$('#what_you_allergy').prop('disabled', true);
	}

//Función para poder desactivar el botón de embarazo en caso de que el genero sea masculino

	function embarazada(){
		$('#pregnant').attr('disabled', true);
			$('#gender_id').change(function() {
				if($('#gender_id').val() !== '1'){
					$('#pregnant').attr('disabled', false);
				}else{
					$('#pregnant').attr('disabled', true);
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

					if ('#allergic') {
						$('#what_you_allergy').prop('disabled', true);
					}


				}else {
						//Estado de actualización
						// El navegador comprobará el botón por sí mismo
						isChecked = true;

						// Hacer algo más si se selecciona el botón de radio
						if ('#allergic') {
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

		$.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});

			$('#frm-dental').on('submit', function(e){
				e.preventDefault();
				var datos 	= $('#frm-patient, #frm-clinic, #frm-dental').serializeArray();

				console.info(datos);
				$.ajax({
					type 		: 'POST',
					url 		: '{{ URL::to('patients')}}',
					data 		: datos,
					dataType	: 'json',

					success:function(data)
					{
						// document.getElementById("frm-insert").reset();
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


 function getAge(dateString) {
	 var today = new Date();
	 var birthDate = new Date(dateString);
	 var age = today.getFullYear() - birth_date.getFullYear();
	 var m = today.getMonth() - birth_date.getMonth();
	 if (m < 0 || (m === 0 && birth_date.getDate() < birth_date.getDate()))
	 { age--; }
	 return age;
	}

</script>
@endpush