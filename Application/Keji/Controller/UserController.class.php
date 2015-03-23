<?php
namespace Keji\Controller;
use Think\Controller;
use Model\User_IndustryModel;
use Model\KjuserModel;
use Model\Company_KindModel;
use Model\UsersModel;
class UserController extends BaseController{
    public function _initialize() {
		header("Content-Type:text/html; charset=UTF-8");
		get_active_plugins();
		$file = './Public/Install/install.lock';
		if (!file_exists($file)){
			$url='install';
			header("Location:$url");
			exit();
		}
		if(C('site_status')==0){
			echo '<div style="whdth:100%;height:100%;font-size:60;color:#5FAA92;">网站维护中...</div>';
			exit();
		}
		
		//底部文章信息绑定
		
		//echo MODULE_NAME ."|";
		//echo ACTION_NAME  ."|";
		//echo GROUP_NAME  ."|";
		
		$searchdo="index";
		if(MODULE_NAME=="Project"){
			$searchdo="index";	
		}
		if(MODULE_NAME=="Experts"){
			$searchdo="experts";	
		}
		if(MODULE_NAME=="Goods"){
			$searchdo="goods";	
		}
		if(MODULE_NAME=="Search"){
			if(ACTION_NAME=="project"){
				$searchdo="index";	
			}
			if(ACTION_NAME=="experts"){
				$searchdo="experts";	
			}
			if(ACTION_NAME=="goods"){
				$searchdo="goods";	
			}
			if($_GET["ckpsearch"]=="all"){
				$searchdo="all";	
			}
		}
		
		$this->assign("doaction",$searchdo);

		//替换模板title的值
		$seo['title']=C("site_title");
		$seo['keys']=C("site_keyword");
		$seo['desc']=C("site_description");
		$this->assign("seo",$seo);	
	}
	public function login(){
		$user=M('Users');
		if($_POST){
			$error="";
			$data["NICKNAME"]=$_POST["name"];
			$data["PASSWORD"]=md5($_POST["password"]);			
			$data1['EMAIL']=$_POST["name"];
			$data1["PASSWORD"]=md5($_POST["password"]);
			$list=$user->where($data)->find();
			$list1=$user->where($data1)->find();
			
			if($list||$list1){
				if($list['isyzemail']==1||$list1['isyzemail']==1){
					if($list){
						setcurrentuser($list);
					}else{
						setcurrentuser($list1);
					}
					
					$this->success('登录成功',U('News/index'));
					return;
				}else{
					$this->success('邮箱未验证，请验证邮箱',U('User/Verifyemail'));
					return;
				}
	
			}else{
				$error="用户名或密码错误";
			}
			if($error!=""){
				$this->assign('error',$error);
				$this->assign('data',$_POST);
			}
			
		}
		$this->display();
	}
	public function register(){

		$user=M('Users');
		$Prokind=M('CompanyGoods_kind');
		$kind=$Prokind->where('KTYPE=0 ')->select();		
		$this->assign('hy',$kind);
		if($_GET['type']&&trim($_GET['type'])){
			$this->assign('type',$_GET['type']);
		}
		
		if($_POST){
			//判断用户是否存在
			$data["NICKNAME"]=$_POST["NICKNAME"];
			$list=M('users')->where($data)->find();
			
			if($list){
				$this->error("该昵称已经注册！",U('User/register'));
				return;	
			}
			
			$da['EMAIL']=$_POST['EMAIL'];
			$list1=M('users')->where($da)->find();
			
			if($list1){
				$this->error("该邮箱已经注册！",U('User/register'));
				return;	
			}
			$data=$_POST;
			$data['ID']=time();
			$hy=$_POST['hyid'];
			$data['PASSWORD']=md5($_POST['PASSWORD']);
			$data['PWDMING']=$_POST['PASSWORD'];
			$data['STATUS']=1;
			$data['IS_PERFECT']=1;
			$ids="";
			foreach($hy as $value){
				$ids.=$value;
				$ids.=",";
			}
			$data['INDUSTRY']=$ids;
			$data['UADDTIME']=time();
			$add=$user->add($data);
			$data1["nickname"]=$_POST["NICKNAME"];
			$data1["email"]=$_POST["EMAIL"];
			$data1["yzemail"]=0;
			$data1["addtime"]=time();
				$data1["userid"]=$data['ID'];
				$data1["id"]=md5($data1["email"].$data["ID"].$data1["addtime"]."key");
				M("users_getpass")->add($data1);				
				$url='http://'.$_SERVER['HTTP_HOST'].  U('User/Verifyemail',array("keycode",$data1["id"]));				
				SendMail($data["EMAIL"],"邮箱验证","请点击链接 {$url} 继续邮箱验证操作");				  
			if($add){
				$this->success("注册成功",U('User/register?type=1'));
			}
		}
		$this->display();
	}
	public function newregister(){
		$da['EMAIL']=$_GET['email'].'.com';
		$list=M("Users")->where($da)->find();	
		if($list){
			header('location:' . U( 'User/login' ) );
			return;
		}else{
			//随机生成用户名
			$arr=array_merge(range('a', 'z'),range('A', 'Z'),range(0, 9));
			shuffle($arr);
			$user='';
			for ($i=0;$i<6;$i++){
				$user .= $arr[$i];
			}
			//随机生成6位密码
			$pwd=array_merge(range('a', 'z'),range(0, 9));
			shuffle($pwd);
			$pass='';
			for ($i=0;$i<6;$i++){
				$pass .= $pwd[$i];
			}
			//将数据存入到数据库
			$da['ID']=time();
			$da['UADDTIME']=time();
			$da['IS_PERFECT']=0;
			$da['ISYZEMAIL']=1;
			$da['STATUS']=1;
			$da['NICKNAME']=$user;
			$da['PASSWORD']=md5($pass);
			$da['PWDMING']=$pass;
			$add=M('Users')->add($da);
			$message="";
			if($add){
				$message="您已经成功注册科技天下网，您的用户名为：".$user."，登录密码为".$pass;
			}
			$this->assign("message",$message);
		}
		
		$this->display();
		
	}
	public function Verifyemail(){
	     if($_GET[1]){
			$keycode=$_GET[1];
			$getpass=M("users_getpass")->where(array("id"=>$keycode))->find();
			
			$data=array();
			if(!$getpass){
				$this->success("验证过期",U('User/Verifyemail'));	
			}else{
				
				$da['ISYZEMAIL']=1;
				$user=M('users')->where("NICKNAME='".$getpass['nickname']."'")->save($da);
				echo M('users')->getlastsql();
				
				if($user){
					$this->success("账号已激活,现在去登陆",U('User/login'));
				}
				return;
			}
		 }
		
		if($_POST){
			$data["NICKNAME"]=$_POST["NICKNAME"];
			$data['EMAIL']=$_POST["EMAIL"];
			if(M('users')->where($data)->count()<0){
				$this->error("该昵称或邮箱不正确！");
				return;	
			}else{
				$list=M('users')->where($data)->find();
				$data1["nickname"]=$_POST["NICKNAME"];
				$data1["email"]=$_POST["EMAIL"];
				$data1["yzemail"]=0;
				$data1["addtime"]=time();
				$data1["userid"]=$data['ID'];
				$data1["id"]=md5($data1["email"].$data1["ID"].$data1["addtime"]."key");
				M("users_getpass")->add($data1);				
				$url='http://'.$_SERVER['HTTP_HOST']. U('User/Verifyemail',array("keycode",$data1["id"]));				
				SendMail($data["EMAIL"],"邮箱验证","请点击链接 {$url} 继续邮箱验证操作");	
				$this->success("邮件发送成功 请登录 ".$_POST['EMAIL']." 进行后续操作",U('User/login'));
				return ;
			}
		}
		$this->display();
		
	}
	
////////////////////
	
	
	public function resetpassword(){
		$keycode=$_GET[1];
		$getpass=M("users_getpass")->where(array("id"=>$keycode))->find();
		$data=array();
		if(!$getpass){
			$data["message"]="申请过期或不存在";
			$data["type"]=0;
		}else if($getpass["status"]!="0"){
			$data["message"]="申请过期或不存在";
			$data["type"]=0;
		}else{
			$data["keycode"]=$keycode;
			$data["type"]=1;
		}
		$this->assign($data);
		$this->display();
	}
	
