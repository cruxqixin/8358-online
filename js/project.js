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
			$(this).find(".itemshow table").each(function(){
				if($(".itemshow table").index($(this))%5==4){
					$(this).css("border-right","1px solid #D9D9D9");
				}	
			})
			$(this).find(".itemshow:last table").css("border-right","1px solid #D9D9D9");
		})
			
	
		$("#showi").height(Math.ceil($(".itemshow").size()/5)*32);

	
	$(".item-div span").live({
		mouseenter:
	   	function()
	   	{
			$(this).addClass("itemhover");
	   	},
	   	mouseleave:
	   	function()
	   	{
			$(this).removeClass("itemhover");
	   	}	
	})
	
	//学校
	$("#showschool").unbind("hover");
	$("#showschool").hover(function(){
		$(this).find(".itemsnextshow").show().css("margin-left","-"+($(this).parent().find(".itemshow").index($(this))%5)*120+"px");
		$(this).find("table").addClass("showtable");
		$(this).find("table").css("border-bottom","none");
		$(this).find(".down").attr("class","up");
		if($(this).find(".item-div").size()<1){
			var bastStr="";
			
			var obj=eval("("+schools+")");
			
			for(var items in obj){
				bastStr+="<div class=\"item-div\">";
				bastStr+="<dl>";
				bastStr+="<dt><span>"+items+"</span></dt>";
				bastStr+="<dd>";	
				
				for(var items2 in obj[items]){
					bastStr+="<span onclick=\"doschoolsubmit('"+obj[items][items2]["userid"]+"','"+obj[items][items2]["cname"]+"')\">"+obj[items][items2]["cname"]+"</span>";	
				}
				
				bastStr+="</dd>";
				bastStr+="</dl>";
				bastStr+="</div>";
			}
			$(this).find(".itemsnextshow").append(bastStr);
		}
		
	},function(){
			$(this).find(".itemsnextshow").hide();
			$(this).find("table").removeClass("showtable");
			$(this).find("table").css("border-bottom","1px solid #D9D9D9");
			$(this).find(".up").attr("class","down");
	})
	//企业
	$("#showcompany").unbind("hover");
	$("#showcompany").hover(function(){
		$(this).find(".itemsnextshow").show().css("margin-left","-"+($(this).parent().find(".itemshow").index($(this))%5)*120+"px");
		$(this).find("table").addClass("showtable");
		$(this).find("table").css("border-bottom","none");
		$(this).find(".down").attr("class","up");
		if($(this).find(".item-div").size()<1){
			var bastStr="";
			var obj=eval("("+companys+")");
			for(var items in obj){
				bastStr+="<div class=\"item-div\">";
				bastStr+="<dl>";
				bastStr+="<dt><span>"+items+"</span></dt>";
				bastStr+="<dd>";	
				
				for(var items2 in obj[items]){
					bastStr+="<span onclick=\"docompanysubmit('"+obj[items][items2]["userid"]+"','"+obj[items][items2]["cname"]+"')\">"+obj[items][items2]["cname"]+"</span>";	
				}
				
				bastStr+="</dd>";
				bastStr+="</dl>";
				bastStr+="</div>";
			}
			$(this).find(".itemsnextshow").append(bastStr);
		}
		
	},function(){
			$(this).find(".itemsnextshow").hide();
			$(this).find("table").removeClass("showtable");
			$(this).find("table").css("border-bottom","1px solid #D9D9D9");
			$(this).find(".up").attr("class","down");
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

