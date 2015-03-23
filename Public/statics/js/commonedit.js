//var edititems='{"items":["wordpaste","selectall","justifyleft","justifycenter","image","justifyright","justifyfull","insertorderedlist","insertunorderedlist","formatblock","fontname","fontsize","forecolor","hilitecolor","bold","italic","fullscreen"]}';
var edititems='{"items":["image","fullscreen","bold","justifyleft","justifycenter",,"justifyright",,"italic"],"width":"480px","minWidth":"400px"}';
var allitems;
$(function(){
	edititems=eval("("+edititems+")");
	allitems=KindEditor.create('.editshow',edititems);
	allitems1=KindEditor.create('.editshow1',edititems);	
	allitems2=KindEditor.create('.editshow2',edititems);	
	allitems3=KindEditor.create('.editshow3',edititems);	
	allitems4=KindEditor.create('.editshow4',edititems);		
})