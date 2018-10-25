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
                    @if ( $patient->file )
                      <img src="{{asset( $patient->file)}}" class="img-responsiva" style="width: 200px; height: 200px;">
                    @else
                      <img src="{{asset('../images/nofoto.gif')}}" class="img-responsiva" style="width: 100px; height: 100px;">
                    @endif
                  </div>
                  <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $patient->names }} {{ $patient->surnames }}</p>
                    <p><strong>Género:</strong> {{ $patient->gender->name }}</p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $patient->birth_date }}</p>
                    <p><strong>Localidad:</strong> {{ $patient->location->name }}</p>
                    <p><strong>Dirección:</strong> {{ $patient->address }}, {{ $patient->municipality->name}}</p>
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
          <div class="panel-heading">
          <div class="row">
          <div class="col-md-6">
          <b>Historia clínica</b>
          </div>
          <div class="col-md-6">
          <b>Historia odontológica</b>
          </div>
          </div>
          </div>
          <div class="panel-body">
            <div class="container-fluid">
              <form id="form">
                <div class="row">
                  <div class="col-md-6">
                  <!-- <h3>Historia Clínica</h3> -->
                    @if ( $patient->file )
                    <img src="{{asset( $patient->file)}}" class="img-responsiva" style="width: 100px; height: 100px;">
                    @endif

                  </div>
                  <div class="col-md-6">
                  <!-- <h3>Historia Clínica</h3> -->
                    <p><strong>Nombre:</strong> {{ $patient->names }} {{ $patient->surnames }}</p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $patient->birth_date }}</p>
                    <p><strong>Teléfono:</strong> {{ $patient->phone_number }}</p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Datos del paciente</div>
          <div class="panel-body">
            <div class="container-fluid">
              <form id="form">
                <div class="row">
                  <div class="col-md-6">
                    @if ( $patient->file )
                    <img src="{{asset( $patient->file)}}" class="img-responsiva" style="width: 100px; height: 100px;">
                    @endif
                  </div>
                  <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $patient->names }} {{ $patient->surnames }}</p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $patient->birth_date }}</p>
                    <p><strong>Teléfono:</strong> {{ $patient->phone_number }}</p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Datos del paciente</div>
          <div class="panel-body">
            <div class="container-fluid">
              <form id="form">
                <div class="row">
                  <div class="col-md-6">
                    @if ( $patient->file )
                    <img src="{{asset( $patient->file)}}" class="img-responsiva" style="width: 100px; height: 100px;">
                    @endif
                  </div>
                  <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $patient->names }} {{ $patient->surnames }}</p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $patient->birth_date }}</p>
                    <p><strong>Teléfono:</strong> {{ $patient->phone_number }}</p>
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
@stop

@push('js')
	<script>

    //   	$(document).ready(function() {
		// console.log($patient);
		// 	$('#form').find('#prueba').val({{$patient->name}})
    //     } );
    </script>
@endpush