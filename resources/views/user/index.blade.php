@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
<h3>Dientes</h3>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

@section('content')
	<button data-toggle="modal" data-target="#add_new_user_modal" class="btn btn-success pull-right" style="margin-bottom:10px;">
		<i class="fa fa-plus"></i> Nuevo Registro</button>

			<table id="tbl-teeth" style="width:100%" data-plugin="dataTable" class="table table-stripped  table-bordered table-responsive">
				<thead>
					<tr >
						<th class="text-center">No.</th>
						<th data-priority="1" class="text-center">Nombre</th>
						<th class="text-center">Correo</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
			</table>
	<div class="text-right"></div>
@stop
<!-- /Content Section -->

@push('js')
	<script>

      	$(document).ready(function() {
		dataTableTeeth();
        // getToothPosition();
        // getToothStage();
        // getToothType();
		// getToothPositionEdit();
        // getToothStageEdit();
		// getToothTypeEdit();
        } );


		function dataTableTeeth()
			{
				var dt = $('#tbl-teeth').DataTable({
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

					"language":{
                         "url": '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json',
                     },

					"ajax": {
						"url": 		'../get-users',
						"type":		'GET',
						"dataSrc":	'teeth',
					},

					"columns" : [
						{"data":	"id"},
						{"data":	"name"},
						{"data":	"email"},
						{"defaultContent":

							"<div class='btn-group btn-group-xs' > " +
							"<button type='button' id='show' class='show btn btn-info' title='Mostrar' data-id='id'><i class='fa fa-eye'></i></button>"+
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



			//para cargar la lista de posiciones de diente
			function getToothPosition(){
			$.get('get-tooth_positions', function(data){
					$('#tooth_position_id').append($('<option>', {value: "", text: 'Seleccionar posición'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_position_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//para cargar la lista de tipos de dientes
			function getToothType(){
			$.get('get-tooth_types', function(data){
					$('#tooth_type_id').append($('<option>', {value: "", text: 'Seleccionar tipo'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_type_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//para cargar la lista de las etapas de diente
			function getToothStage(){
			$.get('get-tooth_stages', function(data){
					$('#tooth_stage_id').append($('<option>', {value: "", text: 'Seleccionar etapa'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_stage_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}


	//-----------Crear Diente --------

			$('#frm-insert').on('submit', function(e){
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
						document.getElementById("frm-insert").reset();
						var t = $('#tbl-teeth').DataTable();
						t.ajax.reload()
						$('#add_new_tooth_modal').modal('hide');
						//getTeeth();
						toastr["success"]("¡Diente creado exitosamente!", "Guardado")
					}
				});
			});


		//Esta función se creó para validar los campos al crear un registro
		function validaCampos(){

		var nombre	 = $("#name").val();
		var tipo 	 = $("#tooth_type_id").val();
		var etapa 	 = $("#tooth_stage_id").val();
		var posicion = $("#tooth_position_id").val();
		//validamos campos
		if($.trim(nombre) == ""){
		toastr.error("No ha ingresado el nombre del diente","Aviso!");
			return false;
		}
		if($.trim(tipo) == ""){
		toastr.error("No ha seleccionado el tipo de Diente","Aviso!");
			return false;
		}
		if($.trim(etapa) == ""){
		toastr.error("No ha seleccionado la etapa del diente","Aviso!");
			return false;
		}
		if($.trim(posicion) == ""){
		toastr.error("No ha seleccionado la posición del diente","Aviso!");
			return false;
		}
	}

	//-------------Editar Diente-------------

	$('body').delegate('#tbl-teeth #edit', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');;
    				var rowData = $('#tbl-teeth').DataTable().row($tr).data();
   						//console.log(rowData);
					var vid = rowData.id;
		$.get('teeth/' + vid + '/edit', {id:vid}, function(data){
			$('#frm-update').find('#update_name').val(data.name)
			$('#frm-update').find('#update_tooth_type').val(data.tooth_type_id)
			$('#frm-update').find('#update_tooth_stage').val(data.tooth_stage_id)
			$('#frm-update').find('#update_tooth_position').val(data.tooth_position_id)
			$('#frm-update').find('#tooth_id').val(data.id)
			$('#update_tooth_modal').modal('show');
		});
	});

	        //Esta función se utiliza para cargar los datos del dropdown list de tipo de diente
			function getToothTypeEdit(vid){
				$('#update_tooth_type').empty();
				$.get('get-tooth_types', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_tooth_type').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_tooth_type').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
	        //Esta función se utiliza para cargar los datos del dropdown list de la etapa de diente
			function getToothStageEdit(vid){
				$('#update_tooth_stage').empty();
			    $.get('get-tooth_stages', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
						if(value.id === vid ){
							$('#update_tooth_stage').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_tooth_stage').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

	        //Esta función se utiliza para cargar los datos del dropdown list de la posición del diente
			function getToothPositionEdit(vid){
				$('#update_tooth_position').empty();
				$.get('get-tooth_positions', function(data){
					$.each(data,	function(i, value){
						console.info(value);
						if(value.id === vid ){
							$('#update_tooth_position').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_tooth_position').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
	//-------------Actualizar Diente-------------

	$('#frm-update').on('submit', function(e){
				e.preventDefault();
				var data 	= $('#frm-update').serializeArray();
				var id 		= $("#tooth_id").val();
				//console.log(data);
				//console.log(id);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url 	: 'teeth/' + id ,
					dataType: 'json',
					type 	: 'POST',
					data 	: data,
					success:function(data)
					{
						var $t = $('#tbl-teeth').DataTable();
						$t.ajax.reload();
					//console.log(data);
						$('#update_tooth_modal').modal('hide');

					}
					});
				});



	//-------------Eliminar Diente-------------

	/*se creo esta función para que al dar click al botón eliminar muestre uns alerta con
	 mensajes para que el usuario de click a la opción aceptar o cancelar */

$('body').delegate('#tbl-teeth #del', 'click', function(e){
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
			//console.log(result);
				if (result.value) {
					var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    				var rowData = $('#tbl-teeth').DataTable().row($tr).data();
   						//console.log(rowData)
					var vid = rowData.id;
					var v_token = "{{csrf_token()}}";
					var parametros = {_method: 'DELETE', _token: v_token};
					$.ajax({
						type  : "POST",
						url	  : "teeth/" + vid + "",
						data  : parametros,

						// Se elimina el Dato seleccionado
						success: function(data){
						$(vid).remove();

						//Se actualizan los datos en el DataTable
						var $t = $('#tbl-teeth').DataTable();
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

//--------- Se creo para poder mostrar el detalle de un registro

	$('body').delegate('#tbl-teeth #show', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');;
    				var rowData = $('#tbl-teeth').DataTable().row($tr).data();
   						//console.log(rowData);
					var vid = rowData.id;
					var vtype=rowData.tooth_type_id;
		$.get('teeth/' + vid , {id:vid}, function(data){
		//	console.log(data);
			$('#frm-show').find('#show_name').val(data.name)

			//se utilizo para mostrar en texto el valor de un select (tooth_types)
			$.get('get-tooth_types', function(data){
			$.each(data,	function(i, value){
				if(value.id === rowData.tooth_type_id ){
			//		console.log(value)
				$('#frm-show').find('#show_tooth_type').val(value.name)
					}
				});
			});

			//se utilizo para mostrar en texto el valor de un select (tooth_stages)
			$.get('get-tooth_stages', function(data){
			$.each(data,	function(i, value){
				if(value.id === rowData.tooth_stage_id ){
			$('#frm-show').find('#show_tooth_stage').val(value.name)
					}
				});
			});

			//se utilizo para mostrar en texto el valor de un select (tooth_positions)
			$.get('get-tooth_positions', function(data){
			$.each(data,	function(i, value){
				if(value.id === rowData.tooth_stage_id ){
			$('#frm-show').find('#show_tooth_position').val(value.name)
					}
				});
			});
			$('#frm-show').find('#show_tooth_id').val(data.id)
			$('#show_tooth_modal').modal('show');
		});
	});

</script>
@endpush