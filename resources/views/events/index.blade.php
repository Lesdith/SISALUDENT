@extends('adminlte::page')
@section('title', 'Citas')
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
@section('content')

<!-- Este container se utiliza para poder mostrar el calendario en la vista -->
<div class="container" style="background-color: #ffffff;">
<h2><u><b><center>CONTROL DE CITAS</center></b></u></h2>
  <div id="calendar"></div>
    </div>

<!-- ------Modal para crear una nueva cita------- -->
      <div class="modal" id="evento" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crear cita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class=""  method="POST" id="crear_evento">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="contact">Nombre:</label>
                      <input name="contact" type="text" id="contact" placeholder="Ingrese el nombre del paciente" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Teléfono:</label>
                    <input name="phone" type="text" id="phone" placeholder="Ingrese el teléfono" class="form-control"/>
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group input-append datetime">
                        <label for="start_date">Fecha y hora inicio:</label>
                          <!-- <div class="input-append datetime"> -->
                            <input  name="start_date" id="start_date" class="datetimepicker form-control "data-format="Y-M-D hh:mm:ss TT" type="text" />
                            <span class="add-on">
                              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                          <!-- </div> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group input-append datetime">
                        <label for="end_date">Fecha y hora fin:</label>
                          <!-- <div class="input-append datetime"> -->
                            <input  class="datetimepicker form-control" name="end_date" id="end_date" data-format="Y-M-D hh:mm:ss TT" type="text"/>
                            <span class="add-on">
                              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                          <!-- </div> -->
                    </div>
                  </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-success" value="Guardar" />
          </div>
          </form>
        </div>
    </div>
</div>

<!-- Final Modal crear cita -->

<!-- Inicio Modal para mostrar evento -->

    <div class="modal" id="show_cita_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>

              </button>
            </div>
            <div class="modal-body">
              <form class="" action="{{ URL::to('events')}}" method="POST" id="ver_evento">
							<input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="show_contact">Contacto:</label>
                      <input name="contact" type="text" id="show_contact"  class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="show_phone">Teléfono:</label>
                    <input name="phone" type="text" id="show_phone" class="form-control"/>
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group input-append datetime">
                        <label for="show_start_date">Fecha y hora inicio:</label>
                          <!-- <div class="input-append datetime"> -->
                            <input  name="start_date" id="show_start_date" class="datetimepicker form-control "data-format="Y-M-D hh:mm:ss TT" type="text" />
                            <span class="add-on">
                              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                          <!-- </div> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group input-append datetime">
                        <label for="show_end_date">Fecha y hora fin:</label>
                          <!-- <div class="input-append datetime"> -->
                            <input  class="datetimepicker form-control" name="end_date" id="show_end_date" data-format="Y-M-D hh:mm:ss TT" type="text"/>
                            <span class="add-on">
                              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                            <input name="id" type="hidden" id="show_id" class="form-control"/>
                          <!-- </div> -->
                    </div>
                  </div>
              </div>
              </form>
            </div>
          <div class="modal-footer">
          <button type="button" id="verCancel" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type='button' id='del' class='delete btn btn-danger' title='Eliminar'>
            <i class='fa fa-trash-o'>  Eliminar</i>
          </button>
            <button type='button' id='edit' class='edit btn btn-success' title='Actualizarr'>
            <i class='fa fa-trash-o'>  Actualizar</i>
          </button>
          </div>
        </div>
    </div>
</div>

<!-- Final Modal para mostrar evento -->
@stop
<!-- finaliza el content -->

<!-- inica el estilo para el calendario -->
@push('css')
<style>

 body {
    margin: 0;
    padding: 0;
    font-size: 14px;
  }

  #top,
  #calendar.fc-unthemed {
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 10px;
    color: #000;
  }

  #top .selector {
    display: inline-block;
    margin-right: 10px;
  }

  #top select {
    font: inherit; /* mock what Boostrap does, don't compete  */
  }

  .left { float: left }
  .right { float: right }
  .clear { clear: both }

  #calendar {
    max-width: 80%;
    margin: 0 auto;
    padding: 0 2%;
  }
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

</style>
@endpush
<!-- finaliza el estilo del calendario -->

