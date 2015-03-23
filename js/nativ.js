function tonav(navname,control,norclass,actclass)
{
	var index=$("#"+navname+" li").index($(control));
	$("[id^="+navname+"_Content]").hide();
	$("[id^="+navname+"_Content]").eq(index).show();
	$("#"+navname+" li").attr("class",norclass);
	$(control).attr("class",actclass);
}