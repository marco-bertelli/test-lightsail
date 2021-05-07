 <div id="settings">
<!-- page start-->
	<? foreach ($items as $item) {?>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading blue">
                        <?=$item['riferimento'];?>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                            <a href="javascript:routine('clienti', 'goback', 'home')" class="fa fa-arrow-left"></a>
                         </span>
                    </header>
					<? 
						$scelte= explode(",",$item["scelte"]);
						sort($scelte, SORT_NATURAL | SORT_FLAG_CASE);
					?>
                    <div class="panel-body chiudo" id='<?=$item['id'];?>'>
                    <!--a  href="index.php?a=create&new=1" class="btn btn-info "><i class="fa fa-refresh">&nbsp</i>Crea Nuovo</a-->
						<div class="col-lg-12" style='margin-bottom:10px;'>
						
						<div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table">
                        <thead>
                        <tr>
                            <th>Opzione</th>
                            <th class="hidden-phone">Modifica</th>
                            <th class="hidden-phone">Elimina</th>
                        </tr>
                        </thead>
                        <tbody id='opzioni_holder'>
                        <?foreach ($scelte as $scelta) {?>
                            
                        <tr class="gradeX" >
                            <td class='choice'><?=$scelta?></td>
                            <!--td class="hidden-phone"><a  href="index.php?geoloc=localizzazione&id=<?=$item['id'];?>" class="btn btn-primary "><i class="fa fa-refresh">&nbsp</i>GeoLoc</a></td-->
                            <td class="center hidden-phone"><a href="javascript:;" class="btn btn-info link edit_choice"><i class="fa fa-refresh">&nbsp</i>Modifica</a></td>
                            <td class="center hidden-phone"><a href="javascript:;" class="btn btn-warning delete_choice"><i class="fa fa-trash-o" >&nbsp</i>Elimina</a></td>
                        </tr>
                        
                      <?}?>
                        </tbody>
                        </table>
						
						
						
						<?// foreach ($scelte as $scelta){?>
							<!--button type="button" class="btn btn-info choice buttonstyle"> <?=$scelta?> <i class="fa fa-trash-o" >&nbsp</i> </button-->
						<?//}?>
						</div>
						
						<a  href="javascript:;" class="btn btn-primary link add"><i class="fa fa-plus">&nbsp</i>Aggiungi</a>
						<!--OBSOLETO, OGNI AZIONE SALVA DA SOLA a  href="javascript:;" class="btn btn-primary link pull-right save"><i class="fa fa-refresh">&nbsp</i>Salva</a-->
						<!--a  href="javascript:localStorage.setItem('save_module', 'settings');localStorage.setItem('save_id', '<?=$item['id'];?>');routine('confirm', 'modal','edit');" class="btn btn-primary link pull-right"><i class="fa fa-refresh">&nbsp</i>Salva</a-->
						
                    </div>
                </section>
            </div>
        </div>
	<?}?>
	<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                     
                    <header class="panel-heading blue">
                      Interessi
					   
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:routine('clienti', 'goback', 'home')" class="fa fa-arrow-left"></a>
                         </span>
                    </header>
					
                    <div class="panel-body chiudo" id='<?=$item['id'];?>'>
                    <!--a  href="index.php?a=create&new=1" class="btn btn-info "><i class="fa fa-refresh">&nbsp</i>Crea Nuovo</a-->
						<div class="col-lg-12" style='margin-bottom:10px;'>
						<? 	$items = interessi::get_all();$stringaperdb='';?>
					
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                        <thead>
                        <tr>
                            <th>Sigla</th>
                            <th>Descrizione</th>
                            <th>Tipo</th>
                            <th class="hidden-phone">Modifica</th>
                            <th class="hidden-phone">Elimina</th>
                        </tr>
                        </thead>
                        <tbody id="interessi_holder">
                        <?foreach ($items as $item) {?>
                            
                        <tr class="gradeX" id='<?=$item['id'];?>'>
                            <td><?=$item['sigla_interesse'];?></td>
                            <td><?=$item['descrizione_interesse'];?></td>
                            <td ><?=$item['tipo_interesse'];?></td>
                            <td class="center hidden-phone"><a href="javascript:localStorage.setItem('edit_id', '<?=$item['id'];?>');routine('interessi', 'modal','edit');" class="btn btn-info" data-target="<?=$item['id'];?>" ><i class="fa fa-refresh" >&nbsp</i>Modifica</a></td>
                            <td class="center hidden-phone"><a href="javascript:localStorage.setItem('delete_module', 'interessi');localStorage.setItem('delete_id', '<?=$item['id'];?>');routine('confirm', 'modal','delete');" class="btn btn-warning confirm_delete" data-target="<?=$item['id'];?>" ><i class="fa fa-trash-o" >&nbsp</i>Elimina</a></td>
                        </tr>
                        
                      <?}?>
                        
                        </tbody>
                        </table>
					
					
					
						<a  href="javascript:routine('interessi', 'modal','create');" class="btn btn-info link"><i class="fa fa-plus">&nbsp</i>Aggiungi</a>
						<!--a  href="javascript:localStorage.setItem('save_module', 'settings');localStorage.setItem('save_id', '<?=$item['id'];?>');routine('confirm', 'modal','edit');" class="btn btn-primary link pull-right"><i class="fa fa-refresh">&nbsp</i>Salva</a-->
						
                    </div>
                </section>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <section class="panel">
                               <a  style="display:block; width:100%; height:50px; font-size: 24px;" href="javascript:;" id='reset_clienti' class="btn btn-danger">
                                 <i class="fa fa-refresh">&nbsp</i>RESET APERTURA CLIENTI
                                 </a>
                    </section>             
                </div>
                
                
            </div>
        </div>
    
    <!-- Placed js at the end of the document so the pages load faster -->
	<!--Modali PER RESET-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_reset" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Resettare apertura clienti?</span></h4>
            </div>
            <div class="modal-body">
                 <a href="javascript:;" id="reset"  class="btn btn-danger btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript:;" class="btn btn-danger btn-sm" data-dismiss="modal"><span name="lbl" caption="No">No</span></a>
				</form>
            </div>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_resetF" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Resettare apertura Fiere?</span></h4>
            </div>
            <div class="modal-body">
                 <a href="javascript:;" id="resetF"  class="btn btn-danger btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript:;" class="btn btn-danger btn-sm" data-dismiss="modal"><span name="lbl" caption="No">No</span></a>
                </form>
            </div>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_resetC" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Resettare apertura Commesse?</span></h4>
            </div>
            <div class="modal-body">
                 <a href="javascript:;" id="resetC"  class="btn btn-danger btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript:;" class="btn btn-danger btn-sm" data-dismiss="modal"><span name="lbl" caption="No">No</span></a>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/MODALI PER RESET-->
