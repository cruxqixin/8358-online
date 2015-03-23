 
$(function(){
   	   
	 /* $(".Navbg ul li").mouseover(function(){
		 $(this).attr("class","cur");
		 $(this).find(".active").show();
		 $(this).find(".default").hide();
	  })
	   $(".Navbg ul li").mouseout(function(){
		 $(this).attr("class","");
		 $(this).find(".active").hide();
		 $(this).find(".default").show();
	  })*/
	   $(window).scroll(function(){
		 var scrolltop=$(window).scrollTop();
		 
		 $("[class=index_15]").stop().animate({top:scrolltop+600});  
	   })
	   $(".server_06 ul li").click(function(){
		  $(this).attr("class","cur").siblings().attr("class","");
		  $(".acpic").hide();
		  $(".norpic").show();
		  $(this).find(".acpic").show(); 
		  $(this).find(".norpic").hide(); 
		  $(".server_07 .con").eq($(this).index()).show().siblings().hide();  
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
 