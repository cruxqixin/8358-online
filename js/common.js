$(function(){
	$(".resettext").each(function(){
		if($(this).val()=="输入关键词")
			textReplacement($(this));
	})	
	
	 $("#inputxs").mouseover(function(){
	   $("#xfc").show();
	 });
	
     $("#xfc").hover(function(){
		$(this).show();	 
	 },function(){
		$(this).hide(); 
	})
	if($.trim($(".export_07").html())){
		$("#xfc").show();
	}	
})

function textReplacement(input){
	var originalvalue = input.val();
	input.focus( function(){
	  if( $.trim(input.val()) == originalvalue ){ input.val(''); }
	});
	input.blur( function(){
	  if( $.trim(input.val()) == '' ){ input.val(originalvalue); }
	});
}