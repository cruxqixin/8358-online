<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UsersModel;
use Think\Model;
use Think\Page;
class UcController extends Controller {
	public function check_login() {
		// 判断是否登录
		$user_mod = M ( "User" );
		$id = $_COOKIE ['id'];
		if ($id) {
			$user_info = $user_mod->where ( "id=$id" )->find ();
			// $this->assign("id",$id);
			$this->assign ( "user_info", $user_info );
		} else {
			$url = get_url ( 'login', '', 'user' );
			header ( 'location:' . $url );
		}
	}
	public function _initialize() {
		header("Content-Type:text/html; charset=UTF-8");
		
		//get_active_plugins();
		$array=array("reg","login");
		//验证用户信息
		if(!in_array(ACTION_NAME, $array)){			
			$currentuser=getetcurrentuser();
			if($currentuser==null){
				header('location:'.U('home/Uc/login?returnurl='.__SELF__) );
				$this->display();
				return;
			}
			$this->assign("currentuser",$currentuser);	
		}
		$seo['title']=C("site_title");
		$seo['keys']=C("site_keyword");
		$seo['desc']=C("site_description");
		$this->assign("seo",$seo);	
	}
	public function reg(){
		if($_POST["reg"]=="user_reg"){
			//判断用户名是否存在
			$d=M();
			$count=$d->query("select count(*) as cc from tk_users where nickname='".$_POST['nickname']."'");
			$error="";
			if($count[0]["CC"]>0){
				$error="昵称 ";
			}
			$count=$d->query("select count(*) as cc from tk_users where email='".$_POST['email']."'");
			if($count[0]["CC"]>0){
				$error.="邮箱 ";
			}
			$count=$d->query("select count(*) as cc from tk_users where phone='".$_POST['phone']."'");
			if($count[0]["CC"]>0){
				$error.="手机 ";
			}
			if($error!=""){
				$this->assign('error',$error."已被注册");
				$this->assign('data',$_POST);
				$this->display();
				return;	
			}
			 
			$data["ID"]=time();	
			$data["PASSWORD"]=md5($_POST["pwdming"]);
			$data["STATUS"]="0";
			$data["NICKNAME"]=$_POST["nickname"];
			$data["PWDMING"]=$_POST["pwdming"];
			$data["EMAIL"]=$_POST["email"];
			$data["PHONE"]=$_POST["phone"];		
			$addusers=new UsersModel("Users");
			$addusers->add($data);
			
			//赋值用户信息
			setcurrentuser($addusers->where("ID=".$data["ID"])->find());
			
			header('location:' . U( 'home/Uc/center' ) );
				
		}

		$this->display();
	}
	//用户登陆
	public function login(){
		if($_POST["login"]=="user_login"){
			$addusers=new UsersModel("Users");
			$data["NICKNAME"]=$_POST["nickname"];
			$data["PASSWORD"]=md5($_POST["pwd"]);
			$currentuser=$addusers->where($data)->find();
			$error="";
			if(!$currentuser){
				$error="用户名或密码错误";
			}else{
				//跳转到个人中心
				setcurrentuser($currentuser);
				header('location:' . U( 'home/Uc/center' ));
			}
			
			if($error!=""){
				$this->assign('error',$error);
				$this->assign('data',$_POST);
			}
		}
		$this->display();
	}
	
	//用户中心
	public function center(){
		//判断是否完善信息
		$currentuser=getetcurrentuser();
		if($currentuser["REVIEW"]==""||$currentuser["REVIEW"]=="0"){
			header('location:' . U( 'home/Uc/suretype' ) );
			$this->display();
			return;
		}
		$project=M("Project");
		//获取当前项目信息
		$where["USERID"]=$currentuser["ID"];		
		$count[0]=$project->where($where)->count();
		$where["STATUS"]="1";
		$count[1]=$project->where($where)->count();
		$where["STATUS"]="2";
		$count[2]=$project->where($where)->count();
		$where["STATUS"]="10";
		$count[3]=$project->where($where)->count();
		
		//获取当先项目列表
		$where["STATUS"]=$_GET["type"];	
		$res=$project->where($where)->limit(10)->order(" id desc")->select();
		
		$this->assign('count',$count);
		$this->assign('pros',$res);		
		$this->display();
	}
	
	//确定用户类型
	public function suretype(){
		$currentuser=getetcurrentuser();
		if($currentuser==null){
			header('location:' . U( 'home/Uc/login' ) );
			$this->display();
			return;
		}
		$user=new UsersModel("Users");
		$currentuser=$user->where("id=".$currentuser["ID"])->find();
		$res="";
		$usertype=array("个人","企业","政府","学校","社会团体及服务");
	
		if($currentuser["REVIEW"]==0&&$currentuser["UTYPE"]>-1){
			$res="您已成功申请 ".$usertype[$currentuser["UTYPE"]]." ,请耐心等待审核";
		}
		if($currentuser["REVIEW"]==1){
			$res="您目前为 ".$usertype[$currentuser["UTYPE"]]." 用户";
		}
		
		$this->assign('res',$res);
		$this->display();	
	}
	
	//更新个人信息
	public function personal(){		
		$currentuser=getetcurrentuser();
		
		$userp=new Users_PersonalModel("UsersPersonal");		
		if($_POST["submit"]){
			$data=$_POST;
			$data["USERID"]=$currentuser["ID"];
			//添加
			if($data["have"]=="0"){
				$userp->add($data);
			}else{
				$userp->save($data);	
			}
			$currentuser["UTYPE"]=0;
			$currentuser["REVIEW"]=0;
			$user=new UsersModel("Users");
			$user->save($currentuser);
			header('location:'.U('home/Uc/suretype'));
			$this->display();
			return;
		}		
		//获取个人信息		
		$model=$userp->where('userid='.$currentuser["ID"])->select();	
		
		if(!$model){
			$model["UEMAIL"]=$currentuser["EMAIL"];
			$model["UMOBIPHONE"]=$currentuser["PHONE"];
			$model["have"]="0";
		}else{
			$model=$model[0];	
		}
		$this->assign('data',$model);
		$this->display();
	}
	//企业
	public function company(){		
	
		$currentuser=getetcurrentuser();	
	
		$userc=new Users_CompanyModel("UsersCompany");		
		if($_POST["submit"]){
			$data=$_POST;
			$data["USERID"]=$currentuser["ID"];
			//添加
			if($data["have"]=="0"){
				$userc->add($data);
			}else{
				$userc->save($data);	
			}
			
			
			
			$currentuser["UTYPE"]=1;
			$currentuser["REVIEW"]=0;
			$user=new UsersModel("Users");
			$user->save($currentuser);
			
			return;
		}
		//获取个人信息		
		$model=$userc->where('userid='.$currentuser["ID"])->select();	
			
		if(!$model){
			$model["CEMAIL"]=$currentuser["EMAIL"];
			$model["CPHONE"]=$currentuser["PHONE"];
			$model["have"]="0";
		}else{
			$model=$model[0];	
		}
		
		//print_r($model);
		$this->assign('data',$model);
		$this->display();
	}
	//政府机关
	public function gov(){
			
	}
	//高校
	public function school(){
			
	}
	//社会团体及服务机构
	public function caste(){
			
	}
	//项目信息
	//添加项目
	public function projectadd(){
		
		$this->display();
	}
	
	
}
// 修改头像类
class pic_data {
	public $data;
	public $status;
	public $statusText;
	public function __construct() {
		$this->data->urls = array ();
	}
}
