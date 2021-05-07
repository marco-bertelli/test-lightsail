
    
        
            $("form :input").on("input", function() {
                //alert("Change to " + this);
                 localStorage.setItem('change_form',"1"); 
                $(this).css("border" , "1px solid #1FB5AD");
            });
        
        
        $(".fa-arrow-left").on("click", function (){
			//console.log("back" + localStorage.change_form );
            if (localStorage.change_form == 1) {
            localStorage.setItem('change_form',"0"); 
            $("#modal_back").modal('show');             
            } else  {
                 routine(localStorage.modulo, 'goback', localStorage.modulo_attuale);
                
            }
        });
    
        
  