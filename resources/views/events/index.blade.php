@extends('adminlte::page')
@section('title', 'SISALUDENT')
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
@section('content')
<div class="container">
<div id="calendar"></div>
</div>
<div class="modal" id="evento" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="{{ URL::to('events')}}" method="POST" id="crear_evento">
      	{{ csrf_field() }}

        <div class="row">
          <div class="col-md-6">
							<div class="form-group">
								<label for="contact">Nombre:</label>
								<input name="contact" type="text" id="contact" placeholder="Ingrese el nombre del paciente" class="form-control"/>
							</div>
					</div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone">Teléfono:</label>
              <input name="phone" type="text" id="phone" placeholder="Ingrese el teléfono" class="form-control"/>
            </div>
          </div>
        </div>
          <!-- <div class="col-md-3">
            <div class="form-group">
              <label for="start_date">Fecha y hora inicio:</label>
              <input name="start_date" type="date" id="start_date" placeholder="Ingrese fecha y hora" class="form-control"/>
            </div>
          </div> -->
        <div class="row">
            <div class="col-md-6">
							<div class="form-group input-append datetime">
                  <label for="start_date">Fecha y hora inicio:</label>
                    <!-- <div class="input-append datetime"> -->
                      <input  readonly="readonly" name="start_date" id="start_date" class="datetimepicker form-control "data-format="Y-M-D hh:mm:ss TT" type="text" />
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    <!-- </div> -->
              </div>
            </div>

                    <!-- <div class="col-md-3">
                      <div class="form-group">
                        <label for="end_date">Fecha y hora fin:</label>
                        <input name="end_date" type="text" id="end_date" placeholder="Ingrese fecha y hora" class="form-control"/>
                      </div>
                    </div> -->

            <div class="col-md-6">
							 <div class="form-group input-append datetime">
                  <label for="end_date">Fecha y hora fin:</label>
                    <!-- <div class="input-append datetime"> -->
                      <input  class="datetimepicker form-control" name="end_date" id="end_date" data-format="Y-M-D hh:mm:ss TT" type="text"/>
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    <!-- </div> -->
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<input type="submit" class="btn btn-success" value="Guardar" />
      </div>
      </form>
    </div>
  </div>
</div>

@stop

@push('css')
<style>

 body {
    margin: 0;
    padding: 0;
    font-size: 14px;
  }

  #top,
  #calendar.fc-unthemed {
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
    color: #000;
  }

  #top .selector {
    display: inline-block;
    margin-right: 10px;
  }

  #top select {
    font: inherit; /* mock what Boostrap does, don't compete  */
  }

  .left { float: left }
  .right { float: right }
  .clear { clear: both }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }

</style>
@endpush
@push('js')

<script >

    $(function(){

      "use strict";

      var evento = [];
      $.ajax({
        url       : '../get-events',
        type      : "GET",
        dataType  : "JSON",
        async     : false
      }).done(function(r){
        evento  = r;
      })

      $("#calendar").fullCalendar({
        header  : {
        left    : 'prev,next today',
        center  : 'title',
        right   : 'month,agendaWeek,agendaDay,listDay'
      },
      theme: 'true',
      themeSystem: 'jquery-ui',
      defaultView: 'listWeek',
      buttonText: {
            today: 'Ahora',
            month: 'Mes',
            week: 'Semana'
        },
        themeButtonIcons: {
          prev: 'left-single-arrow',
          next: 'right-single-arrow',
          prevYear: 'left-double-arrow',
          nextYear: 'right-double-arrow'
        },
        events  : evento,
        hiddenDays: [ 0 ],
        minTime: '09:00:00',
        maxTime: '17:00:00',
        editable: true,
        dayClick: function(datetime, jsEvent, view, resourceObj) {
          $("#start_date").val(datetime.format());
          $("#evento").modal();
        },
    });

      $(".connectedSortable").sortable({
        placeholder:  "sort-highlight",
        connectWith:  ".connectedSortable",
        handle:       ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
      });
      $(".connectedSortable .box-header, connectedSortable, .nav-tabs-custom").css('cursor', 'move');

      $(".todo-list").sortable({
        placeholder:  "sort-highlight",
        handle:       ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
      });

      $('.textarea').wysihtml5();
      $(".daterange").daterangepicker({
        ranges: {
          'Today'       :  [moment(), moment()],
          'Yesterday'   :  [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' :  [moment().subtract(6, 'days'), moment()],
          'Last 30 Days':  [moment().subtract(29, 'days'), moment()],
          'This Month'  :  [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  :  [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,'month').endOf('month')]
        }
      });

        $("#start_date").datetimepicker({
          format    : 'Y-M-D hh:mm:ss'
        })

        $("#end_date").datetimepicker({
          format    : 'Y-M-D hh:mm:ss'
        })
    });

$('#crear_evento').on('submit', function(e){
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
            document.getElementById("crear_evento").reset();
             $('#evento').modal('hide');
						//getTeeth();
            toastr["success"]("Cita creada exitosamente!", "Guardado")
            $("#calendar").fullCalendar('render');
          }
        });
      });


</script>
@endpush
