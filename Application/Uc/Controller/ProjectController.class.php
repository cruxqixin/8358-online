<?php
namespace Uc\Controller;
use Think\Controller;
use Think\FallPage;
use Model\Project_ChoseModel;
use Model\ProjectModel;
use Model\Project_FileModel;
use Model\ProjectPublishModel;
use Model\Project_kindModel;
use Model\Project_KsModel;
use Model\SearchModel;
class ProjectController extends BaseController {
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
	public function elist(){
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
		$rewhre=$_GET["type"];
		if(!$rewhre){$rewhre=0;}
		$where["STATUS"]=$rewhre;
		//搜索	
		if($_POST["keyword"]){
			$where["PRO_NAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("keyword",$_POST["keyword"]);
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		//分页展示
		import("@.ORG.FallPage"); // 导入分页类
		$countt=$project->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$project->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		$this->assign('pros',$dataset);	
		$Prochose=new Project_ChoseModel('project_chose'); 
		$Prochose1=$Prochose->where('TYPEID=0')->select();
		$res1;
		foreach($Prochose1 as $value){
			$res1[$value["ID"]]=$value;		
		}
		
		$this->assign('newproject',$newproject);
		$this->assign('Prochose1',$res1);		
		$this->assign('count',$count);
		
		
	
		
		$this->display();
	}
	
	//添加项目
	public function projectadd(){
	
		
		$id=$_GET['ID']?$_GET['ID']:'null';	
	 	$Project=new ProjectModel('project'); 	 	
		$Prochose=new Project_ChoseModel('project_chose'); 
		$currentuser=getetcurrentuser();
		$profile=new Project_FileModel('ProjectFile'); 
				
		$publish=new ProjectPublishModel("projectpublish");
		
		//添加或编辑
		if($id=='null')
		{
			//post回传处理
			if ($_POST['submit'])
			{ 
				$proks=new Project_KsModel("ProjectKs");
				
				
				$PRO_CATSES= $_POST["PRO_CATSES"];
				$procats="";
				foreach ($PRO_CATSES as $PRO_CATS){
					$procats.=$PRO_CATS.",";
				}
				$da=$_POST;
				$da["PRO_CATS"]=$procats;
				
				$da["PRO_COOPTYPE_IDS"]=join(',',$da["PRO_COOPTYPE_IDS"]);
				$da["PRO_COOPTYPE_NAME"]=trim($da["PRO_COOPTYPE_NAME"],",");
				
				//过期时间转换成时间戳
				if($da["PRO_GDATE"]){
					//$temp=explode(" ",$da["PRO_GDATE"]); 
					$temp1=explode("-",$da["PRO_GDATE"]); 
					//$temp2=explode(":",$temp[1]); 
					$da["PRO_GDATE"]=mktime(0,0,0,$temp1[1],$temp1[2],$temp1[0]); 
				}
				
				//国内外判断 
				if($da["PRO_COUNTRY"]=="1"){
					$da['PRO_PROV']=$da["PROV"];
					$da['PRO_CITY']=$da["CITY"];
					$da['PRO_COUNTY']=$da["COUNTY"];
				}
				//发布语言判断
				if(!$da["PRO_LANGUAGE"]){
					$da["PRO_LANGUAGE"]=0;					
				}
				if(!$da["PRO_LANGUAGEEN"]){
					$da["PRO_LANGUAGEEN"]=0;					
				}
					
				//添加或编辑
				if($da['ID']=='') 
				{
					//添加			
					//赋值项目编码  
					$da["PROJECTCODE"]=getprono($currentuser["utype"]);
					$da['STATUS']=1;
					if($da['ISSHOW']=="1"){
						$da['STATUS']=10;
					}
					$da['ID']=time();
					$da['ADDTIME']=time();
					$da['USERID']=$currentuser["id"];
					
					$row=$Project->add($da);  
					if ($row){ 
						//更改项目
						changeprono($currentuser["utype"]);
						$search=new SearchModel('Search');
				 $str=$da["ID"].$da["PROJECTCODE"].$da['TECHTYPECODE'].$da['PRO_NAME'].$da['PRO_CODE'].$da['PRO_COUNTRY'].$da['PRO_AREA'].$da['PRO_CATS'].$da['PRO_COOPTYPE'].$da['PRO_PATENTTYPE'].$da['PRO_PATENT'].$da['PRO_FUNDS'].$da['PRO_STAGE'].$da['PRO_KEYWORD'].$da['PRO_INVENTOR'].$da['PRO_INVENTORUNIT'].$da['PRO_PUBLICATIONS'].$da['PRO_STORIES'].$da['PRO_DOMAIN'].$da['PRO_CONTACT'].$da['PRO_PHONE'].$da['PRO_CONUNITADD'].$da['PRO_CONUNITNAME'].$da['PRO_LANGUAGE'].$da['STATUS'].$da['ISSHOW'].$da['USERID'].$da['ADMINID'].$da['ADDTIME'].$da['PRO_EMAIL'].$da['HITS'].$da['PRO_INTRO'].$da['PRO_BENEFIT'].$da['PRO_PRODUCTION'].$da['PRO_SUPERIORITY'].$da['PRO_COOPTYPE_NAME'].$da["PRO_COOPTYPE_IDS"].$da["PRO_GDATE"].$da["PRO_SPHERE"].$da["PRO_ADDTIME"].$da["PRO_CATS_OTHER"].$da["PRO_PASSOUR"].$da["PRO_OTLANURL"].$da["PRO_PROV"].$da["PRO_CITY"].$da["PRO_COUNTY"].$da["PRO_LANGUAGEEN"];
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr($da["PRO_INTRO"],0,30);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=0;
				 $data["STITLE"]=$da["PRO_NAME"];
				 $data["ITEMID"]=$da["ID"];
				 $search->add($data);
						$this->success('添加成功！',U('Uc/Project/elist'));
					}else { 
						 $this->error($Project->getError());
					}
				}
				else
				{	
					//编辑		  
					$da['STATUS']=1;
					if($da['ISSHOW']=="1"){
						$da['STATUS']=10;
					}
					
					$da['USERID']=$currentuser["id"];
					$save=$Project->save($da);
					//删除项目分类信息（重新添加）
					$data["PROID"]=$da['ID'];
					$proks->where($data)->delete();
					//删除所有附件重新添加
					$profile->where($data)->delete();
					//删除案例和出版物
					$publish->where($data)->delete();
					if($save){
					    $search=new SearchModel('Search');
				 $str=$da["ID"].$da["PROJECTCODE"].$da['TECHTYPECODE'].$da['PRO_NAME'].$da['PRO_CODE'].$da['PRO_COUNTRY'].$da['PRO_AREA'].$da['PRO_CATS'].$da['PRO_COOPTYPE'].$da['PRO_PATENTTYPE'].$da['PRO_PATENT'].$da['PRO_FUNDS'].$da['PRO_STAGE'].$da['PRO_KEYWORD'].$da['PRO_INVENTOR'].$da['PRO_INVENTORUNIT'].$da['PRO_PUBLICATIONS'].$da['PRO_STORIES'].$da['PRO_DOMAIN'].$da['PRO_CONTACT'].$da['PRO_PHONE'].$da['PRO_CONUNITADD'].$da['PRO_CONUNITNAME'].$da['PRO_LANGUAGE'].$da['STATUS'].$da['ISSHOW'].$da['USERID'].$da['ADMINID'].$da['ADDTIME'].$da['PRO_EMAIL'].$da['HITS'].$da['PRO_INTRO'].$da['PRO_BENEFIT'].$da['PRO_PRODUCTION'].$da['PRO_SUPERIORITY'].$da['PRO_COOPTYPE_NAME'].$da["PRO_COOPTYPE_IDS"].$da["PRO_GDATE"].$da["PRO_SPHERE"].$da["PRO_ADDTIME"].$da["PRO_CATS_OTHER"].$da["PRO_PASSOUR"].$da["PRO_OTLANURL"].$da["PRO_PROV"].$da["PRO_CITY"].$da["PRO_COUNTY"].$da["PRO_LANGUAGEEN"];
				 $datae["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr($da["PRO_INTRO"],0,30);
				 $datae["SEARCHDESP"]=strip_tags($strr);
				 $datae["ID"]=time();
				 $datae["TYPEID"]=0;
				 $datae["ITEMID"]=$da["ID"];
				 $datae["STITLE"]=$da["PRO_NAME"];
				 $search->where('ITEMID='.$da["ID"])->save($datae);
			
						$this->success('修改成功！',U('Uc/Project/elist'));
					}else { 
						$this->error($Project->getError());
					}
					
				}
				
				//添加项目信息到分类列表里			
				foreach ($PRO_CATSES as $PRO_CATS){
					$data["PROID"]=$da['ID'];
					$data["KID"]=$PRO_CATS;
					$proks->add($data);
				}
								
				//文件附件	
				foreach ($_POST['filename'] as $key=>$value){
					$file["PROID"]=$da['ID'];
					$file["FILEURL"]=$_POST['fileurl'][$key];
					$file["FILENAME"]=$value;
					if($file["FILEURL"]&&$file["FILENAME"]){	
						$file["FILTTYPE"]=substr(strrchr($file["FILENAME"], '.'), 1);			
						$profile->add($file);
					}
				}
				//添加出版物和相关案例
				foreach ($_POST['publish'] as $key=>$value){
					$pub["PROID"]=$da['ID'];
					$pub["TYPEID"]="0";
					$pub["OBJURL"]=$_POST['publishurl'][$key];
					$pub["OBJNAME"]=$value;
					if($pub["OBJURL"]||$pub["OBJNAME"]){			
						$publish->add($pub);
					}
				}		
				foreach ($_POST['procasets'] as $key=>$value){
					$pub["PROID"]=$da['ID'];
					$pub["TYPEID"]="1";
					$pub["OBJURL"]=$_POST['procasetsurl'][$key];
					$pub["OBJNAME"]=$value;
					if($pub["OBJURL"]||$pub["OBJNAME"]){			
						$publish->add($pub);
					}
				}		
				return;
			}
		}
		else
		{ 
		
			$where["ID"]=$id;
			$where["USERID"]=$currentuser["id"];
			$this->assign('Project',$Project->where($where)->find());		
			//获取附件列表
			$sqlwhere["PROID"]=$id;			
			$arr=$profile->where($sqlwhere)->select();
					
			$this->assign("files",$arr);
			//出版物和相关案例列表
			$sqlwhere["TYPEID"]="0";
			$pubs=$publish->where($sqlwhere)->select();
			$this->assign("pubs",$pubs);
			
			$sqlwhere["TYPEID"]="1";
			$cats=$publish->where($sqlwhere)->select();
			$this->assign("cats",$cats);
			
		}
		
		$Prokind=new Project_kindModel('project_kind');
		$kind=$Prokind->order("sort desc,id desc")->select();
		$kindres;
		foreach($kind as $value){
			$kindres[$value["id"]]=$value;	
		}
		
		$this->assign('Prochose1',$Prochose->where('TYPEID=0')->select());
		$this->assign('Prochose2',$Prochose->where('TYPEID=1')->select());
		$this->assign('Prochose3',$Prochose->where('TYPEID=2')->select());
		$this->assign('Prochose4',$Prochose->where('TYPEID=3')->select());
		$this->assign('Prokind',$kindres);
		$this->display();
 
	}
	
	
}
