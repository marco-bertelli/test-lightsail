$(document).ready(function() {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });
    console.log("ready del demone");
     
	localStorage.setItem("position", "home");
	localStorage.setItem("parent", "home");
	localStorage.setItem("modulo", "home");
    localStorage.setItem('modulo_attuale', 'home');
    //setto il frullino per ajax e pulisto il setinterval per togierlo a ogni giro di routine
    localStorage.setItem('testAjax', true);
    
     if(typeof($auto_refresh) !== "undefined") {
            clearInterval($auto_refresh);
    } else {
       // alert('autorefresh non settato');
    }
    //clearInterval($auto_refresh);
    //clearInterval(localStorage.auto_refresh);
    
    //--------------------------------//
    $.fn.routine = function (modulo, metodo, target) {                                      
                    $data = '';
                    console.log(modulo);
                    console.log(metodo);
                    console.log(target);
					if ((typeof $auto_refresh != 'undefined')) clearInterval($auto_refresh);
                    //console.log($data);
					$.ajax({
						type:'POST',
						url:'ajax/controllo_utenti.php',
						data:{data:$data},
						success: function(response){
							
							//console.log(response);
							if (response == 'block'){
								//alert("destroy");
								window.location = 'index.php';
							}  
							
						}
                    });
					
					/*$.ajax({
						type:'POST',
						url:'ajax/controllo_utenti.php',
						data:{data:$data},
						success: function(response){
							
							$("#module").append(response);
														
							
						}
                    });*/
					
                     switch (metodo) {
                            case "direct":
								//Trick per direct call
								console.log("inizio");
								target=$("#direct_string").val();
                                // CONTROLLO SE TARGET HA inuse a 0 E POI APRO O BLOCCO
							$.ajax({
								type:'POST',
								url:'ajax/controllo.php',
								data:{metodo:'check', target:target},
								success: function(response){
									
									$("#module").append(response);
																   
									//alert("fatto giro ajax");
					//console.log (localStorage.blocked_id);        
                                if (localStorage.blocked_id != target){
                                    console.log("blocked != da target");
                                // APRO PAGINA UPD,
                                localStorage.setItem("cliente_id", target);                                   
                                
                                $("#module").fadeOut(200, function (){
                                //VERO GOTO 
                                $.ajax({
                                    type:'POST',
                                    url:'ajax/'+ modulo +'.php',
                                    data:{data: $data, modulo:modulo,  metodo:"goto", target:target, user:localStorage.active_user},
                                    success: function(response){
										
                                        $("#module").empty();
                                        $("#module").append(response);
										
										localStorage.setItem("position", "create");
										localStorage.setItem("parent", "home");
										localStorage.setItem("modulo", modulo);
										localStorage.setItem('modulo_attuale', modulo);
                                    //DOPO L'APERTURA UPD block_id in console e campo a 1 del target
                                        $.ajax({
                                            type:'POST',
                                            url:'ajax/controllo.php',
                                            data:{metodo:'block', target:target},
                                            success: function(response){
                                                //alert ("bloccato" + target);
                                                $("#module").append(response);
                                                                            
                                               // alert("fatto giro ajax");
                                            }
                                        });
                                        //alert("fatto giro ajax");
                                    }
								});
                                });
                                $("#module").fadeIn(200);
								
                                }
                                else
                                {
                                      $.ajax({
                                    type:'POST',
                                    url:'ajax/'+ modulo +'.php',
                                    data:{data: $data, modulo:modulo,  metodo:"goto", target:target, user:localStorage.active_user},
                                    success: function(response){
										
                                        $("#module").empty();
                                        $("#module").append(response);
										
										localStorage.setItem("position", "create");
										localStorage.setItem("parent", "home");
										localStorage.setItem("modulo", modulo);
										localStorage.setItem('modulo_attuale', modulo);
                                    //DOPO L'APERTURA UPD block_id in console e campo a 1 del target
                                        $.ajax({
                                            type:'POST',
                                            url:'ajax/controllo.php',
                                            data:{metodo:'block', target:target},
                                            success: function(response){
                                                //alert ("bloccato" + target);
                                                $("#module").append(response);
                                                                            
                                               // alert("fatto giro ajax");
                                            }
                                        });
                                        //alert("fatto giro ajax");
                                    }
								});
                                }
                            }
                            });
                            break;
							case "goto":
                                $("#"+ modulo +"_upd").remove();
                                $("#"+ modulo).fadeOut(200, function (){
                                localStorage.setItem("goto_id", target);
                                $.ajax({
                                    type:'POST',
                                    url:'ajax/'+ modulo +'.php',
                                    data:{data: $data, modulo:modulo,  metodo:metodo, target:target, user:localStorage.active_user},
                                    success: function(response){
									
                                           
                                        $("#module").append(response);
										localStorage.setItem("position", "1");
										localStorage.setItem("parent", "0");
										localStorage.setItem("modulo", modulo);
										localStorage.setItem('modulo_attuale', modulo);
                                                                          //alert("fatto giro ajax");
                                    }
                                });
                               
                            });
                            break;
                            case "goto_inner":  
                                   //alert(modulo);                                             
                                $("#module").fadeOut(200, function (){
								$("#"+localStorage.modulo+"_upd").remove();
                                localStorage.setItem("gotoInner_id", target);
                                $.ajax({
                                    type:'POST',
                                    url:'ajax/'+ modulo +'.php',
                                     data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                    success: function(response){                                      
										//  $('#module').empty();
										$("#module").append(response);
										$('#module').show();
										localStorage.setItem("position", "2");
										localStorage.setItem("parent", "1");
                                        localStorage.setItem('modulo_attuale', modulo);
                                        
                                        //alert("fatto giro ajax");
                                    }
                                });
                                });
                               
                            break;
                            case "stampa":                   
                             $("#module").fadeOut(200, function (){
                                $.ajax({
                                    type:'POST',
                                    url:'ajax/'+ modulo +'.php',
                                     data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                    success: function(response){
                                            $('#module').empty();
                                            $("#module").append(response);
                                            $('#module').show();
											localStorage.setItem("position", "0");
											localStorage.setItem("parent", "home");
											localStorage.setItem("modulo", modulo);
                                            localStorage.setItem('modulo_attuale', modulo);
											
                                        //alert("fatto giro ajax");
                                           
                                    }
                                });
                                });
                                
                            break;
                            case "edit":
                            $("#modal_confirm_edit").modal('hide');
                            $data = $("#"+modulo+"_"+target).serializeArray();
							
							console.log($data);
                            //se modulo interessi chiudo modale e metto nei campi i valori mandati
                          
                            if (modulo=="interessi") {
                                console.log($data);
                            $targetrow=$("#"+target).children().first();
                            $targetrow.text($data[0].value);
                            $targetrow.next().text($data[1].value);
                            $targetrow.next().next().text($data[2].value);
                            $("#modal_interessi_edit").modal('hide');
                            
                            }
                            $.ajax({
								type:'POST',
								url:'ajax/'+ modulo +'.php',
								data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
								success: function(response){
									$("#module").append(response);
									//alert("fatto giro ajax");
								}
                            });
							//Disabilito i campi al salvataggio e pulisco localstorage
							if (localStorage.controllo == "attivo"){
								if (localStorage.getItem("gotoInner_id") === null) $targetcontrol=localStorage.goto_id;
								else $targetcontrol=localStorage.gotoInner_id;
								console.log("in edit controllo -> "+$targetcontrol);
											$.ajax({
												type:'POST',
												url:'ajax/controllo.php',
												data:{metodo:'unblock', target:$targetcontrol, modulo:localStorage.modulo_attuale },
												success: function(response){
													//alert ("bloccato" + target);
													$("#module").append(response);
													localStorage.removeItem("blocked_id");
													localStorage.removeItem("controllo");
													$(".disabilita input, .disabilita select, .disabilita textarea").attr('disabled', 'disabled');
													$("#salva").hide();
                                                    $(".pick_list").attr('disabled', 'disabled');
													$("#edit").css("display", "block");
													//alert("fatto giro ajax");
												}
											});
										}
                            break;
                            case "delete":
                            $("#modal_confirm_delete").modal('hide');
                            $.ajax({
                                    type:'POST',
                                    url:'ajax/'+ modulo +'.php',
                                     data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                    success: function(response){
                                        $("#module").append(response);
                                        $("#"+target).fadeOut();
                                        //alert("fatto giro ajax");
                                    }
                                });
                            break;
                            case "create":
                            var c = 0;
                                
                                $("#modal_"+modulo+"_create :input.giusto").each(function(){                   
                                    if ( !$(this).val() ) {c = 1; $(this).css("border" , "1px solid red"); } else { $(this).css("border" , "1px solid #e2e2e4"); }                                
                                }); 
								if ($("#nome").val()!= "" && ( $("#CF ").val()!= "" || $("#PIVA ").val()!= "" )) {c=0};
                                  if (c == 1) { 
                                     alert("Completa tutti i campi");                   
                                } else { 
                                    console.log ("sono in create");
                                    $("#modal_"+modulo+"_create").modal('hide');
                                    $("#module").fadeOut(200, function (){
                                        console.log ("in callback da fadeOut serializzo1");
                                        $data = $("#"+modulo+'_create').serializeArray();
                                        $.ajax({
                                                type:'POST',
                                                url:'ajax/'+ modulo +'.php',
                                                 data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                                success: function(response){
                                                   
                                                    $('#module').empty();
                                                    $("#module").append(response);
                                                    $('#module').show();
                                                    
													localStorage.setItem("position", "create");
													localStorage.setItem("modulo", modulo);
                                                    localStorage.setItem('modulo_attuale', modulo);
                                                }
                                            });
                                    });
                                }
                            break;
                            case "inner_create":
                                
								var c = 0;
								$("#modal_"+modulo+"_create :input.giusto").each(function(){                   
                                    if ( !$(this).val() ) {c = 1; $(this).css("border" , "1px solid red"); } else { $(this).css("border" , "1px solid #e2e2e4"); }                                
                                });                                                                                                    
                                if (c == 1) { 
                                     alert("Completa tutti i campi");                   
                                } else {  
                                    $("#modal_"+modulo+"_create").modal('hide');                            
									$("#"+localStorage.modulo+"_upd").fadeOut(200, function (){
									$("#"+localStorage.modulo+"_upd").remove();
                                     $data = $("#"+modulo+'_create').serializeArray();
                                        $.ajax({
                                                type:'POST',
                                                url:'ajax/'+ modulo +'.php',
                                                 data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                                success: function(response){
                                                    $("#module").append(response);
													localStorage.setItem("position", "2");
                                                    localStorage.setItem('modulo_attuale', modulo);
                                                }
                                            });
                                    });  
                                }
							
                            break;
							case "inpage_create":
                                var c = 0;
                                   //$("#"+modulo+"_holder").empty(); 
                                $("#modal_"+modulo+"_create :input.giusto").each(function(){                   
                                    if ( !$(this).val() ) {c = 1; $(this).css("border" , "1px solid red"); } else { $(this).css("border" , "1px solid #e2e2e4"); }                                
                                });                                                                                                    
                                if (c == 1) { 
                                     alert("Completa tutti i campi");                   
                                } else {  
                                     $("#modal_"+modulo+"_create").modal('hide');                            
                                     $data = $("#"+modulo+'_create').serializeArray();
                                        $.ajax({
                                                type:'POST',
                                                url:'ajax/'+ modulo +'.php',                                              
                                                 data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                                success: function(response){                                                 
                                                   // alert("qui5");  
                                                                                                   
                                                   $("#"+modulo+"_holder").append(response);
                                                    
                                                    
                                                    
                                                }
                                            });  
                                }
                            break;
                            case "modal":
                                $('#modale').empty();
                                $.ajax({
                                    type:'POST',
                                    url:'modals/'+modulo+'_'+target+'.php',
                                    data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                    success: function(response){
                                        $("#modale").append(response);
                                        //alert("fatto giro ajax");
                                    }
                                });
                                
                            break;
                            case "search":
                            $data = $("#ricerca_"+target).serializeArray();
                            $('#module').fadeOut(200, function (){
                            $.ajax({
                                    type:'POST',
                                    url:'ajax/'+ modulo +'.php',
                                    data:{data: $data, modulo:modulo,  metodo:metodo, target:target},
                                    success: function(response){
                                        $('#module').empty();
                                        $("#module").append(response);
                                        $('#module').fadeIn();
                                        
                                        //alert("fatto giro ajax");
                                    }
                                });
                            });
                            break;
							
							case "goback":
							console.log("goback");
							//????? non ricordo per fa sparire dei modali ?
                            $('.modal-backdrop').removeClass('modal-backdrop');
							$('body').removeClass('modal-open');
                            //rimetto il frullino di ajax
                             localStorage.setItem('testAjax', true);
                            
							//Parto dal controllo di position
								switch (localStorage.position) {
								case "0":
									//tolgo tutto e ricarico home
									$('#module').fadeOut(200, function (){
										$('#module').empty();
										$( "#module" ).load( "views/homesearch.php" );
										$("#module").fadeIn();
										localStorage.setItem("position", "home");
										localStorage.setItem("parent", "home");
										localStorage.setItem("modulo", "home");
									});
								break;
								case "1":
                                    $("#"+ modulo +"_upd").fadeOut(200, function (){
										$("#"+ modulo +"_upd").remove();
										//clearInterval($auto_refresh);
										//alert(localStorage.parent);
										if (localStorage.parent=='calendario'){
											$.ajax({
												type:'POST',
												url:'ajax/calendar.php',
												data:{metodo:'stampa', modulo:'calendar'},
												success: function(response){
													//alert ("bloccato" + target);
													$("#module").append(response);
													console.log (localStorage.cliente_id+" sbloccato");
													localStorage.removeItem("cliente_id");
													//alert("fatto giro ajax");
												}
											});
										}
										else {
											
										$("#"+ modulo).fadeIn();
										localStorage.setItem("position", "0");
										localStorage.setItem("parent", "home");
										if (localStorage.controllo == "attivo"){
											$.ajax({
												type:'POST',
												url:'ajax/controllo.php',
												data:{metodo:'unblock', target:localStorage.goto_id, modulo:modulo},
												success: function(response){
													//alert ("bloccato" + target);
													$("#module").append(response);
													localStorage.removeItem("blocked_id");
													localStorage.removeItem("controllo");
												}
											});
										}
										localStorage.removeItem("goto_id");
										}
                                    });
								break;
								case "2":
									//alert ("#"+target);
									$("#"+target).fadeOut(200, function (){
										$("#"+target).remove();
										$.ajax({
											type:'POST',
											url:'ajax/'+ localStorage.modulo +'.php',
											data:{data: $data, modulo:localStorage.modulo,  metodo:"goto", target:localStorage.goto_id},
											success: function(response){
												$("#module").append(response);
												localStorage.setItem("position", "1");
												localStorage.setItem("parent", "0");
												localStorage.removeItem("gotoInner_id");
												
												
											}
										});
										if (localStorage.controllo == "attivo"){
											$.ajax({
												type:'POST',
												url:'ajax/controllo.php',
												data:{metodo:'unblock', target:localStorage.gotoInner_id, modulo:localStorage.modulo_attuale },
												success: function(response){
													//alert ("bloccato" + target);
													$("#module").append(response);
													localStorage.removeItem("blocked_id");
													localStorage.removeItem("controllo");
													//alert("fatto giro ajax");
												}
											});
										}
									});
								break;
								case "create":
									$("#module").fadeOut(200, function (){
										if (localStorage.controllo == "attivo"){
											$.ajax({
												type:'POST',
												url:'ajax/controllo.php',
												data:{metodo:'unblock', target:localStorage.goto_id, modulo:modulo},
												success: function(response){
													//alert ("bloccato" + target);
													$("#module").append(response);
													localStorage.removeItem("blocked_id");
													localStorage.removeItem("controllo");
												}
											});
										}
										localStorage.removeItem("goto_id");
										localStorage.removeItem("gotoInner_id");
										$.ajax({
											type:'POST',
											url:'ajax/'+ localStorage.modulo +'.php',
											data:{data: $data, modulo:localStorage.modulo,  metodo:"stampa", target:""},
											success: function(response){
												$('#module').empty();
												$("#module").append(response);
												$('#module').show();
												
												localStorage.setItem("position", "0");
												localStorage.setItem("parent", "home");
												localStorage.setItem("modulo", localStorage.modulo);
												
												
											}
										});
									});
								}
                            break;
							
                            //$("#modal_back").modal('hide');
                            /* case "gobackOLD":
							 
							 console.log("suca");
                            // Metodo che ritorna a home se è settato target o alla base del modulo se non è settato target
                            //$("#modal_back").modal('hide');
                            $('.modal-backdrop').removeClass('modal-backdrop');
                            $('body').removeClass('modal-open');
                                if (target=='home'){
                                 $('#module').fadeOut(200, function (){
                                    $('#module').empty();
                                    $( "#module" ).load( "views/homesearch.php" );
                                    $("#module").fadeIn();
                                     
                                 });
                                }                        
                                else
                                {
                                    
                                    $("#"+ modulo +"_upd").fadeOut(200, function (){
                                    $("#"+ modulo +"_upd").remove();
                                    $("#"+ modulo).fadeIn();
                                    if (localStorage.cliente_id != null){
                                        $.ajax({
                                            type:'POST',
                                            url:'ajax/controllo.php',
                                            data:{metodo:'unblock', target:localStorage.cliente_id},
                                            success: function(response){
                                                //alert ("bloccato" + target);
                                                $("#module").append(response);
                                                console.log (localStorage.cliente_id+" sbloccato");
                                                localStorage.removeItem("cliente_id");
                                                //alert("fatto giro ajax");
                                            }
                                        });
                                    }
                                    });
                                }
                           
                                
                               
                            }*/
                            break;
                            case "goback_inner":
                               if (localStorage.livello_modulo == 1) {
                                            $('#' + localStorage.modulo_partenza + '_upd').hide();
                                        } else if (localStorage.livello_modulo == 2) {
                                            
                                            $('#' + localStorage.modulo_arrivo).hide();
                                             //$('#' + localStorage.modulo_partenza).empty();
                                               metodo = "goto";
                                               $("#module").fadeOut(200, function (){
                                                    $.ajax({
                                                        type:'POST',
                                                        url:'ajax/'+ modulo +'.php',
                                                         data:{data: $data, modulo:localStorage.modulo_partenza,  metodo:metodo, target:target},
                                                        success: function(response){                                      
                                                                 $('#module').empty();
                                                                $("#module").append(response);
                                                                $('#module').show();
                                                            //alert("fatto giro ajax");
                                                        }
                                                    });
                                                });
                                        }
                                
                               
                            
                            break;
                        }
                    
                    
                    //riempirci in base all'id
                    //lanciare in wrapper il nuovo row
                    
                
        }
    //qua
    
});

function routine (modulo, metodo, target){
        $.fn.routine(modulo, metodo, target);
}