	public function updatepwd(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		if($_POST){
			$error="";
			
			if(md5($_POST['pwd'])===$currentuser['password']){
				$userdata["PASSWORD"]=md5(trim($_POST["PASSWORD"]));
			    $userdata["PWDMING"]=trim($_POST["PASSWORD"]);
				M('users')->where("ID=".$currentuser['id'])->save($userdata);
				exitcurrentuser();
				$this->success('修改密码成功',U('User/login'));
			}else{
				
				$error="原密码不正确";
			}
			$this->assign("error",$error);
		}
		$this->display();
	}
	public function upinfo(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		//print_r($currentuser);
		$user=M('Users');
		$Prokind=M('CompanyGoods_kind');
		$kind=$Prokind->where('KTYPE=0 ')->select();		
		$this->assign('hy',$kind);
		
		if($_POST){
			$data=$_POST;	
			$data['IS_PERFECT']=1;
			$hy=$_POST['hyid'];
			$ids="";
			foreach($hy as $value){
				$ids.=$value;
				$ids.=",";
			}
			$data['INDUSTRY']=$ids;
			$save=$user->where("ID=".$currentuser['id'])->save($data);
			
			exitcurrentuser();
			$list=$user->where("ID=".$currentuser['id'])->find();
			setcurrentuser($list);
			$this->success("修改成功");		
		}
		$this->display();
	}
	
////////////////////
	