<!--Modal Edit Option-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_edit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Modifica Opzione</span></h4>
            </div>
            <div class="modal-body">
               <form id="edit_option" role="form"  action="javascript:;" method="POST" >
                                <div class="form-group">
                                    <label for="nome">Opzione:</label>
                                   <input type="text" class="form-control" id ='valore' name="valore" />
                                </div>
				<a  href="javascript:;" class="btn btn-info" id='editSetting'><i class="fa fa-refresh">&nbsp</i>Modifica</a>

				</form>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<!--Modal Confirm Delete-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Cancellare elemento ?</span></h4>
            </div>
            <div class="modal-body">
                 <a href="javascript:;" id="DYES"  class="btn btn-warning btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript:;" class="btn btn-warning btn-sm" data-dismiss="modal"><span name="lbl" caption="No">No</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<!--Modal save-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_save" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Tabella Salvata</span></h4>
            </div>
            <div class="modal-body">
                 
                 <a href="javascript:;" class="btn btn-info btn-sm" data-dismiss="modal"><span name="lbl" caption="No">OK</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<!--Modal Create-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_create" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Crea Nuova Voce</span></h4>
            </div>
            <div class="modal-body">
               <form id="setting_create" role="form"  action="javascript:;" method="POST" >
                            
                                
                                   
                                    
                                
                                <div class="form-group">
                                    <label for="nome">Valore:</label>
                                   <input type="text" class="form-control" id ='Nvalore' name="valore" />
                                </div>
								
                            
				<a  href="javascript:;" class="btn btn-info link" id='addSetting'><i class="fa fa-plus">&nbsp</i>Aggiungi</a>

				</form>
            </div>
        </div>
    </div>
</div>

  
 <!--il nostro imp che lavora sodo! e valida le form-->
 <script src="js_sw/imp_validation.js"></script>


 
<!--script src="js_sw/clienti.js"></script-->     
<script type="text/javascript" src='js_sw/settings.js'></script>

</div>



