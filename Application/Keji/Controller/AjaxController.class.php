<?php
namespace Keji\Controller;
use Think\Controller;

use Model\KjuserModel;
class AjaxController extends BaseController{
	public function Username(){
		$user=new Model\KjuserModel;
		$username=$_GET['name'];
		$list=$user->where("name like %".$username."%")->find;
		if($list){
			echo '["'.$_GET ['fieldId'].'",true]';
		}else{
			echo '["'.$_GET ['fieldId'].'",false]';
		}
		
	}
	
}