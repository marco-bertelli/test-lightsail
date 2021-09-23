<?
	require_once("../dbconnect.php");
	$qs=mysql_query("SELECT * FROM todo WHERE id_evento='".$_POST['id']."'");
	$todoList=array();
        while ($row = mysql_fetch_array($qs))
            array_push($todoList,$row);
		
		$datetimeI = new DateTime($_POST["inizio"]);
		$_POST["inizio"] =  $datetimeI->format('d-m-Y H:i');
		$datetimeI = new DateTime($_POST["fine"]);
		$_POST["fine"] =  $datetimeI->format('d-m-Y H:i');
?>
 <link rel="stylesheet" href="css/bootstrap-switch.css" />
<form id="edit-event"  role="form" action="javascript:;" method="POST" enctype="multipart/form-data" data-id='<?=$_POST["id"]?>' >
                    
                   
                             
                            
                               <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#evento-2">
                                <i class="fa fa-home"></i>
                                Evento
                            </a>
                        </li>
                        <li >
                            <a data-toggle="tab" href="#cliente-2">
                                <i class="fa fa-user"></i>
                                Cliente
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#gestione-2">
                                <i class="fa fa-envelope-o"></i>
                                Gestione Evento
                            </a>
                        </li>
                         <li class="">
                            <a data-toggle="tab" href="#todo-2">
                                <i class="fa fa-list"></i>
                                To do List
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                    
                        <div id="evento-2" class="tab-pane active ">
                            <div class="col-lg-12">
                                
                                   
                                  
                                
                                <div class="form-group">
                                   <label class="flabel" for='e_title'>Titolo: </label>
                                    <input class="form-control" type="text" id ='e_title' name="title" value="<?=$_POST['title']?>"/>
                                </div>
                                <div class="form-group col-md-6" style='padding-left:0'>
                                    <label class="flabel" for='tipo'>Tipo Evento:</label>
                                   
                                     <select type="text" id ='tipo' name="tipo" class="form-control">
                                                <option value="<?=$_POST['tipo']?>" selected="selected"><?=$_POST['tipo']?></option>
                                                <option value="Coffee break">Coffee break</option>
                                                <option value="Buffet">Buffet</option>
                                                <option value="Servito">Servito</option>
                                                <option value="Servito + Buffet">Servito + Buffet</option>
                                                <option value="Aperitivo">Aperitivo</option>
                                                <option value="Aperitivo rinforzato">Aperitivo rinforzato</option>                                                
                                    </select> 
                                </div>                              
                                 <!--div class="form-group">
                                   <label class="flabel" for='e_title'>Location: </label>
                                   <input class="form-control" type="text" id ='location' name="location" value="<?=$_POST['location']?>"/>
                                </div-->
                                <div class="form-group col-md-6" style='padding-right:0'>
                                    <label class="flabel" for='e_title'>Location:</label>
                                   
                                     <select type="text" id ='location' name="location" class="form-control">
                                                <option value="<?=$_POST['location']?>" selected="selected"><?=$_POST['location']?></option>
                                                <option value="Cantalupa">Cantalupa</option>
                                                <option value="Cariplo">Cariplo</option>
                                                <option value="Giardino">Giardino</option>
                                                <option value="Manifestazioni">Manifestazioni</option>
                                                <option value="Gallia">Gallia</option>
                                                 <option value="Evento Esterno">Evento Esterno</option>
                                                 <option value="RistoGolf">RistoGolf</option>
                                                
                                                                                         
                                    </select> 
                                </div>
                                <div class="form-group col-md-8" style='padding-left:0'>
                                    <label class="flabel" for='citta'>Citta/Indirizzo: </label>
                                    <input class="form-control" type="text" id ='citta' name="citta" value="<?=$_POST['citta']?>"/>
                                </div>
								<div class="form-group col-md-2" style='padding-left:0'>
                                   <label class="flabel" >Numero d'Ordine: </label>
                                   <input class="form-control" type="text" id ='numero' name="numero" value="<?=$_POST['numero']?>"/>
                                </div>
                                <div class="form-group col-md-2" style='padding-right:0'>
                                   <label class="flabel" for='e_title'>N Partecipanti: </label>
                                   <input class="form-control" type="text" id ='partecipanti' name="partecipanti" value="<?=$_POST['partecipanti']?>"/>
                                </div>


                                 <div class="form-group">
                                   <label class="flabel" for='e_title'>Note: </label>
                                   <input class="form-control" type="text" id ='e_note' name="note" value="<?=$_POST['note']?>"/>
                                </div>
                                
                            </div>
                        </div>
                        
                         <input id="piked_cliente"       name="id_cliente"    type="hidden" value="<?=$_POST["id_cliente"]?>">
                        <div id="cliente-2" class="tab-pane ">
                                
                            <div style="padding-bottom:50px;" class="form-group">
                                    
                                    <a id="cliente" data-pr="<?=$_POST["id_pr"]?>" href="javascript:;" class="btn btn-info pick_list pull-left"  ><i class="fa fa-refresh">&nbsp</i>Assegna Cliente</a>

                                </div>
                                 <div class="form-group col-md-6">
                                   <label class="flabel" >Nome: </label>
                                    <input class="form-control" type="text" id ='nome' name="nome" value="" disabled />
                                </div>
                                 <div class="form-group col-md-6">
                                   <label class="flabel" >Cognome: </label>
                                    <input class="form-control" type="text" id ='cognome' name="cognome" value="" disabled />
                                </div>                               
                                <div class="form-group col-md-4">
                                   <label class="flabel" >Codice Fiscale: </label>
                                    <input class="form-control" type="text" id ='cod_fiscale' name="cod_fiscale" value="" disabled />
                                </div>
                                <div class="form-group col-md-4">
                                   <label class="flabel" >Partita Iva: </label>
                                    <input class="form-control" type="text" id ='piva' name="piva" value="" disabled />
                                </div>
								<div class="form-group col-md-4">
                                   <label class="flabel" >Codice Univoco: </label>
                                    <input class="form-control" type="text" id ='codice_univoco' name="codice_univoco" value="" disabled />
                                </div>
								<div class="form-group col-md-7">
                                   <label class="flabel" >Indirizzo: </label>
                                    <input class="form-control" type="text" id ='via' name="via" value="" disabled />
                                </div>
								<div class="form-group col-md-3">
                                   <label class="flabel" >Città: </label>
                                    <input class="form-control" type="text" id ='citta' name="citta" value="" disabled />
                                </div>
								<div class="form-group col-md-2">
                                   <label class="flabel" >CAP: </label>
                                    <input class="form-control" type="text" id ='cap' name="cap" value="" disabled />
                                </div>
								<div class="form-group col-md-4">
                                   <label class="flabel" >	E-mail: </label>
                                    <input class="form-control" type="text" id ='mail' name="mail" value="" disabled />
                                </div>
								<div class="form-group col-md-4">
                                   <label class="flabel" >PEC: </label>
                                    <input class="form-control" type="text" id ='pec' name="pec" value="" disabled />
                                </div>
								<div class="form-group col-md-4">
                                   <label class="flabel" >Telefono: </label>
                                    <input class="form-control" type="text" id ='telefono1' name="telefono1" value="" disabled />
                                </div>
                        
                        </div>
                         
                        <div id="gestione-2" class="tab-pane ">
                        
								<input id="piked_pr"   name="id_pr"  type="hidden" value="<?=$_POST['id_pr']?>"  >  
									<div class='row'>
										<div class="form-group col-md-5">
											<label class="flabel" for='tipo'>Direttore:</label>
										   
											 <select type="text" id ='direttore' name="direttore" class="form-control">
														<option value="<?=$_POST['direttore']?>" selected="selected"><?=$_POST['direttore']?></option>
														<option value="Fabio">Fabio</option>
														<option value="Francesco">Francesco</option>
														<option value="Giuseppe">Giuseppe</option>
														<option value="Marcello">Marcello</option>
											</select> 
										</div>       
										
										<div style="padding-left:0px;" class="form-group col-sm-5">
											<label>Assegna pr</label>
											<input id="pr_name" type="text"  class="form-control" name="pr_name"   value="<?=$_POST['pr_name']?>"  />
										</div>
										<div style="padding-left:0px;margin-top:22px;" class="col-sm-2">
											<a id="scelta_pr" href="javascript:;" class="btn btn-info  pull-right"  ><i class="fa fa-refresh">&nbsp</i>Scegli</a>
										</div>
									</div>
								  	
                                  <div class="form-group row">
                                        <label class="control-label col-md-2">Data Inizio:</label>
                                        <div class="col-md-6">
                                           <input readonly id="dp1" name="start" size="16" type="text" value="<?=$_POST["inizio"]?>"  class="form_datetime form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">             
                                       <label class="control-label col-md-2">Data Fine:</label>
                                       <div class="col-md-6">
                                           <input readonly id="dp2" name="end" size="16" type="text" value="<?=$_POST["fine"]?>"  class="form_datetime form-control">
                                       </div>
                                  </div>
                                <div class="form-group col-md-6" style="padding-left:0">
									<label class="flabel">Caparra: </label>
									<input class="form-control" type="text" id="caparra" name="caparra" value="<?=$_POST["caparra"]?>">
								</div>
								
                                 <div class="form-group col-md-6" style="padding-right:0">
                                    <label class="flabel" for='e_text_col'>Colore Testo:</label>
                                   
                                     <select type="text" id ='e_text_col' name="textColor" class="form-control">
                                                <option value="white" <? if ($_POST['colore'] == "white") echo "selected='selected'" ?> >Bianco</option>  
                                                <option value="red"   <? if ($_POST['colore'] == "red") echo "selected='selected'" ?> >Rosso</option>
                                                <option value="black"   <? if ($_POST['colore'] == "black") echo "selected='selected'" ?> >Nero</option>                                   
                                                                
                                    </select> 
                                </div> 
                                <!--div class="form-group clk_adm">                            
                                    <label class="flabel" for='e_back_col'>Colore di Sfondo:</label>
                                     <select type="text" id ='e_back_col' name="color" class="form-control">
                                               
                                                <option value="#f37054"     <? if ($_POST['sfondo'] == "#f37054") echo "selected='selected'" ?> >Rosso</option>
                                                <option value="#A9D86E" <? if ($_POST['sfondo'] == "#A9D86E") echo "selected='selected'" ?> >Verde</option>
                                                <option value="#a1a1a1" <? if ($_POST['sfondo'] == "#a1a1a1") echo "selected='selected'" ?> >Grigio</option>
                                                <option value="#232ccb" <? if ($_POST['sfondo'] == "#232ccb") echo "selected='selected'" ?> >Blu</option>
                                                <option value="#1FB5AD" <? if ($_POST['sfondo'] == "#1FB5AD") echo "selected='selected'" ?> >Azzurro</option>
                                                <option value="#a48ad4" <? if ($_POST['sfondo'] == "#a48ad4") echo "selected='selected'" ?> >Fucsia</option>
                                                <option value="#FCB322" <? if ($_POST['sfondo'] == "#FCB322") echo "selected='selected'" ?> >Arancio</option>
                                    </select>                                  
                                </div-->
								<div class="m-bot20">         
								Opziona  
                                    <input id="btnOpzionato" type="checkbox"  data-on="success" data-off="warning">
                                    <input id="opzionato" name="opzionato" type="hidden" value="<?=$_POST['opzionato']?>">
                                </div>
								<div class="m-bot20 pull-right" style='margin-top:-50px;'>  
									Conferma pr
                                    <input id="btnInviato" type="checkbox"  data-on="success" data-off="warning" <? if($_POST['opzionato'] !='true') echo "disabled" ?>>
                                    <input id="inviato" name="inviato" type="hidden" value="<?=$_POST['inviato']?>">
                                </div>
                                <div class="m-bot20 pull-right" style='margin-top:0px;'>          
								Conferma  
                                    <input id="btnconfermato" type="checkbox"  data-on="success" data-off="warning">
                                    <input id="confermato" name="confermato" type="hidden" value="<?=$_POST['confermato']?>">
                                </div>
                        </div>
                       <div id="todo-2" class="tab-pane ">
						    <ul class="to-do-list" id="todoList">
								<?foreach ($todoList as $todo){require("../views/blocks/todo.php");}?>
							</ul>					
                             <div class="form-group row">
                                <div   class="col-md-6">
                                  
                                    <input id ='titoloTodo' class="form-control" type="text"  name="titoloTodo" value=""  />
                                </div>
                                    
                                <div style=" margin:0px 0px 0px 0px;" class="form-group col-md-6">           
                                  <a id ='create-todo' href="javascript:;" class="btn btn-info  pull-left"  ><i class="fa fa-refresh">&nbsp</i>Aggiungi</a>
                                </div>
                                
                            </div>
                             
                        </div> 
                    </div>
                </div>
            </section>
            <!--tab nav end-->
                      <p><button class="btn btn-info "  type="submit">Salva</button></p>
       </form>
                    <a class="btn btn-danger" id ='del-evento' href='#'>Cancella questo evento</a>
                    
                    
