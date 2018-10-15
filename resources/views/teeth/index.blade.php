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
	<button data-toggle="modal" data-target="#add_new_tooth_modal" class="btn btn-success pull-right">
		<i class="fa fa-plus"></i> Nuevo Registro</button>

			<table id="tbl-teeth" style="width:100%" data-plugin="dataTable" class="table table-stripped  table-bordered table-responsive">
				<thead>
					<tr >
						<th class="text-center">No.</th>
						<th data-priority="1" class="text-center">Nombre</th>
						<th class="text-center">Tipo</th>
						<th class="text-center">Etapa</th>
						<th class="text-center">Posición</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
			</table>
	<div class="text-right"></div>

<!-- Bootstrap Modals -->
	<!-- Modal - Agregar nuevo registro -->

	<div class="modal fade" id="add_new_tooth_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
	                	<h4 class="modal-title" id="myModalLabel">Agregar registro</h4>

	            </div>
	            <div class="modal-body">
	 				<form  action="{{ URL::to('teeth')}}" method="POST" id="frm-insert">
						{{ csrf_field() }}
	                	<div class="form-group">
	                    	<label for="name">Nombre</label>
	                    	<input name="name" type="text" id="name" placeholder="Nombre" class="form-control"/>
	                	</div>


						<div class="form-group">
	                    	<label for="tooth_type_id">Tipo</label>
	                    <select name="tooth_type_id" id="tooth_type_id" class="form-control"></select>
	                	</div>

							<div class="form-group">
	                    	<label for="tooth_stage_id">Etapa</label>
							<select name="tooth_stage_id" id="tooth_stage_id" class="form-control"></select>
	                	</div>

							<div class="form-group">
	                    	<label for="tooth_position_id">Posicion</label>
							<select name="tooth_position_id" id="tooth_position_id" class="form-control"></select>
	                	</div>

						<div class="modal-footer">
	                		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<input type="submit" class="btn btn-success" value="Guardar" />
						</div>
					</form>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- // Modal nuevo registro -->

	<!-- Modal - Actualizar registro -->

	<div class="modal fade" id="update_teeth_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
	            </div>
					<div class="modal-body">
					<form  action="" method="POST" id="frm-update">
					{{ csrf_field() }}
	                	<div class="form-group">
	                    	<label for="name">Nombre</label>
	                    	<input name="name" type="text" id="update_name" placeholder="Nombre" class="form-control"/>
	                	</div>


						<div class="form-group">
	                    	<label for="tooth_type_id">Tipo</label>
	                    <select name="update_tooth_type" id="update_tooth_type" class="form-control"></select>
	                	</div>

							<div class="form-group">
	                    	<label for="tooth_stage_id">Etapa</label>
							<select name="update_tooth_stage" id="update_tooth_stage" class="form-control"></select>
	                	</div>

							<div class="form-group">
	                    	<label for="tooth_position_id">Posicion</label>
							<select name="update_tooth_position" id="update_tooth_position" class="form-control"></select>
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
	<!-- // Modal actualizar registro -->

@stop
<!-- /Content Section -->

