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
	$("#showguonei").unbind("hover");
	$("#showguonei").hover(function(){
		$(this).find(".itemsnextshow").show().css("margin-left","-"+($(this).parent().find(".itemshow").index($(this))%5)*120+"px");
		$(this).find("table").addClass("showtable");
		$(this).find("table").css("border-bottom","none");
		$(this).find(".down").attr("class","up");
		if($(this).find(".item-div").size()<1){
			var bastStr="";
			var tempitem;
			for(var obj=0;obj<dsy.Items["0"].length;obj++){	
				bastStr+="<div class=\"item-div\">";
				bastStr+="<dl>";
				bastStr+="<dt style=\"width:auto;\"><span>"+dsy.Items["0"][obj]+"</span></dt>";
				bastStr+="<dd style=\"margin-left:20px;\">";
				
				tempitem=dsy.Items["0_"+obj];
				if(tempitem.length==1){
					tempitem=dsy.Items["0_"+obj+"_0"];
				}
				for(var items2=0;items2<tempitem.length;items2++){	
					bastStr+="<span onclick=\"doareasbumit('"+tempitem[items2]+"')\">"+tempitem[items2]+"</span>";	
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
	
	
	$("#showguowai").unbind("hover");
	$("#showguowai").hover(function(){
		$(this).find(".itemsnextshow").show().css("margin-left","-"+($(this).parent().find(".itemshow").index($(this))%5)*120+"px");
		$(this).find("table").addClass("showtable");
		$(this).find("table").css("border-bottom","none");
		$(this).find(".down").attr("class","up");
		if($(this).find(".item-div").size()<1){
			var bastStr="";
			var tempitem;
			
			for(var key in countries){
				if(!key){
					continue;	
				}
				tempitem=countries[key].split('|');
				for(var i=0;i<tempitem.length;i++){
					if(!tempitem[i]){
						continue;	
					}
					
					bastStr+="<div class=\"item-div\">";
					bastStr+="<dl>";
					bastStr+="<dt style=\"width:auto;\"><span>"+tempitem[i]+"</span></dt>";
					bastStr+="<dd style=\"margin-left:20px;\">";
					
					
					tempitem2={};
					if(city_states[tempitem[i]]){
						tempitem2=city_states[tempitem[i]].split('|');
					}else{
						bastStr+="</dd>";
						bastStr+="</dl>";
						bastStr+="</div>";
						continue;	
					}
					for(var j=0;j<tempitem2.length;j++){
						if(tempitem2[j])
							bastStr+="<span onclick=\"doareasbumit('"+tempitem2[j]+"')\">"+tempitem2[j]+"</span>";	
					}
					bastStr+="</dd>";
					bastStr+="</dl>";
					bastStr+="</div>";
				}
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
function doareasbumit(areaname){
	var hidarea=$("#seafarea");
	if(hidarea.size()>0){
		hidarea.val(areaname);
	}else{
		$("#divform").append('<input type="hidden" name="area" id="seafarea" value="'+areaname+'" />');
		
	}
	
	$("#formexpertsidex").submit();
}