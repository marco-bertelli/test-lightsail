<!--Modal Confirm Link-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_clienti_delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Sei sicuro di voler continuare</span></h4>
            </div>
            <div class="modal-body">
                 <a href="javascript:routine('clienti', 'unlink','')" id="CloseForceAss"  class="btn btn-warning btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="#" class="btn btn-warning btn-sm"><span name="lbl" caption="Edit">No</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<script>
    jQuery(document).ready(function() {
		console.log ("ready di modal clienti");
		$("#modal_clienti_delete").modal('show');
    });
</script>