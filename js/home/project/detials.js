function na2(control,index){
		$("#na2 li").attr("class","nor1");
		$(control).attr("class","act1");
		$("[id^=na2_Content]").hide();
		$("#na2_Content"+index).show();
	}
