$(function(){
		$(".itemshow").hover(function(){
			$(this).find(".itemsnextshow").show().css("margin-left","-"+($(this).parent().find(".itemshow").index($(this))%5)*120+"px");
			$(this).find("table").addClass("showtable");
			$(this).find("table").css("border-bottom","none");
			$(this).find(".down").attr("class","up");
		},
		function(){
			$(this).find(".itemsnextshow").hide();
			$(this).find("table").removeClass("showtable");
			$(this).find("table").css("border-bottom","1px solid #D9D9D9");
			$(this).find(".up").attr("class","down");
		});
		
		$(".export_08 li").each(function(){
			
			var tab=$(this).find(".itemshow table");
			tab.each(function(){
				if(tab.index($(this))%5==4){
					$(this).css("border-right","1px solid #D9D9D9");
				}	
			})
			$(this).find(".itemshow:last table").css("border-right","1px solid #D9D9D9");
		})
			
	
	$("#showi1").height(Math.ceil($("#showi1 .itemshow").size()/5)*32);
	$("#showi2").height(Math.ceil($("#showi2 .itemshow").size()/5)*32);
	$("img").error(function(){
		$(this).attr("src","/images/nopic.jpg");	
	})
	
})


function doschoolsubmit(sid,sname){
	$("#seafcid").remove();
	$("#seafcname").remove();
	if($("#seafsid").size()>0){
		$("#seafsid").val(sid);
		$("#seafsname").val(sname);
	}else{
		var html="<input type=\"hidden\" name=\"sid\" value=\""+sid+"\" />";
		html+="<input type=\"hidden\" name=\"sname\" value=\""+sname+"\" />";
		$("#dosearchform").append(html);
	}
	$("#dosearchform").submit();
}

function docompanysubmit(cid,cname){
	$("#seafsid").remove();
	$("#seafsname").remove();
	if($("#seafcid").size()>0){
		$("#seafcid").val(cid);
		$("#seafcname").val(cname);
	}else{
		var html="<input type=\"hidden\" name=\"cid\" value=\""+cid+"\" />";
		html+="<input type=\"hidden\" name=\"cname\" value=\""+cname+"\" />";
		$("#dosearchform").append(html);
	}
	$("#dosearchform").submit();
}

