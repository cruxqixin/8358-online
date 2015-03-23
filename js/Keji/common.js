 
$(function(){
   	
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
	   $("#showbut").click(function(){
		  $(".botmtext").show();
		  $(".botmtext").height($(document).height());
	  })
	  $("#hidebut").click(function(){
		   $(".botmtext").hide();
	   }) 
})
 