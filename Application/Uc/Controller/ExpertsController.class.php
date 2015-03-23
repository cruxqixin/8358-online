<?php
namespace Uc\Controller;
use Think\Controller;
use Think\FallPage;
use Model\ExpertsModel;
use Model\UsersExpertsModel;
use Model\UsersModel;
use Model\SearchModel;
class ExpertsController extends BaseController {
	
	//专家列表
	public function elist(){
		$currentuser=getetcurrentuser();
		
		$experts=new ExpertsModel("Experts");
		
		//获取当前项目信息
		$where["USERID"]=$currentuser["id"];	
		$where["STATUS"]="0";	
		$count[0]=$experts->where($where)->count();
		$where["STATUS"]="1";
		$count[1]=$experts->where($where)->count();
		$where["STATUS"]="2";
		$count[2]=$experts->where($where)->count();
		$where["STATUS"]="10";
		$count[3]=$experts->where($where)->count();
		//搜索	
		if($_POST["keyword"]){
			$where["ENAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("keyword",$_POST["keyword"]);
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["EADDTIME"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		//分页展示
		
		import("@.ORG.FallPage"); // 导入分页类
		$countt=$experts->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		$rewhre=$_GET["type"];
		if(!$rewhre){$rewhre=0;}
		$where["STATUS"]=$rewhre;	
		$dataset=$experts->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		$this->assign('exs',$dataset);	
		//获取当先项目列表
		
		
		//$res=$experts->where($where)->limit(10)->order(" id desc")->select();

		$this->assign('count',$count);
		//$this->assign('exs',$res);		
		$this->display();
		
	}	
	//添加/修改 专家
	public function expertsadd(){
	    $currentuser=getetcurrentuser();
		if($currentuser["utypereview"]==1)
		{
		   $this->success('您已申请过专家！',U('Uc/Experts/expertsadd?ids='.$currentuser["id"]));
		   exit();
		}
		$experts=new ExpertsModel("Experts");
		if (isset($_GET['ID']) && trim($_GET['ID'])) {
			
			$id=$_GET['ID'];
			 $cx=$experts->where('USERID='.$id)->select();
				
				$this->assign("experts",$cx[0]);
		}
		if (isset($_GET['ids']) && trim($_GET['ids'])) {
			$userex=new UsersExpertsModel('UsersExperts');
			$ids=$_GET['ids'];
			 $ux=$userex->where('USERID='.$ids)->select();
				
				$this->assign("experts",$ux[0]);
		}
		if($_POST["submit"]){
			$da=$_POST;
			
			$da["USERID"]=$currentuser["id"];
			
			if($da["ECOUNTRY"]=="1"){
				$da["CPROV"]=$_POST["PROV"];
				$da["CCITY"]=$_POST["CITY"];
				$da["COUNTY"]=$_POST["C_OUNTY"];
			}
			
			if($da["ISSHOW"]=="10"){
				$da["STATUS"]="10";
			}else{
				$da["STATUS"]="1";
			}
		  //过期时间转换成时间戳
				if($da["EGDATE"]){
					//$temp=explode(" ",$da["PRO_GDATE"]); 
					$temp1=explode("-",$da["EGDATE"]); 
					//$temp2=explode(":",$temp[1]); 
					$da["EGDATE"]=mktime(0,0,0,$temp1[1],$temp1[2],$temp1[0]); 
				}
				$da["EADDTIME"]=time();
			if($da["ID"])
			{   $wheree["ID"]=$da["ID"];
				$save=$experts->where($wheree)->save($da);
				if($save)
				{ 
				 $search=new SearchModel('Search');
				 $str=$da["ID"].$da["ENAME"].$da['EGENDER'].$da['EBIRTH'].$da['EKINDS'].$da['EKINDMARK'].$da['EPOST'].$da['EPOSTTITLE'].$da['ENITNAME'].$da['EDEPARTMENT'].$da['EADDRESS'].$da['EMOBIPHONE'].$da['EPHONE'].$da['EFAX'].$da['EEMAIL'].$da['SORT'].$da['CPROV'].$da['CCITY'].$da['COUNTY'].$da['STATUS'].$da['USERID'].$da['ADMINID'].$da['STIME'].$da['ECODE'].$da['EFACE'].$da['HITS'].$da['ETAKEOFFICE'].$da['EWINNING'].$da['ESCIENTIFIC'].$da['EBOOKS'].$da['EINTRO'].$da['EGDATE'].$da['EADDTIME'].$da['ECATS_OTHER'].$da['ECOUNTRY'].$da['ISPERSONAL'];
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr($da["EINTRO"],0,30);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=1;
				 $data["STITLE"]=$da["ENAME"];
				 $data["ITEMID"]=$da["ID"];
				
				 $search->where('ITEMID='.$da["ID"])->save($data);
				
				  $this->success('更新成功！',U('Uc/Experts/elist'));
				 }
			}else{
			  if($currentuser["utype"]==0)
			  {  
			    $userexpert=new UsersExpertsModel('UsersExperts');
			    $da["USERID"]=$currentuser["id"];
				$ex=$userexpert->where("ID=".$_POST['ID'])->add($da);
				
				if($ex)
				{ 
				if($da["uid"])
				  $where["ID"]=$da["uid"];
				  $user=new UsersModel("Users");
				  $dt["UTYPEREVIEW"]=1;
				  $save=$user->where($where)->save($dt);
				  if($save)
				  {
				  
				   $this->success('保存成功！',U('Uc/Experts/expertsadd?ids='.$currentuser["id"]));
				  }
				}
			    
			  }
			  else
			  {
			 
				$da["ID"]=time();
				//$da["ISPERSONAL"]=0;
				$add=$experts->add($da);
				if($add)
				{ 
				 $search=new SearchModel('Search');
				 $str=$da["ID"].$da["ENAME"].$da['EGENDER'].$da['EBIRTH'].$da['EKINDS'].$da['EKINDMARK'].$da['EPOST'].$da['EPOSTTITLE'].$da['ENITNAME'].$da['EDEPARTMENT'].$da['EADDRESS'].$da['EMOBIPHONE'].$da['EPHONE'].$da['EFAX'].$da['EEMAIL'].$da['SORT'].$da['CPROV'].$da['CCITY'].$da['COUNTY'].$da['STATUS'].$da['USERID'].$da['ADMINID'].$da['STIME'].$da['ECODE'].$da['EFACE'].$da['HITS'].$da['ETAKEOFFICE'].$da['EWINNING'].$da['ESCIENTIFIC'].$da['EBOOKS'].$da['EINTRO'].$da['EGDATE'].$da['EADDTIME'].$da['ECATS_OTHER'].$da['ECOUNTRY'].$da['ISPERSONAL'];
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr($da["EINTRO"],0,30);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=1;
				 $data["ITEMID"]=$da["ID"];
				 $data["STITLE"]=$da["ENAME"];
				 $search->add($data);
				 $this->success('保存成功！',U('Uc/Experts/elist'));
				}
			  }
			}
			
			return;
		}
		
		if($_GET["id"]){
			$where=$_GET;
			$where["USERID"]=$currentuser["id"];
			$model=$experts->where($where)->find();
			$this->assign("experts",$model);
		}
		
		$this->display();
	}	
}
