<div id="clienti">
<!--dynamic table-->
    <link href="js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />



        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading blue">
                        Clienti
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:routine('clienti', 'goback', 'home');" class="fa fa-arrow-left"></a>
                         </span>
                    </header>              
                    <div class="panel-body">
                        <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table">
                        <thead>
                        <tr>
                            <th>Codice DB</th>
                            <th>Ragione Sociale</th>
                            <th>Tipo</th>
                            <th>Città</th>
                            <th>Provincia</th>
                            <th>Indirizzo</th>
                           
                            <th class="hidden-phone">Apri</th>
                            <th class="hidden-phone">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($items as $item) {?>
                            
                        <tr class="gradeX <? if ($item["inuse"]=='1') echo "inuse"?>" id='<?=$item['id'];?>'>
                            <td><?=$item['id'];?></td>
                            <td id="cliente_nome"><?=$item['nome'];?></td>
                            <td><?=$item['tipologia'];?></td>
                            <td><?=$item['citta'];?></td>
                            <td><?=$item['provincia'];?></td>
                            <td><?=$item['via'];?></td>
                            <td class="center hidden-phone"><a href="javascript:routine('clienti', 'goto','<?=$item['id'];?>')" class="btn btn-info link" data-module='clienti' data-method='goto' data-target='<?=$item['id'];?>'><i class="fa fa-refresh goto_inner">&nbsp</i>Apri</a></td>
                            <td class="center hidden-phone"><a href="javascript:localStorage.setItem('delete_module', 'clienti');localStorage.setItem('delete_id', '<?=$item['id'];?>');routine('confirm', 'modal','delete');" class="btn btn-warning confirm_delete" data-target="<?=$item['id'];?>" ><i class="fa fa-trash-o" >&nbsp</i>Elimina</a></td>
                            
                        </tr>
                        
                      <?}?>
                        </tbody>
                        </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>
<!--Modal Confirm Link-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalconfirm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Sei sicuro di voler continuare</span></h4>
            </div>
            <div class="modal-body">
                 <a href="javascript: var force = true; callforce(force);" id="CloseForceAss"  class="btn btn-info btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript: var force = false; callforce(force);" class="btn btn-warning btn-sm"><span name="lbl" caption="Edit">No</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->

<!--Modal Confirm Button-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalconfirmB" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Sei sicuro di voler continuare</span></h4>
            </div>
            <div class="modal-body">
                 <a href="javascript: var force = true; callforce(force);" id="CloseForceAss"  class="btn btn-info btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript: var force = false; callforce(force);" class="btn btn-warning btn-sm"><span name="lbl" caption="Edit">No</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->   
<!--dynamic table-->
<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script> 


  <script>
    jQuery(document).ready(function() {
      
           
    });
    
</script>


  
 

</div>



