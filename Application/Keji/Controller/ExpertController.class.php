<?php
namespace Keji\Controller;
use Think\Controller;
use Model\ExpertsModel;
USE Think\FallPage;
class ExpertController extends BaseController{
    public function index(){
		$currentuser=getetcurrentuser();
		$where['USERID']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["EADDTIME"]=array("between",array($star,$end));
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["ENAME"]=array("like","%".$_POST["keyword"]."%");	
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['STATUS']=0;
		$countt=M('Experts')->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=M('Experts')->where($where)->order('ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['STATUS']=1;
		$ds=M('Experts')->where($where)->count();
		$this->assign('ds',$ds);
		$where['STATUS']=2;
		$weishen=M('Experts')->where($where)->count();
		$this->assign('js',$weishen);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$where['USERID']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["EADDTIME"]=array("between",array($star,$end));
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["ENAME"]=array("like","%".$_POST["keyword"]."%");	
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['STATUS']=1;
		$countt=M('Experts')->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=M('Experts')->where($where)->order('ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['STATUS']=0;
		$ds=M('Experts')->where($where)->count();
		$this->assign('all',$ds);
		$where['STATUS']=2;
		$weishen=M('Experts')->where($where)->count();
		$this->assign('js',$weishen);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$where['USERID']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["EADDTIME"]=array("between",array($star,$end));
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["ENAME"]=array("like","%".$_POST["keyword"]."%");	
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['STATUS']=2;
		$countt=M('Experts')->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=M('Experts')->where($where)->order('ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['STATUS']=1;
		$ds=M('Experts')->where($where)->count();
		$this->assign('ds',$ds);
		$where['STATUS']=0;
		$weishen=M('Experts')->where($where)->count();
		$this->assign('all',$weishen);
		$this->display();
	}
	public function edit(){
		 $currentuser=getetcurrentuser();
		 
		 $kind=M('Innovation');
		$list=$kind->where("userid=".$currentuser['id']." and status=0")->select();
		$this->assign("xkind",$list);
		
		 $this->assign('type',$_GET['lb']);
		 $expert=new ExpertsModel('Experts');
		 $Prokind=D('project_kind');
		 $expertkind=M('ExpersKs');
		$kind=$Prokind->select();
		$kindres;
		foreach($kind as $value){
			$kindres[$value["id"]]=$value;	
		}
		$this->assign('Prokind',$kindres);
		 if($_GET['id']&&trim($_GET['id'])){
			$vo=$expert->where("ID=".$_GET['id'])->find();
			$this->assign("article",$vo);
			
			
			$list=$expertkind->where("EXPID=".$_GET['id'])->select();
			$ids="";
			foreach($list as $value){
				$ids.=$value['kid'];
				$ids.=",";
			}
			$this->assign("kinds",$ids);
		 }
		if($_POST){
			$da=$_POST;
			if($_POST['ID']==''){
				$da['ID']=time();
			$da['STATUS']=1;
			$da["USERID"]=$currentuser["id"];
			$da['EADDTIME']=time();
			$js=$_POST['kindid'];
			$ar="";
			foreach($js as $value){
				$data['EXPID']=$da['ID'];
				$data['KID']=$value;
				$expertkind->add($data);
			}
			if($da["ECOUNTRY"]=="1"){
				$da["CPROV"]=$_POST["PROV"];
				$da["CCITY"]=$_POST["CITY"];
				$da["COUNTY"]=$_POST["C_OUNTY"];
			}
			if($_POST['types']=='sq'){
				if($currentuser["utype"]==0)
			  {  
			    
				$da['ISPERSONAL']=1;
				$ex=M('Experts')->add($da);
				
				if($ex)
				{ 
				if($da["uid"])
				  $where["ID"]=$da["uid"];
				  
				  $dt["UTYPEREVIEW"]=1;
				  $save=M('Users')->where($where)->save($dt);
				  if($save)
				  {
				     $this->success('保存成功！');
				  }
				}
			    
			  }
			}else{
				$row=M('Experts')->add($da);
				
			 //$search=new SearchModel('Search');
				 $str=$da["ID"].$da["ENAME"].$da['EGENDER'].$da['EBIRTH'].$da['EKINDS'].$da['EKINDMARK'].$da['EPOST'].$da['EPOSTTITLE'].$da['ENITNAME'].$da['EDEPARTMENT'].$da['EADDRESS'].$da['EMOBIPHONE'].$da['EPHONE'].$da['EFAX'].$da['EEMAIL'].$da['SORT'].$da['CPROV'].$da['CCITY'].$da['COUNTY'].$da['STATUS'].$da['USERID'].$da['ADMINID'].$da['STIME'].$da['ECODE'].$da['EFACE'].$da['HITS'].$da['ETAKEOFFICE'].$da['EWINNING'].$da['ESCIENTIFIC'].$da['EBOOKS'].$da['EINTRO'].$da['EGDATE'].$da['EADDTIME'].$da['ECATS_OTHER'].$da['ECOUNTRY'].$da['ISPERSONAL'];
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr($da["EINTRO"],0,30);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=1;
				 $data["ITEMID"]=$da["ID"];
				 $data["STITLE"]=$da["ENAME"];
				 M('Search')->where('ITEMID='.$da["ID"])->save($data);
				 $this->success("操作成功");
			  }
			}else{
				$expertkind->where("EXPID=".$_POST['id'])->delete();
				$js=$_POST['kindid'];
				$ar="";
				foreach($js as $value){
					$data['EXPID']=$da['ID'];
					$data['KID']=$value;
					$expertkind->add($data);
				}
				
				if($da["ECOUNTRY"]=="1"){
					$da["CPROV"]=$_POST["PROV"];
					$da["CCITY"]=$_POST["CITY"];
					$da["COUNTY"]=$_POST["C_OUNTY"];
				}
				$da['STATUS']=1;
				$save=M('Experts')->where("ID=".$_POST['id'])->save($da);
				
				$this->success("修改成功");
			}

			
		}
    	$this->display();
	}
	public function delete(){
		$expert=M('Experts');
		if($_GET['id']){
			$del=$expert->where("ID=".$_GET['id'])->delete();
			$this->success("删除成功");
		}
	}
}