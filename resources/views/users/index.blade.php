@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>
    Usuarios - <small>Listado de usuarios</small>
    </h1>
	<!--
		Migas de pan con icono
	 -->
    <ol class="breadcrumb">
        <li class="active"><i class="fa  fa-users"></i>  Usuarios</li>
    </ol>
	<style type="text/css">

</style>
@stop

@section('content')
@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

		<!--Comienzo de la caja donde se mostrará el datatable-->
	<div class="box">
		<!-- Encabezado de la caja -->
        <div class="box-header with-border">
            <h3 class="box-title">Listado de usuarios</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
       	</div>
        <div class="box-body">
            <!-- Cuerpo de la caja-->

			<div class="row">
				<!-- Botón que invoca el Modal #add_new_fee_modal para agregar registros -->
				<div class="col-xs-12">
						<button style="margin-bottom:10px;" type="button" data-toggle="modal" data-target="#add_new_user_modal" class="btn btn-success pull-right">
						<i class="fa fa-plus"></i> Nuevo Registro</button>
					<br/>
				</div>
			</div>

            <!-- DataTable -->
			<div class="row">
                <div class="col-md-12">
                   <table id="tbl-users" class="display responsive no-wrap" width="100%" >
                        <thead>
                            <tr >
                                <th class="text-center">No.</th>
                                <th data-priority="1" class="text-center">Nombre</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Rol</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Permiso</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
			        </table>
                    <!-- fin del DataTable-->
                </div>
			</div>
        </div>
        <!-- Fin de la caja -->
        <div class="box-footer">
            <!-- Comiezo del footer -->
        </div>
        <!-- fin del footer de la caja-->
