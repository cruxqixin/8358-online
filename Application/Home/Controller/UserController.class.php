<?php
namespace Home\Controller;

use Think\Controller;
use Model\UsersModel;
class UserController extends Controller{
	public function jiekou(){
		$user=new UsersModel('Users');
		//echo 123;
		$uname=$_GET['username'];
		$passwd=$_GET['password'];
		$uid=$_GET['openid'];
		$info=$user->where("NICKNAME='".$uname."'")->select();
		$sign=md5($uname.$passwd);
		$yz=md5($info[0]['nickname'].$info[0]['password']);
        
		if($sign===$yz){		
			echo '{"status":"0000","res":"1","userinfo":{"ID":"'.$info[0]['id'].'","NICKNAME":"'.$info[0]['nickname'].'"}}';			
			exit();
			
		}else{
			echo '{"status":"0001","res":0,"info":"用户名或密码错误"}';
			exit();
		}
		
		
	}
}
    
?>