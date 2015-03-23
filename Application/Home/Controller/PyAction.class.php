<?php
class PyAction extends Action {
	function test(){
		
		echo strtoupper(getpinyin("测试品123qwe@1&*(&*应",true));
		echo "<br >";
		echo getpinyin("测试品应",false);	
	}
	
}
