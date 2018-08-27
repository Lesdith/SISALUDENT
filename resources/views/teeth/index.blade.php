@extends('adminlte::page')
@extends('teeth.create')
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

			<table class="table table-stripped table-bordered table-responsive">
				<thead>
					<tr >
						<th class="text-center">No.</th>
						<th class="text-center">Name</th>
						<th class="text-center">Tipo</th>
						<th class="text-center">Etapa</th>
						<th class="text-center">Posición</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				    <tbody id="tbl-teeth">
				</tbody>
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

	                	<div class="form-group">
	                    	<label for="name">Nombre</label>
	                    	<input name="name" type="text" id="name" placeholder="Nombre" class="form-control"/>
	                	</div>


						<div class="form-group">
	                    	<label for="tipo_diente">Tipo</label>
	                    <select name="tipo_diente" id="tipo_diente" class="formcontrol"></select>
	                	</div>

							<div class="form-group">
	                    	<label for="name">Etapa</label>
							<select name="etapa_diente" id="etapa_diente" class="formcontrol"></select>
	                	</div>

							<div class="form-group">
	                    	<label for="name">Posicion</label>
							<select name="posicion_diente" id="posicion_diente" class="formcontrol"></select>
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



@stop
<!-- /Content Section -->

@section('js')
	<script>

      	$(document).ready(function() {
        getTeeth();
        getToothPosition();
        getToothStage();
        getToothType();
        } );

        //console.log({{url('get-teeth')}});
        function getTeeth(){
            $("#tbl-teeth").empty();
            $.get("{{url('get-teeth')}}", function(data){
                console.info(data);
                $.each(data,	function(i, value){
                    var fila = $('<tr />');
                    fila.append($('<td />', {
                        text : value.id
                    })).append($('<td />', {
                        text : value.name
                    })).append($('<td />', {
                        text : value.tooth_type_id
                    })).append($('<td />', {
                        text : value.tooth_stage_id
                    })).append($('<td />', {
                        text : value.tooth_position_id
                    })).append($('<td />', {
                        html : '<a class="btn btn-sm btn-warning" href="" id="edit" data-id=' + value.id + ' >' +
                                '<i class="fa fa-edit"></i> Editar</a>' +
                                ' <a  class="btn btn-sm btn-danger" href="" id="del" data-id=' + value.id + ' >' +
                                '<i class="fa fa-trash"></i> Eliminar</a>'
                    }).css('width','172px'));
                    $("#tbl-teeth").append(fila);
                });
            });
        }

//para cargar la lista de posiciones de diente
			function getToothPosition(){
			$.get('get-tooth_positions', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#posicion_diente').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			  //para cargar la lista de tipos de dientes
			function getToothType(){
			$.get('get-tooth_types', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#tipo_diente').append($('<option>', {value: value.id, text: `${value.name}`}));
					});
				});
			}

			  //para cargar la lista de las etapas de diente
			function getToothStage(){
			$.get('get-tooth_stages', function(data){
					$.each(data,	function(i, value){
						//posiciones.append($('<option value="' + value.id + '">').text = value.name;
					$('#etapa_diente').append($('<option>', {value: value.id, text: `${value.name}`}));
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
				$.ajax({
					type 	: post,
					url 	: url,
					data 	: data,
					dataType: 'json',
					success:function(data)
					{
						$('#add_new_tooth_modal').modal('hide');
						getTeeth();
						$.toast({
							heading: 'Information',
							text: '¡Diente creado exitosamente!',
							icon: 'info',
							position: 'top-right',
							loader: true,        // Change it to false to disable loader
							loaderBg: '#9EC600'  // To change the background
						});
					}
				});
			});


    </script>
@endsection