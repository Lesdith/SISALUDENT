@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

@stop

@section('content')
   <!-- <div class="jumbotron"> -->
<div class="container">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            <li data-target="#carousel-example-generic" data-slide-to="5"></li>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="{{asset('../images/Equipo.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Equipo odontológico.
                </div>
            </div>

            <div class="item">
            <img src="{{asset('../images/Reconstruccion.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Reconstrucción dentaria.
                </div>
            </div>

            <div class="item">
            <img src="{{asset('../images/Brackets.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Ortodoncia.
                </div>
            </div>


            <div class="item">
            <img src="{{asset('../images/Agenda.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Control de citas.
                </div>
            </div>

              <div class="item">
            <img src="{{asset('../images/Limpieza.jpg')}}" alt="Equipo">
                <div class="carousel-caption">
                    Limpieza dental.
                </div>
            </div>

        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> <!--FIN DEL CARRUSEL -->

    <div class="row">
        <div class="col-md-4">
            <h2>Clínica Salud Dental</h2>
            <p align="justify">
               Clínica odontológica comprometida con la salud dentaria, se encuentra ubicada en el segundo nivel del Centro Comercial El Sol, frente a la terminal de buses del  municipio de Morales del departamento de Izabal.
            </p>
        </div>

        <div class="col-md-4">
            <h2>SiSaluDent</h2>
            <p align="justify">
            Es un sistema automatizado para la gestión de pacientes de la clínica odontológica Salud Dental del municipio de Morales del departamento de Izabal.
            </p>
        </div>

        <div class="col-md-4">
            <h2>Servicios</h2>
            <p align="justify">
                Para el manejo adecuado de la información, SiSaluDent cuenta con un menú de reportes a través del cual se pueden visualizar información relevante que ayude en la toma de decisiones.
                <br>
                <br>
                * Listar todos los equipos.<br>
                * Listar los equipos que no se encuentran en estado activo.<br>
                * Listar todos los equipos de una ubicación física determinada.<br>
                * Listar equipos y subequipos.<br>
                * Listar equipo que más AprobacionMantenimiento ha recibido.<br>
                * Mostrar que equipos estan asignados a un usuario determinado.<br>
                * Mostrar los equipos que no han sido asignados a ningún usuario.<br>
            <p>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop