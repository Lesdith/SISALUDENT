@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
    <h3>Plan de tratamiento</h3>
    <style>
        body {
            /* Set "my-sec-counter" to 0 */
            counter-reset: my-sec-counter;
        }
        u::before {
            /* Increment "my-sec-counter" by 1 */
            counter-increment: my-sec-counter;
            content: counter(my-sec-counter);
        }
        </style>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
    @endif

@section('content')

    <div class="container-fluid">
        <div class="well well-sm">
        <div class="row">
            <div class="col-xs-6">
                <input id="patient_id" class="form-control typeahead" type="hidden" placeholder="Paciente" value="{{$patient->id}}" />
                {{ csrf_field() }}
                <input id="name" class="form-control typeahead" type="text" placeholder="Paciente" value="{{$patient->names}} {{$patient->surnames}}" />
            </div>
            <div class="col-xs-2">
                <input class="form-control" type="text" id="date" placeholder="Fecha" readonly  />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <select id="tooth_id" name="tooth_id" class="form-control" type="text"></select>
        </div>
        <div class="col-xs-2">
            <select id="diagnosis_id" name="diagnosis" class="form-control" type="text"></select>
        </div>
        <div class="col-xs-2">
            <select id="tooth_treatment_id" name="tooth_treatment_id" class="form-control" type="text"></select>
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Q.</span>
                <input class="form-control" id="cost" type="text" placeholder="Precio"/>
            </div>
        </div>
        <div class="col-xs-3">
            <input id="description" name="description" class="form-control" type="textarea" placeholder="Ingresar descripción u observación" />
        </div>
        <div class="col-xs-1">
            <button onclick="addPlanToDetail();" class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr />

    <table class="table table-striped" id="detalles">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th style="width:10px;">#</th>
            <th>Diente</th>
            <th style="width:100px;">Diagnostico</th>
            <th style="width:100px;">Tratamiento</th>
            <th style="width:100px;">precio</th>
            <th style="width:100px;">Descripción</th>
        </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
        <tr>
            <td colspan="5" class="text-right"><b>Subtotal</b></td>
            <td class="text-right"><input class="form-control" id="subtotal" value="0" readonly="readonly" name="subtotal"/></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right"><b>Descuento</b></td>
            <td class="text-right"><input class="form-control" id="discount" name="discount" value="0" /></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right"><b>Total</b></td>
            <td class="text-right"><input class="form-control" id="total" value ="0" readonly="readonly"name="total"/></td>
        </tr>
        </tfoot>
    </table>

    <button onclick="savePlan();" class="btn btn-default btn-lg btn-block">
        Guardar
    </button>

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

            $.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});
        });

        function Today(){
            var fullDate = new Date();console.log(fullDate);
            var twoDigitMonth = (fullDate.getMonth()+1)+"";if(twoDigitMonth.length==1)	twoDigitMonth="0" +twoDigitMonth;
            var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" +twoDigitDate;
            var currentDate = 
            twoDigitDate + "-" + twoDigitMonth + "-" +fullDate.getFullYear() ; console.log(currentDate);
            $('#date').val(currentDate);
        }
        var detail = [];
        
        function addPlanToDetail() {
             if ($.trim($("#tooth_id").val()) == "" || $.trim($("#diagnosis_id").val()) == "" || $.trim($("#tooth_treatment_id").val()) == "" || $.trim($("#cost").val()) == "" || $.trim($("#description").val()) == "") {
                swal(
                'Error!',
                'Todos los campos son requeridos',
                'error'
                ) 
                return;
            }
            detail.push({
                tooth_id: $('#tooth_id').val(),
                diagnosis_id: $('#diagnosis_id').val(),
                tooth_treatment_id: $('#tooth_treatment_id').val(),
                cost: $('#cost').val(),
                description: $('#description').val(),
            });
            var tooth_id_name = $('#tooth_id').find('option:selected').text();
            var diagnosis_id_name = $('#diagnosis_id').find('option:selected').text();
            var tooth_treatment_id_name = $('#tooth_treatment_id').find('option:selected').text();
            var cost_name = $('#cost').val();
            var description_name = $('#description').val();
            detailsTableBody = $("#detalles tbody");
            var treatment = '<tr><td><a data-itemId="0" href="#" class="deleteItem btn btn-danger">X</a></td><td><u></u></td><td> ' + tooth_id_name + '</td><td>' + diagnosis_id_name + '</td><td>' + tooth_treatment_id_name + '</td><td> Q. ' + cost_name + '</td><td>' + description_name + '</td></tr>';
            detailsTableBody.append(treatment);
            sumarDetalles();
            sumaTotal();
            clearInputs();
        }

        function clearInputs() {
            getDiente();
            getDiagnostico();
            getTratamiento();
            $("#cost").val('');
            $("#description").val('');
        }

        // $(document).on('click', 'a.deleteItem', function (e) {
        //     e.preventDefault();
        //     var $self = $(this);
        //     if ($(this).attr('data-itemId') == "0") {
        //         $(this).parents('tr').css("background-color", "#ff6347").fadeOut(800, function () {
        //             var item = $(this).find('td:eq(1)').html();
                    
        //                 detail.splice(--item, 1);
        //                 console.log(detail)

        //             var costoItem = $(this).find('td:eq(5)').html();
        //             var subTotalDelete = $('#subtotal').val();
        //             var Recalcular = parseFloat(subTotalDelete)-parseFloat(costoItem);
        //             $('#subtotal').val(Recalcular);
        //             sumaTotal();
        //             $(this).remove();
        //         });
        //     }
        // });

        $(document).on('click', 'a.deleteItem', function(e){
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
			text: "¿Realmente desea eliminar el detalle?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Si, eliminar!',
			cancelButtonText: 'No, cancelar!',
			reverseButtons: true
			// Se recoge el valor si se dio Click al botón eliminar
		}).then((result) =>{
			//console.log(result);
				if (result.value) {
					var $self = $(this);
                    if ($(this).attr('data-itemId') == "0") {
                        $(this).parents('tr').css("background-color", "#ff6347").fadeOut(800, function () {
                            var item = $(this).find('td:eq(1)').html();
                                detail.splice(--item, 1);
                                console.log(detail)

                            var costoItem = $(this).find('td:eq(5)').html();
                            var subTotalDelete = $('#subtotal').val();
                            var Recalcular = parseFloat(subTotalDelete)-parseFloat(costoItem);
                            $('#subtotal').val(Recalcular);
                            sumaTotal();
                            $(this).remove();
                        });
                    }
                     
					//Se muestra un mensaje de que el dato se elimino correctamente
					swalWithBootstrapButtons({
						title:"Poof! ",
						text: "Detalle se eliminó correctamente!",
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

        // function deleteRow(r) {
            
        //    var i = r.parentNode.parentNode.rowIndex;
        //    console.log(i)
        //    var table = document.getElementById("#detalles");
        //   // if (table.rows.length > 0){
        //        table.deleteRow(i);
        //   // }
        //     // var item = e.item,
        //     //     index = detail.indexOf(item);

        //     // detail.splice(index, 1);
            
        // }


        // $.ajax({
		// 			dataType: 'JSON',
		// 			type: 'POST',
		// 			url: '{{ URL::to('plans')}}',
		// 			data: datos,

		// 			success: function (data) {
        //                 console.log(data),
        //                 toastr["success"]("¡Paciente creado exitosamente!", "Guardado")
		// 				// alert(result);
		// 				// location.reload();
		// 			},
        //              error: function (jqXHR, exception) {
        //                     var msg = '';
        //                     if (jqXHR.status === 0) {
        //                         msg = 'Not connect.\n Verify Network.';
        //                     } else if (jqXHR.status == 404) {
        //                         msg = 'Requested page not found. [404]';
        //                     } else if (jqXHR.status == 500) {
        //                         msg = 'Internal Server Error [500].';
        //                     } else if (exception === 'parsererror') {
        //                         msg = 'Requested JSON parse failed.';
        //                     } else if (exception === 'timeout') {
        //                         msg = 'Time out error.';
        //                     } else if (exception === 'abort') {
        //                         msg = 'Ajax request aborted.';
        //                     } else {
        //                         msg = 'Uncaught Error.\n' + jqXHR.responseText;
        //                     }
        //             alert(msg);
        //                 },

		// 		});


		


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

            function savePlan() {
            $.post( "../plans", {
                patient_id: $('#patient_id').val(),
                date: $('#date').val(),
                subtotal: $('#subtotal').val(),
                discount: $('#discount').val(),
                total: $('#total').val(),
                detail: detail
            }, function(r){
                if(r.response) {
                    console.log(r)
                    var id = r.response;
                   const swalWithBootstrapButtons = swal.mixin({
						confirmButtonClass: 'btn btn-success',
						cancelButtonClass: 'btn btn-danger',
						buttonsStyling: false,
					})
					//Muestra el mensaje de la alerta y activa el botón cancelar
					swalWithBootstrapButtons({
						title: 'Plan de Tratamiento Guardado Correctamente!',
						text: "¿Desea imprimir?",
						type: 'success',
						showCancelButton: true,
						confirmButtonText: 'Si, Imprimir!',
						cancelButtonText: 'No, cancelar!',
						reverseButtons: true
						// Se recoge el valor si se dio Click al botón eliminar
					}).then((result) =>{
						//console.log(result);
							if (result.value) {
								window.open( '../pdf/' + id );
                                window.location.href = '../patients/' + {{$patient->id}};
								
								//Se muestra un mensaje de que el dato se elimino correctamente
								swalWithBootstrapButtons({
									title:"Presupuesto! ",
									text: "Generando el preupuesto!",
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
                } else {
                    alert('Ocurrió un error');
                }
            }, 'json')
        }
        



  </script>
@endpush