	//忘记密码
	public function forgetpass(){
		if($_POST){
			//查看用户邮箱是否存在
			$users=M('users')->where($_POST)->find();
			if(!$users){
				$this->assign($_POST);
				$this->assign("message","用户名或邮箱不正确");
			}else{
			
				//发送邮件
				//发送邮箱
				$data["nickname"]=$_POST["NICKNAME"];
				$data["email"]=$_POST["EMAIL"];
				$data["status"]=0;
				$data["addtime"]=time();
				$data["userid"]=$users["id"];
				$data["id"]=md5($data["email"].$users["id"].$data["addtime"]."key");
				M("users_getpass")->add($data);				
				$url=C('site_domain'). U('User/resetpassword',array("keycode",$data["id"]));				
				SendMail($data["email"],"密码找回","请点击链接 {$url} 继续密码重置操作");				
				$this->success("邮件发送成功 请登录 ".$_POST['EMAIL']." 进行后续操作",U('User/login'));
				return ;
			}
		}
		$this->display();
	}

	public function changepassword(){
		if(!$_POST){
			$this->error("重置失败",U('User/login'));
			return;
		}
		
		$getpass=M("users_getpass")->where(array("id"=>$_POST["keycode"]))->find();
		$user=M("users")->where(array("ID"=>$getpass["userid"]))->find();
		if(!$getpass||!user||$getpass["status"]!=0){
			$data["message"]="申请过期或不存在";
		}else{
			$userdata["PASSWORD"]=md5(trim($_POST["PASSWORD"]));
			$userdata["PWDMING"]=trim($_POST["PASSWORD"]);
			
			M('users')->where(array("ID"=>$getpass["userid"]))->save($userdata);
			$data["message"]="密码修改成功";
			$getpass["status"]=1;
			M("users_getpass")->save($getpass);
		}		
		$this->assign($data);
		$this->display();
	}
	
	
////////////////////
	public function loginout(){		
		exitcurrentuser();
		header('location:/index.php/Keji/User/login');	
	}
}
























