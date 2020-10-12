@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
<div class="row">
  <div class="col-md-4">
    <div class="col-md-offset-4">
      <a hrf="#" class="btn btn-success glyphicon glyphicon-arrow-left" onclick="history.back()" name="volver atrás" value="volver atrás"></a>
    </div>
  </div>
  <div class="col-md-4">
        <center><h4><b>Expediente odontológico</b></h4></center>
  </div>

</div>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
    @endif

@section('content')

      <div class="container">
        <div class="panel-group">
         <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading"><b>Datos del paciente</b></div>
                <div class="panel-body">
                  <div class="container-fluid">
                    <form id="form">
                        <input type="hidden" id="patient_id" value="{{$patient->id}}"/>
                          <p><strong>Nombre:</strong> {{ $patient->names }} {{ $patient->surnames }}</p>
                          <p><strong>Género:</strong> {{ $patient->gender }}</p>
                          <p><strong>Fecha de nacimiento:</strong> {{ $patient->birth_date }}</p>
                          <!-- <p><label id="edad">
                          </label></p> -->
                          <p><strong>Localidad:</strong> {{ $patient->location }}</p>
                          <p><strong>Dirección:</strong>
                            @if($patient->municipality == "" )
                              {{ $patient->address }}.
                              @else
                                {{ $patient->address }},  {{ $patient->municipality }},  {{ $patient->department}}.
                            @endif
                          </p>
                          <p><strong>Teléfono:</strong> {{ $patient->phone_number }}</p>
                        </div>
                      </div>
                    </form>
                    <div class="panel-footer">
                      <button type='button' id='edit' class='edit btn btn-warning' title='Modificar' data-id='id'><i class='fa fa-pencil-square-o'></i></button>
                    </div>
                  </div><br/>
            <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading"><b>Historia clínica</b></div>
                  <div class="panel-body">
                    <div class="container-fluid">
                      <form id="form">

                          <input id="clinic_history" type="hidden" value="{{$patient->clinic_history}}">
                            <p><strong>¿Ha tenido alguna enfermedad infecciosa?:</strong>
                              @if($patient->infectious_disease == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>¿Que enfermedad?:</strong>
                              @if( $patient->disease_name == "" )
                                No tiene ninguna enfermedad infecciosa.
                              @else
                              {{ $patient->disease_name }}
                              @endif
                            </p>
                            <p><strong>¿Es alérgico?:</strong>
                              @if( $patient->allergic == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>¿Qué le dá alergia?:</strong>
                              @if( $patient->what_you_allergy == "")
                                No tiene alergias.
                              @else
                              {{ $patient->what_you_allergy }}
                              @endif
                            </p>
                            <p><strong>¿Es cardíaco?:</strong>
                              @if( $patient->cardiac == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>¿Es diabético?:</strong>
                              @if( $patient->diabetic == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                              @if( $patient->gender == 'Masculino')
                              @else
                                <p><strong>¿Está embarazada?:</strong>
                                  @if( $patient->pregnant == 1 )
                                    Si
                                  @else
                                    No
                                  @endif
                                </p>
                              @endif
                            <p><strong>¿Padece Epilepsia?:</strong>
                              @if( $patient->epileptic == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>Observaciones:</strong>
                              @if($patient->observations == "" )
                                Ninguna
                              @else
                                {{ $patient->observations }}
                              @endif
                            </p>
                          </div>
                        </div>
                      </form>
                      <div class="panel-footer">
                        <button type='button' id='edita' class='edit btn btn-warning' title='Modificar' data-id='patient_id'><i class='fa fa-pencil-square-o'></i></button>
                      </div>
                    </div>
                  </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading"><b>Historia odontológica</b></div>
                  <div class="panel-body">
                    <div class="container-fluid">
                        <form id="form">
                          <input id="dental_history" type="hidden" value="{{$patient->dental_history}}">
                            <p><strong>¿Tiene hemorragia dentaria?</strong>
                              @if( $patient->dental_hemorrhage == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>¿Tiene alguna infección bucal?:</strong>
                              @if( $patient->mouth_infections == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>¿Tiene úlceras bucales?</strong>
                            @if( $patient->mouth_ulcers == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>¿Le provoca alguna reacción la anestesia?</strong>
                              @if( $patient->reaction_anesthesia == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                            <p><strong>¿Qué reacción le provoca?</strong>
                              @if( $patient->what_reaction == "")
                                No le da ninguna reacción.
                              @else
                              {{ $patient->what_reaction }}
                              @endif
                            </p>
                            <p><strong>¿Tiene dolor dentario?:</strong>
                              @if( $patient->toothache == 1 )
                                Si
                              @else
                                No
                              @endif
                            </p>
                          </div>
                        </div>
                      </form>
                      <div class="panel-footer">
                        <button type='button' id='editar' class='edit btn btn-warning' title='Modificar' data-id='patients_id'><i class='fa fa-pencil-square-o'></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <b>Planes de tratamiento</b> 
                    <a href="{{url('../plan/'.$patient->id)}}" class="btn btn-success pull-right" >
						          <i class="fa fa-plus"></i> 
                      Agregar
                    </a>
                </div>
                <div class="panel-body">
                  <div class="container-fluid">
                        <table id="tbl-
                        
                        "class="display responsive no-wrap" width="100%">
                          <thead>
                            <tr >
                              <th class="text-center">No.</th>
                              <th data-priority="1" class="text-center">Fecha</th>
                              <th class="text-center">Acciones</th>
                            </tr>
                          </thead>
                        </table>
                        <!-- fin del DataTable-->
                      </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>

	<!-- Modal - Actualizar registro  de paciente-->

	<div class="modal fade" id="update_patient_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
	            </div>
					<div class="modal-body">
	 				<form  action="{{ URL::to('patients')}}" method="POST" id="frm-update_patient">
            <input type="hidden" name="_method" value="PUT"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="names">Nombres</label>
                    <input name="names" type="text" id="update_names" placeholder="Nombres" class="form-control"/>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="surnames">Apellidos</label>
                    <input name="surnames" id="update_surnames" placeholder="Apellidos" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="gender_id">Género</label>
                    <select name="gender_id" id="update_gender_id" class="form-control"></select>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="birth_date">Fecha nacimiento</label>
                    <input name="birth_date" type="date" id="update_birth_date"class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="phone_number">Teléfono</label>
                    <input name="phone_number" id="update_phone_number"class="form-control"/>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="location_id">Localidad</label>
                    <select name="location_id" id="update_location_id"class="form-control"></select>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="address">Dirección</label>
                    <input name="address"id="update_address"class="form-control"/>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="department_id">Departamento</label>
                    <select name="department_id" id="update_department_id"class="form-control"></select>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="municipality_id">Municipio</label>
                    <select name="municipality_id"  id="update_municipality_id"class="form-control"></select>
                  </div>
                  <input type="hidden" name="id" id="update_patient_id"/>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" value="Actualizar" />
              </div>
          </form>
				</div>
	    </div>
	  </div>
	</div>
	<!-- // Modal actualizar registro de paciente-->

	<!-- Modal - Actualizar historia odontológica-->

	<div class="modal fade" id="update_history_dental_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Actualizar historia odontológica</h4>
	            </div>
					<div class="modal-body">
            <form  action="{{ URL::to('patients')}}" method="POST" id="frm-update_history_dental">
              <input type="hidden" name="_method" value="PUT"/>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="mouth_infections">¿Tiene hemorragia dentaria?</label>
                      <!--
                         <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                      <select name="dental_hemorrhage" id="dental_hemorrhage" placeholder="Apellidos" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="mouth_infections">¿Tiene infección bucal?</label>
                      <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                      <select name="mouth_infections" id="mouth_infections" placeholder="Apellidos" class="form-control"></select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="reaction_anesthesia">¿Le provoca alguna reacción la anestesia?</label>
                    <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                      <select name="reaction_anesthesia" id="reaction_anesthesia"class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="what_reaction">¿Qué reacción le provoca?</label>
                    <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                      <input name="what_reaction" id="what_reaction"class="form-control"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                   <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="mouth_ulcers">¿Tiene úlceras bucales?</label>
                    <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                      <select name="mouth_ulcers" id="mouth_ulcers" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="toothache">¿Tiene dolor dentario?</label>
                    <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                      <select name="toothache"id="toothache"class="form-control"></select>
                    </div>
                  </div>
                    <input type="hidden" name="id" id="dental_patient_id"/>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <input type="submit" class="btn btn-success" value="Actualizar" />
                </div>
            </form>
				</div>
	    </div>
	  </div>
	</div>
	<!-- // Modal actualizar registro de historia odontológica -->


	<!-- Modal - Actualizar historia dental-->

	<div class="modal fade" id="update_history_clinic_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Actualizar historia clínica</h4>
	            </div>
            <div class="modal-body">
              <form  action="{{ URL::to('patients')}}" method="POST" id="frm-update_history_clinic">
                <input type="hidden" name="_method" value="PUT"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label for="infectious_disease">¿Ha tenido alguna enfermedad infecciosa?</label>
                          <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <select name="infectious_disease" id="infectious_disease" placeholder="Apellidos" class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label for="disease_name">¿Que enfermedad?</label>
                        <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <input name="disease_name" id="disease_name"class="form-control"/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label for="allergic">¿Es alérgico?</label>
                        <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <select name="allergic" id="allergic" class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label for="what_you_allergy">¿Qué le dá alergia?</label>
                        <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <input name="what_you_allergy" id="what_you_allergy"class="form-control"/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                          <label for="cardiac">¿Es cardíaco?</label>
                          <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <select name="cardiac" id="cardiac" placeholder="Apellidos" class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4">
                          <div class="form-group">
                          <label for="diabetic">¿Es diabético</label>
                        <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <select name="diabetic" id="diabetic"class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                          <label for="pregnant">¿Está embarazada?</label>
                        <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <select name="pregnant"id="pregnant"class="form-control"></select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                          <label for="epileptic">¿Padece Epilepsia?</label>
                        <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <select name="epileptic"id="epileptic"class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="form-group">
                          <label for="observations">Observaciones:</label>
                        <!-- <span class="input-group-addon"><i class="fa fa-list"></i></span> -->
                          <input name="observations"id="observations"class="form-control"/>
                        </div>
                      </div>
                      </div>
                        <input type="hidden" name="id" id="clinic_patient_id"/>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Actualizar" />
                  </div>
              </form>
            </div>
	        </div>
	    </div>
	</div>
	<!-- // Modal actualizar registro de historia clínica-->

@stop

@push('css')
<style>
.help-block {
  display: run-in;
  color: #ff0000;
}

input.error {
   border:1px dotted red;
}


.modal-header{
          border-radius: 15px;
}
.modal-content{
   border-radius: 15px;
}
.row-eq-height {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display:   flex;
}
</style>
@endpush
@push('js')
  <script>
    $(document).ready(function() {
      getGenderEdit();
      getLocationEdit();
      getDepartmentEdit();
      getMunicipalityEdit();
     // disabledDepartmentEdit()
      filterMunicipalityEdit();
      calcularEdad();
      embarazada();
      validar ();
      dataTablePlans();

      var validator;

      var heights = $(".container-fluid").map(function() {
          return $(this).height();
      }).get(),

      maxHeight = Math.max.apply(null, heights);
        $(".container-fluid").height(maxHeight);

    });

// este apartado permite limpiar el formulario cargado en el modal al dar clic en el boton cancelar
$("#cancelar").on("click",function(e){
     e.preventDefault();
	 validator.resetForm();
    $('#frm-update_patient').trigger("reset");
});



//Esta funcion permite desabilitar el campo si es un hombre, se activa solo si es mujer
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

// Esta función permite calcular la edad del paciente
function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
      console.log(edad);

    var m = hoy.getMonth() - cumpleanos.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    return edad;
}

//-------------Editar paciente-------------
// con esta sección se obtienen y se cargan los datos en un modal.

	$('body').delegate('#edit', 'click', function(e){
		e.preventDefault();
		  var vid = $('#patient_id').val();
      console.log(vid);

		$.get('../patients/' + vid + '/edit', {id:vid}, function(data){

			$('#frm-update_patient').find('#update_names').val(data.names)
			$('#frm-update_patient').find('#update_surnames').val(data.surnames)
			$('#frm-update_patient').find('#update_birth_date').val(data.birth_date)
			$('#frm-update_patient').find('#update_gender_id').val(data.gender_id)
			$('#frm-update_patient').find('#update_phone_number').val(data.phone_number)
			$('#frm-update_patient').find('#update_location_id').val(data.location_id)
			$('#frm-update_patient').find('#update_address').val(data.address)
			$('#frm-update_patient').find('#update_department_id').val(data.municipality.department_id)
			$('#frm-update_patient').find('#update_municipality_id').val(data.municipality_id)

			$('#frm-update_patient').find('#update_patient_id').val(data.id)
			$('#update_patient_modal').modal('show');
		});

	});


	  //Esta función se utiliza para cargar los datos del dropdown list de tipos de localidad
			function getLocationEdit(vid){
        $('#update_location_id').empty();
				$.get('../get-locations', function(data){
					$.each(data,	function(i, value){
						if(value.id === vid ){
							$('#update_location_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_location_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

     //Esta funcion sirve para cambiar la localidad del paciente
    function locationChange(){
      $('#update_location_id').change(function(){
       if($('#update_location_id').val() !== '2'){
           $('#update_department_id').val() = null;
           $('#update_department_id').prop('disabled', true);
           $('#update_municipality_id').val() = null;
           $('#update_municipality_id').prop('disabled', true);
          }
     });
    }


      
			/* Esta función trabaja en conjunto con la función de location (si la localidad es =  local) se habilita el listado de departamentos
			junto con los municipios asociados, en caso contrario (si la localidad es = extranjero) permanecen deshabilitados,
			pero la función  debe ser llamada en el document ready*/
			function disabledDepartmentEdit(){
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

    
	  //Esta función se utiliza para cargar los datos del dropdown list de tipos de genero
			function getGenderEdit(vid){
				$('#update_gender_id').empty();
			    $.get('../get-genders', function(data){
					$.each(data,	function(i, value){
						if(value.id === vid ){
							$('#update_gender_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_gender_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

 //Esta función se utiliza para cargar los datos del dropdown list si el paciente pertenece a un departamento
      function getDepartmentEdit(vid){
         $('#update_department_id').empty();
			$.get('../get-departments', function(data){
					$.each(data,	function(i, value){
            if(value.id === vid){
                $('#update_department_id').append($('<option selected>', {value: value.id, text: `${value.name}`}));
            }
					$('#update_department_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});

			}

      function filterMunicipalityEdit(){
				$("#update_department_id").change(function() {
					if($("#update_department_id").val() !== '0'){
						$('#update_municipality_id').empty();
						getMunicipalityEdit();
						$('#update_municipality_id').prop('disabled', false);
					}else{
						$('#update_municipality_id').prop('disabled', true);
						$('#update_municipality_id').empty();
					}
				});
      }
      

  // esta seccion permite filtrar la municipalidad relacionada al departamento obtenido
        $('#update_patient_modal').on('show.bs.modal', function (e) {
          getMunicipalityEdit();
        });

  
  //Esta función se utiliza para cargar los datos del dropdown list de los municipios
			function getMunicipalityEdit(vid){
         $('#update_municipality_id').empty();
         var department = $('#update_department_id').val();
			$.get('../get-municipalities/'+ department, function(data){

					$.each(data,	function(i, value){
            if(value.id === vid){
                $('#update_municipality_id').append($('<option selected>', {value: value.id, text: `${value.name}`}));
            }
					$('#update_municipality_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}


/* Esta función se creo para hacer validaciones mas especificas, como cantidad de caracteres, si solo permite números entre otros,
para hacer uso de ella es necesario descargar la librería jqueryvalidate.js  y la función debe ser llamada en el document ready*/

  	function  validar () {
		jQuery.validator.addMethod("lettersonly", function(value, element) {
				return this.optional(element) || /^[a-z\sÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/i.test(value);
			}, );
			jQuery.validator.addMethod("phoneguion", function(value, element) {
				return this.optional(element) || /^[0-9\-]+$/i.test(value);
			}, );
			jQuery.validator.addMethod("pwcheck", function(value) {
   					return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
					&& /[a-z]/.test(value) // has a lowercase letter
					&& /\d/.test(value) // has a digit
				});
		validator = 	$('#frm-update_patient').validate({
				keyup: true,
				rules: {
					names: {
						required: 		true,
						lettersonly: 	true,
						minlength: 		2,
						maxlength: 		35,
					},
					surnames: {
						required: 		true,
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
					phone_number: {
						phoneguion: 	true,
						minlength: 		9,
						maxlength: 		9,
					}


				},
        debug: true,
				errorClass: 'help-block',
				validClass: 'success',
				errorElement: "span",
				highlight: function(element, errorClass, validClass){
					if (!$(element).hasClass('novalidation')) {
           			 	$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        			}
				},
				unhighlight: function(element, errorClass, validClass){
					if (!$(element).hasClass('novalidation')) {
           				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        			}
				},
				errorPlacement: function (error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					}
					else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
						error.insertAfter(element.parent().parent());
					}
					else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
						error.appendTo(element.parent().parent());
					}
					else {
						error.insertAfter(element);
					}
				},
				messages: {
					names: {
						required: 		'Por favor ingrese al menos un nombre',
						lettersonly: 	'Los nombres solo pueden contener letras',
						minlength: 		'Ingrese un nombre válido',
						maxlength: 		'Ingrese un nombre válido',
					},
					surnames: {
						required: 		'Por favor ingrese al menos un apellido',
						lettersonly: 	'Los apellidos solo pueden contener letras',
						minlength: 		'Ingrese un apellido válido',
						maxlength: 		'Ingrese un apellido válido',
					},
					gender_id: {
						required: 		'Debe elegir un género'
					},
					birth_date: {
						required: 		'Debe ingresa fecha de nacimiento',
						date: 			'Ingrese una fecha válida'
					},
					location_id: {
						required: 		'Debe elegir localidad',
					},
					address: {
						required: 		'La dirección es requerida',
						minlength: 		'Ingrese una dirección válida',
					},
					phone_number: {
						phoneguion: 		'Ingrese un número de teléfono válido',
						minlength: 		'El número de teléfono debe tener 8 dígitos',
						maxlength: 		'El número de teléfono debe tener 8 dígitos',
					}
				},
			});
		}





	//-------------Actualizar Paciente------------

	$('#frm-update_patient').on('submit', function(e){
				e.preventDefault();
				var data 	= $('#frm-update_patient').serializeArray();
				var id 		= $("#update_patient_id").val();
				// console.log(data);
				// console.log(id);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url 	: '../patients/' + id ,
					dataType: 'json',
					type 	: 'POST',
					data 	: data,
					success:function(data)
					{
					window.location.reload();
					console.log(data);
						$('#update_patient_modal').modal('hide');
						toastr["success"]("Paciente guardada","Información")

					}
					});
				});

		// // (fecha dada , fecha nacimiento)
		// calculaEdad(
		// moment('11/04/2020','DD/MM/YYYY').format('YYYY-MM-DD'),
		// moment('hnbv 11/04/1990 11:30', 'DD/MM/YYYY HH:mm').format('YYYY-MM-DD')
		// );

		// // (fecha actual , fecha nacimiento)
		// calculaEdad(
		// moment(),
		// moment('birth_date', 'DD-MM-YYYY').format('YYYY-MM-DD')
		// );

		// // recibe fecha actual y fecha de nacimiento
		// function calculaEdad(fecha,birth_date){
		// 	var a = moment(fecha);
		// 	var b = moment(birth_date);

		// 	var years = a.diff(b, 'year');
		// 	b.add(years, 'years');

		// 	var months = a.diff(b, 'months');
		// 	b.add(months, 'months');

		// 	var days = a.diff(b, 'days');

		// 	if(years==0){
		// 		if(months<=1){
		// 			if(days<=1){
		// 				console.log(months + ' mes ' + days + ' dia');
		// 			}else{
		// 				console.log( months + ' mes ' + days + ' dias');
		// 			}
		// 	}else{
		// 			if(days<=1){
		// 			console.log( months + ' meses ' + days + ' dia');
		// 			}else{
		// 			console.log( months + ' meses ' + days + ' dias');
		// 			}
		// 	}

		// 	}else{
		// 		if(years==1){
		// 			console.log( years + ' año');
		// 		}else{
		// 			console.log( years + ' años');
		// 		}
		// 	}
		// }


	//-------------Editar Historia odontológica-------------
	$('body').delegate('#editar', 'click', function(e){
	e.preventDefault();
		  var vid = $('#dental_history').val();
        //console.log(vid);

		$.get('../get-dentals/' + vid , {id:vid}, function(data){

      	var hemorrhage=data.dental_hemorrhage;
			if(hemorrhage == 1 ){
				$('#dental_hemorrhage').append($('<option>', {value: 1, text: 'Si'}));
				$('#dental_hemorrhage').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#dental_hemorrhage').append($('<option>', {value: 0, text: 'No'}));
				$('#dental_hemorrhage').append($('<option>', {value: 1, text: 'Si'}));
			}
			//console.log(data);
			var infection=data.mouth_infections;
			if(infection == 1 ){
				$('#mouth_infections').append($('<option>', {value: 1, text: 'Si'}));
				$('#mouth_infections').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#mouth_infections').append($('<option>', {value: 0, text: 'No'}));
				$('#mouth_infections').append($('<option>', {value: 1, text: 'Si'}));
			}
       var ulceras=data.mouth_ulcers;
			if(ulceras == 1 ){
				$('#mouth_ulcers').append($('<option>', {value: 1, text: 'Si'}));
				$('#mouth_ulcers').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#mouth_ulcers').append($('<option>', {value: 0, text: 'No'}));
				$('#mouth_ulcers').append($('<option>', {value: 1, text: 'Si'}));
			}
       var reaction=data.reaction_anesthesia;
			if(reaction == 1 ){
				$('#reaction_anesthesia').append($('<option>', {value: 1, text: 'Si'}));
				$('#reaction_anesthesia').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#reaction_anesthesia').append($('<option>', {value: 0, text: 'No'}));
				$('#reaction_anesthesia').append($('<option>', {value: 1, text: 'Si'}));
			}

      if($('#frm-update_history_dental').find('#what_reaction').val() == ""){
      $('#frm-update_history_dental').find('#what_reaction').val('No tiene ninguna reacción')
      }
      else if($('#frm-update_history_dental').find('#what_reaction').val() == "No tiene ninguna reacción"){
      $('#frm-update_history_dental').find('#what_reaction').val('No tiene ninguna reacción')
      }
      else{
      $('#frm-update_history_dental').find('#what_reaction').val(data.what_reaction)
      }
			  var dolor=data.toothache;
			if(dolor == 1 ){
				$('#toothache').append($('<option>', {value: 1, text: 'Si'}));
				$('#toothache').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#toothache').append($('<option>', {value: 0, text: 'No'}));
				$('#toothache').append($('<option>', {value: 1, text: 'Si'}));
			}
      //$('#frm-update_status').find('#update_status').val(status)
			$('#frm-update_history_dental').find('#dental_patient_id').val(data.id)
			$('#update_history_dental_modal').modal('show');
		});
	});



	//-------------Actualizar Historia odontologica------------


	$('#frm-update_history_dental').on('submit', function(e){
				e.preventDefault();
				var data 	= $('#frm-update_history_dental').serializeArray();
				var id 		= $("#dental_patient_id").val();
				 console.log(data);
				 console.log(id);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url 	: '../dentals/' + id ,
					dataType: 'json',
					type 	: 'POST',
					data 	: data,
					success:function(data)
					{
            window.location.reload();
					console.log(data);
						$('#update_history_dental_modal').modal('hide');
					}
					});
				});


	//-------------Editar Historia clínica-------------
	$('body').delegate('#edita', 'click', function(e){
	e.preventDefault();
		  var vid = $('#clinic_history').val();
        //console.log(vid);

		$.get('../get-clinics/' + vid , {id:vid}, function(data){

    	var infeccion = data.infectious_disease;
			if(infeccion == 1 ){
				$('#infectious_disease').append($('<option>', {value: 1, text: 'Si'}));
				$('#infectious_disease').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#infectious_disease').append($('<option>', {value: 0, text: 'No'}));
				$('#infectious_disease').append($('<option>', {value: 1, text: 'Si'}));
			}
       if($('#frm-update_history_clinic').find('#disease_name').val() == ""){
      $('#frm-update_history_clinic').find('#disease_name').val('No tiene ninguna enfermedad')
      }
        else if($('#frm-update_history_clinic').find('#disease_name').val() == "No tiene ninguna enfermedad"){
      $('#frm-update_history_clinic').find('#disease_name').val('No tiene ninguna enfermedad')
      }

      else{
      $('#frm-update_history_clinic').find('#disease_name').val(data.disease_name)
      }
			//console.log(data);
			var cardiac = data.cardiac;
			if(cardiac == 1 ){
				$('#cardiac').append($('<option>', {value: 1, text: 'Si'}));
				$('#cardiac').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#cardiac').append($('<option>', {value: 0, text: 'No'}));
				$('#cardiac').append($('<option>', {value: 1, text: 'Si'}));
			}
       var ulceras=data.allergic;
			if(ulceras == 1 ){
				$('#allergic').append($('<option>', {value: 1, text: 'Si'}));
				$('#allergic').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#allergic').append($('<option>', {value: 0, text: 'No'}));
				$('#allergic').append($('<option>', {value: 1, text: 'Si'}));
			}

      if($('#frm-update_history_clinic').find('#what_you_allergy').val() == ""){
      $('#frm-update_history_clinic').find('#what_you_allergy').val('No le da ninguna reacción')
      }
       else if($('#frm-update_history_clinic').find('#what_you_allergy').val() == "No le da ninguna reacción"){
      $('#frm-update_history_clinic').find('#what_you_allergy').val('No le da ninguna reacción')
      }

      else{
      $('#frm-update_history_clinic').find('#what_you_allergy').val(data.what_you_allergy)
      }
			  var diabetes=data.diabetic;
			if(diabetes == 1 ){
				$('#diabetic').append($('<option>', {value: 1, text: 'Si'}));
				$('#diabetic').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#diabetic').append($('<option>', {value: 0, text: 'No'}));
				$('#diabetic').append($('<option>', {value: 1, text: 'Si'}));
			}

       var pregnant=data.pregnant;
			if(pregnant == 1 ){
				$('#pregnant').append($('<option>', {value: 1, text: 'Si'}));
				$('#pregnant').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#pregnant').append($('<option>', {value: 0, text: 'No'}));
				$('#pregnant').append($('<option>', {value: 1, text: 'Si'}));
			}
       var epilepsia=data.epileptic;
			if(epilepsia == 1 ){
				$('#epileptic').append($('<option>', {value: 1, text: 'Si'}));
				$('#epileptic').append($('<option>', {value: 0, text: 'No'}));
			} else{
				$('#epileptic').append($('<option>', {value: 0, text: 'No'}));
				$('#epileptic').append($('<option>', {value: 1, text: 'Si'}));
			}
      if($('#frm-update_history_clinic').find('#observations').val() == ""){
      $('#frm-update_history_clinic').find('#observations').val('No  hay observaciones')
      }
       else if($('#frm-update_history_clinic').find('#observations').val() == "No  hay observaciones"){
      $('#frm-update_history_clinic').find('#observations').val('No  hay observaciones')
      }

      else{
      $('#frm-update_history_clinic').find('#observations').val(data.observations)
      }
      //$('#frm-update_status').find('#update_status').val(status)
			$('#clinic_patient_id').val(data.id)
			$('#update_history_clinic_modal').modal('show');
		});
	});

	//-------------Actualizar Historia clínica------------

	$('#frm-update_history_clinic').on('submit', function(e){
				e.preventDefault();
				var data 	= $('#frm-update_history_clinic').serializeArray();
				var id 		= $("#clinic_patient_id").val();
				 console.log(data);
				 console.log(id);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url 	: '../clinics/' + id ,
					dataType: 'json',
					type 	: 'POST',
					data 	: data,
					success:function(data)
					{
            window.location.reload();
					console.log(data);
						$('#update_history_clinic_modal').modal('hide');
					}
					});
        });

        function dataTablePlans()
        {
          var id = {{$patient->id}};
          var dt = $('#tbl-plans').DataTable({
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

            "order": [[ 1, 'desc' ]],
            "fixedColumns":	true,

            "language":
                      {
                          "url":'//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                      },

            "ajax": {
              "url": 		"../get-plans/"+id,
              "type":		'GET',
              "dataSrc":	'plans',
            },

            "columns" : [
              {"data":	"id"},
              {"data":	"date"},
              {"defaultContent":

                "<div class='btn-group btn-group-xs' > " +
                "<button type='button' id='show'  class='show btn btn-info'   title='Mostrar'   data-id='id'><i class='fa fa-eye'></i></button>"+
                "<button type='button' id='pdf' class='btn btn-warning' title='PDF' data-id='id'><i class='fa fa-file-pdf-o'></i></button>"+
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

        $('body').delegate('#tbl-plans #show', 'click', function(e){
          e.preventDefault();
            var $tr = $(this).closest('li').length ?
                $(this).closest('li'):
                $(this).closest('tr');;
                  var rowData = $('#tbl-plans').DataTable().row($tr).data();
                    //console.log(rowData);
                var vid = rowData.id;
                console.log(vid);
              //$.get('plans/' + vid +'/edit', {id:vid}, function(data){
                window.location.href = '../plans/' + vid+'/edit';
          // });
        });

        $('body').delegate('#tbl-plans #pdf', 'click', function(e){
          e.preventDefault();
            var $tr = $(this).closest('li').length ?
                $(this).closest('li'):
                $(this).closest('tr');;
                  var rowData = $('#tbl-plans').DataTable().row($tr).data();
                    //console.log(rowData);
                var vid = rowData.id;
                console.log(vid);
              //$.get('plans/' + vid +'/edit', {id:vid}, function(data){
                window.location.href = '../pdf/' + vid;
          // });
        });


  </script>
@endpush