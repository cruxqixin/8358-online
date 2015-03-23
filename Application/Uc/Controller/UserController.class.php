<?php
namespace Uc\Controller;
use Think\Controller;
use Uc\Model\ArticleCateModel;
use Uc\Model\UsersModel;
use Uc\Model\Users_PersonalModel;
use Uc\Model\Project_FileModel;
use Model\UserCasteModel;
use Model\Company_KindModel;
use Model\Users_CompanyModel;
use Model\UsersGovModel;
use Model\UsersSchooleModel;
use Model\SuggestionsModel;
class UserController extends BaseController {
	
	public function _initialize() {
		header("Content-Type:text/html; charset=UTF-8");
	
		//get_active_plugins();
		$array=array("reg","login","forpwd","forphone","pwd","TZ","upwdzz","forphone","ppwd","phone","phoneyz","email","emailyz","TZP","centeremail","regschool");
		//验证用户信息
		if(!in_array(ACTION_NAME, $array)){			
			$currentuser=getetcurrentuser();
			if($currentuser==null){
				header('location:'.U('Uc/User/login?returnurl='.urlencode(__SELF__)) );
				$this->display();
				return;
			}
			$this->assign("currentuser",$currentuser);	
		}
		
		//用户中心
		$array=array("center");
		if(in_array(ACTION_NAME, $array)){			
			if($currentuser["REVIEW"]==""||$currentuser["REVIEW"]=="0"){
				header('location:' . U( 'Uc/User/suretype' ) );
				$this->display();
				return;
			}
		}
		//底部文章信息绑定
		if($_GET["noarc"]!="1"){
			$Article=new ArticleCateModel('ArticleCate');   
			$data=$Article->where('PARENTID=421')->order("ord desc,id desc")->limit(4)->select();
			
			$data1=$Article->where('PARENTID=422')->order("ord desc,id desc")->limit(4)->select(); 
			$data2=$Article->where('PARENTID=431')->order("ord desc,id desc")->limit(4)->select();   
			$this->assign('Article',$data);
			$this->assign('Articlee',$data1);
			$this->assign('Articleee',$data2);
			//赋值用户信息
			$currentuser=getetcurrentuser();
			$this->assign('currentuser',$currentuser);
		}
		$seo['title']=C("site_title");
		$seo['keys']=C("site_keyword");
		$seo['desc']=C("site_description");
		$this->assign("seo",$seo);	
	}
	//账号信息
	public function AccountManager()
	{ 
	$currentuser=getetcurrentuser();
	 if($currentuser["utype"]==0)
	  {  
	     header('location:' . U( 'User/personal' ) );
	    
	  }
	  if($currentuser["utype"]==1)
	  {
	    header('location:' . U( 'User/company' ) );
	    
	  }
	  if($currentuser["utype"]==2)
	  {
	   header('location:' . U( 'User/gov' ) );
	    
	  }
	  if($currentuser["utype"]==3)
	  { 
	    header('location:' . U( 'User/school' ) );
	   
	  }
	  if($currentuser["utype"]==4)
	  {  
	    header('location:' . U( 'User/caste' ) );
	    
	  }
	 
	}
	
	public function Suggestion()
	{
	 
	  $currentuser=getetcurrentuser();
	 
	if($_POST["submit"])
	{  
	   $jy=new SuggestionsModel('Suggestions');
	   $data=$_POST;
	   $data["IP"]=get_client_ip();
       $data["STATUS"]=0;
	   $data["USERID"]=$currentuser["ID"];
	   $data["ID"]=date('Ymd');
	   $row=$jy->add($data);
	 
	   if($row)
	   {
	     $this->success('建议提交成功！',U('User/Suggestion'));
		//exit();
	   }
	    
	}
	  $this->display();
	}
	
	 
	//个人中心修改密码
	public function updatepwd()
	{   
	   $currentuser=getetcurrentuser();
	   $user=new UsersModel('Users');
	    if($_POST["submit"])
		{ 
		  $data=$_POST;
		  $data["PASSWORD"]=md5($_POST["PASSWORD"]);
		  $data["PWDMING"]=$_POST["PASSWORD"];
		  $where["NICKNAME"]=$_POST["NICKNAME"];
		 // $select=$user->where($where)->select();
		  if($currentuser["nickname"]!=$_POST["NICKNAME"])
		  { 
		    $this->success('用户名不存在！',U('User/updatepwd'));
			exit();
		  }
		  else
		  {
		    $row=$user->where($where)->save($data);
		 
		  if($row)
		{
		  $this->success('重置密码成功！',U('User/login'));
		 // exit();
		}
		  }
		  
		}
		$this->display();
	}
	
