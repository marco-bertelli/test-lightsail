 jQuery(document).ready(function() {
		console.log ("ready di settings");
		$pick="no";
		$targetSetting='';
		$targetDiv='';
				// RESETTA CLIENTI
	$("#reset_clienti").click(function(){
		$("#modal_reset").modal("show");
	});
    $("#reset_clientiC").click(function(){
        $("#modal_resetC").modal("show");
    });
    $("#reset_clientiF").click(function(){
        $("#modal_resetF").modal("show");
    });
	// RESETTA CLIENTI
	$("#reset").click(function(){
	
		$.ajax({
				type:'POST',
				url:'ajax/clienti.php',
				data:{modulo:'clienti', metodo:'reset', target:''},
				success: function(response){
					$("#modal_reset").modal("hide");
					//alert (response);
					//alert("fatto giro ajax");
				}
			});
	});
    // RESETTA FIERE
    $("#resetF").click(function(){
    
        $.ajax({
                type:'POST',
                url:'ajax/fiere.php',
                data:{modulo:'fiere', metodo:'reset', target:''},
                success: function(response){
                    $("#modal_resetF").modal("hide");
                    //alert (response);
                    //alert("fatto giro ajax");
                }
            });
    });
    // RESETTA COMMESSE
    $("#resetC").click(function(){
    
        $.ajax({
                type:'POST',
                url:'ajax/stand.php',
                data:{modulo:'stand', metodo:'reset', target:''},
                success: function(response){
                    $("#modal_resetC").modal("hide");
                    //alert (response);
                    //alert("fatto giro ajax");
                }
            });
    });
	// MODIFICA OPZIONE
	$(".edit_choice").click(function(){
		$targetSetting=$(this).parent().prev();
		$targetDiv=$(this).parents(".panel-body").attr("id");
		//$targetDiv=$(this).parent().prev().parent();
		console.log($targetSetting.text());
		$("#modal_edit").modal("show");
		$("#modal_edit").find("input").val($targetSetting.text());
	});
	//CLICK MODIFICA OPZIONE
	$("#editSetting").click(function(){
		$("#modal_edit").modal("hide");
		console.log($("#valore").val());
		$($targetSetting).text($("#valore").val());
		//VECCHIO PER BOTTONE$($targetSetting).text("<button type='button' class='btn btn-info choice buttonstyle'> "+$("#valore").val()+" <i class='fa fa-trash-o' >&nbsp</i> </button>");
		saveSetting($targetDiv);
		
	});
	
       //CANCELLA ELEMENTO MODALE
	$(".delete_choice").click(function(){
		 $toremove=$(this).parent().parent();
		 console.log($toremove);
		 $("#modal_delete").modal("show");
    });
	//CANCELLA ELEMENTO POST MODALE
	$("#DYES").click(function(){
		$("#modal_delete").modal("hide");
		$targetDiv=$toremove.parents(".panel-body").attr("id");
		$toremove.remove();
		console.log($targetDiv);
		saveSetting($targetDiv);
		/*
		$stringatosave='';
		console.log("divriferimento: "+$target);
		$divforeach.find(".choice" ).each(function( index ) {
		console.log( index + ": " + $( this ).text() );
		$stringatosave=$stringatosave+$.trim($( this ).text())+",";
		});
		$stringatosave=$stringatosave.slice(0,-1);
		console.log($stringatosave);
		$.ajax({
			type:'POST',
			url:'ajax/settings.php',
			data:{data: $stringatosave, modulo:'settings',  metodo:'edit', target:$target},
			success: function(response){
				//$("#module").append(response);
				//alert("fatto giro ajax");
			}
		});*/
		});
		
	//AGGIUNGI OPZIONE MODALE
	$(".add").click(function(){
			//$targetSetting=$(this).prev().find("gradeX").parent().attr("id");
		$targetDiv=$(this).parents(".panel-body").attr("id");
		$targetSetting=$(this).parent().find("#opzioni_holder");
		console.log($targetSetting);
		$("#modal_create").modal("show");
	});
	//AGGIUNGI OPZIONE POST MODALE
	$("#addSetting").click(function(){
		$("#modal_create").modal("hide");
		console.log($("#Nvalore").val());
		//$($targetSetting).append("<button type='button' class='btn btn-info choice buttonstyle'> "+$("#valore").val()+" <i class='fa fa-trash-o' >&nbsp</i> </button>");
		$($targetSetting).append(
		"<tr class='gradeX'>"
		+"<td class='choice'>"+$("#Nvalore").val()+"</td>"
		+"<td class='center hidden-phone'><a href='javascript:;' class='btn btn-info link edit_choice'><i class='fa fa-refresh'>&nbsp</i>Modifica</a></td>"
		+"<td class='center hidden-phone'><a href='javascript:;' class='btn btn-warning delete_choice'><i class='fa fa-trash-o' >&nbsp</i>Elimina</a></td>"
		+"</tr>"
		);
		
		console.log($targetDiv);
		saveSetting($targetDiv);
	});
		//ORMAI INUTILIZZATO PERCHE' CHIAMATO IL METODO ESTERNO saveSetting dopo ogni azione (modifica, cancella o aggiungi)
	   $(".save").click(function(){
		   $stringatosave='';
		   $target=$(this).parent().attr("id");
		   console.log("divriferimento: "+$target);
		   $(this).prev().prev().find(".choice" ).each(function( index ) {
			console.log( index + ": " + $( this ).text() );
			$stringatosave=$stringatosave+$.trim($( this ).text())+",";
			});
			$stringatosave=$stringatosave.slice(0,-1);
		   console.log($stringatosave);
			$.ajax({
				type:'POST',
				url:'ajax/settings.php',
				data:{data: $stringatosave, modulo:'settings',  metodo:'edit', target:$target},
				success: function(response){
					$("#modal_save").modal('show');
					//alert("fatto giro ajax");
				}
			});
	   });
		
		  $('.panel .tools .fa').click(function () {
            var el = $(this).parents(".panel").children(".panel-body");
            if ($(this).hasClass("fa-chevron-up")) {
                $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
                el.slideUp(200);
            } else {
                $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
                el.slideDown(200); }
        });
        
        var chiudo =  $('.chiudo').parents(".panel").find("a.fa-chevron-up");;
        if (chiudo.hasClass("fa-chevron-up")) {
            chiudo.removeClass("fa-chevron-up").addClass("fa-chevron-down");
            $('.chiudo').hide();
         }
		
    });
	
	
	function saveSetting ($targetDiv)
	{
		$targetDiv=$("#"+$targetDiv);
		console.log($targetDiv);
		$stringatosave='';
		console.log("divriferimento: "+$targetDiv.attr("id"));
		$targetDiv.find(".choice" ).each(function( index ) {
		console.log( index + ": " + $( this ).text() );
		$stringatosave=$stringatosave+$.trim($( this ).text())+",";
		});
		$stringatosave=$stringatosave.slice(0,-1);
		console.log($stringatosave);
		$.ajax({
			type:'POST',
			url:'ajax/settings.php',
			data:{data: $stringatosave, modulo:'settings',  metodo:'edit', target:$targetDiv.attr("id")},
			success: function(response){
				//$("#module").append(response);
				//alert("fatto giro ajax");
			}
		});
	}