<script src="js/bootstrap-switch.js"></script>
<!--DATETIME PICKER-->
<script src='js_sw/moment.min.js'></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src='js_sw/datetime.js'></script>
<script>

    $(document).ready(function() {
		
		//var data1= new Date("<?=$_POST['inizio']?>Z");
      //  console.log("data1PRIMA1", data1);
       //data1=data1.toISOString();

               /*moment(data1).format('dd-mm-yyyy hh:ii');

				data1.setHours(data1.getHours()-2);

	            var data2= new Date("<?=$_POST['fine']?>Z")
    
                moment(data2).format('dd-mm-yyyy hh:ii');


              data2.setHours(data2.getHours()-2);

                console.log("data1", data1,"data2", data2  );
				checkin1.datetimepicker("update", data1);			
				checkout1.datetimepicker("update", data2);	*/
          //se nell input hidden dell evento c'e l'id cliente compilo i campi   piked_cliente
		//switch inviato
		$('#btnInviato').bootstrapSwitch();
		var conferma = "<?=$_POST['inviato']?>";
		if (conferma == 'true') {
			$('#btnInviato').bootstrapSwitch('setState', true);
			 //$('#e_back_col option[value=#0084b4]').attr('selected','selected');
			
		} else if (conferma =='false') {                
		  $('#btnInviato').bootstrapSwitch('setState', false);
			//$('#e_back_col option[value=#a1a1a1]').attr('selected','selected');
		}
		// event handler
		$('#btnInviato').on('switch-change', function (e, data) {
			var $element = $(data.el),
				value = data.value;
				$('#inviato').val("");
				$('#inviato').val(value);
				if (value == true ) {
					 $('#e_back_col option[value=#0084b4]').attr('selected','selected'); 
				} else if (value == false) {
					   $('#e_back_col option[value=#a1a1a1]').attr('selected','selected');
				}
			console.log(value);
		});
			//SWITH PER OPZIONE 
             $('#btnOpzionato').bootstrapSwitch();
             var opzione = "<?=$_POST['opzionato']?>";
             if (opzione == 'true') {
                    $('#btnOpzionato').bootstrapSwitch('setState', true);
                     //$('#e_back_col option[value=#0084b4]').attr('selected','selected');
                    
             } else if (opzione =='false') {                
                  $('#btnOpzionato').bootstrapSwitch('setState', false);
                    //$('#e_back_col option[value=#a1a1a1]').attr('selected','selected');
             }
             // event handler
                $('#btnOpzionato').on('switch-change', function (e, data) {
                    var $element = $(data.el),
                        value = data.value;
                        $('#opzionato').val("");
                        $('#opzionato').val(value);
                        if (value == true ) {
                             $('#e_back_col option[value=#0084b4]').attr('selected','selected'); 
                        } else if (value == false) {
                               $('#e_back_col option[value=#a1a1a1]').attr('selected','selected');
                        }
                    console.log(value);
                });
				
			//SWITH PER CONFERMA 
             $('#btnconfermato').bootstrapSwitch();
             var conferma = "<?=$_POST['confermato']?>";
			 console.log("conferma out", conferma);
             if (conferma == 'true') {
                    $('#btnconfermato').bootstrapSwitch('setState', true);
                     //$('#e_back_col option[value=#0084b4]').attr('selected','selected');
                    
             } else if (conferma =='false') {                
                  $('#btnconfermato').bootstrapSwitch('setState', false);
                    //$('#e_back_col option[value=#a1a1a1]').attr('selected','selected');
             }
             // event handler
                $('#btnconfermato').on('switch-change', function (e, data) {
                    var $element = $(data.el),
                        value = data.value;
                        $('#confermato').val("");
                        $('#confermato').val(value);
                        if (value == true ) {
                             $('#e_back_col option[value=#0084b4]').attr('selected','selected'); 
                        } else if (value == false) {
                               $('#e_back_col option[value=#a1a1a1]').attr('selected','selected');
                        }
                    console.log(value);
                });
                
            if  ( $("#piked_cliente").val() != "0" && $("#piked_cliente").val() != "undefined"  ) {
               var cli_ext = $("#piked_cliente").val();
                $.ajax( {
                    url: 'ajax/clienti.php',
                    type: 'POST',
                    data: {modulo:'clienti',  metodo:'pick_cliente', target:cli_ext},
                    success: function(response){ 
                          //alert("cliente id esistente");                  
                          var data = $.parseJSON(response);
                          //console.log("CLIENTE" , response);
                           $("#cliente-2 input").each(function( replace ) {
                                  var pointer = $(this).attr("name");
                                  //console.log("pointer", pointer  ); 
                                   $(this).val(data[pointer]);
                                });
                    }
                });
            }
        
         //pulsante per selezionare il cliente da mettere nei campi
         $(".pick_list").on ('click', function (){
             $("#modal_scegli_cliente").remove();
                $PickId= $(this).attr("data-pr");  
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
         //assegno il pr all evento da amministratore
         $("#scelta_pr").on ('click', function (){
             $("#modal_scegli_pr").remove();
                 var PickPr= $(this).attr("scelta_pr");  
             //alert($PickId);
             $.ajax({
                 type:'POST',
                 url:'ajax/calendar.php',
                 data:{modulo:"eventi",  metodo:"pick_pr", target:PickPr},
                 success: function(response){
                 $("#module").append(response);
                 //alert("fatto giro ajax");
                 }
             });
            
        });
        $("#edit-event").submit(function (e){
            e.preventDefault();
            $("#cliente-2").empty();
            $data= $("#edit-event").serializeArray();
            console.log("EVENTO IN SALVATAGGIO",$data ) ;
            var id=$("#edit-event").attr("data-id");
            //alert(id);
            /*var title=$("input[name='title']").val();
            var note=$("input[name='note']").val();
            var azione=$("input[name='azione']").val();
            var ctext=$("input[name='testo']").val();
            var cback=$("input[name='colore']").val();
            var id_storico=$("#edit-event").attr("data-id_storico");*/
            //var stringappend=    "<div class='fc-event' data-note='"+note+"'>"+title+"</div>"
            
            $("#modalEventi").modal('hide');
            $.ajax({
                type:'POST',
                url:'ajax/calendar.php',
                //data:{ metodo:'edit', target:id, id:id, title:title, note:note, azione:azione, testo:ctext, sfondo:cback, id_storico:id_storico },
                data:{ metodo:'edit', target:id, data:$data, modulo:'eventi' },
                success: function(response){
                    
                    //event.id=$("#messages").attr("data-last");
                    //$('#calendar').fullCalendar( 'removeEvents' );
                    $('#calendar').fullCalendar( 'refetchEvents' );
                    
                }
            });
        });
        $("#del-evento").click(function (e){
            //e.preventDefault();
            var id=$("#edit-event").attr("data-id");
            $remove = id;
			console.log ("cancello id -> ",id);
            $("#modalEventi").modal('hide');
        $.ajax({
                type:'POST',
                url:'ajax/calendar.php',
                data:{ target:id, modulo:'eventi', metodo:'delete' },
                success: function(response){
                     //$('#calendar').fullCalendar( 'removeEvents' );
                     $('#calendar').fullCalendar( 'refetchEvents' );
                     console.log("evento cancellato");
                    
                    
                }
            });
        });
        
        //TODO LIST START
         $('.todo-check label').click(function () {
            $(this).parents('li').children('.todo-title').toggleClass('line-through');
        });
		// TODO 
		$("#create-todo").on ('click', function (){
			
			//alert($("#titoloTodo").val());
			var titolo=$("#titoloTodo").val();
			var id_evento=$("#edit-event").attr("data-id");
			
             //alert($PickId);
             $.ajax({
                 type:'POST',
                 url:'ajax/calendar.php',
                 data:{modulo:"eventi",  metodo:"createTodo", titolo:titolo, id_evento:id_evento},
                 success: function(response){
                 $("#todoList").append(response);
				 $("#titoloTodo").val("");
                 //alert("fatto giro ajax");
                 }
             });
            
        });
        $("#edit-event").on("click", "#remove-todo", function (e){
            //e.preventDefault();
            var id=$(this).parent().attr("id");
            console.log($(this));
         
        $.ajax({
                type:'POST',
                url:'ajax/calendar.php',
                data:{ target:id, modulo:'eventi', metodo:'deleteTodo' },
                success: function(response){
                    //$("#messages").append(response);
                    //event.id=$("#messages").attr("data-last");
                 $("#todoList").append(response);
                 $("#"+id).fadeOut();
                    
                }
            });
        });
		$("#edit-event").on("change", "#todo-check", function (){
			var todoEl=$(this).parent();//puntatore all'elemento todo per dargli eventualmente la classe
			var id=$(this).parent().attr("id");
			var check=0;
			if ($(this).is(':checked')) check=1;
			$.ajax({
				type:'POST',
				url:'ajax/calendar.php',
				data:{ target:id, modulo:'eventi', metodo:'updateTodo', check:check },
				success: function(response){
					//$("#messages").append(response);
					//event.id=$("#messages").attr("data-last");
					$("#todoList").append(response);
					if (check == 1) console.log("impostare barred");
					else console.log("togliere barred");
				}
			});
        });		
        //TO DO LIST END
        
            
        
    });
    </script>