<!-- inicia el scrip para la funcionalidad del calendario  -->
@push('js')
<script >
	$(document).ready(function() {

			validar();
      var validator;
      var validatorVer;
});


$("#cancelar").on("click",function(e){
     e.preventDefault();
	 validator.resetForm();
    $('#crear_evento').trigger("reset");
});

$("#verCancel").on("click",function(e){
     e.preventDefault();
	   validatorVer.resetForm();
    $('#ver_evento').trigger("reset");
});

    $(function(){

      "use strict";
      // inicializa el calendario
      $("#calendar").fullCalendar({
         height: 'get_calendar_height',
         handleWindowResize: 'true',
        //se crea el encabezado del calendario
        header  : {
        left    : 'prev,next today',
        center  : 'title',
        right   : 'month,agendaWeek,agendaDay,listDay'
      },
      //Se activan los temas
      theme: 'true',
      themeSystem: 'jquery-ui',
      //Se personaliza el texto de los botones
      buttonText: {
            today: 'Ahora',
            prev: 'Anterior',
            next: 'Siguiente'
        },

        // se muestran los eventos en el calendario
        eventSources: [
          '../get-events',
        ],
        hiddenDays: [ 0 ],
        minTime: '09:00:00',
        maxTime: '17:00:00',
        editable: true,
        droppable: true,
        eventLimit: true,
        selectable: true,

        //Para llamar al modal con los datos de la cita
        eventClick: function(calEvent, jsEvent, view) {
            var id = calEvent.id;
            console.log(id);
          $.get('get-event/'+ id, function(data){
            console.log(data);
            $.each(data,	function(i, value){
            $('#show_contact').val(value.contact)
            $('#show_phone').val(value.phone)
            $('#show_start_date').val(value.start_date)
            $('#show_end_date').val(value.end_date)
            $('#show_id').val(value.id)
            $('#show_cita_modal').modal('show');
				});
        });
          },

          //Activa el dia al que se le da click y abre el modal para crea una nueva cita
        dayClick: function(datetime, jsEvent, view, resourceObj) {
          $("#start_date").val(datetime.format());
          $("#evento").modal();
        },

    });

      $(".connectedSortable").sortable({
        placeholder:  "sort-highlight",
        connectWith:  ".connectedSortable",
        handle:       ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
      });
      $(".connectedSortable .box-header, connectedSortable, .nav-tabs-custom").css('cursor', 'move');

      $(".todo-list").sortable({
        placeholder:  "sort-highlight",
        handle:       ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
      });

      $('.textarea').wysihtml5();
      $(".daterange").daterangepicker({
        ranges: {
          'Today'       :  [moment(), moment()],
          'Yesterday'   :  [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' :  [moment().subtract(6, 'days'), moment()],
          'Last 30 Days':  [moment().subtract(29, 'days'), moment()],
          'This Month'  :  [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  :  [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,'month').endOf('month')]
        }
      });
      //Formatea la fecha y hora del inicio de la cita
        $("#start_date").datetimepicker({
          format    : 'Y-M-D hh:mm:ss'
        })
      //Formatea la fecha y hora del final de la cita
        $("#end_date").datetimepicker({
          format    : 'Y-M-D hh:mm:ss'
        })
    });

//Para crear una nueva cita
$('#crear_evento').on('submit', function(e){
				e.preventDefault();
				var data 	= $(this).serialize();
				var url 	= $(this).attr('action');
				var post 	= $(this).attr('method');

				//console.info(data);
				$.ajax({
					headers: {
                		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            		},
					type 	: post,
					url 	: url,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
            document.getElementById("crear_evento").reset();
             $('#evento').modal('hide');
              $('#calendar').fullCalendar('refetchEvents');
						//getTeeth();
            toastr["success"]("Cita creada exitosamente!", "Guardado")
            $("#calendar").fullCalendar('render');
          }
        });
      });



