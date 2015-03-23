<?php
namespace Keji\Controller;
use Think\Controller;
use Model\User_IndustryModel;
use Model\KjuserModel;
use Model\Company_KindModel;
use Model\Company_Goods_kindModel;
use Model\Company_GoodsKindsModel;
use Model\Company_GoodsModel;
use Model\SearchModel;
use Think\FallPage;
use Model\ProjectModel; 	
class ProjectController extends BaseController{
	public function index(){
		$Project=new ProjectModel('project'); 
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$where['USERID']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		if($_POST["keyword"]){
			$where["PRO_NAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['STATUS']=0;
		$countt=$Project->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$Project->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);	
		$this->assign('manu',$dataset);
		$this->assign('count',$countt);
		$where['STATUS']=1;
		$ds=$Project->where($where)->count();
        $this->assign("ds",$ds);

		$where['STATUS']=2;
		$js=$Project->where($where)->count();
        $this->assign("js",$js);		
		$this->display();
	}
	public function indexx(){
		$Project=new ProjectModel('project'); 
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$where['USERID']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		if($_POST["keyword"]){
			$where["PRO_NAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['STATUS']=0;
		$all=$Project->where($where)->count();
        $this->assign("all",$all);
		
		$where['STATUS']=1;
		$countt=$Project->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$Project->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);	
		$this->assign('manu',$dataset);
		$this->assign('count',$countt);
		

		$where['STATUS']=2;
		$js=$Project->where($where)->count();
        $this->assign("js",$js);		
		$this->display();
	}
	public function refuse(){
		$Project=new ProjectModel('project'); 
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$where['USERID']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		if($_POST["keyword"]){
			$where["PRO_NAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['STATUS']=0;
		$all=$Project->where($where)->count();
        $this->assign("all",$all);
		
		$where['STATUS']=2;
		
		$countt=$Project->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$Project->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);	
		$this->assign('manu',$dataset);
		$this->assign('count',$countt);
		

		$where['STATUS']=1;
		$ds=$Project->where($where)->count();
        $this->assign("ds",$ds);		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$publish=D("projectpublish");
		$profile=D('ProjectFile'); 
		$Project=new ProjectModel('project'); 
		//合作方式
		$Prochose=D('project_chose'); 
	    $this->assign('Prochose1',$Prochose->where('TYPEID=0')->select());
		$this->assign('Prochose2',$Prochose->where('TYPEID=1')->select());
		$this->assign('Prochose3',$Prochose->where('TYPEID=2')->select());
		$this->assign('Prochose4',$Prochose->where('TYPEID=3')->select());
		
		$Prokind=D('project_kind');
		$kind=$Prokind->select();
		
		
		$kindres;
		foreach($kind as $value){
			$kindres[$value["id"]]=$value;	
		}
		$this->assign('Prokind',$kindres);
		
		$kind=M('Innovation');
		$list=$kind->where("userid=".$currentuser['id']." and status=0")->select();
		$this->assign("xkind",$list);
		
		
		if($_GET['id']){
			$vo=$Project->where("ID=".$_GET['id'])->find();
			$this->assign('article',$vo);
			//附件
			$sqlwhere["PROID"]=$_GET['id'];			
			$arr=$profile->where($sqlwhere)->select();
			
			$this->assign("files",$arr);
			//案例
			$sqlwhere["TYPEID"]="1";
			$cats=$publish->where($sqlwhere)->select();
			$this->assign("cats",$cats);
						
		}
		if($_POST){
			$da=$_POST;
			$proks=D("ProjectKs");
				$PRO_CATSES= $_POST["PRO_CATSES"];
				$procats="";
				foreach ($PRO_CATSES as $PRO_CATS){
					$procats.=$PRO_CATS.",";
				}
				$da=$_POST;
				$da["PRO_CATS"]=$procats;
				//添加或编辑
				
				
				//过期时间转换成时间戳
				if($da["PRO_GDATE"]){
					//$temp=explode(" ",$da["PRO_GDATE"]); 
					$temp1=explode("-",$da["PRO_GDATE"]); 
					//$temp2=explode(":",$temp[1]); 
					$da["PRO_GDATE"]=mktime(0,0,0,$temp1[1],$temp1[2],$temp1[0]); 
				}
				
					
			if($_POST['ID']==''){
			
				
				$da["PROJECTCODE"]=getprono("11");
					
					$da['ID']=time();
					$da['ADDTIME']=time();
					$da['USERID']=$currentuser['id'];
					$da['ISSHOW']=0;
					$da['STATUS']=1;
					$row=$Project->add($da);
					
					//print_r($Project);
					
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
				//添加相关案例
				
				foreach ($_POST['procasets'] as $key=>$value){
					$pub["PROID"]=$da['ID'];
					$pub["TYPEID"]="1";
					$pub["OBJURL"]=$_POST['procasetsurl'][$key];
					$pub["OBJNAME"]=$value;
					if($pub["OBJURL"]||$pub["OBJNAME"]){			
						$publish->add($pub);
					}
				}
			
			
					if ($row){ 
						changeprono("11");
					$search=D('Search');
					 $str=$da["ID"].$da["PROJECTCODE"].$da['TECHTYPECODE'].$da['PRO_NAME'].$da['PRO_CODE'].$da['PRO_COUNTRY'].$da['PRO_AREA'].$da['PRO_CATS'].$da['PRO_COOPTYPE'].$da['PRO_PATENTTYPE'].$da['PRO_PATENT'].$da['PRO_FUNDS'].$da['PRO_STAGE'].$da['PRO_KEYWORD'].$da['PRO_INVENTOR'].$da['PRO_INVENTORUNIT'].$da['PRO_PUBLICATIONS'].$da['PRO_STORIES'].$da['PRO_DOMAIN'].$da['PRO_CONTACT'].$da['PRO_PHONE'].$da['PRO_CONUNITADD'].$da['PRO_CONUNITNAME'].$da['PRO_LANGUAGE'].$da['STATUS'].$da['ISSHOW'].$da['USERID'].$da['ADMINID'].$da['ADDTIME'].$da['PRO_EMAIL'].$da['HITS'].$da['PRO_INTRO'].$da['PRO_BENEFIT'].$da['PRO_PRODUCTION'].$da['PRO_SUPERIORITY'].$da['PRO_COOPTYPE_NAME'].$da["PRO_COOPTYPE_IDS"].$da["PRO_GDATE"].$da["PRO_SPHERE"].$da["PRO_ADDTIME"].$da["PRO_CATS_OTHER"].$da["PRO_PASSOUR"].$da["PRO_OTLANURL"].$da["PRO_PROV"].$da["PRO_CITY"].$da["PRO_COUNTY"].$da["PRO_LANGUAGEEN"];
					 $data["SEARCHCONTENT"]= strip_tags($str);
					 $strr=substr($da["PRO_INTRO"],0,30);
					 $data["SEARCHDESP"]=strip_tags($strr);
					 $data["ID"]=time();
					 $data["TYPEID"]=0;
					 $data["STITLE"]=$da["PRO_NAME"];
					 $data["ITEMID"]=$da["ID"];
					 $search->add($data);
					// echo $Project->getlastsql();
				      $this->success('添加成功！',U('Project/index'));
					}else { 
						 $this->error('添加失败！',U('Project/index'));
					}
				}else{
					$data["PROID"]=$da['ID'];
					$proks->where($data)->delete();
					$da['STATUS']=1;
					$save=$Project->where("ID=".$_POST['ID'])->save($da);					
					//删除项目分类信息（重新添加）
					$data["PROID"]=$da['ID'];
					$proks->where($data)->delete();
					//删除所有附件重新添加
					$profile->where($data)->delete();
					//删除案例
					$publish->where($data)->delete();
					
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
				//添加相关案例
				
				foreach ($_POST['procasets'] as $key=>$value){
				
				
					$pub["PROID"]=$da['ID'];
					$pub["TYPEID"]="1";
					$pub["OBJURL"]=$_POST['procasetsurl'][$key];
					$pub["OBJNAME"]=$value;
					if($pub["OBJURL"]||$pub["OBJNAME"]){			
						$publish->add($pub);
						echo $publish->getlastsql();
						return;
					}
				}
					
						 $search=D('Search');
						 $str=$da["ID"].$da["PROJECTCODE"].$da['TECHTYPECODE'].$da['PRO_NAME'].$da['PRO_CODE'].$da['PRO_COUNTRY'].$da['PRO_AREA'].$da['PRO_CATS'].$da['PRO_COOPTYPE'].$da['PRO_PATENTTYPE'].$da['PRO_PATENT'].$da['PRO_FUNDS'].$da['PRO_STAGE'].$da['PRO_KEYWORD'].$da['PRO_INVENTOR'].$da['PRO_INVENTORUNIT'].$da['PRO_PUBLICATIONS'].$da['PRO_STORIES'].$da['PRO_DOMAIN'].$da['PRO_CONTACT'].$da['PRO_PHONE'].$da['PRO_CONUNITADD'].$da['PRO_CONUNITNAME'].$da['PRO_LANGUAGE'].$da['STATUS'].$da['ISSHOW'].$da['USERID'].$da['ADMINID'].$da['ADDTIME'].$da['PRO_EMAIL'].$da['HITS'].$da['PRO_INTRO'].$da['PRO_BENEFIT'].$da['PRO_PRODUCTION'].$da['PRO_SUPERIORITY'].$da['PRO_COOPTYPE_NAME'].$da["PRO_COOPTYPE_IDS"].$da["PRO_GDATE"].$da["PRO_SPHERE"].$da["PRO_ADDTIME"].$da["PRO_CATS_OTHER"].$da["PRO_PASSOUR"].$da["PRO_OTLANURL"].$da["PRO_PROV"].$da["PRO_CITY"].$da["PRO_COUNTY"].$da["PRO_LANGUAGEEN"];
						 $datae["SEARCHCONTENT"]= strip_tags($str);
						 $strr=substr($da["PRO_INTRO"],0,30);
						 $datae["SEARCHDESP"]=strip_tags($strr);
						 $datae["ID"]=time();
						 $datae["TYPEID"]=0;
						 $datae["STITLE"]=$da["PRO_NAME"];
						 $datae["ITEMID"]=$da["ID"];
						 $search->where('ITEMID='.$da["ID"])->save($datae);
						$this->success('修改成功！',U('Project/index'));
					
				}
				//添加项目信息到分类列表里			
					
						
				return;
			
			
			
		}
		$this->display();
	}
	public function delete(){
		$publish=D("projectpublish");
		$profile=D('ProjectFile'); 
		$Project=new ProjectModel('project'); 
		$proks=D("ProjectKs");
		if($_GET['id']){
			//删除项目分类信息（重新添加）
		   $data["PROID"]=$_GET['id'];
		   $proks->where($data)->delete();
			//删除所有附件重新添加
		   $profile->where($data)->delete();
		    //删除案例
		   $publish->where($data)->delete();
		   $dele=$Project->where("ID=".$_GET['id'])->delete();
		   if($dele){
			 $this->success('删除成功');
		   }else{
			  $this->error('删除失败');
		   }
		}
	}
	
}