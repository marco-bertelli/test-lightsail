<p>
Cliente già inserito da un altro utente vuoi associarlo anche al tuo account ? <br>
Una e-mail di notifica verrà inviata all'amministratore.
</p>
<a data-id='<?=$check[0]["id"]?>'id='associa' class='btn btn-info link'><i class='fa fa-refresh'>&nbsp </i>Associa</a>

<script type="text/javascript">
	$("#associa").click(function (){
		
		$.ajax({
			type:'POST',
			url:'ajax/clienti.php',
			data:{modulo:'clienti',  metodo:'calendarAssocia_cliente', target:$(this).attr("data-id")},
			success: function(response){
				var data = $.parseJSON(response);
				$("#cliente-2 input").each(function( replace ) {
                                  var pointer = $(this).attr("name");
                                  console.log("pointer", pointer  ); 
                                   $(this).val(data[pointer]);
                                });
			}
		});
		$("#modal_scegli_cliente").modal('hide');	
	});
</script>