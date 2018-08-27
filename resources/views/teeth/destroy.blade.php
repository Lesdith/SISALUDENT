@extends('adminlte::page')
@section('title', 'SISALUDENT')
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

	@section('script')
		<script type="text/javascript">

	//-------------Eliminar categorias-------------

				/*se creo esta funcion para que al dar click al boton elminiar muestre un alert con
				  mensajes para que el usuario de click a la opcion aceptar o cancelar */


				$('body').delegate('#tbl-teeth #del', 'click', function(e){
					e.preventDefault();
					//var resp = confirm("¿Desea eliminar el registro?");

					swal({
						title: "Eliminar",
						text: "¿Realmente desea eliminar el diente?",
						icon: "warning",
						buttons: true,
						dangerMode: true,
						})
						.then((willDelete) => {
						if (willDelete) {
							var id = $(this).data('id');
							$.post('{{route("teeth.destroy", ' + id + ')}}', {id:id}, function(data){
								$(+id).remove();
							});
							getCategories();
							swal("Poof! El diente se eliminó correctamente!", {
							icon: "success",
							});
						} else {
							swal("¡Operación cancelada por el usuario!");
						}
					});
                });
    </script>
@endsection