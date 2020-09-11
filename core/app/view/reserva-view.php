<!DOCTYPE html>
<html>
<head>

<meta charset='utf-8' />

<script src='lib/locale/es.js'></script>
<!-- jQuery 2.2.3 -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>




<link href='lib/fullcalendar.min.css' rel='stylesheet' />
<link href='lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='lib/scheduler.min.css' rel='stylesheet' />
<script src='lib/moment.min.js'></script>
<script src='lib/fullcalendar.min.js'></script>
<script src='lib/scheduler.min.js'></script>

<style>

  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  p {
    text-align: center;
  }

  #calendar {
  
    max-width: 1200px !important;
    margin: 50px auto;

  }

  .fc-resource-area td {
    cursor: pointer;
  }
  .close{
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 1;
  }
  .fc-timeline-event .fc-time {
    font-weight: 700;
    padding: 0 1px;
    display: none !important;
}
  

</style>
</head>
<body>


  <div id='calendar'></div>


  <!-- Modal add. update, delete-->
  <div class="modal fade" id="ModalEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-success">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleEvent"> </h4>
              </div>
        <div class="modal-body" style="background-color: #f5eded !important;">
          <div class="row">
            <div class="col-md-offset-1 col-md-10">

              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon"> Habitación &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                     <select name="id_habitacion" id="id_habitacion" class="form-control">
                      <?php $rooms = HabitacionData::getAll();?>
                      <?php foreach($rooms as $room):?>
                      <option value="<?php echo $room->id;?>"><?php echo $room->nombre;?></option>
                      <?php endforeach;?>
                    </select> 
                </div>
              </div>

              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon"> Check In  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="date" class="form-control" name="txtDate" id="txtDate" required >
                    <span class="input-group-addon"> Hora</span>
                    <input type="time" class="form-control" name="txtHour" id="txtHour"  required >
                </div>
              </div>

              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon"> Check Out &nbsp;&nbsp; &nbsp;</span>
                    <input type="date" class="form-control" name="txtDateEnd" id="txtDateEnd"  required >
                    <span class="input-group-addon"> Hora &nbsp;&nbsp;</span>
                    <input type="time" class="form-control" name="txtHourEnd" id="txtHourEnd" required >

                </div>
              </div>

              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon"> Documento &nbsp;&nbsp; </span>
                  <input type="text" class="form-control" name="documento" id="documento" required placeholder="Ingrese documento">
                </div>
              </div>

              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon"> Nombres &nbsp;&nbsp; &nbsp;&nbsp;</span>
                  <input type="text" class="form-control" name="nombre" id="nombre" required placeholder="Nombres completos">
                </div>
              </div>

              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon"> Dirección &nbsp;&nbsp; &nbsp;&nbsp;</span>
                  <input type="text" class="form-control" name="direccion" id="direccion" required placeholder="Dirección">
                </div>
              </div>

              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon"> Observación </span>
                  <input type="text" class="form-control" name="observacion" id="observacion" required placeholder="Observación">
                </div>
              </div>
 
              


            </div>
           </div>

          <input type="hidden" id="txtId" name="txtId"><br>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success"  id="btnAdd">Agregar</button>
          <button type="button" class="btn btn-secondary" id="btnUpdate">Actualizar</button>
          <button type="button" class="btn btn-danger" id="btnDel">Eliminar</button>
          <button type="button" class="btn btn-default"  id="btnClose">Cancelar</button>
          
        </div>
      </div>
    </div>
  </div>




