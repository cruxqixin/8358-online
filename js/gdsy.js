// JavaScript Document
	   $(function(){
			$(".picc").width($("#List3 .picc div").size()*200);
	   })
<!--//--><![CDATA[//><!--
//图片滚动列表 mengjia 070816
var Speed =5; //速度(毫秒)
var Space = 5; //每次移动(px)
var PageWidth =200; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false;
var MoveTimeObj;
var Comp = 0;
var AutoPlayObj = null;
GetObj("List4").innerHTML = GetObj("List3").innerHTML;
GetObj('ISL_Contt').scrollLeft = fill;
GetObj("ISL_Contt").onmouseover = function(){clearInterval(AutoPlayObj);}
GetObj("ISL_Contt").onmouseout = function(){AutoPlay();}
AutoPlay();
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}}
function AutoPlay(){ //自动滚动
 clearInterval(AutoPlayObj);
 AutoPlayObj = setInterval('ISL_GoDownn();ISL_StopDown();',3000); //间隔时间
}
function ISL_GoUp(){ //上翻开始
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 MoveTimeObj = setInterval('ISL_ScrUp();',Speed);
}
function ISL_StopUp(){ //上翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Contt').scrollLeft % PageWidth - fill != 0){
  Comp = fill - (GetObj('ISL_Contt').scrollLeft % PageWidth);
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrUp(){ //上翻动作
 if(GetObj('ISL_Contt').scrollLeft <= 0){GetObj('ISL_Contt').scrollLeft = GetObj('ISL_Contt').scrollLeft + GetObj('List3').offsetWidth}
 GetObj('ISL_Contt').scrollLeft -= Space ;
}
function ISL_GoDownn(){ //下翻
 clearInterval(MoveTimeObj);
 if(MoveLock) return;
 clearInterval(AutoPlayObj);
 MoveLock = true;
 ISL_ScrDown();
 MoveTimeObj = setInterval('ISL_ScrDown()',Speed);
}
function ISL_StopDownn(){ //下翻停止
 clearInterval(MoveTimeObj);
 if(GetObj('ISL_Contt').scrollLeft % PageWidth - fill != 0 ){
  Comp = PageWidth - GetObj('ISL_Contt').scrollLeft % PageWidth + fill;
  CompScr();
 }else{
  MoveLock = false;
 }
 AutoPlay();
}
function ISL_ScrDown(){ //下翻动作
 if(GetObj('ISL_Contt').scrollLeft >= GetObj('List3').scrollWidth){GetObj('ISL_Contt').scrollLeft = GetObj('ISL_Contt').scrollLeft - GetObj('List3').scrollWidth;}
 GetObj('ISL_Contt').scrollLeft += Space ;
}
function CompScr(){
 var num;
 if(Comp == 0){MoveLock = false;return;}
 if(Comp < 0){ //上翻
  if(Comp < -Space){
   Comp += Space;
   num = Space;
  }else{
   num = -Comp;
   Comp = 0;
  }
  GetObj('ISL_Contt').scrollLeft -= num;
  setTimeout('CompScr()',Speed);
 }else{ //下翻
  if(Comp > Space){
   Comp -= Space;
   num = Space;
  }else{
   num = Comp;
   Comp = 0;
  }
  GetObj('ISL_Contt').scrollLeft += num;
  setTimeout('CompScr()',Speed);
 }
}