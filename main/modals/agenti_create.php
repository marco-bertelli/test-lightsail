<!--Modal Confirm Link-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_agenti_create" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Crea Nuovo Contatto</span></h4>
            </div>
            <div class="modal-body">
               <form id="agenti_create" role="form"  action="javascript:routine('agenti', 'inner_create', localStorage.idAzienda);" method="POST" >
                            
                                
                                   
                                  
                                
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                   <input type="text" class="form-control giusto" id ='nome' name="nome" required />
                                </div>
								<div class="form-group">
                                    <label for="nome">Cognome:</label>
                                   <input type="text" class="form-control giusto" id ='cognome' name="cognome" required />
                                </div>
								<div class="form-group">
                                    <label for="nome">Mail:</label>
                                   <input type="text" class="form-control giusto" id ='mail' name="mail" required/>
                                </div>
                            
				<a  href="javascript:routine('agenti', 'inner_create', localStorage.idAzienda);" class="btn btn-info link"><i class="fa fa-refresh">&nbsp</i>Crea</a>

				</form>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<script>
    jQuery(document).ready(function() {
		console.log ("ready di modal agenti create");
        $("#nome").val('');
        $("#cognome").val('');
        $("#mail").val('');
		$("#modal_agenti_create").modal('show');
        
    });
</script>
