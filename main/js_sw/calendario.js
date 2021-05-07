$(document).ready(function() {
		//Inizializza draggables
		//initializeDrags();
		//modale per click crea evento
		
		$("#create-event").click(function (){
			$.ajax({
				type:'POST',
				url:'ajax/controllo_utenti.php',
				success: function(response){
					
					console.log("controllo utenti", response);
					if (response == 'block'){
						// alert("destroy");
						window.location.replace("index.php");
					}  
					else {
						$("#createEventi").modal('show');
					}
				}
			});
			// console.log("qua");
			
		});
		//submit di modale crea evento prevenuto e creazione draggable		
		$("#form-eventi").submit(function (event){              
            var color="#a1a1a1";
			var validationCounter = 0;
            //altrimenti se è un pr faccio altro
			var title=$("#form-eventi  input[name='title']").val();
			var note=$("#form-eventi input[name='note']").val();
            var start = $("#form-eventi input[name='e_start']").val();
            var end = $("#form-eventi input[name='e_end']").val();
           
            var cliente = $("#form-eventi input[name='id_cliente']").val();
            var pr = localStorage.user_id ;
            var pr_name = localStorage.active_user;
			if (!title){ $("#form-eventi input[name='title']").css("border-color","red");validationCounter++;}
			if (!start){ $("#form-eventi input[name='e_start']").css("border-color","red");validationCounter++;}
			if (!end)  {$("#form-eventi input[name='e_end']").css("border-color","red");validationCounter++;}
			console.log("title", title);
			console.log("start", start);
			if (validationCounter == 0){
				
				$("#createEventi").modal('hide');
				$("#form-eventi input").css("border-color","#e2e2e4")
			   // alert(pr);
				$.ajax({
					type:'POST',
					url:'ajax/calendar.php',
					data:{metodo:'create', title:title, inizio:start, fine:end, note: note, cliente:cliente, pr:pr, color: color, pr_name:pr_name },
					success: function(response){
						console.log(response);
						// console.log("qui");
						//event.id=$("#messages").attr("data-last");
						 //$('#module').append(response);
					   //$('#calendar').fullCalendar( 'removeEvents' );
					   $('#calendar').fullCalendar( 'refetchEvents' );
						
					}
				});
			}
            else alert ("Completare i campi obbligatori");
            
            
            
			
			
		//initializeDrags();
			
			//	alert (stringappend);
		});
		
		
			
		
		//submito modale edit evento messo sotto form
		/*$("#edit-event").submit(function (event){
			event.preventDefault();
		
			var title=$("input[name='title']").val();
			var note=$("input[name='note']").val();
			var ctext=$("input[name='testo']").val();
			var cback=$("input[name='colore']").val();
			var id_storico=$("#edit-event").attr("data-id_storico");
			//var stringappend=	"<div class='fc-event' data-note='"+note+"'>"+title+"</div>"
			
			$("#edit-event").modal('hide');
			/*$.ajax({
				type:'POST',
				url:'ajax/editEvent.php',
				data:{ title:title, note:note, testo:ctext, sfondo:cback, id_storico:id_storico },
				success: function(response){
					$("#messages").append(response);
					//event.id=$("#messages").attr("data-last");
					
				}
			});
		
		});*/
		
         
          
            $("#calendario_hook").on ('click', "#test-event", function (){
                //alert("qui");
                   
                    
                    $('#calendar').fullCalendar('removeEvents');
                    $('#calendar').fullCalendar( 'refetchEvents' );
               
             });    
		 
            $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay, list'
            },
			lang:'it',
             editable: true,
            droppable: true,
            forceEventDuration:true,
            allDayDefault:true,
            defaultView:'month',
            eventLimit: true, // allow "more" link when too many events
            events: {
                url: 'js_sw/calendar/test.json',
                error: function() {
                  alert("error");
                }
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            },
			drop: function(date) {
				
				//console.log(date);
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}	
			},
			eventReceive: function (event){
				//alert (event.title);		alert("Dropped on " + date.format());		alert (event.note);alert (event.start.format());
				console.log ("evento creato",event);
				if (event.end==null){event.end=event.start;}
				$.ajax({
				type:'POST',
				url:'ajax/calendar.php',
				data:{metodo:'create', title:event.title, inizio:event.start.format(), fine:event.end.format(), note: event.note },
				success: function(response){
					$("#messages").append(response);
					event.id=$("#messages").attr("data-last");
					
				}
			});
			//alert ($("#messages").attr("data-last"));
			},
			eventClick: function(event, element) {
				console.log("EVENTO Click" , event);
				$.ajax({
					type:'POST',
					url:'ajax/controllo_utenti.php',
					success: function(response){
						
						console.log("controllo utenti", response);
						if (response == 'block'){
							// alert("destroy");
							window.location.replace("index.php");
						}  
						else {
							 //controllo se l'utente è un admin o un user e poi decido a che form eventi mandarlo 
							if (localStorage.role == "admin") {                
								  var stringa="ajax/formEventiAdm.php";     
							} else if (localStorage.role == "user" || localStorage.role == "readonly" ) { 
								  var stringa="ajax/formEventi.php";  
							} else {
								alert("Errore 1: utente non riconosciuto.");
							}
							
							$.ajax({
								type:'POST',
								url: stringa,
								//old version data:{ id:event.id, title:event.title, inizio:event.start.format(), fine: event.end.format(), sfondo:event.backgroundColor, colore:event.textColor },
								data:{ id:event.id, title:event.title, inizio:event.start.format(), fine:event.end.format(), sfondo:event.color, colore:event.textColor, note:event.note, tipo:event.tipo, id_pr:event.id_pr, id_cliente:event.id_cliente, location:event.location, partecipanti:event.partecipanti, pr_name:event.pr_name, confermato:event.confermato, opzionato:event.opzionato, inviato:event.inviato, caparra:event.caparra, direttore:event.direttore, numero:event.numero , citta:event.citta },
								success: function(response){
									$("#ajaxtarget").html(response);
								}
							});
							$("#modalEventi").modal('show');
							
							$('#calendar').fullCalendar('updateEvent', event); 

						}
					}
				});
           
			},
			eventDrop: function(event, delta, revertFunc) {
			    console.log("DROP", event);
			    //console.log(event.id_pr);
				if ( localStorage.readonly != "readonly" ){
					if ((event.id_pr == localStorage.user_id && event.confermato != "true" ) || localStorage.role == "admin") {
						if (event.end==null){console.log("event end = event start" + event.end + event.start); event.end=event.start;}
						
						$.ajax({
							type:'POST',
							url:'ajax/calendar.php',
							data:{metodo:'editData', modulo:'eventi', target:event.id, title:event.title, inizio:event.start.format(), fine: event.end.format() },
							success: function(response){
								$("#messages").append(response);
								
							}
						});
					} else {
						  revertFunc();
					}
				}
				else revertFunc();
			},
			eventResize: function(event, delta, revertFunc) {
			 console.log("DROP", event);
			    //console.log(event.id_pr);
                if ((event.id_pr == localStorage.user_id && event.confermato != "true" ) || localStorage.role == "admin") {
			        if (event.end==null){console.log("event end = event start" + event.end + event.start); event.end=event.start;}
			        
			        $.ajax({
				        type:'POST',
				        url:'ajax/calendar.php',
				        data:{metodo:'editData', modulo:'eventi', target:event.id, title:event.title, inizio:event.start.format(), fine: event.end.format() },
				        success: function(response){
					        $("#messages").append(response);
					        
				        }
			        });
                } else {
                      revertFunc();
                }
			},
            eventRender: function(event, element)
            { 
                //alert(event.id);
                //element.draggable(); 
				element.addTouch();
				if (event.opzionato != "true") element.css(  "opacity" , 0.4 );              
				if (event.opzionato == "true" && event.inviato != "true") element.css(  "opacity" , 1 );         
				if (event.opzionato == "true" && event.inviato == "true" && event.confermato!="true") element.css(  "opacity" , 0.4 );              
				if (event.confermato == "true") element.css(  "opacity" , 1 );              
				
				// if (event.confermato != "true" && event.opzionato != "true") element.find('.fc-content').css(  "opacity" , 0.5 );              
				// if (event.opzionato == "true" && event.inviato == "true") element.find('.fc-content').css(  "opacity" , 1 );              
                element.find('.fc-content').attr(  "id" , event.id );              
                element.find('.fc-time').html(  "<i style='width:10%' class='fa fa-clock-o'></i>" + event.start.format('HH:mm') +  "-" + event.end.format('HH:mm') );
                element.find('.fc-content').append("<div> <i style='width:10%' class='fa fa-map-marker'></i>" + event.location + "</div>" );
                element.find('.fc-content').append("<div> <i style='width:10%' class='fa fa-male'></i> " + event.partecipanti + "</div>");
				// element.find('.fc-content').append("<div> <i style='width:10%' class='fa fa-male'></i> " + event.citta + "</div>");
			}
			
	    });
		
});		
//sopra se c'è end sotto senza end   
			/*else {
			$.ajax({
				type:'POST',
				url:'ajax/ajax.php',
				data:{ id:event.id, title:event.title, inizio:event.start.format(), fine:event.start.format()},
				success: function(response){
					$("#messages").append(response);
				}
			});
			}
			}
		*/
// TODO LIST
/*setInterval(shoot, 15000)
function shoot (){
$('#calendar').fullCalendar( 'refetchEvents' );
}
/*setTimeout(function(){
			alert("Timer!");
		}, 2000);*/
function initializeDrags(){
	//creazione draggables
		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				note: $.trim($(this).attr("data-note")), // use the element's text as the event title
				tipo: "", // use the element's text as the event title
                location:"",
                partecipanti:"",
				id_cliente: "", // use the element's text as the event title
                id_pr: "",
				color: "", // use the element's text as the event title
				textColor: "", // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				containment: "window",
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});
};

   
