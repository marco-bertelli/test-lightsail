<!--Modal Scegli clienti-->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_scegli_pr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Scegli il Pr da Abbinare</span></h4>
            </div>
            <div style="padding-bottom: 100px;" class="modal-body">
                 <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table5">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>                             
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach ($prs as $pr) {?>                            
                        <tr class="gradeX">
                            <td><?=$pr['name'];?></td>                                       
                            <td class="center hidden-phone"><a id="<?=$pr['id'];?>" data-nome="<?=$pr['name'];?>" href="javascript:;" class="btn btn-info pick_button "><i class="fa fa-refresh">&nbsp</i>Scegli</a></td>
                        </tr>       
                        <?}?>
                        </tbody>
                        </table>                            
                        </div>
            </div>
        </div>
    </div>


<!--/Modal-->
<script>
    jQuery(document).ready(function() { 
        console.log ("ready di  modal_scegli_cliente");
         //SCRIPT PER TABELLA CON CERCA INTERNO DA ABILITARE SE SERVE
         /*$('#dynamic-table5').dataTable( {
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
    } );  */
        
        $("#modal_scegli_pr").modal('show');
        
        $("#modal_scegli_pr").on ('click', '.pick_button' ,  function (){ 
            $SelName = $(this).attr("data-nome");         
            $SelId= $(this).attr("id");
            //alert($SelId);
                
                $("#piked_pr").val('');
                $("#pr_name").val('');
                $("#piked_pr").val($SelId);
                $("#pr_name").val($SelName);
             $("#modal_scegli_pr").modal('hide');            
        }); 
        
        
        
        
    });
    
    
</script>
</div>