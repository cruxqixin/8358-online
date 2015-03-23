// JavaScript Document
function na(thisObj,Num){
if(thisObj.className == "active1")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
if (i == Num)
{
   thisObj.className = "over"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
}else{
   tabList[i].className = "now"; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
}
} 
}// JavaScript Document