<script>

  $(function() { // document ready

    $('#calendar').fullCalendar({
      now: new Date(),
      editable: true,
      selectable: true,
      aspectRatio: 1.8,
      scrollTime: '00:00',
      header: {
        left: 'promptResource today prev,next',
        center: 'title',
        right: 'timelineMonth,timelineDay,timelineThreeDays'
      },
      defaultView: 'timelineMonth',
      views: {
        timelineThreeDays: {
          type: 'timeline',
          duration: { days: 5 } 
        }
      },
      resourceAreaWidth: '15%',   
      resourceColumns: [
        {
          labelText: 'Habitaciones', 
          field: 'title'
        }
      ],
      
      select: function(startDate, endDate,mjsEvent, view, resource) {

        var fechaHora=startDate.format().split("T");
        var fechaHoraEnd=endDate.format().split("T");

        var check = moment(startDate).format('YYYY-MM-DD');
        var today = moment(new Date()).format('YYYY-MM-DD');

        $('#txtDate').val(fechaHora[0]);
        $('#txtHour').val(fechaHora[1]);

        $('#txtDateEnd').val(fechaHoraEnd[0]);
        $('#txtHourEnd').val(fechaHoraEnd[1]);
        $('#id_habitacion').val(resource.id);
        $('#titleEvent').html(resource.title);
        if (check >= today) {
        $("#ModalEvent").modal();
        }
        else {
          alert("No se pueden crear reserva en el pasado!");
        }
        
    },
      eventClick:function(calEvent){
            // H2
            if (calEvent.estado == "3") {
            $('#titleEvent').html(calEvent.title);
            // Information events
            $('#id_habitacion').val(calEvent.resourceId);
            $('#documento').val(calEvent.documento);
            $('#txtId').val(calEvent.id);
            $('#nombre').val(calEvent.title);
            $('#direccion').val(calEvent.direccion);
            $('#observacion').val(calEvent.observacion);
            

            datehhour= calEvent.start._i.split(" ");
            datehhourEnd= calEvent.end._i.split(" ");
            $('#txtDate').val(datehhour[0]);
            $('#txtHour').val(datehhour[1]);
            $('#txtDateEnd').val(datehhourEnd[0]);
            $('#txtHourEnd').val(datehhourEnd[1]);

            $("#ModalEvent").modal();
          }

            


      },
      eventResize:function(calEvent, delta, revertFunc){
        if (calEvent.estado == "3") {
        $('#txtId').val(calEvent.id);
          $('#nombre').val(calEvent.title);
          $('#documento').val(calEvent.documento);
          $('#direccion').val(calEvent.direccion);
          $('#id_habitacion').val(calEvent.resourceId);
          $('#observacion').val(calEvent.observacion);

          var fechaHora= calEvent.start.format().split("T");
          var fechaHoraEnd= calEvent.end.format().split("T");
          $('#txtDate').val(fechaHora[0]);
          $('#txtHour').val(fechaHora[1]);

          $('#txtDateEnd').val(fechaHoraEnd[0]);
          $('#txtHourEnd').val(fechaHoraEnd[1]);

          DataGUI();
          DataSendUI('actualizar',NewEvent,true);
        }



      }, 
      eventDrop:function(calEvent){
           if (calEvent.estado == "3") {
            
        
          $('#id_habitacion').val(calEvent.resourceId);
          $('#documento').val(calEvent.documento);
          $('#txtId').val(calEvent.id);
          $('#nombre').val(calEvent.title);
          $('#observacion').val(calEvent.observacion);

          var fechaHora= calEvent.start.format().split("T");
          var fechaHoraEnd= calEvent.end.format().split("T");
          $('#txtDate').val(fechaHora[0]);
          $('#txtHour').val(fechaHora[1]);

          $('#txtDateEnd').val(fechaHoraEnd[0]);
          $('#txtHourEnd').val(fechaHoraEnd[1]);

           DataGUI();
           DataSendUI('actualizar',NewEvent,true);
           }
 
      }, 
                          
      

      resources: "index.php?action=reserva",
      events: "index.php?action=reservas",
      
 
 
     eventRender: function(calEvent, element) {

        
        var hoy = Date();
        
        if (calEvent.estado == '0') {
            element.css({
                'background-color': '#33ad85',
                'border-color': '#333333',
                'color': 'white'
            });
        }
        if (calEvent.estado == '3') {
            element.css({
                'background-color': '#f0ad4e',
                'border-color': '#333333',
                'color': 'white'
            });
        }
    }

    });
  
  }); 


   $('#bagregar').click(function(){
     
      DataGUI();
      DataSendUI('addroom',NewEvent);
      $('#ModalRoom').modal('toggle');
      limpiar();
      $('#calendar').fullCalendar('refetchResources');
    });

   $('#btnAdd').click(function(){
     
      DataGUI();
      DataSendUI('agregar',NewEvent);
      $('#ModalEvent').modal('toggle');
      limpiar();
    });

    $('#btnDel').click(function(){
      
      DataGUI();
      DataSendUI('eliminar',NewEvent);
      $('#ModalEvent').modal('toggle');
      limpiar();
    });

    $('#btnUpdate').click(function(){
      
      DataGUI();
      DataSendUI('actualizar',NewEvent);
      $('#ModalEvent').modal('toggle');
      limpiar();
    });

    $('#btnClose').click(function(){

      $('#ModalEvent').modal('toggle'),
      limpiar();
    });

    $('#btnClose1').click(function(){ 
      $('#ModalEvent').modal('toggle'),
      limpiar();
    });

  function limpiar() {
        document.getElementById("txtId").value = "";
        document.getElementById("id_habitacion").value = "";
        document.getElementById("documento").value = "";
        document.getElementById("nombre").value = "";
        document.getElementById("direccion").value = "";
        document.getElementById("txtDate").value = "";
        document.getElementById("txtDateEnd").value = "";
        document.getElementById("observacion").value = "";
        $("#titleEvent").empty();

    }

    function DataGUI(){

         NewEvent={
        // TABLE EVENTO 
        id:$('#txtId').val(),
        id_habitacion:$('#id_habitacion').val(),
        documento:$('#documento').val(),
        nombre:$('#nombre').val(),
        direccion:$('#direccion').val(),
        observacion:$('#observacion').val(),
        start:$('#txtDate').val()+" "+$('#txtHour').val(),
        end:$('#txtDateEnd').val()+" "+$('#txtHourEnd').val()
      };
 
    }       

    function DataSendUI(accion,objEvento){ 
        $.ajax({
          type:'POST',
          url:'index.php?action=reserva&accion='+accion,
          data:objEvento, 
          success:function(msg){
            if (msg){
              $('#calendar').fullCalendar('refetchEvents');
              if(!modal){
              $('#ModalEvent').modal('toggle');
              $('#ModalRoom').modal('toggle');
              }
            }
          },
          error:function(){
            alert("Hay un error");
          }
        });

    }





</script>
<script src='lib/locale/es.js'></script>

</body>
</html>
