$().ready(function(){
     
	$clicked =  localStorage.getItem('clicked');
   if ($clicked) {
     $('html, body').animate({
            scrollTop: $clicked + 'px'
        }, 100);
         localStorage.setItem('clicked', false);
   }
       // scrollTo(localStorage.getItem('element_clicked')); 

   $(" .btn").click(function(){
	   
		
        $clicked = $(window).scrollTop();
        localStorage.setItem('clicked', $clicked);
     
    });     
});
