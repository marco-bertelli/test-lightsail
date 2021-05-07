<!--Modal Confirm Link-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_interessi_create" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Crea Nuovo Interesse</span></h4>
            </div>
            <div class="modal-body">
               <form id="interessi_create" role="form"  action="javascript:routine('interessi', 'inpage_create', '');" method="POST" >
                            
                                
                                   
                                    <input type="hidden"  name="edit_count" value="<?=$item['edit_count']?>"/>
                                
                                <div class="form-group">
                                    <label for="nome">Sigla:</label>
                                   <input type="text" class="form-control giusto"  name="sigla_interesse" />
                                </div>
								<div class="form-group">
                                    <label for="nome">Descrizione:</label>
                                   <input type="text" class="form-control giusto"  name="descrizione_interesse" />
                                </div>
								<div class="form-group">
                                    <label for="nome">Tipo:</label>
                                   <input type="text" class="form-control giusto"  name="tipo_interesse" />
                                </div>
                            
				<a  href="javascript:routine('interessi', 'inpage_create', 'vuoto');" class="btn btn-info link"><i class="fa fa-refresh">&nbsp</i>Crea</a>

				</form>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<script>
    jQuery(document).ready(function() {
		console.log ("ready di modal interessi create");
		$("#modal_interessi_create").modal('show');
    });
</script>
