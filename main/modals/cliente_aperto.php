<!--Modal save-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_aperto" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera"></span></h4>
            </div>
            <div class="modal-body">
                 
                 <a href="javascript:;" class="btn btn-info btn-sm" data-dismiss="modal"><span name="lbl" caption="No">OK</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
 <script type="text/javascript">
 jQuery(document).ready(function() {
	 $("#modal_aperto h4").empty();
	$("#modal_aperto h4").html("Pagina già in modifica da "+localStorage.blocked_user);
 });
 </script>