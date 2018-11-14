
@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif