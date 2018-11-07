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
  <div class="col-md-4">

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
        <div class="col-md-6">
          <div class="panel panel-info">
            <div class="panel-heading"><b>Datos del paciente</b></div>
            <div class="panel-body">
              <div class="container-fluid">
                <form id="form">
                  <div class="row">
                    <div class="col-md-6">
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
                	<button type='button' id='edit' class='edit btn btn-warning' title='Modificar' data-id='id'><i class='fa fa-pencil-square-o'></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-info">
            <div class="panel-heading"><b>Datos del paciente</b></div>
            <div class="panel-body">
              <div class="container-fluid">
                <form id="form">
                  <div class="row">
                    <div class="col-md-6">

                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-info">
            <div class="panel-heading"><b>Historia clínica</b></div>
              <div class="panel-body">
                <div class="container-fluid">
                  <form id="form">
                    <div class="row">
                      <div class="col-md-12">
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
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-3">
          <div class="panel panel-info">
            <div class="panel-heading"><b>Historia odontológica</b></div>
              <div class="panel-body">
                <div class="container-fluid">
                  <div class="row">
                    <form id="form">
                      <div class="col-md-12">
                        <p><strong>¿Cuándo fue su última visita al dentista?</strong>
                         @if($patient->observations == "" )
                            No se acuerda
                          @else
                            {{  $patient->last_medical_visit_date }}
                          @endif
                        </p>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

	<!-- Modal - Actualizar registro -->

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
              <div class="form-group">
                <label for="names">Nombres</label>
                <input name="names" type="text" id="update_names" placeholder="Nombres" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="surnames">Apellidos</label>
                <input name="surnames" id="update_surnames" placeholder="Apellidos" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="gender_id">Género</label>
                <select name="gender_id" id="update_gender_id" class="form-control"></select>
              </div>
              <div class="form-group">
                <label for="birth_date">Fecha nacimiento</label>
                <input name="birth_date" type="date" id="update_birth_date"class="form-control"/>
              </div>
              <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input name="phone_number" id="update_phone_number"class="form-control"/>
              </div>
              <div class="form-group">
                <label for="location_id">Localidad</label>
                <select name="location_id" id="update_location_id"class="form-control"></select>
              </div>
              <div class="form-group">
                <label for="address">Dirección</label>
                <input name="address"id="update_address"class="form-control"/>
              </div>
              <div class="form-group">
                <label for="department_id">Departamento</label>
                <select name="department_id" id="update_department_id"class="form-control"></select>
              </div>
               <div class="form-group">
                <label for="municipality_id">Municipio</label>
                <select name="municipality_id"  id="update_municipality_id"class="form-control"></select>
              </div>
              <input type="hidden" name="id" id="update_patient_id"/>

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



@stop

@push('js')
  <script>

//   	$(document).ready(function() {
// // var noseque = {{$patient->birth_date}};
// //       console.log(noseque);

// // 		  calcularEdad();
// //       $("#edad").append(edad);
// //       console.log(edad);

//      getGenderEdit();
// 		 getLocationEdit();
// 		getMunicipalityEdit();
//     });


    $(document).ready(function() {
      getGenderEdit();
      getLocationEdit();
      getDepartmentEdit();
      //disabledDepartmentEdit()
      //filterMunicipalityEdit();


    });



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

	$('body').delegate('#edit', 'click', function(e){
		e.preventDefault();
		  var vid = $('#patient_id').val();
        //console.log(vid);

		$.get('../patients/' + vid + '/edit', {id:vid}, function(data){

			$('#frm-update_patient').find('#update_names').val(data.names)
			$('#frm-update_patient').find('#update_surnames').val(data.surnames)
			$('#frm-update_patient').find('#update_birth_date').val(data.birth_date)
			$('#frm-update_patient').find('#update_gender_id').val(data.gender_id)
			$('#frm-update_patient').find('#update_phone_number').val(data.phone_number)
			$('#frm-update_patient').find('#update_location_id').val(data.location_id)
			$('#frm-update_patient').find('#update_address').val(data.address)
			$('#frm-update_patient').find('#update_department_id').val(data.municipality.department_id)
			$('#frm-update_patient').find('#update_municipality_id').val(data.municipality.id)

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

      // function filterMunicipalityEdit(){

			// 	$("#update_department_id").change(function() {
			// 		if($("#update_department_id").val() !== '0'){
			// 			$('#update_municipality_id').empty();
			// 			getMunicipalityEdit();
			// 			$('#update_municipality_id').prop('disabled', false);
			// 		}else{
			// 			$('#update_municipality_id').prop('disabled', true);
			// 			$('#update_municipality_id').empty();
			// 		}
			// 	});
			// }

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
					url 	: 'patients/' + id ,
					dataType: 'json',
					type 	: 'POST',
					data 	: data,
					success:function(data)
					{
						// var $t = $('#form').DataTable();
						// $t.ajax.reload();
					console.log(data);
						$('#update_patient_modal').modal('hide');

					}
					});
				});

		// // (fecha dada , fecha nacimiento)
		// calculaEdad(
		// moment('11/04/2020','DD/MM/YYYY').format('YYYY-MM-DD'),
		// moment('11/04/1990 11:30', 'DD/MM/YYYY HH:mm').format('YYYY-MM-DD')
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

  </script>
@endpush