@push('js')
	<script>

      	$(document).ready(function() {
		dataTableTeeth();
        //getTeeth();
        getToothPosition();
        getToothStage();
        getToothType();
		// getToothPositionEdit();
		// getToothTypeEdit();
		// getToothStageEdit();
		// getTooth();
        } );


		function dataTableTeeth()
			{
				var dt = $('#tbl-teeth').DataTable({
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
                         "url":"//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                     },

					"ajax": {
						"url": 		'../get-teeth',
						"type":		'GET',
						"dataSrc":	'teeth',
					},

					"columns" : [
						{"data":	"id"},
						{"data":	"name"},

						// {
						// 	/**
						// 	 * * Permite combinar el nombre de la persona en una sola columna.
						// 	 *
						// 	 */
						// 	data: null,
						// 	render: function ( data, type, row )
						// 	{
						// 		/**
						// 		 ** data se carga con los campos donde se almacena el nombre.
						// 		 */
						// 		return data.first_name+'  '+data.second_name+'  '+data.first_surname+'  '+data.second_surname;
						// 	},
						// 	//editField: ['first_name', 'second_name', 'first_surname', 'second_surname']
						// },
						{"data":	"tooth_type.name"},
						{"data":	"tooth_stage.name"},
						{"data":	"tooth_position.name"},
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

// esta funcion llena el cuerpo de la tabla dientes (teeth)
        // //console.log({{url('get-teeth')}});
        // function getTeeth(){
        //     $("#tbl-teeth").empty();
        //     $.get("{{url('get-teeth')}}", function(data){
        //         console.info(data);
        //         $.each(data,	function(i, value){
        //             var fila = $('<tr />');
        //             fila.append($('<td />', {
        //                 text : value.id
        //             })).append($('<td />', {
        //                 text : value.name
        //             })).append($('<td />', {
        //                 text : value.tooth_type.name
        //             })).append($('<td />', {
        //                 text : value.tooth_stage.name
        //             })).append($('<td />', {
        //                 text : value.tooth_position.name
        //             })).append($('<td />', {
        //                 html : '<a class="btn btn-sm btn-warning" href="" id="edit" data-id=' + value.id + ' >' +
        //                         '<i class="fa fa-edit"></i> Editar</a>' +
        //                         ' <a  class="btn btn-sm btn-danger" href="" id="del" data-id=' + value.id + ' >' +
        //                         '<i class="fa fa-trash"></i> Eliminar</a>'
        //             }).css('width','172px'));
        //             $("#tbl-teeth").append(fila);
        //         });
        //     });
        // }

			//para cargar la lista de posiciones de diente
			function getToothPosition(){
			$.get('get-tooth_positions', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_position_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//para cargar la lista de tipos de dientes
			function getToothType(){
			$.get('get-tooth_types', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_type_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//para cargar la lista de las etapas de diente
			function getToothStage(){
			$.get('get-tooth_stages', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tooth_stage_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}


	//-----------Crear Diente --------

  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

			$('#frm-insert').on('submit', function(e){
				e.preventDefault();
				var data 	= $(this).serialize();
				var url 	= $(this).attr('action');
				var post 	= $(this).attr('method');
				console.info(data);
				$.ajax({
					type 	: post,
					url 	: url,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						var t = $('#tbl-teeth').DataTable();
						t.ajax.reload()
						$('#add_new_tooth_modal').modal('hide');
						//getTeeth();
						toastr["success"]("¡Diente creado exitosamente!", "Guardado")
						// $.toast({
						// 	heading: 'Success',
						// 	text: '¡Diente creado exitosamente!',
						// 	icon: 'success',
						// 	position: 'top-right',
						// 	loader: true,        // Change it to false to disable loader
						// 	loaderBg: '#9EC600'  // To change the background
						// });
					}
				});
			});

	//-------------Editar Diente-------------

	$('body').delegate('#tbl-teeth #edit', 'click', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		//let diente = getTooth(id);
		//console.log(diente);
		//getToothPositionEdit(diente.tooth_position_id);
		getToothPositionEdit(id.tooth_position_id);
		getToothStageEdit(id.tooth_stage_id);
		getToothTypeEdit(id.tooth_type_id);
		$.get('teeth/' + id + '/edit', {id:id}, function(data){
			$('#frm-update').find('#update_name').val(data.name)
			$('#update_teeth_modal').modal('show');
		});
	});


	        //para cargar los datos del dropdown list de tipo de diente
			function getToothTypeEdit(id){
				$('#update_tooth_type').empty();
				$.get('get-tooth_types', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
						console.info(value);
						if(value.id === id ){
							$('#update_tooth_type').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_tooth_type').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
	        //para cargar los datos del dropdown list de la etapa de diente
			function getToothStageEdit(id){
				$('#update_tooth_stage').empty();
			    $.get('get-tooth_stages', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
						console.info(value);
						if(value.id === id ){
							$('#update_tooth_stage').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_tooth_stage').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

	        //para cargar los datos del dropdown list de la posición del diente
			function getToothPositionEdit(id){
				$('#update_tooth_position').empty();
				$.get('get-tooth_positions', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
						console.info(value);
						if(value.id === id ){
							$('#update_tooth_position').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_tooth_position').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}
	//-------------Actualizar Diente-------------

	$('#frm-update').on('submit', function(e){
	e.preventDefault();
	var data 	= $(this).serialize();
	$.ajax({
		type 	: 'put',
		url 	: "teeth/" + data + "",
		data 	: data,
		dataType: 'json',
		success:function(data)
		{
			$('#update_teeth_modal').modal('hide');
			getTeeth();
		}
		});
	});
	//-------------Eliminar Diente-------------

// Se creo esta funcion para poder capturar el (id) del elemento que se quiere eliminar

  var obtener_id_eliminar = function(tbody, table) {
            $(tbody).on("click", "button.delete", function() {
                var data = table.row($(this).parents("tr")).data();
            });
        }

	/*se creo esta función para que al dar click al botón eliminar muestre un alert con
	 mensajes para que el usuario de click a la opción aceptar o cancelar */

$('body').delegate('#tbl-teeth #del', 'click', function(e){
		e.preventDefault();
		const swalWithBootstrapButtons = swal.mixin({
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
		})
		swalWithBootstrapButtons({
			title: 'Eliminar',
			text: "¿Realmente desea eliminar el registro?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Si, eliminar!',
			cancelButtonText: 'No, cancelar!',
			reverseButtons: true
		}).then((result) =>{
			console.log(result);
				if (result) {
					var $tr = $(this).closest('tr');
    				var rowData = $('#tbl-teeth').DataTable().row($tr).data();
   						 console.log(rowData)
					var vid = $(this).data('id');
					var v_token = "{{csrf_token()}}";
					var parametros = {_method: 'DELETE', _token: v_token};
					$.ajax({
						type  : "POST",
						url	  : "teeth/" + vid + "",
						data  : parametros,
						success: function(data){
						$(vid).remove();
						}
					});
					//dataTableTeeth();
					swalWithBootstrapButtons({
						title:"Poof! ",
						text: "Diente se eliminó correctamente!",
						icon: "success",
					});
				} else if(
					result.dismiss === swal.DismissReason.cancel){
					swalWithBootstrapButtons("¡Operación cancelada por el usuario!");
				}
			});
		});


			// swal({
			// 	title: "Eliminar",
			// 	text: "¿Realmente desea eliminar el registro?",
			// 	type: 'warning',
			// 	showCancelButton: true,
			// 	closeOnConfirm: false,
			// 	showLoaderOnConfirm: true,
			// 	confirmButtonText: 'Si, eliminar!',
			// 	cancelButtonText: 'No, cancelar!',
			// 	reverseButtons: true
			// 	})
			// 	.then((willDelete) => {
			// 	if (willDelete) {
			// 		var id = $(this).data('id');
			// 		$.post('{{url("teeth.destroy", ' + id + ')}}', {id:id}, function(data){
			// 			$(+id).remove();
			// 		});
			// 		getTeeth();
			// 		swal({
			// 			title:"Poof! ",
			// 			text: "Diente se eliminó correctamente!",
			// 			icon: "success",
			// 		});
			// 	} else if(
			// 		willDelete.dismiss === swal.DismissReason.cancel){
			// 		swal("¡Operación cancelada por el usuario!");
			// 	}
			// });

</script>
@endpush