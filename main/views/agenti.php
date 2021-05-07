
<div id="<?=$modulo?>">

 <div class="row">      <!--AGENTI-->
             <div class="col-sm-12" id='agenti_holder'>
                                  
                 
                            <div class="col-sm-12" id='<?=$items_agente['id']?>'>
                                <section class="panel">
                                     <header class="panel-heading verde">
                                        <?=$items_agente['titolo']?> <?=$items_agente['cognome']?>  <?=$items_agente['nome']?> 
                                        
                                        <? if ($items_agente['mail']!=''){?><a href="mailto:<?=$items_agente['mail']?>"> - <?=$items_agente['mail']?> <i class="fa fa-envelope">&nbsp</i> </a><?}?>
                                        
                                         <span class="tools pull-right">
                                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                                            <!--a href="javascript:routine( localStorage.modulo_partenza , 'goback_inner', localStorage.cliente_id )" class="fa fa-arrow-left goto_inner"></a-->
                                            <a href="javascript:;" class="fa fa-arrow-left"></a>

                                         </span>
                                    </header>
                                    
                                    <div class="panel-body chiudo">
                                        <form role="form" class='disabilita' id='agenti_<?=$items_agente['id'];?>' action="javascript:routine('agenti', 'edit','<?=$items_agente['id'];?>');" method="POST">
                                                
                                                              <div class="col-lg-12">
                                                                  <div class="form-group">                                           
                                                                           <label for="titolo">Titolo</label>
                                                                           <select id ='agente_titolo' name="titolo" class="form-control" disabled>
                                                                            <option value=""></option>

                                                                            <?php $dbtitolo = $items_agente['titolo'];?>
                                                                            <?php foreach ($titoli as $titolo) :  ?>
                                                                                <option value="<?=$titolo?>" <?php if ( $dbtitolo === $titolo) echo "selected='selected'";?> ><?=$titolo?></option>
                                                                            <?php endforeach;  ?>   
                                                                           </select>   
                                                                        </div>
                                                                    
                                                            </div>
                                                            <div class="col-lg-6">
                                                                
                                                                   
                                                               
                                                                    <div class="form-group">                                           
                                                                       <label for="cognome">Cognome</label>
                                                                       <input type="text" class="form-control" id ='agente_cognome' name="cognome" value="<?=$items_agente['cognome']?>" disabled />
                                                                    </div>
                                                               
                                                                
                                                                  
                                                                   <div class="form-group">
                                                                        <label for="telefono1">Telefono</label>
                                                                       <input type="text"  class="form-control" id ='agente_telefono1' name="telefono" value="<?=$items_agente['telefono']?>" disabled />
                                                                    </div>
                                                                 
                                                                   <div class="form-group">
                                                                       <label class="control-label">Ruolo</label>                                               
                                                                           <select id ='agente_settore' name="settore" class="form-control" disabled >
                                                                            <option value=""></option>
                                                                                  
                                                                                    <?php foreach ($ruoli as $ruolo) :  ?>
                                                                                        <option value="<?=$ruolo?>" <?php if ($items_agente['settore'] == $ruolo)echo "selected='selected'";?> ><?=$ruolo?></option>
                                                                                        
                                                                                     <?php endforeach;  ?>  
                                                                           </select>                                    
                                                                   </div>
                                                                   <div class="form-group">
                                                                        <label for="mail">E-Mail</label>
                                                                       <input type="text"  class="form-control" id ='agente_mail' name="mail" value="<?=$items_agente['mail']?>" disabled />
                                                                    </div>                                                            
                                                            </div>
                                                             <div class="col-lg-6">
                                                                

                                                                 <div class="form-group">
                                                                    <label for="nome">Nome</label>
                                                                   <input type="text"  class="form-control" id ='agente_nome' name="nome" value="<?=$items_agente['nome']?>" disabled />
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="telefono">Cellulare </label>
                                                                   <input type="text"  class="form-control" id ='telefono' name="telefono1" value="<?=$items_agente['telefono1']?>" disabled />
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    <label for="note">Note:</label>
                                                                   <textarea id ='agente_note' class="form-control" rows="6"  name="note" disabled ><?=$items_agente['note']?></textarea>
                                                                </div>
                                                               
                                                            </div>
                                                             <div class="col-lg-12">
                                                             
                                                            
                                                            <div  class="col-lg-12">
                                                               <a style='display:none' id="salva" href="javascript:localStorage.setItem('save_module', 'agenti');localStorage.setItem('save_id', '<?=$items_agente['id'];?>');routine('confirm', 'modal','edit');" class="btn btn-info link pull-right"><i class="fa fa-refresh">&nbsp</i>Salva</a>
															    <a id='edit' href="javascript:;" class="btn btn-danger link pull-right" data-id='<?=$item["id"]?>'><i class="fa fa-refresh">&nbsp</i>Modifica</a>
                                                            </div>
                                             
                                                <div class='clearfix'></div>
                                          </form>
                                    </div>
                                </section>
                            </div> 
                     
                   
             </div> <!--COL SM 12 FINE-->
        </div>  <!-- RAW PORTELT INIZIALE FINE-->
          <!--Modal Confirm Delete INTERESSI-->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_interessi" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Cancellare elemento ?</span></h4>
                        </div>
                        <div class="modal-body">
                             <a href="javascript:;" id="YES"  class="btn btn-info btn-sm "><span name="lbl" caption="Edit">Si</span></a>
                             <a href="javascript:;" id="NO" data-dismiss="modal" class="btn btn-warning btn-sm "><span name="lbl" caption="No">No</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Modal--> 
           <!--Modal go back -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_back" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Torna indietro ?</span></h4>
            </div>
            <div class="modal-body">
			Sei sicuro di voler tornare indietro ?<br>
			Perderai tutti le modifiche non salvate.<br><br>
                 <a href="javascript:routine(localStorage.modulo, 'goback', localStorage.modulo_attuale);" id="YES"  class="btn btn-warning btn-sm "><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript:;" id="NO" data-dismiss="modal" class="btn btn-warning btn-sm "><span name="lbl" caption="No">No</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->         
 </div>
 
   <script>
    jQuery(document).ready(function() {
        console.log ("ready di agenti");
        //Controllo su sblocco per modifica
		$("#edit").on("click", function (){
			$target=localStorage.gotoInner_id;
			
			//alert($target);
			$.ajax({
				type:'POST',
				url:'ajax/controllo.php',
				data:{metodo:'check', target:$target, modulo:"agenti"},
				success: function(response){
					
				$("#module").append(response);
				
				//console.log (localStorage.blocked_id+" diverso da target ? "+$target);        
				if (localStorage.blocked_id != $target){
					console.log("procedo modifica");
					localStorage.setItem("controllo","attivo");
					$("input, select, textarea").removeAttr("disabled");
					$.ajax({
						type:'POST',
						url:'ajax/controllo.php',
						data:{metodo:'block', target:$target, modulo:'agenti'},
						success: function(response){
							//alert ("bloccato" + target);
							$("#module").append(response);
							$("#edit").hide();
							$("#salva").css("display", "block");
						   // alert("fatto giro ajax");
						}
					});
				}
				else {
					console.log("bloccato");
					 $.ajax({
							type:'POST',
							url:'modals/cliente_aperto.php',
							data:{modulo:"agenti", target:$target},
							success: function(response){
								$("#module").append(response);
								$("#modal_aperto").modal("show");
								//alert("fatto giro ajax");
							}
						});
				}
				}
			});
		});

		
		$(".interesse").click(function (){
            localStorage.setItem('id_interesse', $(this).attr("id"));
            $("#modal_interessi").modal('show');
            
        });
        $("#YES").click(function (){
            //alert("YES");
            $.ajax({
                type:'POST',
                url:'ajax/agenti.php',
                data:{modulo:'agenti',  metodo:'del_interesse', target:localStorage.id_interesse},
                success: function(response){
                    $("#module").append(response);
                    $("#"+localStorage.id_interesse).fadeOut();
                    $("#modal_interessi").modal('hide');
                }
            });

        });
        $("#NO").click(function (){
            $("#modal_interessi").modal('hide');
        });
        
       
     
    });
</script>

<!--il nostro imp che lavora sodo e valida le form-->
<script src="js_sw/imp_validation.js"></script>