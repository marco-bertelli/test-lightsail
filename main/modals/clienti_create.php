<!--Modal Confirm Link-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_clienti_create" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Crea Nuovo Cliente</span></h4>
            </div>
            <div class="modal-body" id='ancora'>
               <form id="clienti_create" role="form"  action="javascript:routine('clienti', 'create','');" method="POST" >
                            
                                
                                   
                                 
                                
                                <div class="form-group">
                                    <label for="nome">Ragione Sociale:</label>
                                   <input type="text" class="form-control giusto" id ='nome' name="nome" autofocus required/>
                                </div>
								<div class="form-group">
                                    <label for="nome">Codice Fiscale:</label>
                                   <input type="text" class="form-control giusto" name="CF" required />
                                </div>
								<div class="form-group">
                                    <label for="nome">Partita IVA:</label>
                                   <input type="text" class="form-control giusto" name="PIVA" required />
                                </div>
                            
				<a  id ='crea' href="javascript:;" class="btn btn-info link"><i class="fa fa-refresh">&nbsp</i>Crea</a>

				</form>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<script>
    jQuery(document).ready(function() {
		console.log ("ready di modal clienti create");
		$("#modal_clienti_create").modal('show');
		
		$("#modal-content").on("click", "#associa", function(){
			//alert("ops");
		});
		$("#crea").on("click", function(){
			$data = $("#clienti_create").serializeArray();
			console.log($data);
			$.ajax({
				type:'POST',
				url:'ajax/clienti.php',
				data:{data: $data, modulo:'clienti',  metodo:'check_create', target:''},
				success: function(response){
					console.log(response);
					if (response==1){
						routine('clienti', 'create','');
					}
					else
					{
						$("#ancora").empty();
						//$(".modal-body").append("Cliente già inserito da un altro utente vuoi associarlo anche al tuo account ? <br><a id='associa' href='javascript:;' class='btn btn-info link'><i class='fa fa-refresh'>&nbsp</i>Associa</a>");
						$("#ancora").append(response);
					}
					//$("#module").append(response);
				}
			});
		});
	});

</script>