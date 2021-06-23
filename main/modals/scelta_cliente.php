<!--Modal Scegli clienti-->



<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_scegli_cliente" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 style="display:inline-block;" class="modal-title"><span name="lbl" caption="Scegli la Lettera">Scegli il Cliente da Abbinare</span> </h4>
				<a style="display:inline-block;     margin: 0px 0px 5px 63px;" id="new_cliente" href="javascript:;" class="btn btn-info"><i class="fa fa-refresh">&nbsp</i>Crea Nuovo</a>
            </div>
            <div id='ancora' style="padding-bottom: 100px;" class="modal-body">
                 <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table5">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>                             
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach ($picks as $pick) {?>                            
                        <tr class="gradeX">
                            <td><?=$pick['nome'];?></td>                                       
                            <td class="center hidden-phone"><a id="<?=$pick['id'];?>" data-nome="<?=$pick['nome'];?>" href="javascript:;" class="btn btn-info pick_button "><i class="fa fa-refresh">&nbsp</i>Scegli</a></td>
                        </tr>       
                        <?}?>
                        </tbody>
                        </table>                            
                 </div>
				 <form  id="clienti_create2" role="form"  action="javascript:;" method="POST" style='display:none' >
                                
                                    
                                       
                                     
                                    
                                    <div class="form-group">
                                        <label for="nome">Ragione Sociale:</label>
                                       <input type="text" class="form-control giusto" id ='nomeCreate' name="nome"  autofocus required/>
                                    </div>                                                                   
                                    <div class="form-group">
                                        <label for="CF">Codice Fiscale:</label>
                                       <input type="text" class="form-control giusto" id ='CF' name="CF" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="PIVA">Partita IVA:</label>
                                       <input type="text" class="form-control giusto" id="PIVA" name="PIVA" required />
                                    </div>
                                
                    <a  id ='crea2' href="javascript:;" class="btn btn-info link"><i class="fa fa-refresh">&nbsp</i>Crea</a>
                    <br><br> <br><br>
				</form>
            </div>
        </div>
    </div>

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--/Modal-->
<script>
    jQuery(document).ready(function() { 
        console.log ("ready di  modal_scegli_cliente");
        // se si spacca è questa cioccolatata
        $.fn.dataTable.ext.errMode = 'none';
         //SCRIPT PER TABELLA CON CERCA INTERNO DA ABILITARE SE SERVE
         $('#dynamic-table5').dataTable( {
        //"aoColumns": [ null, { "bSortable": false },  null, null, null , null ],
        "aaSorting": [[ 0, "desc" ]] ,
          "oLanguage": {
          "sEmptyTable":     "Nessun dato presente nella tabella",
            "sInfo":           "Vista da _START_ a _END_ di _TOTAL_ elementi",
            "sInfoEmpty":      "Vista da 0 a 0 di 0 elementi",
            "sInfoFiltered":   "(filtrati da _MAX_ elementi totali)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Visualizza _MENU_ elementi",
            "sLoadingRecords": "Caricamento...",
            "sProcessing":     "Elaborazione...",
            "sSearch":         "Cerca:",
            "sZeroRecords":    "La ricerca non ha portato alcun risultato.",
            },
            "oPaginate": {
        "sFirst":      "Inizio",
        "sPrevious":   "Precedente",
        "sNext":       "Successivo",
        "sLast":       "Fine"
    }
    } );  
        
        $("#modal_scegli_cliente").modal('show');
        
        $("#modal_scegli_cliente").on ('click', '.pick_button' ,  function (){ 
            $SelName = $(this).attr("data-nome");         
            $SelId= $(this).attr("id");
            //alert($SelId);
                
                $("#piked_cliente").val('');
                
                $("#piked_cliente").val($SelId);
                
                $.ajax( {
                    url: 'ajax/clienti.php',
                    type: 'POST',
                    data: {modulo:'clienti',  metodo:'pick_cliente', target:$SelId},
                    success: function(response){ 
                          //alert("QUI");                  
                          var data = $.parseJSON(response);
                         // console.log("CLIENTE" , response);
                           $("#cliente-2 input").each(function( replace ) {
                                  var pointer = $(this).attr("name");
                                  console.log("pointer", pointer  ); 
                                   $(this).val(data[pointer]);
                            });
                    }
                });
                
             
            
             $("#modal_scegli_cliente").modal('hide');     
             $("#modal_scegli_cliente").remove();     

        }); 
        
        $("#modal_scegli_cliente").on ('click', '#new_cliente' ,  function (){ 
                $("#new_cliente").hide();  
                $("#ancora .adv-table").hide();  
                $("#ancora #clienti_create2").show();  
               //$("#modal_scegli_cliente .modal-body").empty();
                //$("#modal_scegli_cliente .modal-body").append($("#clientenuovo").html());
                //$("#clientenuovo").remove();
               
                
                   
        }); 
        
        $("#modal_scegli_cliente").on ('click', '#crea2' ,  function (){
		var c = 0;			
            $("#clienti_create2 :input.giusto").each(function(){                   
				if ( !$(this).val() ) {c = 1; $(this).css("border" , "1px solid red"); } else { $(this).css("border" , "1px solid #e2e2e4"); } 
				console.log($(this).val());				
			}); 
			if ($("#nomeCreate").val()!= "" && ( $("#CF").val()!= "" || $("#PIVA").val()!= "" )) {c=0; console.log("in newif", c)};
			if (c == 1) { 
				alert("Completa tutti i campi");                   
			} else {   
				var data = $("#clienti_create2").serializeArray();
				console.log("cliente" , data);
                
				$.ajax( {
                    url: 'ajax/clienti.php',
                    type: 'POST',
                    data:{data: data, modulo:'clienti',  metodo:'calendarCheck_create', target:''},
                    success: function(response){ 
                        if (response==1){
							$.ajax( {
								url: 'ajax/clienti.php',
								type: 'POST',
								data:{data: data, modulo:'clienti',  metodo:'calendarCreate', target:''},
								success: function(response){
									 var data = $.parseJSON(response);
									console.log("CLIENTE Creato" , data);
									$("#piked_cliente").val(data["id"]);
									$("#cliente-2 input").each(function( replace ) {
										var pointer = $(this).attr("name");
										console.log("pointer", pointer  ); 
									$(this).val(data[pointer]);
									});
								}
							});
							$("#ancora .adv-table").show();
							//$("#new_cliente").show();
							$("#ancora #clienti_create2").hide();  
							$("#modal_scegli_cliente").modal('hide');
							$("#modal_scegli_cliente").remove;
                        }
                        else
                        {
                            $("#ancora").empty();
                            //$(".modal-body").append("Cliente già inserito da un altro utente vuoi associarlo anche al tuo account ? <br><a id='associa' href='javascript:;' class='btn btn-info link'><i class='fa fa-refresh'>&nbsp</i>Associa</a>");
                            $("#ancora").append(response);
                        }
                    }
                })
			}
        }); 
        
        
        
        
    });
    
    
</script>
</div>