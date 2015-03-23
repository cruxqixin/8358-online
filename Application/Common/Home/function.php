<?php
function getprojectindex(){
		
}
function getarticleindex($catid,$rownum){
	$Article=new ArticleModel('Article');   
	return $datae=$Article->order(' ID desc')->where('CATE_ID='.$catid.' and rownum<'.$rownum)->select(); 	
}