@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
    <h3>Presupuesto de plan de tratamiento</h3>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
    @endif

@section('content')

    <div class="container">
        <form id="nuevo_presupuesto">
             <h5 style="color:#ff6347">Presupuesto</h5>
                    <hr />
                    <div class="form-horizontal">
                        <input type="hidden" id="patient_id" />
                        <div class="form-group">
                            <label class="control-label col-md-2">
                                Paciente
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="names" name="names" placeholder="Nombre de paciente" class="form-control" />
                            </div>
                            <label class="control-label col-md-2">
                                Fecha de emisión
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="date" name="date" placeholder="Fecha de emisión" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <h5 style="margin-top:10px;color:#ff6347">Detalles</h5>
                    <hr />
                    <div class="form-horizontal">
                        <input type="hidden" id="OrderId" />
                        <div class="form-group">
                            <label class="control-label col-md-2">
                               Diente
                            </label>
                            <div class="col-md-4">
                                <select type="text" id="tooth_id" name="tooth_id" class="form-control" >
                                </select>
                            </div>
                            <label class="control-label col-md-2">
                                Diagnostico
                            </label>
                            <div class="col-md-4">
                                <select type="text" id="diagnosis_id" name="diagnosis_id"  class="form-control" ></select>
                            </div>
                            <label class="control-label col-md-2">
                                Tratamiento
                            </label>
                            <div class="col-md-4">
                                <select type="text" id="tooth_treatment_id" name="tooth_treatment_id" class="form-control" ></select>
                            </div>
                            <label class="control-label col-md-2">
                                Precio
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="cost" name="cost"  class="form-control" />
                            </div>
                             <label class="control-label col-md-2">
                                Descripción
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="description" name="description" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-lg-offset-4">
                                <a id="addToList" class="btn btn-primary">Agregar</a>
                            </div>
                        </div>

                        <table id="detalles" class="table">
                            <thead>
                                <tr>
                                    <th style="width:30%">Diente</th>
                                    <th style="width:20%">Diagnóstico</th>
                                    <th style="width:15%">Tratamiento</th>
                                    <th style="width:25%">Precio</th>
                                    <th style="width:25%">Descripción</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button id="saveOrder" type="submit" class="btn btn-danger">Guardar</button>
                </div>
            </form>
    </div>

@stop

@push('js')
  <script>

      $(document).ready(function() {
            Today();
        });

        function Today(){
            var fullDate = new Date();console.log(fullDate);
            var twoDigitMonth = (fullDate.getMonth()+1)+"";if(twoDigitMonth.length==1)	twoDigitMonth="0" +twoDigitMonth;
            var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" +twoDigitDate;
            var currentDate = twoDigitDate + "/" + twoDigitMonth + "/" + fullDate.getFullYear();console.log(currentDate);
            $('#date').val(currentDate);
        }
  </script>
@endpush