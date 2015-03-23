 
$(function(){
   	
	  $("#subMenu li .link").mouseover(function(){
		 $(this).attr("class","cur");  
		 $(this).parent().find(".sublist").show();
	  })
	   $("#subMenu li .link").mouseout(function(){
		 $(this).attr("class","link");  
		 $(this).parent().find(".sublist").hide();
	  })
	  $(".sublist").mouseover(function(){
		  $(this).show();
		  $(this).parent().find(".link").attr("class","cur");  
	  }) 
	  $(".sublist").mouseout(function(){
		  $(this).hide();
		  $(this).parent().find(".cur").attr("class","link");  
	  }) 
	   $("#tab li").click(function(){
		  $(this).attr("class","cur").siblings().attr("class","link");  
		  $(".index_12 .box").eq($(this).index()).show().siblings().hide();
	  })
	  
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
	   
	  $("#btndui").click(function(){
		  $(".showboxbg").show();
		  $(".showboxbg").height($(document).height());
	  }) 
	  $("#closebox").click(function(){
		   $(".showboxbg").hide();
	   }) 
	    $("#center_product li").click(function(){
		    $(this).attr("class","current").siblings().attr("class","");
			$("#neirong .content").eq($(this).index()).show().siblings().hide();	
	    })
	   
	   $(".regbox_01 ul li:last").css("background","none");
	   
	  $("[class=txtbg]").each(function(){
		 var defaultVal=$(this).val();//将各个input的默认值都保存出来。
		  $(this).focus(function(){
			if($(this).val()==defaultVal)
			  {
				  $(this).val("");//获得焦点时进行判断，如果当前的value值是默认的才进行清空
			  } 
		  })
		  $(this).blur(function(){
			if($(this).val().length==0)
			 {
				 $(this).val(defaultVal);  //失去焦点时进行判断，如果value值的长度等于0（也就是空的时候，//没有输入内容的清空下），将原先保存的value值写入
			 }
		  })
		 
	  })
	  
	   
})
 