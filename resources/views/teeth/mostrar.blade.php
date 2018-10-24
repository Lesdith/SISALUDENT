@extends('adminlte::page')
@extends('teeth.mostrar')
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

<div class="container">
    					<form  action="" method="POST" id="frm-show">
					{{ csrf_field() }}
	                	<div class="form-group">
	                    	<label for="name">Nombre</label>
	                    	<input name="name" type="text" id="show_name" readonly="readonly" style="border: 0;" />
	                	</div>

						<div class="form-group">
	                    	<label for="tooth_type_id">Tipo</label>
	                    <input name="tooth_type_id" type="text" id="show_tooth_type"   style="border: 0;"/>
	                	</div>

							<div class="form-group">
	                    	<label for="tooth_stage_id">Etapa</label>
							<input name="tooth_stage_id" id="show_tooth_stage" class="form-control" style="border: 0;"/>
	                	</div>

							<div class="form-group">
	                    	<label for="tooth_position_id">Posición</label>
							<input name="tooth_position_id" id="show_tooth_position" class="form-control" style="border: 0;"/>
	                	</div>

							<input type="hidden" name="id" id="show_tooth_id">
					</div>
				</form>

</div>

@stop

@push('js')
	<script>
    </script>
@endpush