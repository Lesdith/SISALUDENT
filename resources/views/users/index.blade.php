@extends('adminlte::page')
@section('title', 'SISALUDENT')

@section('content_header')
<h3>Usuarios</h3>
@stop

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif



@section('content')
	<button data-toggle="modal" data-target="#add_new_user_modal" class="btn btn-success pull-right" style="margin-bottom:10px;">
		<i class="fa fa-plus"></i> Nuevo usuario</button>

			<table id="tbl-users" style="width:100%" data-plugin="dataTable" class="table table-stripped  table-bordered table-responsive">
				<thead>
					<tr >
						<th class="text-center">No.</th>
						<th data-priority="1" class="text-center">Nombre</th>
						<th class="text-center">Correo</th>
						<th class="text-center">Rol</th>
						<th class="text-center">Permiso</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
			</table>
	<div class="text-right"></div>

	<!-- Modal - Agregar nuevo registro -->

	<div class="modal fade" id="add_new_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
	                	<h4 class="modal-title" id="myModalLabel">Agregar registro</h4>

	            </div>
	            <div class="modal-body">
	 				<form  action="{{ URL::to('users')}}" method="POST" id="frm-user" >
						{{ csrf_field() }}

	                	<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	                    	<input name="name" type="text" id="name" placeholder="Nombre completo" class="form-control"/>
	                	</div>
							<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
	                    	<input type="email" name="email" id="email" placeholder="Correo electrónico" class="form-control"/>
						</div>
							<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="role_id" id="role_id" placeholder="Rol"  class="form-control"></select>
	                	</div>
							<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="permission_id" id="permission_id" placeholder="Permiso"  class="form-control"></select>
	                	</div>
							<br/>
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

	<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
	            </div>
					<div class="modal-body">
	 				<form  action="{{ URL::to('users')}}" method="POST" id="frm-update_user">
					<input type="hidden" name="_method" value="PUT">
    				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                	<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	                    	<input name="name" type="text" id="update_name" placeholder="Nombre completo" class="form-control"/>
	                	</div>
							<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
	                    	<input type="email" name="email" id="update_email" placeholder="Correo electrónico" class="form-control"/>
						</div>
							<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="role_id" id="update_role_id" placeholder="Rol"  class="form-control"></select>
	                	</div>
							<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="permission_id" id="update_permission_id" placeholder="Permiso"  class="form-control"></select>
	                	</div>
								<input type="hidden" name="id" id="update_user_id"/>

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
			dataTableUsers();
			getRoles();
			getPermissions();
			getRolesEdit();
			getPermissionsEdit();
        });


		function dataTableUsers()
			{
				var t = $('#tbl-users').DataTable({
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
						"dataSrc":	'user',
					},

					"columns" : [
						{"data":	"id"},
						{"data":	"name"},
						{"data":	"email"},
						{"data":	"roles.0.name"},
						{"data":	"permissions.0.description"},
						{"defaultContent":

							"<div class='btn-group btn-group-xs' > " +
							"<button type='button' id='show' class='show btn btn-info' title='Mostrar' data-id='id'><i class='fa fa-eye'></i></button>"+
							"<button type='button' id='edit' class='edit btn btn-warning' title='Modificar' data-id='id'><i class='fa fa-pencil-square-o'></i></button>"+
							"<button type='button' id='del' class='delete btn btn-danger' title='Eliminar'><i class='fa fa-trash-o'></i></button>"+
							"</div>"

						}

					]
				});
					t.on( 'order.t search.t', function () {
						t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
							cell.innerHTML = i+1;
						});
					}).draw();
			}



		//-----------Crear Usuario--------

			$('#frm-user').on('submit', function(e){
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
						document.getElementById("frm-user").reset();
						var t = $('#tbl-users').DataTable();
						t.ajax.reload()
						$('#add_new_user_modal').modal('hide');
						//getTeeth();
						toastr["success"]("¡Diente creado exitosamente!", "Guardado")
					}
				});
			});


				//para cargar la lista de roles
			function getRoles(){
			$.get('get-roles', function(data){
					$('#role_id').append($('<option>', {value: "", text: 'Seleccionar tipo'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#role_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//para cargar la lista de permisos
			function getPermissions(){
			$.get('get-permissions', function(data){
					$('#permission_id').append($('<option>', {value: "", text: 'Seleccionar etapa'}));
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#permission_id').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}



				// Editar usuario
	$('body').delegate('#tbl-users #edit', 'click', function(e){
		e.preventDefault();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    				var rowData = $('#tbl-users').DataTable().row($tr).data();
					var vid = rowData.id;
		$.get('users/' + vid + '/edit', {id:vid}, function(data){
			var rol=data.roles;
			console.log([[0,0]]);
			$('#frm-update_user').find('#update_name').val(data.name)
			$('#frm-update_user').find('#update_email').val(data.email)
			$('#frm-update_user').find('#update_role_id').val(data.roles)
			$('#frm-update_user').find('#update_permission_id').val(data.permission_id)
			$('#frm-update_user').find('#update_user_id').val(data.id)
			$('#update_user_modal').modal('show');
		});
	});

	 //Esta función se utiliza para cargar los datos del dropdown list de roles de usuario
			function getRolesEdit(vid){
				$('#update_role_id').empty();
				$.get('get-roles', function(data){
					$.each(data,	function(i, value){
						console.info(value);
						if(value.id === vid ){
							$('#update_role_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_role_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

		//Esta función se utiliza para cargar los datos del dropdown list de permisos de usuario
			function getPermissionsEdit(vid){
				$('#update_permission_id').empty();
				$.get('get-permissions', function(data){
					$.each(data,	function(i, value){
						console.info(value);
						if(value.id === vid ){
							$('#update_permission_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_permission_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

		//-------------Actualizar Usuario-------------

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


</script>
@endpush