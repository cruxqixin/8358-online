 
$(function(){
   	   
	 $(".product ul li:last").css("border-bottom-style","solid");
	   
	 $("#list li .normal").mouseover(function(){
		 $(this).attr("class","active");  
		 $(this).parent().find(".sbox").show();
		 $(this).parent().find(".hidbox").show();
		 $(this).parent().find(".hidbox").height($(this).parent().find(".sbox").height());
		 
	  })
	   $("#list li .normal").mouseout(function(){
		 $(this).attr("class","normal");  
		 $(this).parent().find(".sbox").hide();
		 $(this).parent().find(".hidbox").hide();
		 
	  })
       $(".sbox").mouseover(function(){
		  $(this).show();
		  $(this).parent().find(".normal").attr("class","active");  
		  $(this).parent().find(".hidbox").show();
	  }) 
	  $(".sbox").mouseout(function(){
		  $(this).hide();
		  $(this).parent().find(".active").attr("class","normal"); 
		  $(this).parent().find(".hidbox").hide(); 
	  })  	
	  
	  $("[class=txt]").each(function(){
		 var defaultVal=$(this).val();
		  $(this).focus(function(){
			if($(this).val()==defaultVal)
			  {
				  $(this).val("");
			  } 
		  })
		  $(this).blur(function(){
			if($(this).val().length==0)
			 {
				 $(this).val(defaultVal); 
			 }
		  })
		 
	  })
	    
})
 