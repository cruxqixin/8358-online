$(function(){     
     $("div.m3rc_02").myScroll({speed:40,rowHeight:24});	 
     $("div.m5c_02").myScroll({speed:40,rowHeight:24});
	 
	 $("#nTabs4 li").eq(1).click(function(){
			//学校
			var bastStr='';
			var obj=eval("("+schools+")");
			bastStr+="<span style=\"width:35px;\" onclick=\"showschool('')\">全部</span>";
			for(var items in obj){
				bastStr+="<span onclick=\"showschool('"+items+"')\">"+items+"</span>";
			}
			$("#nTabs4_Content1 .index_02").html(bastStr);
			bastStr="";			
			for(var items in obj){
				bastStr+="<div class=\"index_04_div\" name=\"index_04"+items+"\"><span>"+items+"</span>";
				bastStr+="<div class=\"index_04\" name=\"index_04"+items+"\">";
				for(var items2 in obj[items]){
					//bastStr+="<span onclick=\"doschoolsubmit('"+obj[items][items2]["USERID"]+"','"+obj[items][items2]["CNAME"]+"')\">"+obj[items][items2]["CNAME"]+"</span>";	
					bastStr+="<p class=\"index_04_item\"><a href=\"index.php?a=index&m=Project&g=home&sid="+obj[items][items2]["userid"]+"&sname="+obj[items][items2]["cname"]+"\">"+obj[items][items2]["cname"]+"</a></p>";
				}
				bastStr+="</div></div>";	
			}
			$("#nTabs4_Content1 .index_03").html(bastStr);				
	 })
	 
	 $("#nTabs4 li").eq(2).click(function(){
			//学校			 
			var bastStr='';
			var obj=eval("("+companys+")");
			bastStr+="<span style=\"width:35px;\" onclick=\"showschool('')\">全部</span>";
			for(var items in obj){
				bastStr+="<span onclick=\"showschool('"+items+"')\">"+items+"</span>";
			}			
			$("#nTabs4_Content2 .index_02").html(bastStr);
			bastStr="";
			
			for(var items in obj){
			
				bastStr+="<div class=\"index_04_div\" name=\"index_04"+items+"\"><span>"+items+"</span>";
				bastStr+="<div class=\"index_04\" name=\"index_04"+items+"\">";
				for(var items2 in obj[items]){
					//bastStr+="<span onclick=\"doschoolsubmit('"+obj[items][items2]["USERID"]+"','"+obj[items][items2]["CNAME"]+"')\">"+obj[items][items2]["CNAME"]+"</span>";	
					bastStr+="<p class=\"index_04_item\"><a href=\"index.php?a=index&m=Project&g=home&cid="+obj[items][items2]["userid"]+"&cname="+obj[items][items2]["cname"]+"\">"+obj[items][items2]["cname"]+"</a></p>";
				}
				bastStr+="</div></div>";	
			}
			$("#nTabs4_Content2 .index_03").html(bastStr);				
	 })
	 
	 $("#nTabs5 li").eq(2).click(function(){
			//学校
			return;
			var bastStr='';
			var obj=eval("("+schools+")");
			bastStr+="<span style=\"width:35px;\" onclick=\"showschool('')\">全部</span>";
			for(var items in obj){
				bastStr+="<span onclick=\"showschool('"+items+"')\">"+items+"</span>";
			}
			$("#nTabs5_Content2 .index_02").html(bastStr);
			bastStr="";
			
			for(var items in obj){
				bastStr+="<div class=\"index_04_div\" name=\"index_04"+items+"\"><span>"+items+"</span>";
				bastStr+="<div class=\"index_04\" name=\"index_04"+items+"\">";
				for(var items2 in obj[items]){
					//bastStr+="<span onclick=\"doschoolsubmit('"+obj[items][items2]["USERID"]+"','"+obj[items][items2]["CNAME"]+"')\">"+obj[items][items2]["CNAME"]+"</span>";	
					bastStr+="<p class=\"index_04_item\"><a href=\"index.php?a=index&m=Experts&g=home&sid="+obj[items][items2]["USERID"]+"&sname="+obj[items][items2]["CNAME"]+"\">"+obj[items][items2]["CNAME"]+"</a></p>";
				}
				bastStr+="</div></div>";	
			}
			$("#nTabs5_Content2 .index_03").html(bastStr);				
	 })
	 
	 $("#nTabs5 li").eq(1).click(function(){
			//地区		 
			var bastStr='';
			var obj=eval("("+companys+")");
			bastStr+="<span style=\"width:35px;\" onclick=\"guonei()\">国内</span>";
			bastStr+="<span style=\"width:35px;\" onclick=\"guowai()\">国外</span>";
				
			$("#nTabs5_Content1 .index_02").html(bastStr);
			guonei();
	 })
	 
	 $("#mysearchform").submit(function(){
		if($("#keysearch").val()==""||$("#keysearch").val()=="输入技术关键词"){
			$("#keysearch").focus();
			return false;
		}
		if($("[name=ckpsearch]:checked").val()=="project"){
			 $("#mysearchform_m").val("index");
		}else if($("[name=ckpsearch]:checked").val()=="experts")
		{
			$("#mysearchform_m").val("experts");
	    } else if($("[name=ckpsearch]:checked").val()=="goods")
		{
			$("#mysearchform_m").val("goods");
	    }else 
		{
			$("#mysearchform_m").val("all");
	    }
		
		return true;
	 })
	 $("#asearch").click(function(){
		 if($("#keysearch").val()==""||$("#keysearch").val()=="输入技术关键词"){
			$("#keysearch").focus();
			return false;
		}
		if($("[name=ckpsearch]:checked").val()=="project"){
			 $("#mysearchform_m").val("index");
		}else if($("[name=ckpsearch]:checked").val()=="experts")
		{
			$("#mysearchform_m").val("experts");
	    } else if($("[name=ckpsearch]:checked").val()=="goods")
		{
			$("#mysearchform_m").val("goods");
	    }else 
		{
			$("#mysearchform_m").val("all");
	    }
		 $("#mysearchform").submit();
	 })
	 var item04=$("#nTabs6_Content1 .index_04_item");
	 item04.each(function(){
		if(item04.index($(this))%3==0){
			$(this).css("border-left","none")
		}
	 })
});  

