@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
<h3>Etapas diente</h3>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

@section('content')
        	<button data-toggle="modal" data-target="#add_new_tooth_stage_modal" class="btn btn-success pull-right">
				<i class="fas fa-plus"></i> Nuevo Registro</button>

				<table class="table table-stripped table-bordered table-responsive">
					<thead>
						<tr >
							<th class="text-center">No.</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody id="tbl-tooth_stages">

					</tbody>

				</table>
				<div class="text-right"></div>


	<!-- /Content Section -->
<!-- Bootstrap Modals -->
	<!-- Modal - Agregar nuevo registro -->

	<div class="modal fade" id="add_new_tooth_stage_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
	                	<h4 class="modal-title" id="myModalLabel">Agregar registro</h4>

	            </div>
	            <div class="modal-body">
	 				<form  action="{{ URL::to('tooth_stages')}}" method="POST" id="frm-insert-tooth_stages">

	                	<div class="form-group">
	                    	<label for="name_tooth_stage">Etapa</label>
	                    	<input name="name" type="text" id="name_tooth_stage" placeholder="Etapa" class="form-control"/>
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

	<div class="modal fade" id="update_tooth_stage_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
	            </div>
					<div class="modal-body">
					<form  action="" method="POST" id="frm-update-tooth_stages">
					<div class="form-group">
						<label for="update_name_tooth_stages">Etapa</label>
						<input name="name" type="text" id="update_name_tooth_stage" placeholder="Etapa" class="form-control"/>
					</div>

					<input name="id" type="hidden" id="update_id_tooth_stage"  placeholder="" class=""/>

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


@section('js')
		<script>

			$(document).ready(function(){
				getToothStage();
			});

			function getToothStage(){
				$("#tbl-tooth_stage").empty();
				$.get('get-tooth_stages', function(data){
					$.each(data,	function(i, value){
						var fila = $('<tr />');
						fila.append($('<td />', {
							text : value.id
						})).append($('<td />', {
							text : value.name
						})).append($('<td />', {
							html : '<a class="btn btn-sm btn-warning" href="" id="edit" data-id=' + value.id + ' >' +
									'<i class="fas fa-edit"></i> Editar</a>' +
									' <a  class="btn btn-sm btn-danger" href="" id="del" data-id=' + value.id + ' onclick="">' +
									'<i class="fas fa-trash"></i> Eliminar</a>'
						}).css('width','172px'));
						$("#tbl-stages").append(fila);
					});
				});
			}
//-------------Eliminar Roles-------------

				/*se creo esta función para que al dar click al botón eliminar muestre un alert con
				  mensajes para que el usuario de click a la opción aceptar o cancelar */


				$('body').delegate('#tbl-tooth_stages #del', 'click', function(e){
					e.preventDefault();

					swal({
						title: "Eliminar",
						text: "¿Realmente desea eliminar el registro?",
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {
								var id = $(this).data('id');
									$.post('{{route("tooth_stages.destroy", ' + id + ')}}' , {id:id}, function(data){
										$(+id).remove();
									});
									getRols()
									swal("Poof! El registro se eliminó correctamente!", {
									icon: "success",
									});
								} else {
									swal("¡Operación cancelada por el usuario!");
								}
							});
						});

			//-------------Editar posicion diente-------------

			$('body').delegate('#tbl-tooth_stages #edit', 'click', function(e){
				e.preventDefault();
				var id = $(this).data('id');
				//console.log(id);
				$.get('tooth_stages/' + id + '/edit', {id:id}, function(data){
					$('#frm-update-tooth_stage').find('#update_name_tooth_stage').val(data.name)
					$('#frm-update-tooth_stage').find('#update_id_tooth_stage').val(data.id)
					$('#update_tooth_stage_modal').modal('show');
				});
			});

			//-------------Actualizar posicion diente-------------

				$('#frm-update-tooth_stage').on('submit', function(e){
				e.preventDefault();
				var data 	= $(this).serialize();
				var id 		= $('#update_id_tooth_stage').val();
				$.ajax({
					type 	: 'put',
					url 	: 'tooth_stage/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						$('#update_tooth_stage_modal').modal('hide');
						getToothStage()
					}
					});
				});


			//-----------Crear Roles--------
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#frm-insert-tooth_stage').on('submit', function(e){
				e.preventDefault();
				var data 	= $(this).serialize();
				var url 	= $(this).attr('action');
				var post 	= $(this).attr('method');
				$.ajax({
					type 	: post,
					url 	: url,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						$('#add_new_tooth_stage_modal').modal('hide');
						getRols()
						$.toast({
							heading: 'Information',
							text: '¡Registro creado exitosamente!',
							icon: 'info',
							position: 'top-right',
							loader: true,        // Change it to false to disable loader
							loaderBg: '#9EC600'  // To change the background
						});
					}
				});
			});

	</script>
@stop