	//高校简易注册
	public function regschool(){
		if($_POST["reg"]=="user_reg"){
			//判断用户名是否存在
			$d=M();
			$count=$d->query("select count(*) as cc from tk_users where nickname='".$_POST['nickname']."'");
			$error="";
			if($count[0]["CC"]>0){
				$error="昵称 ";
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
			$data["UTYPE"]=3;
			$data["REVIEW"]=1;
			
			
			$addusers=new UsersModel("Users");
			$addusers->add($data);
			//添加学校信息
		
			$userschool=new UsersSchooleModel("UsersSchoole");
			$info["USERID"]=$data["ID"];
			$info["CNAME"]=$_POST["school"];
			$info["PINYIN"]=strtoupper(getpinyin($info["CNAME"],true));
			$info["PINYINSHORT"]=strtoupper(getpinyin($info["CNAME"],false));
		
			$userschool->add($info);
			//赋值用户信息
			setcurrentuser($addusers->where("ID=".$data["ID"])->find());
			
			header('location:' . U( 'Uc/User/center' ) );
				
		}
		$this->display();
	}
	
	public function ppwd()
	{
	   $user=new UsersModel('Users');
	  if($_POST["submit"]){
	    $data=$_POST;
		$data["PASSWORD"]=md5($data["PASSWORD"]);
		
		$wheree["PHONE"]=$_POST['PHONE'];
		$save=$user->where($wheree)->save($data);
		
		if($save)
		{
		  $this->success('重置密码成功！',U('User/login'));
		 // exit();
		}
	  }
	  $this->display();
	}
	public function forphone()
	{
	   $phone=new Phone_CodeModel('PhoneCode');
	     if($_POST["submit"]){
		    $data=$_POST;
			
			$data["ID"]=date("Ymd");
		
			$row=$phone->add($data);
			$user=new UsersModel(Users);
			
			$wheree["PHONE"]=$_POST['PHONE'];
			
		    $select=$user->where($wheree)->select();
			
		    if($select!='')
			{
			    if($row)
			    { 
			  
			      $this->success('',U('User/TZP?ID='.$data["ID"]));
				 // exit();
			    }
			   
		   }
		   else
		   {
		      $this->success('该手机号不存在！',U('User/forphone'));
			  // exit();
		   }
			}
			
			
	   $this->display();
	}
	//验证成功
	public function centeremail()
	{
	  $currentuser=getetcurrentuser();
	   $this->display();
	}
	//修改邮箱
	public function emailedit()
	{  $currentuser=getetcurrentuser();
	  if($_POST["sub"]){
	  
	    $da=$_POST;
	    $user=new UsersModel('Users');
		 $where["ID"]= $currentuser["ID"];
		 $save=$user->where($where)->save($da);
		
		 if($save)
		 {
		   $this->success('修改成功！',U('User/Certification?uc='.$currentuser["ISEMAILVAL"]));
		   //exit();
		 }
	  }
	  $this->diaplay();
	}
	//激活邮箱
	public function email() 
	{   $currentuser=getetcurrentuser();
	   if (isset($_GET['token']) && trim($_GET['token'])) {
        if(isset($_GET['email']) && trim($_GET['email']))
		{
	     SendMail($_GET['email'],C('cms_domain'),"您好，请点击链接完成激活http://localhost:6034/index.php?a=centeremail&m=User&g=Uc&token=".$_GET['token']."如链接无法点击，请将它拷贝到浏览器地址栏中直接访问");
		 $user=new UsersModel('Users');
		 $da["ISEMAILVAL"]=1;
		 $where["ID"]= $currentuser["ID"];
		 $save=$user->where($where)->save($da);
		 setcurrentuser($currentuser);
		 if($save)
		 {
		 $this->success('邮件已发送至您的邮箱！',U('User/Certification?mess='.$_GET['token'].'&uc='.$da["ISEMAILVAL"]));
		 // exit();
		  }
	  }
	  }
	}
	//实名认证
	public function emailyz()
	{ 
	   //邮箱验证
	 $email=new Email_RecordModel('EmailRecord');
	     if($_POST["submit"]){
		    $data=$_POST;
			$data["TOKEN"]=md5(date("Ymd"));
			$data["ID"]=date("Ymd");
			
			$row=$email->add($data);
			$user=new UsersModel('Users');
			
			$wheree["EMAIL"]=$_POST['email'];
			
		    $select=$user->where($wheree)->select();
		
		    if($select!='')
			{
			    if($row)
			    { 
			  
			      $this->success('',U('User/email?token='.$data["TOKEN"].'& email='.$_POST['email']));
				 // exit();
			    }
			   
		   }
		   else
		   {
		      $this->success('该邮箱不存在！',U('User/Certification'));
			   //exit();
		   }
			}
			
	}
	//手机验证
	public function phoneyz()
	{   
	   $currentuser=getetcurrentuser();
	    $phone=new Phone_CodeModel('PhoneCode');
	     if($_POST["subm"]){
		    $data=$_POST;
			
			$data["ID"]=time();
		
			$row=$phone->add($data);
			$user=new UsersModel(Users);
			
			$wheree["PHONE"]=$_POST['PHONE'];
			
		    $select=$user->where($wheree)->select();
		    if($select!='')
			{
			    if($row)
			    { 
			  
			      $this->success('',U('User/centerphone?PHONE='.$_POST['PHONE']));
				 // exit();
			    }
			   
		   }
		   else
		   {
		      $this->success('该手机号不存在！',U('User/Certification?uc='. $currentuser["ISEMAILVAL"]));
			   //exit();
		   }
			}
			
	}
	public function centerphone()
	{ 
	 $currentuser=getetcurrentuser();
	   if (isset($_GET['PHONE']) && trim($_GET['PHONE'])) {
          SendSMS($_GET['PHONE'],"验证码已发出");
		  $user=new UsersModel('Users');
		 $da["ISPHONEVAL"]=1;
		 $where["ID"]= $currentuser["ID"];
		 $save=$user->where($where)->save($da);
		 setcurrentuser($currentuser);
		 if(save)
		 {
		   $this->success('请输入你的验证码！',U('User/Certification?uc='. $currentuser["ISEMAILVAL"].'&phone='.$currentuser["ISPHONEVAL"]));
		    exit();
		 }
	 
	  }
	}
	public function TZ()
	{  
	  if (isset($_GET['token']) && trim($_GET['token'])) {
        if(isset($_GET['email']) && trim($_GET['email']))
		{
	     SendMail($_GET['email'],"找回密码验证地址","http://localhost:6034/index.php?a=upwdzz&m=User&g=Uc&token=".$_GET['token']);
		 $this->success('邮件已发送至您的邮箱！',U('User/forpwd'));
		  exit();
	  }
	  }
	}
	public function TZP()
	{  
	  if (isset($_GET['ID']) && trim($_GET['ID'])) {
       
		 $this->success('请输入你的验证码！',U('User/ppwd'));
	  exit();
	  }
	}
	
	public function pwd()
	{
	   $email=new Email_RecordModel('EmailRecord');
	     if($_POST["submit"]){
		    $data=$_POST;
			
			$data["TOKEN"]=md5(date("Ymd"));
			$data["ID"]=date("Ymd");
			
			$row=$email->add($data);
			$user=new UsersModel(Users);
			
			$wheree["EMAIL"]=$_POST['EMAIL'];
			
		    $select=$user->where($wheree)->select();
			
		    if($select!='')
			{
			    if($row)
			    { 
			  
			      $this->success('',U('User/TZ?token='.$data["TOKEN"].'& email='.$_POST['EMAIL']));
				  exit();
			    }
			   
		   }
		   else
		   {
		      $this->success('该邮箱不存在！',U('User/forpwd'));
			   exit();
		   }
			}
			
			
	   $this->display();
	}
	
	public function upwdzz()
	{
	  $user=new UsersModel('Users');
	  if($_POST["submit"]){
	    $data=$_POST;
		$data["PASSWORD"]=md5($data["PASSWORD"]);
		$wheree["EMAIL"]=$_POST['EMAIL'];
		$save=$user->where($wheree)->save($data);
		
		if($save)
		{
		  $this->success('重置密码成功！',U('User/login'));
		   exit();
		}
	  }
	  $this->display();
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
			
			header('location:' . U( 'Uc/User/center' ) );
				
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
				if($_POST["returnurl"]){
					//header('location:' .$_POST["returnurl"]);
				}else{
					//header('location:' . U( 'Uc/User/center' ));
					 $this->success('登陆成功',U('User/center'));
				}
				
			}
			
			if($error!=""){
				$this->assign('error',$error);
				$this->assign('data',$_POST);
			}
		}
		
