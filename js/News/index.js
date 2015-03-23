$(function(){
	$(".main-right li").click(function(){
		var n = $(".main-right li ").index($(this))
		$(".main-right .yellowbut").hide();
		$(".main-right .yellowbut").eq(n).show();	
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
})














