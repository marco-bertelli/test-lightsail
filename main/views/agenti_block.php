<div class="col-sm-12" id='<?=$items_agente['id']?>'>
                                <section class="panel">
                                    <header class="panel-heading verde">
                                        <?=$items_agente['cognome']?>  <?=$items_agente['nome']?>, <?=$items_agente['settore']?>
                                        <span class="tools pull-right">
                                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                                            <a href="javascript:;" class="fa fa-cog"></a>
                                            <a href="index.php?a=stampa_clienti" class="fa fa-arrow-left"></a>
                                         </span>
                                    </header>
                                    <div class="panel-body chiudo">
                                        <form role="form" id='agenti_<?=$items_agente['id'];?>' action="javascript:routine('agenti', 'edit','<?=$items_agente['id'];?>');" method="POST">
                                                
                                                              <div class="col-lg-12">
                                                                  <div class="form-group">                                           
                                                                           <label for="titolo">Titolo</label>
                                                                           <select id ='agente_titolo' name="titolo" class="form-control">
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
                                                                       <input type="text" class="form-control" id ='agente_cognome' name="cognome" value="<?=$items_agente['cognome']?>"/>
                                                                    </div>
                                                               
                                                                
                                                                  
                                                                   <div class="form-group">
                                                                        <label for="telefono1">Telefono</label>
                                                                       <input type="text"  class="form-control" id ='agente_telefono1' name="telefono" value="<?=$items_agente['telefono']?>"/>
                                                                    </div>
                                                                 
                                                                   <div class="form-group">
                                                                       <label class="control-label">Ruolo</label>                                               
                                                                           <select id ='agente_settore' name="settore" class="form-control">
																			<option value=""></option>
                                                                                  
                                                                                    <?php foreach ($ruoli as $ruolo) :  ?>
                                                                                        <option value="<?=$ruolo?>" <?php if ($items_agente['settore'] == $ruolo)echo "selected='selected'";?> ><?=$ruolo?></option>
                                                                                        
                                                                                     <?php endforeach;  ?>  
                                                                           </select>                                    
                                                                   </div>
                                                                   <div class="form-group">
                                                                        <label for="mail">Mail</label>
                                                                       <input type="text"  class="form-control" id ='agente_mail' name="mail" value="<?=$items_agente['mail']?>"/>
                                                                    </div>                                                            
                                                            </div>
                                                             <div class="col-lg-6">
                                                                

                                                                 <div class="form-group">
                                                                    <label for="nome">Nome</label>
                                                                   <input type="text"  class="form-control" id ='agente_nome' name="nome" value="<?=$items_agente['nome']?>"/>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="telefono">Cellulare </label>
                                                                   <input type="text"  class="form-control" id ='telefono' name="telefono1" value="<?=$items_agente['telefono1']?>"/>
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    <label for="note">Note:</label>
                                                                   <textarea id ='agente_note' class="form-control" rows="6"  name="note" ><?=$items_agente['note']?></textarea>
                                                                </div>
                                                               
                                                            </div>
                                                             <div class="col-lg-12">
                                                              <div class="form-group">                                           
                                                                       <label for="stringa_interessi">Interessi</label>
                                                                       <select id ='stringa_interessi' name="stringa_interessi" class="form-control">
																			<option value=""></option>
                                                                            <?php foreach ($interessi as $interesse) :  ?>
																				<option value="<?= $interesse ['sigla_interesse']?>-<?= $interesse ['descrizione_interesse']?>-<?= $interesse ['tipo_interesse']?>"  ><?= $interesse ['sigla_interesse']?> - <?= $interesse ['descrizione_interesse']?> </option>
                                                                            <?php endforeach;  ?>    
                                                                       </select>   
                                                                    </div>
                                                                
                                                             </div>
												<a  href="javascript:localStorage.setItem('save_module', 'agenti');localStorage.setItem('save_id', '<?=$items_agente['id'];?>');routine('confirm', 'modal','edit');" class="btn btn-info link"><i class="fa fa-refresh">&nbsp</i>Salva</a>

                                                <!--a  href="javascript:routine('agenti', 'edit','<?=$items_agente['id'];?>');" class="btn btn-info link"><i class="fa fa-refresh">&nbsp</i>Salva</a-->
                                                <!--button  type="submit " class="btn btn-info confirmB pull-left "><i class="fa fa-floppy-o">&nbsp</i>Salva</button-->
                                                <a class="btn btn-warning confirm2 pull-right " href="javascript:localStorage.setItem('delete_module', 'agenti');localStorage.setItem('delete_id', '<?=$items_agente['id'];?>');routine('confirm', 'modal','delete');" data-nome='<?=$items_agente['nome'];?>'><i class="fa fa-trash-o" >&nbsp</i>Elimina</a>   

                                          </form>
                                    </div>
                                </section>
                            </div> 