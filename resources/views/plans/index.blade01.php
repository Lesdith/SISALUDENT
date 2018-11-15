@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
    <h3>Plan de tratamiento</h3>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
    @endif

@section('content')

    <div class="container">
        <form id="nuevo_presupuesto">
            {{ csrf_field() }}
             <h5 style="color:#ff6347">Presupuesto</h5>
                    <hr />
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-md-2">
                                Paciente
                            </label>
                            <div class="col-md-4">
                             <input type="text" name="patient_id" value="{{$patient->id}}" id="patient_id" />
                                <input type="text" id="names" name="names" placeholder="Nombre de paciente" value="{{$patient->names}} {{$patient->surnames}}" class="form-control" />
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
                                <select  id="tooth_id" name="tooth_id" class="form-control" >
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
                            <label class="control-label col-md-2">
                                Subtotal
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="subtotal" name="subtotal" class="form-control" value="0" readonly="readonly"/>
                            </div>
                             <label class="control-label col-md-2">
                                Descuento
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="discount" name="discount" class="form-control" value="0" />
                            </div>
                             <label class="control-label col-md-2">
                                Total
                            </label>
                            <div class="col-md-4">
                                <input type="text" id="total" name="total" class="form-control" value="0" readonly="readonly"/>
                            </div>
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
            getDiente();
            getDiagnostico();
            getTratamiento();
            //calcularDescuento();
            $("#discount").keyup(function(){
                    sumaTotal();
                });
        });

        function Today(){
            var fullDate = new Date();console.log(fullDate);
            var twoDigitMonth = (fullDate.getMonth()+1)+"";if(twoDigitMonth.length==1)	twoDigitMonth="0" +twoDigitMonth;
            var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" +twoDigitDate;
            var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate; console.log(currentDate);
            $('#date').val(currentDate);
        }


        //Se llena la tabla con cada uno de los tratamientos.
        $("#addToList").click(function (e) {
            e.preventDefault();

            if ($.trim($("#tooth_id").val()) == "" || $.trim($("#diagnosis_id").val()) == "" || $.trim($("#cost").val()) == "" || $.trim($("#description").val()) == "") return;

            var tooth_id = $("#tooth_id").val(),
                diagnosis_id = $("#diagnosis_id").val(),
                tooth_treatment_id = $("#tooth_treatment_id").val(),
                cost = $("#cost").val(),
                description = $('#description').val(),
                detailsTableBody = $("#detalles tbody");

            var treatment = '<tr><td>' + tooth_id + '</td><td>' + diagnosis_id + '</td><td>' + tooth_treatment_id + '</td><td>' + cost + '</td><td>' + description + '</td><td><a data-itemId="0" href="#" class="deleteItem">Remove</a></td></tr>';
            detailsTableBody.append(treatment);
            sumarDetalles()
            sumaTotal()
            clearItem();
        });
        //permite eliminar de la tabla temporal registro por registro
        $(document).on('click', 'a.deleteItem', function (e) {
            e.preventDefault();
            var $self = $(this);
            if ($(this).attr('data-itemId') == "0") {
                $(this).parents('tr').css("background-color", "#ff6347").fadeOut(800, function () {

                    var costoItem = $(this).find('td:eq(3)').html();
                    console.log(costoItem)
                    var subTotalDelete = $('#subtotal').val();
                    console.log(subTotalDelete)
                    var Recalcular = parseFloat(subTotalDelete)-parseFloat(costoItem);
                    console.log(Recalcular)
                    $('#subtotal').val(Recalcular);
                    sumaTotal();
                    $(this).remove();
                });
            }
        });

        //After Add A New Order In The List, Clear Clean The Form For Add More Order.
        function clearItem() {
            getDiente();
            getDiagnostico();
            getTratamiento();
            $("#cost").val('');
            $("#description").val('');
        }

        $.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});

        $.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});

        $('#nuevo_presupuesto').on('submit', function(e){
            e.preventDefault();
				var orderArr = [];
				$.each($('#detalles tbody tr'), function(){
					orderArr.push({
						tooth_id: $(this).find('td:eq(0)').html(),
						diagnosis_id: $(this).find('td:eq(1)').html(),
						tooth_treatment_id: $(this).find('td:eq(2)').html(),
						cost: $(this).find('td:eq(3)').html(),
						description: $(this).find('td:eq(4)').html()
                	});
				});

                var datos = $('#nuevo_presupuesto').serializeArray();
                datos.push({orderArr});

                //var hola= JSON.stringify(datos);

				// var datos = JSON.stringify({
				// 	patient_id: $("#patient_id").val(),
				// 	date: $("#date").val(),
				// 	subtotal: $('#subtotal').val(),
				// 	discount: $('#discount').val(),
				// 	total: $('#total').val(),
                //     _token : "{{csrf_token()}}",
				// 	order: orderArr
				// });

				console.log(datos);
				$.ajax({
					dataType: 'JSON',
					type: 'POST',
					url: '{{ URL::to('plans')}}',
					data: datos,

					success: function (data) {
                        console.log(data),
                        toastr["success"]("¡Paciente creado exitosamente!", "Guardado")
						// alert(result);
						// location.reload();
					},
                     error: function (jqXHR, exception) {
                            var msg = '';
                            if (jqXHR.status === 0) {
                                msg = 'Not connect.\n Verify Network.';
                            } else if (jqXHR.status == 404) {
                                msg = 'Requested page not found. [404]';
                            } else if (jqXHR.status == 500) {
                                msg = 'Internal Server Error [500].';
                            } else if (exception === 'parsererror') {
                                msg = 'Requested JSON parse failed.';
                            } else if (exception === 'timeout') {
                                msg = 'Time out error.';
                            } else if (exception === 'abort') {
                                msg = 'Ajax request aborted.';
                            } else {
                                msg = 'Uncaught Error.\n' + jqXHR.responseText;
                            }
                    alert(msg);
                        },

				});


			});


        // After Click Save Button Pass All Data View To Controller For Save Database
        // function saveOrder(data) {
        //        console.log(data);
        //     return $.ajax({
        //         dataType: 'json',
        //         type: 'POST',
        //         url: '{{ URL::to('plans')}}',
        //         data: data,
        //         success: function (data) {
        //             // alert(result);
        //             // location.reload();
        //         },
        //         error: function () {
        //             alert("Error!")
        //         }
        //     });
        // }
        // //Collect Multiple Order List For Pass To Controller
        // $("#saveOrder").click(function (e) {
        //     e.preventDefault();

        //     var orderArr = [];
        //     orderArr.length = 0;

        //     $.each($("#detalles tbody tr"), function () {
        //         orderArr.push({
        //             tooth_id: $(this).find('td:eq(0)').html(),
        //             diagnosis_id: $(this).find('td:eq(1)').html(),
        //             tooth_treatment_id: $(this).find('td:eq(2)').html(),
        //             cost: $(this).find('td:eq(3)').html(),
        //             description: $(this).find('td:eq(4)').html()
        //         });
        //     });


        //     var data = JSON.stringify({
        //         patient_id: $("#patient_id").val(),
        //         date: $("#date").val(),
        //         subtotal: $('#subtotal').val(),
        //         discount: $('#discount').val(),
        //         total: $('#total').val(),
        //         order: orderArr
        //     });

        //     // $.when(saveOrder(data)).then(function (response) {
        //     //     console.log(response);
        //     // }).fail(function (err) {
        //     //     console.log(err);
        //     // });
        // });


	//para cargar la lista de
			function getDiente(){
			$('#tooth_id').empty();
			$.get('../get-diente', function(data){
					$('#tooth_id').append($('<option>', {value: "", text: 'Seleccionar diente'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_id').append($('<option>', {value: value.id, text: `${value.name +" "+value.tooth_type.name +" " +value.tooth_stage.name+ " "+ value.tooth_position.name}`}));
					});
				});
			}

            function getDiagnostico(){
			$('#diagnosis_id').empty();
			$.get('../get-diagnostico', function(data){
					$('#diagnosis_id').append($('<option>', {value: "", text: 'Seleccionar diagnostico'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#diagnosis_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

            function getTratamiento(){
			$('#tooth_treatment_id').empty();
			$.get('../get-tratamiento', function(data){
					$('#tooth_treatment_id').append($('<option>', {value: "", text: 'Seleccionar tratamiento'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_treatment_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

            function sumarDetalles(){
                var numero2 = $('#cost').val();
                var numero1  = $('#subtotal').val();
                console.log(numero1);
                var subtotal= parseFloat(numero1)+parseFloat(numero2);
                $('#subtotal').val(subtotal);
            }

            function sumaTotal(){
                if($('#discount').val()== ""){
                    var subtotal = $('#subtotal').val();
                    var descuento = 0;
                    var total = parseFloat(subtotal)-parseFloat(descuento);
                    $('#total').val(total);
                }else{
                    var subtotal = $('#subtotal').val();
                    var descuento = $('#discount').val();
                    var total = parseFloat(subtotal)-parseFloat(descuento);
                    $('#total').val(total);
                }
            }
            function calcularDescuento(){

            }



  </script>
@endpush