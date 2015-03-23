<?php
namespace Api\Controller;

use Think\Controller;
use Model\UsersModel;
use Model\ValidateModel;
class UserController extends Controller{
	public function info(){
		$user=new UsersModel('Users');
		//echo 123;
		$str="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$re = "";		
		while(strlen($re)<10) {
			$re .= $str[rand(0, strlen($str)-1)]; //从$s中随机产生一个字符
		}
		
		$uname=$_POST['username'];
		$passwd=$_POST['openwd'];
		$uid=$_POST['openid'];
		$val=new ValidateModel('Validate');
		$da['userid']=$uname;
		$da['password']=$passwd;
		$da['key']=$re;
		$val->add($da);	//记录到数据库中
		
		$sign=md5($uname.$passwd.$passwd);
		
		$info=$user->where("ID='".$uid."'")->select();
		$yz=md5($info[0]['nickname'].$info[0]['password'].$info[0]['password']);
		if($uname&&$passwd&&$uid&&$sign){
			if($sign==$yz){
			if($info){
				if($info[0]['password']==$passwd){
					echo '{"status":"0003","res":"1","userinfo":{"ID":"'.$info[0]['id'].'","NICKNAME":"'.$info[0]['nickname'].'"}}';			
				    exit();
				}else{
					echo '{"status":"0002","res":0}';
					exit();
				}
				
			}else{
				echo '{"status":"0001","res":0}';
				exit();
				}
			}else{
				echo '{"status":"0004","res":0}';
				exit();
			}
		}else{
			echo '{"status":"0000","res":0}';
			exit();
		}
		
		
		
	}
}
    
?>