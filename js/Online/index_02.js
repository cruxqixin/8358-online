// JavaScript Document
function nTabs2(thisObj,Num){
if(thisObj.className == "active2")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
if (i == Num)
{
   thisObj.className = "active2"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block"; 
}else{
   tabList[i].className = "normal2"; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
}
} 
}// JavaScript Document

 $(".application-06 dt").hide();
$(".application-06 dd").click(function(){
   if($(this).hasClass("expend"))
   {
	   $(this).next().hide(); 
	   $(this).attr("class","expend");  
		
   }
   else{
	  $(".application-06 dt").hide();
	  $(".application-06 dd").attr('class','normal');
	   $(this).attr("class","expend"); 
	  $(this).next().show();   
   }	
})

$(function(){
	$(".main-right li").click(function(){
		var n = $(".main-right li ").index($(this))
		$(".main-right .yellowbut").hide();
		$(".main-right .yellowbut").eq(n).show();	
	})
	$("#list li .normal").each(function(i){
		$(this).mouseover(function(){
		    $(this).parent().find(".sbox").css("left","-"+(i%4)*164+"px");  
		})
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













