<!--link href="js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
<link href="js/fullcalendar/fullcalendar.print.css" rel="stylesheet" /-->

   
 <link rel="stylesheet" type="text/css" href="js/bootstrap-datetimepicker/css/datetimepicker.css" />

        <!-- page start-->
            <section id="calendario_hook" class="panel">
                    <header class="panel-heading">
                        <a  id ='create-event' href="javascript:;" class="btn btn-info "><i class="fa fa-refresh"></i> Crea Nuovo</a>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div  class="panel-body">
                        <!-- page start-->
                            <div class="row">
                                <div class="col-md-12">
                                      <div id="calendar" class=""></div>
                                </div>
                          
                            </div>
                        <!-- page end-->
                    </div>
                </section>
        <!-- page end-->
    
<!--Modal Confirm Button-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEventi" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header blue" >
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Modifica evento">Modifica evento</span></h4>
            </div>
            <div id='ajaxtarget' class="modal-body" style="background-color: #f1f2f7;">
                 
            </div>
        </div>
    </div>
</div>

<!--/Modal-->
<!--Modal Confirm Button-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="createEventi" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #dff0d8;">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Crea">Crea evento</span></h4>
            </div>
            <div id='ajaxtarget' class="modal-body">
                <form action="javascript:;" id="form-eventi" method="POST" role="form"  enctype="multipart/form-data">
					<div class="form-group">
						<label class="flabel" for='title'>Titolo:</label>
                        <input class="form-control" type="text" id ='title' name="title" value=""/>
                    </div>
                    
                    
                    <input id="piked_cliente"       name="id_cliente"    type="hidden" value="<?=$_POST["id_cliente"]?>">
                    <div class="form-group row">
                        <div id="cliente-2"  class="col-md-6">
                             <label class="flabel" >Nome: </label>
                            <input class="form-control" type="text" id ='nome' name="nome" value="" disabled />
                        </div>
                            
                        <div style="padding-bottom:22px; margin-top: 22px;" class="form-group col-md-6">           
                          <a id="cliente" href="javascript:;" class="btn btn-info pick_list pull-left"  ><i class="fa fa-refresh">&nbsp</i>Assegna Cliente</a>
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <label class="control-label col-md-2">Data Inizio:</label>
                        <div class="col-md-6">
                           <input name="e_start" size="16" type="text" value=""  class="form_datetime form-control">
                        </div>
                    </div>
                    <div class="form-group row">             
                       <label class="control-label col-md-2">Data Fine:</label>
                       <div class="col-md-6">
                           <input name="e_end" size="16" type="text" value=""  class="form_datetime form-control">
                       </div>
                    </div>
                    <div class="form-group">
                        <label class="flabel" for='note'>Note:</label>
                        <input class="form-control" type="text"  name="note" />
                    </div>
					<p><button  class="btn btn-info "  type="submit">SUBMIT</button></p>
				</form>
            </div>
        </div>
    </div>
</div>

 <!--/Modal-->

<!--calendar-->

<link href='calendar/fullcalendar.css' rel='stylesheet' />

<link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />

 <!--script src='js/jquery-ui.min.js'></script>
<script src='js_sw/jquery.ui.touch-punch.min.js'></script-->

<script src='calendar/lib/moment.min.js'></script>
<script src='calendar/fullcalendar.min.js'></script>
<script src='calendar/lang/it.js'></script>
<!--script src='js_sw/calendario.js'></script-->

<!--DATETIME PICKER-->
<script type="text/javascript" src="js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src='js_sw/datetime.js'></script>




<script>

    $(document).ready(function() {
		console.log("daje");
       $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2016-01-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2016-01-01'
				},
				{
					title: 'Long Event',
					start: '2016-01-07',
					end: '2016-01-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-01-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-01-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2016-01-11',
					end: '2016-01-13'
				},
				{
					title: 'Meeting',
					start: '2016-01-12T10:30:00',
					end: '2016-01-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2016-01-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2016-01-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2016-01-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2016-01-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2016-01-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2016-01-28'
				}
			]
		});
		
	});


    </script>