function guonei(){
	
	
	
	var bastStr="";		
	var tempitem;
	//只显示到市
	bastStr+="<div class=\"index_04_div\" name=\"index_04\">";
	for(var obj=0;obj<dsy.Items["0"].length;obj++){	//"<div style=\"overflow:hidden;\"><span style=\"width:auto; padding:auto 9px auto 9px;\">"+dsy.Items["0"][obj]+"</span></div>";
		bastStr+="<div class=\"index_04\" name=\"index_04\" style=\"width:150px; float:left;\">";
		bastStr+="<p class=\"index_04_item\" style=\"width:139px;\"><a href=\"index.php?a=index&m=Experts&g=home&area="+dsy.Items["0"][obj]+"\" target=\"_blank\">"+dsy.Items["0"][obj]+"</a></p>";

		bastStr+="</div>";	
	}
	bastStr+="</div>";
	$("#nTabs5_Content1 .index_03").html(bastStr);	
	return ;
	for(var obj=0;obj<dsy.Items["0"].length;obj++){	
		bastStr+="<div class=\"index_04_div\" name=\"index_04\"><div style=\"overflow:hidden;\"><span style=\"width:auto; padding:auto 9px auto 9px;\">"+dsy.Items["0"][obj]+"</span></div>";
		bastStr+="<div class=\"index_04\" name=\"index_04\">";
		tempitem=dsy.Items["0_"+obj];
		if(tempitem.length==1){
			tempitem=dsy.Items["0_"+obj+"_0"];
		}
		for(var items2=0;items2<tempitem.length;items2++){	
			bastStr+="<p class=\"index_04_item\" style=\"width:139px;\"><a href=\"index.php?a=index&m=Experts&g=home&area="+tempitem[items2]+"\" target=\"_blank\">"+tempitem[items2]+"</a></p>";
		}
		bastStr+="</div></div>";	
	}
	$("#nTabs5_Content1 .index_03").html(bastStr);	
}
function guowai(){
	var bastStr="";		
	var tempitem;
	var tempitem2=[];
	bastStr+="<div class=\"index_04_div\" name=\"index_04\">";//"<div style=\"overflow:hidden;\"><span style=\"width:auto; padding:auto 9px auto 9px;\">"+tempitem[i]+"</span></div>";
	for(var key in countries){
		if(!key){
			continue;	
		}
		tempitem=countries[key].split('|');
		for(var i=0;i<tempitem.length;i++){
			if(!tempitem[i]){
				continue;	
			}
			tempitem2.push(tempitem[i]);
			//bastStr+="<div class=\"index_04\" name=\"index_04\" style=\"width:150px; float:left;\">";
			//bastStr+="<p class=\"index_04_item\" style=\"width:139px;\"><a href=\"index.php?a=index&m=Experts&g=home&area="+tempitem[i]+"\" target=\"_blank\">"+tempitem[i]+"</a></p>";
			//bastStr+="</div>";	
		}
	}
	
	tempitem2.sort();
	for(var i=0;i<tempitem2.length;i++){
		bastStr+="<div class=\"index_04\" name=\"index_04\" style=\"width:150px; float:left;\">";
		bastStr+="<p class=\"index_04_item\" style=\"width:139px;\"><a href=\"index.php?a=index&m=Experts&g=home&area="+tempitem2[i]+"\" target=\"_blank\">"+tempitem2[i]+"</a></p>";
		bastStr+="</div>";
	}
	
	bastStr+="</div>";
	
	$("#nTabs5_Content1 .index_03").html(bastStr);	
	
	return;
	//添加到国家名
	for(var key in countries){
		if(!key){
			continue;	
		}
		tempitem=countries[key].split('|');
		for(var i=0;i<tempitem.length;i++){
			if(!tempitem[i]){
				continue;	
			}
			bastStr+="<div class=\"index_04_div\" name=\"index_04\"><div style=\"overflow:hidden;\"><span style=\"width:auto; padding:auto 9px auto 9px;\">"+tempitem[i]+"</span></div>";
			bastStr+="<div class=\"index_04\" name=\"index_04\">";
			//alert(city_states[tempitem[i]]);
			tempitem2={};
			if(city_states[tempitem[i]]){
				tempitem2=city_states[tempitem[i]].split('|');
			}else{
				bastStr+="</div></div>";
				continue;	
			}
			for(var j=0;j<tempitem2.length;j++){
				bastStr+="<p class=\"index_04_item\" style=\"width:139px;\"><a href=\"index.php?a=index&m=Experts&g=home&area="+tempitem2[j]+"\" target=\"_blank\">"+tempitem2[j]+"</a></p>";
			}
			bastStr+="</div></div>";	
		}
	}
	$("#nTabs5_Content1 .index_03").html(bastStr);		
}

function showschool(word){
	if(word){
		$(".index_04_div").hide();
		$(".index_04").hide();
		$("[name=index_04"+word+"]").show();
	}else
	{$("[name^=index_04]").show();	
	}
}