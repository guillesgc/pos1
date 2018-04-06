<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Calendario
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Calendario</li>
    
    </ol>

  </section>

   <section class="content">

    <div class="box">

      <div class="box-body">

         <div id="calendar">

        <?php

          $item = null;
          $valor = null;

          $calendario = ControladorCalendario::ctrMostrarCalendario($item, $valor);
        ?>
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'listDay,month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoy',
        list: 'listado',
        month: 'mes',
        week : 'semana',
        day  : 'día'
      },
      //Random default events
      events    : [

      <?php

      foreach ($calendario as $key => $value) {
        if ($value["tipo_agenda"]==1){
           $fondo='#0073b7';
           $borde='#0073b7';
         }else{
           $fondo='#f56954';
           $borde='#f56954';
         }  
        
        echo '{';
        echo "title:'".strtoupper($value["glosa"])."',";
        echo 'start: new Date('.date("Y",strtotime($value["fecha_evento"])).",".date("m",strtotime('-1 month',strtotime($value["fecha_evento"]))).",".date("d",strtotime($value["fecha_evento"])).",".substr($value["hora"],-8,2).",".substr($value["hora"],-5,2)."),";
        echo "backgroundColor: '".$fondo."',";
        echo "borderColor    : '".$borde."'";
        echo '},';
      }
        ?>
        
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</div>

</div>

</div>

</section>

</div>