/* Esta función se creo para hacer validaciones mas especificas, como cantidad de caracteres, si solo permite números entre otros,
para hacer uso de ella es necesario descargar la librería jqueryvalidate.js  y la función debe ser llamada en el document ready*/

		function validar () {
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

		validator = $('#crear_evento').validate({
			 keyup: true,
				rules: {
					contact: {
						required: 		true,
						lettersonly: 	true,
						minlength: 		5,
						maxlength: 		50,
					},
				  phone: {
            required: 		true,
						phoneguion: 	true,
						minlength: 		8,
						maxlength: 		8,

					},
			  	start_date:{
						required: 	true,
						date: 			true,
					},
          end_date:{
						required: 	true,
						date: 			true,
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
					contact: {
						required: 		'Debe ingresar al menos un nombre y un apellido',
						lettersonly: 	'Los nombres solo pueden contener letras',
						minlength: 		'Un nombre válido tiene como mínimo 5 letras',
						maxlength: 		'Un nombre válido tiene como máximo 50 letras',
					},
					phone: {
            required: 		'Debe ingresar un  número telefónico',
						phoneguion:		    'Ingrese un número de teléfono válido',
						minlength: 		'El número de teléfono debe tener 8 dígitos',
						maxlength: 		'El número de teléfono debe tener 8 dígitos',
					},
					start_date: {
						required: 		'Debe ingresa fecha de inicio',
						minlength: 		'Debe ingresar una fecha válida',
					},
					end_date: {
						required: 		'Debe ingresa fecha de final',
						minlength: 		'Debe ingresar una fecha válida',
					}

				 },
			});

      validatorVer = $('#ver_evento').validate({
			 keyup: true,
				rules: {
					contact: {
						required: 		true,
						lettersonly: 	true,
						minlength: 		5,
						maxlength: 		50,
					},
				  phone: {
            required: 		true,
						phoneguion: 	true,
						minlength: 		8,
						maxlength: 		8,

					},
			  	start_date:{
						required: 	true,
						date: 			true,
					},
          end_date:{
						required: 	true,
						date: 			true,
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
					contact: {
						required: 		'Debe ingresar al menos un nombre y un apellido',
						lettersonly: 	'Los nombres solo pueden contener letras',
						minlength: 		'Un nombre válido tiene como mínimo 5 letras',
						maxlength: 		'Un nombre válido tiene como máximo 50 letras',
					},
					phone: {
						phoneguion:		'Ingrese un número de teléfono válido',
						minlength: 		'El número de teléfono debe tener 8 dígitos',
						maxlength: 		'El número de teléfono debe tener 8 dígitos',
            required: 		'Debe ingresar un  número telefónico',
					},
					start_date: {
						required: 		'Debe ingresa fecha de inicio',
						minlength: 		'Debe ingresar una fecha válida',
					},
					end_date: {
						required: 		'Debe ingresa fecha de final',
						minlength: 		'Debe ingresar una fecha válida',
					}

				 },
			});
  }


//Para eliminar cita seleccionada
      $('body').delegate('#show_cita_modal #del', 'click', function(e){
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
			text: "¿Realmente desea eliminar la cita?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Si, eliminar!',
			cancelButtonText: 'No, cancelar!',
			reverseButtons: true
			// Se recoge el valor si se dio Click al botón eliminar
		}).then((result) =>{
			//console.log(result);
				if (result.value) {

   				var id = $("#show_id").val();
           console.log(id);
					var v_token = "{{csrf_token()}}";
					var parametros = {_method: 'DELETE', _token: v_token};
					$.ajax({
						type  : "POST",
						url	  : "events/" + id + "",
						data  : parametros,

						// Se elimina el Dato seleccionado
						success: function(data){
						$(id).remove();
              $('#calendar').fullCalendar('refetchEvents');
						$("#calendar").fullCalendar('render');
						}
					});
           $('#show_cita_modal').modal('hide');
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
            $('#show_cita_modal').modal('hide');
				}
			});
		});

  //Para actualizar los datos de la cita seleccionada
	$('body').delegate('#show_cita_modal #edit', 'click', function(e){
		e.preventDefault();
				var data 	= $('#ver_evento').serializeArray();
				var id 		= $("#show_id").val();
				// console.log(data);
				console.log(id);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url 	: 'events/' + id ,
					dataType: 'json',
					type 	: 'POST',
					data 	: data,
					success:function(data)
					{
            $('#calendar').fullCalendar('refetchEvents');
						$("#calendar").fullCalendar('render');
						$('#show_cita_modal').modal('hide');
					}
					});
				});


</script>
@endpush
