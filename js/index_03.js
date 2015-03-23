// JavaScript Document
function na2(thisObj,Num){
if(thisObj.className == "active1")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
if (i == Num)
{
   thisObj.className = "act1"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
}else{
   tabList[i].className = "nor1"; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
}
} 
}// JavaScript Document