		$this->assign("returnurl",$_GET["returnurl"]);
		$this->display();
	}
	//退出
	public function loginout(){
		exitcurrentuser();
		header('location:/');
	}
	
	//用户中心
	public function center(){
		Load('extend');
		//判断是否完善信息
		$currentuser=getetcurrentuser();
		$project=M("Project");
		//获取当前项目信息
		$where["USERID"]=$currentuser["id"];	
		$where["STATUS"]="0";	
		$count[0]=$project->where($where)->count();
		$where["STATUS"]="1";
		$count[1]=$project->where($where)->count();
		$where["STATUS"]="2";
		$count[2]=$project->where($where)->count();
		$where["STATUS"]="10";
		$count[3]=$project->where($where)->count();
		$newproject=$project->where("STATUS=0")->order("id desc")->limit("5") ->select();		
		
		//获取当先项目列表
		$rewhre=$_GET["type"];
		if(!$rewhre){$rewhre=0;}
		$where["STATUS"]=$rewhre;	
		$res=$project->where($where)->limit(10)->order(" id desc")->select();
		
		
		$Prochose=new Project_ChoseModel('project_chose'); 
		$Prochose1=$Prochose->where('TYPEID=0')->select();
		$res1;
		foreach($Prochose1 as $value){
			$res1[$value["id"]]=$value;		
		}
		$this->assign('newproject',$newproject);
		$this->assign('Prochose1',$res1);		
		$this->assign('count',$count);
		$this->assign('pros',$res);	
		
		$experts=M("Experts");
		$newexperts=$experts->where("STATUS=0")->order("id desc")->limit("5") ->select();
		$this->assign('newexperts',$newexperts);
		$news=M('Article');		
		$neww=$news->where("CATE_ID=424")->order("ID desc")->limit("5")->select();
		$this->assign('news',$neww);
		$user=new UsersModel('Users');
		$sh["ID"]=$currentuser["id"];
		$row=$user->where($sh)->select();
		$this->assign("user",$row[0]);
		 $this->assign('usertype',getusertype());
		$this->display();
	}
	
	public function Certification()
	{
	 $currentuser=getetcurrentuser();
	
     $utype=$currentuser["UTYPE"];
	 $uid=$currentuser["ID"];
	 $user=new UsersModel('Users');
	 $where["UTYPE"]=$utype;
	 $where["ID"]=$uid;
	 $com=$user->where($where)->select();
	 $this->assign("user",$com[0]);
	   $this->display();
	}
	//完善资料
	public function Perfect()
	{ 
	  $currentuser=getetcurrentuser();
	   if($currentuser["UTYPE"]==0)
	  {  
	     header('location:' . U( 'Perfect/personal' ) );
	    
	  }
	  if($currentuser["UTYPE"]==1)
	  {
	    header('location:' . U( 'Perfect/company' ) );
	    
	  }
	  if($currentuser["UTYPE"]==2)
	  {
	   header('location:' . U( 'Perfect/gov' ) );
	    
	  }
	  if($currentuser["UTYPE"]==3)
	  { 
	    header('location:' . U( 'Perfect/school' ) );
	   
	  }
	  if($currentuser["UTYPE"]==4)
	  {  
	    header('location:' . U( 'Perfect/caste' ) );
	    
	  }
	 
	  $this->display();
	}
	//确定用户类型
	public function suretype(){
		$currentuser=getetcurrentuser();
		
		$user=new UsersModel("Users");
		$currentuser=$user->where("id=".$currentuser["id"])->find();
		setcurrentuser($currentuser);
		$res="请选择用户类型，并完善信息。";
		$usertype=array("个人","企业","政府","学校","社会团体及服务");
	
		if($currentuser["review"]==0&&$currentuser["utype"]>-1){
			$res="您已成功申请 '".$usertype[$currentuser["utype"]]."' ,请耐心等待审核";
		}
		if($currentuser["REVIEW"]==1){
			header('location:' . U( 'Uc/User/center' ));
				
			return;
			//$res="您目前为 ".$usertype[$currentuser["UTYPE"]]." 用户";
		}
		if($currentuser["isusertype"]==1){
			if($currentuser["utype"]=="0"){
				header('location:' . U( 'Uc/User/personal' ));
				$this->display();	
				return;	
			}		
		}
		
		$this->assign('res',$res);
		$this->assign('currentuser',$currentuser);
		$this->display();	
	}
	
	//更新个人信息
	public function personal(){		
		$currentuser=getetcurrentuser();
		
		$userp=new Users_PersonalModel("UsersPersonal");	
		$profile=new Project_FileModel('ProjectFile'); 	
		if($_POST["submit"]){
			$data=$_POST;
			$data["USERID"]=$currentuser["id"];
			//添加
			
			if($data["have"]=="0"){
				$userp->add($data);
			}else{
				$userp->save($data);	
			}
			$currentuser["utype"]=0;
			$currentuser["review"]=0;
			$user=new UsersModel("Users");
			$user->save($currentuser);
			header('location:'.U('Uc/User/suretype'));
			
			$this->display();
			return;
		}		
		//获取个人信息		
		$model=$userp->where('userid='.$currentuser["id"])->select();	
		
		if(!$model){
			$model["UEMAIL"]=$currentuser["email"];
			$model["UMOBIPHONE"]=$currentuser["phone"];
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
		 $com=M('CompanyKind');
		 $date=$com->order("ID desc")->where("TYPE=0")->select();
		 $this->assign("xz",$date);
		 $da=$com->order("ID desc")->where("TYPE=1")->select();
		 $this->assign("hy",$da);
		$userc=M("UsersCompany");		
		if($_POST["submit"]){
			$data=$_POST;
			$data["USERID"]=$currentuser["id"];
			$data["ISHAVE"]=0;
			$data["PINYIN"]=strtoupper(getpinyin($data["CNAME"],true));
			$data["PINYINSHORT"]=strtoupper(getpinyin($data["CNAME"],false));
			//国内外判断 
				if($data["COUNTRY"]=="1"){
					$data['CPROV']=$data["PROV"];
					$data['CCITY']=$data["CITY"];
					$data['COUNTY']=$data["COUNTY"];
				}
			$data["LICENSE"]=$_POST['fileurl'];
			
			//添加
			if($data["have"]=="0"){
			
				$userc->add($data);
				
			}else{
				$userc->save($data);	
			}
			
			$currentuser["utype"]=1;
			$currentuser["review"]=0;
			$user=new UsersModel("Users");
			$user->save($currentuser);
			header('location:'.U('Uc/User/suretype'));
			$this->display();
			return;
		}
		//获取个人信息		
		$model=$userc->where('userid='.$currentuser["id"])->select();	
			
		if(!$model){
			$model["CEMAIL"]=$currentuser["email"];
			$model["CPHONE"]=$currentuser["phone"];
			$model["have"]="0";
		}else{
			$model=$model[0];
			$model["have"]="1";	
		}
		
		//print_r($model);
		$this->assign('data',$model);
		$this->display();
	}
	
	//政府机关
	public function gov(){
	$currentuser=getetcurrentuser();	
		$userd=new UsersGovModel("UsersGov");		
		if($_POST["submit"]){
			$data=$_POST;
			date_default_timezone_set(PRC);
			$data["ADDTIME"]=date("Ymd",$data["ADDTIME"]);
			$data["USERID"]=$currentuser["id"];
			
			
			$data["PINYIN"]=strtoupper(getpinyin($data["CNAME"],true));
			$data["PINYINSHORT"]=strtoupper(getpinyin($data["CNAME"],false));
			$data["LICENSE"]=$_POST['fileurl'];
			
			//添加
			if($data["have"]=="0"){
			    
		        $userd->add($data);
				
			}else{
				$userd->save($data);	
				
			}
			
			$currentuser["UTYPE"]=2;
			$currentuser["REVIEW"]=0;
			$user=new UsersModel("Users");
			$user->save($currentuser);
			header('location:'.U('Uc/User/suretype'));
			$this->display();
			return;
		}
		//获取个人信息		
		$model=$userd->where('userid='.$currentuser["id"])->select();	
			
		if(!$model){
			$model["CEMAIL"]=$currentuser["email"];
			$model["CPHONE"]=$currentuser["phone"];
			$model["have"]="0";
		}else{
			$model=$model[0];	
			$model["have"]="2";
		}
		
		//print_r($model);
		$this->assign('data',$model);
	
			$this->display();
	}
	//高校
	public function school(){
	$currentuser=getetcurrentuser();	
		$userE=new UsersSchooleModel("UsersSchoole");		
		if($_POST["submit"]){
			$data=$_POST;
			
			date_default_timezone_set(PRC);
			$data["ADDTIME"]=date("Ymd",$data["ADDTIME"]);
			$data["USERID"]=$currentuser["id"];
			
			$data["PINYIN"]=strtoupper(getpinyin($data["CNAME"],true));
			$data["PINYINSHORT"]=strtoupper(getpinyin($data["CNAME"],false));
			
			$data["LICENSE"]=$_POST['fileurl'];
			//添加
			if($data["have"]=="0"){
			    
				$userE->add($data);
			
			}else{
				$userE->save($data);	
				
			}
			
			$currentuser["UTYPE"]=3;
			$currentuser["REVIEW"]=0;
			$user=new UsersModel("Users");
			$user->save($currentuser);
			header('location:'.U('Uc/User/suretype'));
			$this->display();
			return;
		}
		//获取个人信息		
		$model=$userE->where('userid='.$currentuser["id"])->select();	
			
		if(!$model){
			$model["CEMAIL"]=$currentuser["email"];
			$model["CPHONE"]=$currentuser["phone"];
			$model["have"]="0";
		}else{
			$model=$model[0];	
			$model["have"]="3";
		}
		
		//print_r($model);
		$this->assign('data',$model);
	
			$this->display();
	}
	//社会团体及服务机构
	public function caste(){
	$currentuser=getetcurrentuser();	
		$userf=new UserCasteModel("UserCaste");		
		if($_POST["submit"]){
			$data=$_POST;
			date_default_timezone_set(PRC);
			$data["ADDTIME"]=date("Ymd",$data["ADDTIME"]);
			
			$data["USERID"]=$currentuser["id"];
			$data["LICENSE"]=$_POST['fileurl'][$key];
			/*if($_POST["gropname"]==1)
			{
			    foreach ($_POST['filename'] as $key=>$value){
					//$file["PROID"]=$da['ID'];
					
					///$file["LICENSE"]=$value;
					
				}
			}*/
			$data["LICENSE"]=$_POST['fileurl'];
			//添加
			if($data["have"]=="0"){
			  
				$userf->add($data);
				
			}else{
				$userf->save($data);	
				
			}
			
			$currentuser["UTYPE"]=4;
			$currentuser["REVIEW"]=0;
			$user=new UsersModel("Users");
			$user->save($currentuser);
			header('location:'.U('Uc/User/suretype'));
			$this->display();
			return;
		}
		//获取个人信息		
		$model=$userf->where('userid='.$currentuser["id"])->select();	
			
		if(!$model){
			$model["CEMAIL"]=$currentuser["email"];
			$model["CPHONE"]=$currentuser["phone"];
			$model["have"]="0";
		}else{
			$model=$model[0];	
			$model["have"]="4";
		}
		
		//print_r($model);
		$this->assign('data',$model);
	
			$this->display();
			
	}
	
	
	//申请成为专家
	function experts(){
		
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
