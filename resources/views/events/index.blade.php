@extends('adminlte::page')
@section('title', 'SISALUDENT')
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
@section('content')
<div class="container-fluid" >
  <div class="panel panel-primary">
    <div class="panel-heading">Registrar nueva cita</div>
      <div class="panel-body">
        {!! Form::open(array('route' => 'events.store', 'method' => 'POST', 'files' => 'true'))!!}
        {{ csrf_field() }}
        <div class='row'>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if (Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success')}}</div>
            @elseif (Session::has('warning'))
              <div class="alert alert-danger">{{ Session::get('warning')}}</div>
            @endif
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
             <div class="form-group">
               {!! Form::label('contact','Contacto:') !!}
                <div class="">
                  {!! Form::text('contact', null, ['class' => 'form-control']) !!}
                  {!! $errors->first('contact', '<p class="alert alert-danger">:message</p>')!!}
                </div>
              </div>
          </div>
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
             <div class="form-group">
               {!! Form::label('telefono','Telefono:') !!}
                <div class="">
                  {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                  {!! $errors->first('telefono', '<p class="alert alert-danger">:message</p>')!!}
                </div>
              </div>
          </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
              <div class="form-group">
                {!! Form::label('start_date','Inicio:') !!}
                  <div class="">
                    {!! Form::input('dateTime-local','start_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>')!!}
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
              <div class="form-group">
                {!! Form::label('end_date','Fin:') !!}
                  <div class="">
                    {!! Form::input('dateTime-local','end_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>')!!}
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">&nbsp; <br/>
              <div class="form-group">
                <div class="">
                    {!! Form::submit('Crear cita', ['class'=>'btn btn-primary'])!!}
                </div>
              </div>
            </div>
          {!! Form::close()!!}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">Calendario de citas</div>
        <div  class="panel-body" >
            {!! $calendar_details->calendar() !!}
    </div>
      </div>
    </div>
  </div>
</div>
@stop

@push('js')
{!! $calendar_details->script() !!}
<script>

    $(document).ready(function() {
      var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
        $('#calendar').fullCalendar({
          defaultTimedEventDuration: '00:30:00',
          forceEventDuration: true,
          selectOverlap:false,
          schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectHelper: true,
          select: function(start, end) {
            var title = prompt('Contacto:');
            var eventData;
            if (title) {
              eventData = {
                title: contact,
                phone: telefono,
                start: start_data,
                end: end_data
              };
              $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            $('#calendar').fullCalendar('unselect');
          },
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events: [
          ]
        });
      });


</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
@endpush