</div>
	<!-- Modal - Agregar nuevo registro -->

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
	                    	<input type="text" name="password" id="password" placeholder="Contraseña" class="form-control"/>
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
						<div class="input-group">
							Estado<br/>
							<center>Activo:  <input type="radio" id="status" name="status"/></center>
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
							<!-- <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
	                    	<input type="text" name="password" id="update_password" placeholder="Contraseña" class="form-control"/>
						</div>
							<br/> -->
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="role_id" id="update_role_id" placeholder="Rol"  class="form-control"></select>
	                	</div>
							<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="permission_id" id="update_permission_id" placeholder="Permiso"  class="form-control"></select>
	                	</div>
						<!-- <div class="input-group">
							Estado<br/>
							<center>Activo:  <input type="radio" id="update_status" name="status"/></center>
						</div>
						<br/> -->
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

	<!-- Modal - Actualizar estado -->

	<div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
	            </div>
					<div class="modal-body">
	 				<form  action="{{ URL::to('status')}}" method="POST" id="frm-update_status">
					<input type="hidden" name="_method" value="PUT">
    				<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list"></i></span>
							<select name="status" id="update_status" placeholder="Estado"  class="form-control"></select>
	                	</div>
						<input type="hidden" name="id" id="update_userstatus_id"/>

						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<input type="submit" class="btn btn-success" value="Actualizar" />
					</div>
				</form>
				</div>
	        </div>
	    </div>
	</div>
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
			check();

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
						{"data":	"status",
							"render": function (data, type, row) {
								if( row.status == '1' ){
										return 'Activo';
								}
								else{
									return 'Inactivo';
								}
							},
							 "rowCallback": function( row, data ) {
								if (row.status == "1" ) {
								$('td:eq(4)', row).html( '<b>A</b>' );
								}
							}
						},

						{"data":	"permissions.0.description"},
						{"defaultContent":
							"<div class='btn-group btn-group-xs' > " +
							// "<button type='button' id='show' class='show btn btn-info' title='Mostrar' data-id='id'><i class='fa fa-eye'></i></button>"+
							"<button type='button' id='edit' class='edit btn btn-warning' title='Modificar' data-id='id'><i class='fa fa-pencil-square-o'></i></button>"+
							"<button type='button' id='del' class='delete btn btn-danger' title='Permisos'><i class='fa fa-cogs'></i></button>"+
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
						toastr["success"]("Usuario creado exitosamente!", "Guardado")
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
// Función para poder seleccionar y deseleccionar el botón radio
function check(){
	// Necesitamos también enlazar click handler
	// como el botón FF establece el botón después de la eliminación, pero antes de hacer clic
	$('input:radio').bind('click mousedown', (function() {
		// Capturar el estado del botón de radio dentro de su alcance del controlador,
		// por lo que no usamos ninguna vars global y cada botón de radio mantiene su propio estado.
		// Esto es necesario para desmarcarlos más tarde.
		// Necesitamos almacenar el estado por separado cuando se verifique el estado de las actualizaciones del navegador antes de hacer clic en el controlador,
		// entonces el botón de radio siempre estará marcado.
		var isChecked;
		return function(event) {
			if(event.type == 'click') {
				if(isChecked) {
					// Desmarcar y actualizar el estado
					isChecked = this.checked = false;
				}else {
						//Estado de actualización
						// El navegador comprobará el botón por sí mismo
						isChecked = true;
				}
			}
			else {
				// Obtener el estado correcto antes de que el navegador lo configure
				// Necesitamos usar el evento onmousedown aquí, ya que es el único evento compatible con varios navegadores para botones de radio
				isChecked = this.checked;
			}
	}})());
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
			console.log(data);
			// var rol=data.roles;
			$('#frm-update_user').find('#update_name').val(data.name)
			$('#frm-update_user').find('#update_email').val(data.email)
			// $('#frm-update_user').find('#update_password').val(data.password)
			$('#frm-update_user').find('#update_role_id').val(data.roles[0].id)
			$('#frm-update_user').find('#update_permission_id').val(data.permissions[0].id)
			$('#frm-update_user').find('#update_user_id').val(data.id)
			$('#update_user_modal').modal('show');
		});
	});
	 //Esta función se utiliza para cargar los datos del dropdown list de roles de usuario
			function getRolesEdit(vid){
				$('#update_role_id').empty();
				$.get('get-roles', function(data){
					$.each(data,	function(i, value){
						//console.info(value);
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
						//console.info(value);
						if(value.id === vid ){
							$('#update_permission_id').append($('<option selected >', {value: value.id, text: `${value.name}`}));
						}
						$('#update_permission_id').append($('<option >', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			//-------------Actualizar usuarios-------------

				$('#frm-update_user').on('submit', function(e){
				e.preventDefault();
				var data 	= $('#frm-update_user').serializeArray();
				var id 		= $('#update_user_id').val();
				console.log(data);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type 	: 'post',
					url 	: 'users/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						/**Se actualiza el DataTable */
						var $t = $('#tbl-users').DataTable();
						$t.ajax.reload();
						$('#update_user_modal').modal('hide');
					}
					});
				});


		//-------------Editar estatus-------------
	$('body').delegate('#tbl-users #del', 'click', function(e){
		e.preventDefault();
		$('#update_status').empty();
			var $tr = $(this).closest('li').length ?
					$(this).closest('li'):
					$(this).closest('tr');
    				var rowData = $('#tbl-users').DataTable().row($tr).data();
					var user = rowData.id;
					var status = rowData.status;
		//$.get('users/' + vid + '/edit', {id:vid}, function(data){
			//console.log(data);
			// var rol=data.roles;
			if(status == 1 ){
				$('#update_status').append($('<option>', {value: 1, text: 'Activo'}));
				$('#update_status').append($('<option>', {value: 0, text: 'Inactivo'}));
			} else{
				$('#update_status').append($('<option>', {value: 0, text: 'Inactivo'}));
				$('#update_status').append($('<option>', {value: 1, text: 'Activo'}));
			}
			//$('#frm-update_status').find('#update_status').val(status)
			$('#frm-update_status').find('#update_userstatus_id').val(user)
			$('#update_status_modal').modal('show');
		//});
	});

		//-------------Actualizar status-------------

				$('#frm-update_status').on('submit', function(e){
				e.preventDefault();
				var data 	= $('#frm-update_status').serializeArray();
				var id 		= $('#update_userstatus_id').val();
				console.log(data);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type 	: 'post',
					url 	: 'status/' + id,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						/**Se actualiza el DataTable */
						var $t = $('#tbl-users').DataTable();
						$t.ajax.reload();
						$('#update_status_modal').modal('hide');
					}
					});
				});


</script>
@endpush
