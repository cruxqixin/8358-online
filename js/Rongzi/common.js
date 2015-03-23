 
$(function(){
   	   
	/*  $(".Navbg ul li").mouseover(function(){
		 $(this).attr("class","cur");
		 $(this).find(".active").show();
		 $(this).find(".default").hide();
	  })
	   $(".Navbg ul li").mouseout(function(){
		 $(this).attr("class","");
		 $(this).find(".active").hide();
		 $(this).find(".default").show();
	  })*/
	    $("#index").find("#z_index").attr("class", "cur");
		$("#service").find("#z_service").attr("class", "cur");
		$("#zixun").find("#z_zixun").attr("class", "cur");
		$("#cxzixun").find("#z_cxzixun").attr("class", "cur");
		$("#jsh").find("#z_jsh").attr("class", "cur");
		$("#dzh").find("#z_dzh").attr("class", "cur");
	 
	
	   $(window).scroll(function(){
		 var scrolltop=$(window).scrollTop();
		 
		 $("[class=index_15]").stop().animate({top:scrolltop+400});  
	   })
	   $(".server_06 ul li").click(function(){
		  $(this).attr("class","cur").siblings().attr("class","");
		  $(".acpic").hide();
		  $(".norpic").show();
		  $(this).find(".acpic").show(); 
		  $(this).find(".norpic").hide(); 
		  $(".server_07 .con").eq($(this).index()).show().siblings().hide();  
		})
	  
	  $(".tab ul li:last").css("margin-right","0px");
	  $("#tabLi li").click(function(){
		 //Bindclickinfo
		 //$(this).attr("class","cur").siblings().attr("class",""); 
		 //changecss
		 $(this).parent().find('[name="lidiv"]').attr("class","box2");
		 $(this).find('[name="lidiv"]').attr("class","box");
		 var c  = $(this).index();
		 if(c=="0")
		 {
			
			  $('#apic0').attr("src","/images/Rongzi/215left1.png");
			  $('#apic1').attr("src","/images/Rongzi/215right2.png");
		 }
	     else
	     {
			    
			   $('#apic0').attr("src","/images/Rongzi/215left2.png");
			   $('#apic1').attr("src","/images/Rongzi/215right1.png"); 
		 }
		 $(".panner .con").eq($(this).index()).show().siblings().hide(); 
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
 