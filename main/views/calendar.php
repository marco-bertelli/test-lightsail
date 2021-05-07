<!--link href="js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
							<div id='segnalibro'></div>
							<div id='legenda'>
							<i id='segnalibro' class="fa fa-asterisk fa-3x"></i>
							<div id='content'></div>
							</div-->
<link href="css/print.css" rel="stylesheet" />

   
 <link rel="stylesheet" type="text/css" href="js/bootstrap-datetimepicker/css/datetimepicker.css" />
 <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css" />

        <!-- page start-->
            <section id="calendario_hook" class="panel">
                    <header class="panel-heading">
                        <a  id ='create-event' href="javascript:;" class="btn btn-info "><i class="fa fa-refresh"></i> Crea Nuovo</a>
						<a  style='display:none' id ='mobileLock' href="javascript:;" class="btn btn-danger "><i class="fa fa-lock fa-2x"></i></a>
                         
                        <span class="tools pull-right">
							<a  style='display:inline-block;' id ='goToDate' href="javascript:;" class="btn btn-info "><i class="fa fa-arrow-right"></i> Vai</a>
							<a  style='display:inline-block;' id ='stampa_a3' href="javascript:;" class="btn btn-info "><i class="fa fa-print"></i> Stampa</a>
						
                         </span>
                            <input style='display:inline-block;width:15%;' id="goToMonth" name="goToMonth" size="16" type="text" value="<?=$_POST["inizio"]?>"  class="form_date form-control pull-right">
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
    <div class="modal-dialog modal-lg">
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
                          <a id="cliente" href="javascript:;" class="btn btn-info pick_list pull-left"  >
							<i class="fa fa-refresh">&nbsp</i>Assegna Cliente
						  </a>
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <label class="control-label col-md-2">Data Inizio:</label>
                        <div class="col-md-6">
                           <input id="dp1" name="e_start" size="16" type="text" value=""  class="form_datetime form-control">
                        </div>
                    </div>
                    <div class="form-group row">             
                       <label class="control-label col-md-2">Data Fine:</label>
                       <div class="col-md-6">
                           <input id="dp2" name="e_end" size="16" type="text" value=""  class="form_datetime form-control">
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

 <script src='js/jquery-ui.min.js'></script>
<!--script src='js_sw/jquery.ui.touch-punch.min.js'></script-->
<script src='js_sw/jquery.ui.touch.js'></script>

<script src='calendar/lib/moment.min.js'></script>
<script src='calendar/fullcalendar.min.js'></script>
<script src='calendar/lang/it.js'></script>
<script src='js_sw/calendario.js?random=<?php echo uniqid(); ?>'></script>

<!--DATETIME PICKER-->
<script type="text/javascript" src="js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src='js_sw/datetime.js'></script>




<script>

    $(document).ready(function() {
          //se nell input hidden dell evento c'e l'id cliente compilo i campi   piked_cliente
           //pulsante per selezionare il cliente da mettere nei campi
		$("#stampa_a3").click(function (){

			
			$('#calendario').css("width", "2000px");
			$('.fixed-top').css("display" , "none");
			// $('#module').css("margin-top", "-80px");


			$('.navigator').css("display" , "none");
			$('aside').css("display" , "none");
			$('body').addClass("full-width");
			//printDiv();
			var divToPrint = document.getElementById('#calendario');
			var htmlToPrint = '' +
				'<style type="text/css">' +
				'#calendario th, #calendario td {' +
				'border:1px solid #000;' +
				'padding;0.5em;' +
				'}' +
				'</style>';
			   window.print();
			   window.location = "/vittorio_test";
				
		}); 
		
         $(".pick_list").on ('click', function (){
             //$("#modal_scegli_cliente").remove();
			 $("#modal_scegli_cliente").remove();
             $PickId = localStorage.user_id;
             //alert($PickId);
             $.ajax({
                 type:'POST',
                 url:'ajax/calendar.php',
                 data:{modulo:"eventi",  metodo:"pick", target:$PickId},
                 success: function(response){
                 $("#module").append(response);
                 //alert("fatto giro ajax");
                 }
             });
            
        }); 
	$('#goToMonth').datepicker({

		 format: 'dd-mm-yyyy',
		 todayBtn: true,
		 autoclose: true

	}).on('changeDate', function (ev) {
		console.log("ev", ev)
		$('#calendar').fullCalendar( "gotoDate",  ev.date );
		
			// var newDate = new Date(ev.date);
			// newDate.setDate(newDate.getDate() + 1 );  mette un giorno in piu del piker 1
			// newDate.setDate(newDate.getDate() );   //mette la stessa data del picker 1
			// console.log("newDate", newDate);
			// checkout1.datetimepicker("update", newDate);


		// $('#dp2')[0].focus();
	});		
	if ( localStorage.readonly == "readonly" ){
		
	$("#mobileLock").show();
	}
	$("#mobileLock").on("click", function () {
		if ( localStorage.readonly == "readonly" ){
			$(this).removeClass("btn-danger");
			$(this).addClass("btn-success");
			localStorage.readonly = "accept";
		}
		else {
			$(this).removeClass("btn-success");
			$(this).addClass("btn-danger");
			localStorage.readonly = "readonly";
		}
	});
	
    });
    </script>
