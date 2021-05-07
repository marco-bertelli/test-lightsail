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
			data:{modulo:'clienti',  metodo:'associa_cliente', target:$(this).attr("data-id")},
			success: function(response){
				$('#module').empty();
				$("#module").append(response);
				$('#module').show();
				localStorage.setItem("position", "create");
				localStorage.setItem("modulo", "clienti");
				localStorage.setItem('modulo_attuale', "clienti");
			}
		});
		$("#modal_clienti_create").modal('hide');	
	});
</script>