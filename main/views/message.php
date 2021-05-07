<!--Modal System Mesasge-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="message" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <!--h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Sei sicuro di voler continuare</span></h4-->
            </div>
            <div class="modal-body">
				<?=end($message)?>
                 <!--a href="javascript: var force = true; callforce(force);" id="CloseForceAss"  class="btn btn-info btn-sm"><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript: var force = false; callforce(force);" class="btn btn-info btn-sm"><span name="lbl" caption="Edit">No</span></a-->
            </div>
        </div>
    </div>
</div>
<!--/Modal-->