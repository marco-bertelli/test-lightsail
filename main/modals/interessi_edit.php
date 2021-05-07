<!--Modal Confirm Link-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_interessi_edit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Modifica interesse</span></h4>
            </div>
            <div class="modal-body">
               <form id="interessi_" class='qui' role="form"  action="javascript:routine('interessi', 'edit', localStorage.edit_id);" method="POST" >
                 
					<div class="form-group">
						<label for="nome">Sigla:</label>
					   <input type="text" class="form-control"  name="sigla_interesse" />
					</div>
					<div class="form-group">
						<label for="nome">Descrizione:</label>
					   <input type="text" class="form-control"  name="descrizione_interesse" />
					</div>
					<div class="form-group">
						<label for="nome">Tipo:</label>
					   <input type="text" class="form-control"  name="tipo_interesse" />
					</div>
                            
				<a  href="javascript:routine('interessi', 'edit', localStorage.edit_id);" class="btn btn-info link"><i class="fa fa-refresh">&nbsp</i> Modifica</a>

				</form>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<script>
    jQuery(document).ready(function() {
		console.log ("ready di modal interessi edit");
		console.log (localStorage.edit_id);
		$("#modal_interessi_edit").find(".qui").attr("id", "interessi_"+localStorage.edit_id);
		console.log($("#"+localStorage.edit_id).children().first().text());
		$("input[name='sigla_interesse']").val($("#"+localStorage.edit_id).children().first().text());
		$("input[name='descrizione_interesse']").val($("#"+localStorage.edit_id).children().first().next().text());
		$("input[name='tipo_interesse']").val($("#"+localStorage.edit_id).children().first().next().next().text());
		$("#modal_interessi_edit").modal('show');
		
    });
</script>
