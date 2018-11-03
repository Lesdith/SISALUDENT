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
                      <p><strong>Nombre:</strong> {{ $patient->names }} {{ $patient->surnames }}</p>
                      <p><strong>Género:</strong> {{ $patient->gender }}</p>
                      <p><strong>Fecha de nacimiento:</strong> {{ $patient->birth_date }}</p>
                      <p><label id="edad">
                      </label></p>
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


@stop

@push('js')
  <script>

  	$(document).ready(function() {
var noseque = {{$patient->birth_date}};
      console.log(noseque);

		  calcularEdad();
      $("#edad").append(edad);
      console.log(edad);

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